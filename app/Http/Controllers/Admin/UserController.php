<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $clientsCount = User::where('is_admin', false)->count();

        $adminsCount = User::where('is_admin', true)->count();

        return view('admin.users.index', compact(
            'users',
            'clientsCount',
            'adminsCount'
        ));
    }


    /**
     * Affiche le formulaire de création.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }


    /**
     * Enregistre un nouvel utilisateur.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'is_admin' => [
                'required',
                'boolean',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Création de l'utilisateur
        |--------------------------------------------------------------------------
        */

        $user = new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        /*
        |--------------------------------------------------------------------------
        | Mot de passe
        |--------------------------------------------------------------------------
        |
        | Le modèle User possède le cast "hashed".
        | Laravel hash donc automatiquement le mot de passe lors du save().
        |
        */
        $user->password = $validated['password'];


        /*
        |--------------------------------------------------------------------------
        | Rôle
        |--------------------------------------------------------------------------
        |
        | 0 = Client
        | 1 = Administrateur
        |
        */
        $user->is_admin = (bool) $validated['is_admin'];


        /*
        |--------------------------------------------------------------------------
        | Statut
        |--------------------------------------------------------------------------
        |
        | 0 = Désactivé
        | 1 = Actif
        |
        */
        $user->is_active = (bool) $validated['is_active'];


        $user->save();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Utilisateur créé avec succès.'
            );
    }


    /**
     * Affiche les détails d'un utilisateur.
     */
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }


    /**
     * Affiche le formulaire de modification.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }


    /**
     * Met à jour un utilisateur.
     */
    public function update(
        Request $request,
        User $user
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'is_admin' => [
                'required',
                'boolean',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Protection du compte actuellement connecté
        |--------------------------------------------------------------------------
        |
        | Un administrateur ne peut pas :
        | - retirer son propre rôle administrateur
        | - désactiver son propre compte
        |
        */
        if ($user->id === auth()->id()) {
            $validated['is_admin'] = $user->is_admin;
            $validated['is_active'] = $user->is_active;
        }


        /*
        |--------------------------------------------------------------------------
        | Informations personnelles
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];
        $user->email = $validated['email'];


        /*
        |--------------------------------------------------------------------------
        | Rôle
        |--------------------------------------------------------------------------
        */

        $user->is_admin = (bool) $validated['is_admin'];


        /*
        |--------------------------------------------------------------------------
        | Statut
        |--------------------------------------------------------------------------
        */

        $user->is_active = (bool) $validated['is_active'];


        /*
        |--------------------------------------------------------------------------
        | Mot de passe
        |--------------------------------------------------------------------------
        |
        | Si le champ est vide, l'ancien mot de passe est conservé.
        | Sinon, Laravel le hash automatiquement grâce au cast "hashed".
        |
        */
        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }


        $user->save();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Les informations de l’utilisateur ont été mises à jour.'
            );
    }


    /**
     * Désactive un utilisateur.
     */
    public function deactivate(User $user): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Protection contre la désactivation de son propre compte
        |--------------------------------------------------------------------------
        */

        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Vous ne pouvez pas désactiver votre propre compte.'
                );
        }


        $user->is_active = false;
        $user->save();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Le compte de l’utilisateur a été désactivé.'
            );
    }


    /**
     * Réactive un utilisateur.
     */
    public function activate(User $user): RedirectResponse
    {
        $user->is_active = true;
        $user->save();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Le compte de l’utilisateur a été réactivé.'
            );
    }


    /**
     * Supprime définitivement un utilisateur.
     */
    public function destroy(User $user): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Protection contre l'auto-suppression
        |--------------------------------------------------------------------------
        */

        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Vous ne pouvez pas supprimer votre propre compte.'
                );
        }


        $user->delete();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Utilisateur supprimé avec succès.'
            );
    }
}
