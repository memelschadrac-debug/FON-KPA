<x-guest-layout>

    <div class="mb-6 text-center">
        <h2 class="font-heading font-black text-2xl text-primary">
            Nouveau mot de passe
        </h2>

        <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed">
            Choisissez un nouveau mot de passe sécurisé pour votre compte FON-KPA.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        {{-- Token généré automatiquement par Laravel --}}
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

        {{-- Adresse Email --}}
        <div>
            <label
                for="email"
                class="block text-sm font-medium text-gray-700 mb-1.5"
            >
                Adresse Email
            </label>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg
                        class="w-4 h-4 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        />
                    </svg>
                </div>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="block w-full h-10 pl-10 pr-3 rounded-md border border-gray-300 bg-[#f3f3f3] text-sm text-gray-900 focus:border-[#e25f12] focus:ring-1 focus:ring-[#e25f12] outline-none transition"
                >
            </div>

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        {{-- Nouveau mot de passe --}}
        <div>
            <label
                for="password"
                class="block text-sm font-medium text-gray-700 mb-1.5"
            >
                Nouveau mot de passe
            </label>

            <div class="relative">
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Minimum 8 caractères"
                    class="block w-full h-10 px-3 pr-10 rounded-md border border-gray-300 bg-[#f3f3f3] text-sm text-gray-900 focus:border-[#e25f12] focus:ring-1 focus:ring-[#e25f12] outline-none transition"
                >

                <button
                    type="button"
                    onclick="togglePassword('password', this)"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-[#593114]"
                    aria-label="Afficher le mot de passe"
                >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        {{-- Confirmation --}}
        <div>
            <label
                for="password_confirmation"
                class="block text-sm font-medium text-gray-700 mb-1.5"
            >
                Confirmer le nouveau mot de passe
            </label>

            <div class="relative">
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Répétez le mot de passe"
                    class="block w-full h-10 px-3 pr-10 rounded-md border border-gray-300 bg-[#f3f3f3] text-sm text-gray-900 focus:border-[#e25f12] focus:ring-1 focus:ring-[#e25f12] outline-none transition"
                >

                <button
                    type="button"
                    onclick="togglePassword('password_confirmation', this)"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-[#593114]"
                    aria-label="Afficher le mot de passe"
                >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016-0z"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        {{-- Bouton --}}
        <div class="pt-2">
            <x-primary-button class="w-full">
                Réinitialiser le mot de passe
            </x-primary-button>
        </div>

        {{-- Retour connexion --}}
        <div class="text-center pt-4 border-t border-gray-200 mt-6">
            <a
                href="{{ route('login') }}"
                class="text-xs text-[#e25f12] font-semibold hover:underline inline-flex items-center gap-1"
            >
                <span>←</span>
                Retour à la connexion
            </a>
        </div>

    </form>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);

            input.type = input.type === 'password'
                ? 'text'
                : 'password';
        }
    </script>

</x-guest-layout>