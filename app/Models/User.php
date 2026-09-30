<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Champs pouvant être remplis automatiquement.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];

    /**
     * Attributs qui ne doivent jamais être exposés.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Un utilisateur peut avoir plusieurs commandes.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Envoie la notification personnalisée de réinitialisation
     * du mot de passe.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(
            new \App\Notifications\ResetPasswordNotification($token)
        );
    }
}