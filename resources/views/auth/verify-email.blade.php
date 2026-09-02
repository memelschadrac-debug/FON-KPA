<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="font-heading font-black text-2xl text-primary">Vérifiez votre email</h2>
        <p class="text-xs text-on-surface-variant mt-2 leading-relaxed">
            Merci pour votre inscription ! Avant de commencer, veuillez cliquer sur le lien de confirmation que nous venons de vous envoyer par email.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-xs text-success bg-success/10 border border-success/30 rounded-xl p-3 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">check_circle</span>
            <span>Un nouveau lien de vérification a été envoyé à votre adresse email.</span>
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full">
                Renvoyer l'email de vérification
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-xs text-on-surface-variant hover:text-error underline transition-colors">
                Se déconnecter
            </button>
        </form>
    </div>
</x-guest-layout>
