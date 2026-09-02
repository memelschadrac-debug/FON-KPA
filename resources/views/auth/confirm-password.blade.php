<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="font-heading font-black text-2xl text-primary">Confirmation de sécurité</h2>
        <p class="text-xs text-on-surface-variant mt-2 leading-relaxed">
            Il s'agit d'une zone sécurisée. Veuillez confirmer votre mot de passe pour continuer.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <!-- Mot de passe -->
        <div>
            <x-input-label for="password" value="Mot de passe" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                Confirmer l'accès
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
