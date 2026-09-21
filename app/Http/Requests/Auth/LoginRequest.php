<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * La vérification est volontairement séparée en plusieurs étapes :
     *
     * 1. Vérifier que l'utilisateur existe.
     * 2. Vérifier son mot de passe.
     * 3. Vérifier si son compte est actif.
     *
     * Cela permet de distinguer proprement :
     * - mauvais identifiants ;
     * - compte réellement désactivé depuis l'administration.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        /*
         * On récupère l'utilisateur uniquement avec son adresse e-mail.
         *
         * IMPORTANT :
         * On ne vérifie pas encore is_active ici.
         *
         * Si on le faisait dans Auth::attempt(), un compte désactivé
         * et un mauvais mot de passe produiraient exactement le même échec.
         */
        $user = User::where('email', $this->string('email'))->first();

        /*
         * L'utilisateur n'existe pas.
         *
         * On retourne volontairement le même message que pour
         * un mauvais mot de passe.
         *
         * Cela évite également de révéler inutilement si une adresse
         * e-mail existe dans la base.
         */
        if (! $user) {
            $this->failedAuthentication();
        }

        /*
         * Le compte existe, mais le mot de passe est incorrect.
         *
         * À ce stade, on NE révèle surtout PAS si le compte est actif
         * ou désactivé.
         */
        if (! Hash::check($this->string('password'), $user->password)) {
            $this->failedAuthentication();
        }

        /*
         * Le mot de passe est correct.
         *
         * C'est seulement maintenant que nous vérifions le statut
         * du compte.
         *
         * Ainsi, le message "Compte désactivé" ne peut apparaître
         * que pour un véritable compte désactivé depuis l'administration.
         */
        if (! $user->is_active) {
            RateLimiter::clear($this->throttleKey());

            throw ValidationException::withMessages([
                'account_disabled' => 'Votre compte a été désactivé. Veuillez contacter l’administration pour plus d’informations.',
            ]);
        }

        /*
         * Les identifiants sont corrects et le compte est actif.
         *
         * On connecte maintenant l'utilisateur.
         */
        Auth::login(
            $user,
            $this->boolean('remember')
        );

        /*
         * La connexion est réussie :
         * on remet le compteur de tentatives à zéro.
         */
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Handle a failed authentication attempt.
     *
     * Toutes les erreurs d'identification passent ici :
     * - utilisateur inexistant ;
     * - mauvais mot de passe.
     *
     * Le message reste volontairement générique.
     *
     * @throws ValidationException
     */
    protected function failedAuthentication(): never
    {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('email')) . '|' . $this->ip()
        );
    }
}
