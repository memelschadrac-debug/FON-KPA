<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="font-heading font-black text-2xl text-primary">Mot de passe oublié</h2>
        <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed">
            Indiquez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe en toute sécurité.
        </p>
    </div>

    <!-- Statut de session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Adresse Email -->
        <div>
            <x-input-label for="email" value="Adresse Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="votre.email@exemple.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                Envoyer le lien de réinitialisation
            </x-primary-button>
        </div>

        <div class="text-center pt-4 border-t border-outline-variant/40 mt-6 text-xs text-on-surface-variant">
            <a href="{{ route('login') }}" class="text-secondary font-semibold hover:underline inline-flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span>
                <span>Retour à la connexion</span>
            </a>
        </div>
    </form>
</x-guest-layout>
