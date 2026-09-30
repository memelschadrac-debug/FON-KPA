<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\OptionChoice;
use App\Models\OptionGroup;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemOption;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CheckoutSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_foreign_option_choice_is_rejected(): void
    {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        $category = Category::create([
            'name' => 'Catégorie test',
            'slug' => 'categorie-test',
            'is_active' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Produit A
        |--------------------------------------------------------------------------
        */
        $productA = Product::create([
            'category_id' => $category->id,
            'name' => 'Produit A',
            'slug' => 'produit-a',
            'description' => 'Produit de test A',
            'price' => 3500,
            'preparation_time' => 15,
            'status' => 'published',
            'is_available' => true,
            'is_featured' => false,
        ]);

        $groupA = OptionGroup::create([
            'product_id' => $productA->id,
            'name' => 'Accompagnement',
            'is_required' => true,
            'min_choices' => 1,
            'max_choices' => 1,
            'sort_order' => 1,
        ]);

        OptionChoice::create([
            'option_group_id' => $groupA->id,
            'name' => 'Attiéké',
            'price_modifier' => 0,
            'is_available' => true,
            'sort_order' => 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Produit B
        |--------------------------------------------------------------------------
        | Cette option appartient volontairement à un autre produit.
        |--------------------------------------------------------------------------
        */
        $productB = Product::create([
            'category_id' => $category->id,
            'name' => 'Produit B',
            'slug' => 'produit-b',
            'description' => 'Produit de test B',
            'price' => 5000,
            'preparation_time' => 20,
            'status' => 'published',
            'is_available' => true,
            'is_featured' => false,
        ]);

        $groupB = OptionGroup::create([
            'product_id' => $productB->id,
            'name' => 'Sauce',
            'is_required' => true,
            'min_choices' => 1,
            'max_choices' => 1,
            'sort_order' => 1,
        ]);

        $choiceB = OptionChoice::create([
            'option_group_id' => $groupB->id,
            'name' => 'Sauce graine',
            'price_modifier' => 1000,
            'is_available' => true,
            'sort_order' => 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Panier falsifié
        |--------------------------------------------------------------------------
        | On injecte volontairement une option appartenant à Produit B
        | dans le panier de Produit A.
        |--------------------------------------------------------------------------
        */
        $cart = [
            'product-' . $productA->id => [
                'product_id' => $productA->id,
                'name' => $productA->name,
                'price' => 3500,
                'quantity' => 1,

                'options' => [
                    [
                        'group_id' => $groupB->id,
                        'group' => $groupB->name,
                        'choice_id' => $choiceB->id,
                        'choice' => $choiceB->name,
                        'price_modifier' => 1000,
                    ],
                ],
            ],
        ];

        $this->withoutExceptionHandling();

        $response = $this
            ->actingAs($user)
            ->withSession([
                'cart' => $cart,
            ])
            ->post(route('commande.store'), [
                'first_name' => 'Test',
                'last_name' => 'Sécurité',
                'email' => 'test@example.com',
                'phone' => '0700000000',
                'address' => 'Abidjan',
                'city' => 'Abidjan',
                'district' => 'Cocody',
                'delivery_method' => 'delivery',
                'payment_method' => 'cash',
                'note' => null,
            ]);

        $response->assertRedirect(route('cart.index'));

        $response->assertSessionHas(
            'error',
            "Une option sélectionnée pour « {$productA->name} » est invalide."
        );

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_client_cannot_manipulate_product_price(): void
    {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        $category = Category::create([
            'name' => 'Catégorie test prix',
            'slug' => 'categorie-test-prix',
            'is_active' => true,
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Garba de Test',
            'slug' => 'garba-de-test',
            'description' => 'Produit utilisé pour tester la sécurité du checkout.',
            'price' => 3500,
            'preparation_time' => 15,
            'status' => 'published',
            'is_available' => true,
            'is_featured' => false,
        ]);

        $optionGroup = OptionGroup::create([
            'product_id' => $product->id,
            'name' => 'Accompagnement',
            'is_required' => true,
            'min_choices' => 1,
            'max_choices' => 1,
            'sort_order' => 1,
        ]);

        $choice = OptionChoice::create([
            'option_group_id' => $optionGroup->id,
            'name' => 'Attiéké',
            'price_modifier' => 0,
            'is_available' => true,
            'sort_order' => 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Panier falsifié
        |--------------------------------------------------------------------------
        | Le client tente de modifier les prix.
        |--------------------------------------------------------------------------
        */
        $cart = [
            'product-' . $product->id => [
                'product_id' => $product->id,
                'name' => $product->name,

                // Prix falsifié par le client.
                'price' => 1.00,

                'quantity' => 1,

                'options' => [
                    [
                        'group_id' => $optionGroup->id,
                        'group' => $optionGroup->name,
                        'choice_id' => $choice->id,
                        'choice' => $choice->name,

                        // Prix falsifié par le client.
                        'price_modifier' => 999999.00,
                    ],
                ],
            ],
        ];

        Mail::fake();

        $this->withoutExceptionHandling();

        $response = $this
            ->actingAs($user)
            ->withSession([
                'cart' => $cart,
            ])
            ->post(route('commande.store'), [
                'first_name' => 'Test',
                'last_name' => 'Sécurité',
                'email' => 'test@example.com',
                'phone' => '0700000000',
                'address' => 'Abidjan',
                'city' => 'Abidjan',
                'district' => 'Cocody',
                'delivery_method' => 'delivery',
                'payment_method' => 'cash',
                'note' => null,
            ]);

        $response->assertRedirect();

        $this->assertDatabaseCount('orders', 1);

        $order = Order::query()->first();

        $this->assertNotNull($order);

        $this->assertEquals(
            3500.00,
            (float) $order->total
        );

        $orderItem = OrderItem::query()
            ->where('order_id', $order->id)
            ->first();

        $this->assertNotNull($orderItem);

        $this->assertEquals(
            3500.00,
            (float) $orderItem->unit_price
        );

        $this->assertEquals(
            3500.00,
            (float) $orderItem->subtotal
        );

        $orderItemOption = OrderItemOption::query()
            ->where('order_item_id', $orderItem->id)
            ->first();

        $this->assertNotNull($orderItemOption);

        $this->assertEquals(
            0.00,
            (float) $orderItemOption->price_modifier
        );

        $this->assertNotEquals(
            999999.00,
            (float) $orderItemOption->price_modifier
        );

        $this->assertNotEquals(
            1.00,
            (float) $orderItem->unit_price
        );
    }

    public function test_unavailable_option_is_rejected(): void
    {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        $category = Category::create([
            'name' => 'Catégorie test disponibilité',
            'slug' => 'categorie-test-disponibilite',
            'is_active' => true,
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Produit Option Indisponible',
            'slug' => 'produit-option-indisponible',
            'description' => 'Produit utilisé pour tester la disponibilité des options.',
            'price' => 3500,
            'preparation_time' => 15,
            'status' => 'published',
            'is_available' => true,
            'is_featured' => false,
        ]);

        $optionGroup = OptionGroup::create([
            'product_id' => $product->id,
            'name' => 'Accompagnement',
            'is_required' => true,
            'min_choices' => 1,
            'max_choices' => 1,
            'sort_order' => 1,
        ]);

        $choice = OptionChoice::create([
            'option_group_id' => $optionGroup->id,
            'name' => 'Attiéké indisponible',
            'price_modifier' => 500,
            'is_available' => false,
            'sort_order' => 1,
        ]);

        $cart = [
            'product-' . $product->id => [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => 3500,
                'quantity' => 1,

                'options' => [
                    [
                        'group_id' => $optionGroup->id,
                        'group' => $optionGroup->name,
                        'choice_id' => $choice->id,
                        'choice' => $choice->name,
                        'price_modifier' => 500,
                    ],
                ],
            ],
        ];

        Mail::fake();

        $this->withoutExceptionHandling();

        $response = $this
            ->actingAs($user)
            ->withSession([
                'cart' => $cart,
            ])
            ->post(route('commande.store'), [
                'first_name' => 'Test',
                'last_name' => 'Disponibilité',
                'email' => 'test@example.com',
                'phone' => '0700000000',
                'address' => 'Abidjan',
                'city' => 'Abidjan',
                'district' => 'Cocody',
                'delivery_method' => 'delivery',
                'payment_method' => 'cash',
                'note' => null,
            ]);

        $response->assertRedirect(route('cart.index'));

        $response->assertSessionHas(
            'error',
            "L’option « {$choice->name} » n’est plus disponible."
        );

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_invalid_quantity_is_rejected(): void
    {
        $invalidQuantities = [
            0,
            -1,
            100,
        ];

        foreach ($invalidQuantities as $quantity) {

            $user = User::factory()->create([
                'is_active' => true,
            ]);

            $category = Category::create([
                'name' => 'Catégorie quantité ' . $quantity,
                'slug' => 'categorie-quantite-' . $quantity,
                'is_active' => true,
            ]);

            $product = Product::create([
                'category_id' => $category->id,
                'name' => 'Produit Quantité ' . $quantity,
                'slug' => 'produit-quantite-' . $quantity,
                'description' => 'Produit utilisé pour tester la validation des quantités.',
                'price' => 3500,
                'preparation_time' => 15,
                'status' => 'published',
                'is_available' => true,
                'is_featured' => false,
            ]);

            $cart = [
                'product-' . $product->id => [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => 3500,
                    'quantity' => $quantity,
                    'options' => [],
                ],
            ];

            Mail::fake();

            $response = $this
                ->actingAs($user)
                ->withSession([
                    'cart' => $cart,
                ])
                ->post(route('commande.store'), [
                    'first_name' => 'Test',
                    'last_name' => 'Quantité',
                    'email' => 'test@example.com',
                    'phone' => '0700000000',
                    'address' => 'Abidjan',
                    'city' => 'Abidjan',
                    'district' => 'Cocody',
                    'delivery_method' => 'delivery',
                    'payment_method' => 'cash',
                    'note' => null,
                ]);

            $response->assertRedirect(route('cart.index'));

            $response->assertSessionHas(
                'error',
                "La quantité du plat « {$product->name} » est invalide."
            );

            $this->assertDatabaseCount('orders', 0);
        }
    }

    public function test_client_cannot_manipulate_order_total(): void
{
    $user = User::factory()->create([
        'is_active' => true,
    ]);

    $category = Category::create([
        'name' => 'Catégorie test total',
        'slug' => 'categorie-test-total',
        'is_active' => true,
    ]);

    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Produit Total Test',
        'slug' => 'produit-total-test',
        'description' => 'Produit utilisé pour tester la protection du total.',
        'price' => 3500,
        'preparation_time' => 15,
        'status' => 'published',
        'is_available' => true,
        'is_featured' => false,
    ]);

    $optionGroup = OptionGroup::create([
        'product_id' => $product->id,
        'name' => 'Accompagnement',
        'is_required' => true,
        'min_choices' => 1,
        'max_choices' => 1,
        'sort_order' => 1,
    ]);

    $choice = OptionChoice::create([
        'option_group_id' => $optionGroup->id,
        'name' => 'Portion supplémentaire',
        'price_modifier' => 1000,
        'is_available' => true,
        'sort_order' => 1,
    ]);

    /*
    |--------------------------------------------------------------------------
    | Panier falsifié
    |--------------------------------------------------------------------------
    |
    | IMPORTANT :
    | On reprend exactement la structure du panier du test
    | test_client_cannot_manipulate_product_price(), qui fonctionne déjà.
    |
    | On ajoute uniquement les valeurs "total" falsifiées.
    |--------------------------------------------------------------------------
    */
    $cart = [
        'product-' . $product->id => [
            'product_id' => $product->id,
            'name' => $product->name,

            // Prix falsifié.
            'price' => 1,

            'quantity' => 1,

            'options' => [
                [
                    'group_id' => $optionGroup->id,
                    'group' => $optionGroup->name,
                    'choice_id' => $choice->id,
                    'choice' => $choice->name,

                    // Prix de l'option falsifié.
                    'price_modifier' => 1,
                ],
            ],

            // Total de ligne falsifié.
            'total' => 1,
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Isolation du système d'e-mail
    |--------------------------------------------------------------------------
    */
    Mail::fake();

    /*
    |--------------------------------------------------------------------------
    | Passage du checkout
    |--------------------------------------------------------------------------
    */
    $response = $this
        ->actingAs($user)
        ->withSession([
            'cart' => $cart,
        ])
        ->post(route('commande.store'), [
            'first_name' => 'Test',
            'last_name' => 'Total',
            'email' => 'test@example.com',
            'phone' => '0700000000',
            'address' => 'Abidjan',
            'city' => 'Abidjan',
            'district' => 'Cocody',
            'delivery_method' => 'delivery',
            'payment_method' => 'cash',
            'note' => null,

            // Total HTTP falsifié.
            'total' => 1,
        ]);

    /*
    |--------------------------------------------------------------------------
    | La commande doit être créée.
    |--------------------------------------------------------------------------
    */
    $response->assertRedirect();

    $this->assertDatabaseCount('orders', 1);

    $order = Order::query()->first();

    $this->assertNotNull($order);

    /*
    |--------------------------------------------------------------------------
    | Vérification du vrai total.
    |--------------------------------------------------------------------------
    |
    | Produit  : 3500 FCFA
    | Option   : 1000 FCFA
    | ----------------------
    | Total    : 4500 FCFA
    |--------------------------------------------------------------------------
    */
    $this->assertEquals(
        4500.00,
        (float) $order->total
    );

    /*
    |--------------------------------------------------------------------------
    | Le faux total de 1 FCFA ne doit jamais être enregistré.
    |--------------------------------------------------------------------------
    */
    $this->assertNotEquals(
        1.00,
        (float) $order->total
    );

    /*
    |--------------------------------------------------------------------------
    | Vérification de la ligne de commande.
    |--------------------------------------------------------------------------
    */
    $orderItem = OrderItem::query()
        ->where('order_id', $order->id)
        ->first();

    $this->assertNotNull($orderItem);

    $this->assertEquals(
        4500.00,
        (float) $orderItem->unit_price
    );

    $this->assertEquals(
        4500.00,
        (float) $orderItem->subtotal
    );

    /*
    |--------------------------------------------------------------------------
    | Vérification de l'option.
    |--------------------------------------------------------------------------
    */
    $orderItemOption = OrderItemOption::query()
        ->where('order_item_id', $orderItem->id)
        ->first();

    $this->assertNotNull($orderItemOption);

    $this->assertEquals(
        1000.00,
        (float) $orderItemOption->price_modifier
    );

    /*
    |--------------------------------------------------------------------------
    | Le prix falsifié par le client ne doit jamais être enregistré.
    |--------------------------------------------------------------------------
    */
    $this->assertNotEquals(
        1.00,
        (float) $orderItemOption->price_modifier
    );
}
}