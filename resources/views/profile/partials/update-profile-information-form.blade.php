<section>
    <header class="mb-6">
        <h2 class="text-base font-semibold text-base-content">
            {{ __('Informations personnelles') }}
        </h2>
        <p class="mt-1 text-sm text-base-content/50">
            {{ __("Mettez à jour votre nom et votre adresse e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Nom complet --}}
        <div>
            <label for="name" class="block text-sm font-medium text-base-content mb-1.5">
                {{ __('Nom complet') }}
            </label>
            <div class="flex items-center gap-2 bg-base-200 rounded-xl px-4 py-3 focus-within:ring-2 focus-within:ring-secondary/40">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-base-content/40 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <input id="name" name="name" type="text"
                       class="bg-transparent w-full text-sm text-base-content placeholder:text-base-content/40 focus:outline-none"
                       placeholder="Votre nom complet"
                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-base-content mb-1.5">
                {{ __('Adresse e-mail') }}
            </label>
            <div class="flex items-center gap-2 bg-base-200 rounded-xl px-4 py-3 focus-within:ring-2 focus-within:ring-secondary/40">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-base-content/40 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <input id="email" name="email" type="email"
                       class="bg-transparent w-full text-sm text-base-content placeholder:text-base-content/40 focus:outline-none"
                       placeholder="votre@email.com"
                       value="{{ old('email', $user->email) }}" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-base-content/70">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}
                        <button form="send-verification" class="text-secondary font-medium hover:underline">
                            {{ __('Renvoyer le lien de vérification.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-success">
                            {{ __('Un nouveau lien a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn btn-primary rounded-xl px-8 border-0 text-primary-content font-semibold">
                {{ __('Enregistrer') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-success">{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>