<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Statuts considérés comme des commandes commerciales valides.
     */
    private const ACTIVE_ORDER_STATUSES = [
        'confirmed',
        'preparing',
        'shipped',
        'delivered',
    ];

    /**
     * Affiche le dashboard administrateur.
     */
    public function __invoke(): View
    {
        /*
        |--------------------------------------------------------------------------
        | PÉRIODE ACTUELLE
        |--------------------------------------------------------------------------
        */

        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        /*
        |--------------------------------------------------------------------------
        | PÉRIODE PRÉCÉDENTE
        |--------------------------------------------------------------------------
        */

        $startOfPreviousMonth = now()
            ->subMonthNoOverflow()
            ->startOfMonth();

        $endOfPreviousMonth = now()
            ->subMonthNoOverflow()
            ->endOfMonth();

        /*
        |--------------------------------------------------------------------------
        | COMMANDES EN ATTENTE
        |--------------------------------------------------------------------------
        |
        | Ce nombre sert au badge "Commandes" de la navigation.
        |
        | Une commande pending nécessite potentiellement une action
        | de l'administrateur.
        |
        */

        $pendingOrdersCount = Order::query()
            ->where('status', 'pending')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | COMMANDES DU MOIS
        |--------------------------------------------------------------------------
        */

        $monthlyOrdersQuery = Order::query()
            ->whereIn('status', self::ACTIVE_ORDER_STATUSES)
            ->whereBetween('created_at', [
                $startOfMonth,
                $endOfMonth,
            ]);

        $monthlyOrdersCount = (clone $monthlyOrdersQuery)->count();

                /*
        |--------------------------------------------------------------------------
        | MESSAGES NON LUS
        |--------------------------------------------------------------------------
        |
        | Un message est considéré comme non lu lorsque read_at est NULL.
        |
        */

        $unreadMessagesCount = Message::query()
            ->whereNull('read_at')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | CHIFFRE D'AFFAIRES DU MOIS
        |--------------------------------------------------------------------------
        */

        $monthlyRevenue = (clone $monthlyOrdersQuery)->sum('total');

        /*
        |--------------------------------------------------------------------------
        | COMMANDES DU MOIS PRÉCÉDENT
        |--------------------------------------------------------------------------
        */

        $previousMonthlyOrdersCount = Order::query()
            ->whereIn('status', self::ACTIVE_ORDER_STATUSES)
            ->whereBetween('created_at', [
                $startOfPreviousMonth,
                $endOfPreviousMonth,
            ])
            ->count();

        /*
        |--------------------------------------------------------------------------
        | CHIFFRE D'AFFAIRES DU MOIS PRÉCÉDENT
        |--------------------------------------------------------------------------
        */

        $previousMonthlyRevenue = Order::query()
            ->whereIn('status', self::ACTIVE_ORDER_STATUSES)
            ->whereBetween('created_at', [
                $startOfPreviousMonth,
                $endOfPreviousMonth,
            ])
            ->sum('total');

        /*
        |--------------------------------------------------------------------------
        | ÉVOLUTION DES COMMANDES
        |--------------------------------------------------------------------------
        */

        $ordersEvolution = $this->calculatePercentageChange(
            $previousMonthlyOrdersCount,
            $monthlyOrdersCount
        );

        /*
        |--------------------------------------------------------------------------
        | ÉVOLUTION DU CHIFFRE D'AFFAIRES
        |--------------------------------------------------------------------------
        */

        $revenueEvolution = $this->calculatePercentageChange(
            $previousMonthlyRevenue,
            $monthlyRevenue
        );

        /*
        |--------------------------------------------------------------------------
        | CLIENTS
        |--------------------------------------------------------------------------
        */

        $customersCount = Order::query()
            ->whereIn('status', self::ACTIVE_ORDER_STATUSES)
            ->whereNotNull('user_id')
            ->distinct('user_id')
            ->count('user_id');

        /*
        |--------------------------------------------------------------------------
        | PLATS DISPONIBLES
        |--------------------------------------------------------------------------
        */

        $availableProductsCount = Product::query()
            ->where('status', 'published')
            ->where('is_available', true)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES
        |--------------------------------------------------------------------------
        */

        $categoriesCount = Category::query()
            ->where('is_active', true)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | COMMANDES RÉCENTES
        |--------------------------------------------------------------------------
        */

        $recentOrders = Order::query()
            ->with('user')
            ->latest()
            ->limit(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | ACTIVITÉ DE LA SEMAINE
        |--------------------------------------------------------------------------
        */

        $weekStart = now()->startOfWeek(Carbon::MONDAY);
        $weekEnd = now()->endOfWeek(Carbon::SUNDAY);

        $weeklyOrders = Order::query()
            ->whereIn('status', self::ACTIVE_ORDER_STATUSES)
            ->whereBetween('created_at', [
                $weekStart,
                $weekEnd,
            ])
            ->selectRaw(
                'DATE(created_at) as order_date, COUNT(*) as total'
            )
            ->groupBy('order_date')
            ->pluck('total', 'order_date');

        $weeklyActivity = collect();

        for (
            $date = $weekStart->copy();
            $date <= $weekEnd;
            $date->addDay()
        ) {
            $dateKey = $date->format('Y-m-d');

            $weeklyActivity->push([
                'label' => $this->getFrenchDayLabel($date),
                'date' => $dateKey,
                'count' => (int) ($weeklyOrders[$dateKey] ?? 0),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | HAUTEUR DES BARRES DU GRAPHIQUE
        |--------------------------------------------------------------------------
        */

        $maxWeeklyOrders = max(
            1,
            $weeklyActivity->max('count')
        );

        $weeklyActivity = $weeklyActivity->map(
            function (array $day) use ($maxWeeklyOrders) {

                $day['height'] = $day['count'] > 0
                    ? round(
                        ($day['count'] / $maxWeeklyOrders) * 100
                    )
                    : 0;

                return $day;
            }
        );

        /*
        |--------------------------------------------------------------------------
        | PLATS LES PLUS COMMANDÉS
        |--------------------------------------------------------------------------
        */

        $popularProducts = OrderItem::query()
            ->select('product_id')
            ->selectRaw('SUM(quantity) as total_quantity')
            ->whereHas('order', function ($query) {
                $query->whereIn(
                    'status',
                    self::ACTIVE_ORDER_STATUSES
                );
            })
            ->whereBetween('created_at', [
                $startOfMonth,
                $endOfMonth,
            ])
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | POURCENTAGE DES PLATS POPULAIRES
        |--------------------------------------------------------------------------
        */

        $maxPopularQuantity = max(
            1,
            (int) $popularProducts->max('total_quantity')
        );

        $popularProducts = $popularProducts->map(
            function ($item) use ($maxPopularQuantity) {

                $item->percentage = round(
                    (
                        (int) $item->total_quantity
                        / $maxPopularQuantity
                    ) * 100
                );

                return $item;
            }
        );

        /*
        |--------------------------------------------------------------------------
        | PROGRESSION MENSUELLE
        |--------------------------------------------------------------------------
        */

        $monthlyProgress = min(
            100,
            max(
                0,
                (int) round($revenueEvolution)
            )
        );

        /*
        |--------------------------------------------------------------------------
        | DONNÉES POUR LA VUE
        |--------------------------------------------------------------------------
        */

       return view('admin.dashboard', [

        // Statistiques principales
        'monthlyOrdersCount' => $monthlyOrdersCount,
        'monthlyRevenue' => $monthlyRevenue,
        'customersCount' => $customersCount,
        'availableProductsCount' => $availableProductsCount,
        'categoriesCount' => $categoriesCount,

        // Évolutions
        'ordersEvolution' => $ordersEvolution,
        'revenueEvolution' => $revenueEvolution,

        // Notifications de navigation
        'pendingOrdersCount' => $pendingOrdersCount,
        'unreadMessagesCount' => $unreadMessagesCount,

        // Commandes
        'recentOrders' => $recentOrders,

        // Graphique
        'weeklyActivity' => $weeklyActivity,

        // Produits populaires
        'popularProducts' => $popularProducts,

        // Progression
        'monthlyProgress' => $monthlyProgress,
        ]);
    }

    /**
     * Calcule l'évolution en pourcentage entre deux valeurs.
     */
    private function calculatePercentageChange(
        float|int $previous,
        float|int $current
    ): float {
        if ((float) $previous === 0.0) {
            return $current > 0 ? 100 : 0;
        }

        return round(
            (($current - $previous) / $previous) * 100,
            1
        );
    }

    /**
     * Retourne l'abréviation française du jour.
     */
    private function getFrenchDayLabel(Carbon $date): string
    {
        return match ($date->dayOfWeekIso) {
            1 => 'Lun',
            2 => 'Mar',
            3 => 'Mer',
            4 => 'Jeu',
            5 => 'Ven',
            6 => 'Sam',
            7 => 'Dim',
        };
    }
}
