
{{-- ========================================================= --}}
{{-- SUPPRESSION DU COMPTE                                    --}}
{{-- ========================================================= --}}

<section>

    {{-- En-tête --}}
    <header class="mb-6">
        <h3 class="text-base font-semibold text-error">
            {{ __('Supprimer le compte') }}
        </h3>

        <p class="mt-1 text-sm text-base-content/50">
            {{ __('Une fois votre compte supprimé, toutes ses données seront définitivement effacées.') }}
        </p>
    </header>


    {{-- ========================================================= --}}
    {{-- BOUTON OUVERTURE DU MODAL                                --}}
    {{-- ========================================================= --}}

    <div class="pt-2">

        <button
            type="button"
            class="inline-flex h-10 items-center gap-2 rounded-md border border-red-200 bg-white px-4 text-[12px] font-semibold text-red-600 shadow-sm transition-all duration-200 hover:border-red-300 hover:bg-red-50 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/10 active:scale-[0.99]"
            onclick="delete_account_modal.showModal()"
        >

            {{-- Icône corbeille --}}
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.7"
                class="h-4 w-4"
                aria-hidden="true"
            >
                <path d="M4 7h16" stroke-linecap="round"/>
                <path d="M10 11v5M14 11v5" stroke-linecap="round"/>
                <path
                    d="M6.5 7l.7 12.2a2 2 0 0 0 2 1.8h5.6a2 2 0 0 0 2-1.8L17.5 7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M9 7V4.8A.8.8 0 0 1 9.8 4h4.4a.8.8 0 0 1 .8.8V7"
                    stroke-linecap="round"
                />
            </svg>

            Supprimer le compte

        </button>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL DAISYUI                                            --}}
    {{-- ========================================================= --}}

    <dialog id="delete_account_modal" class="modal">

        <div class="modal-box max-w-md rounded-2xl bg-white p-0 shadow-2xl">

            {{-- Contenu --}}
            <div class="px-6 py-6">

                {{-- Icône attention --}}
                <div class="mb-5 flex justify-center">

                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-50 text-red-600">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="h-6 w-6"
                            aria-hidden="true"
                        >
                            <path
                                d="M12 3.5 21 19a1.5 1.5 0 0 1-1.3 2.25H4.3A1.5 1.5 0 0 1 3 19L12 3.5Z"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M12 9v4"
                                stroke-linecap="round"
                            />

                            <circle
                                cx="12"
                                cy="16.5"
                                r=".8"
                                fill="currentColor"
                                stroke="none"
                            />
                        </svg>

                    </div>

                </div>


                {{-- Titre --}}
                <h3 class="text-center text-[16px] font-semibold tracking-tight text-gray-900">
                    Supprimer votre compte ?
                </h3>


                {{-- Description --}}
                <p class="mx-auto mt-2 max-w-sm text-center text-[12px] leading-5 text-gray-500">
                    Cette action est définitive. Votre compte ainsi que toutes
                    les données associées seront supprimés définitivement.
                </p>


                {{-- Actions --}}
                <div class="mt-7 flex items-center justify-end gap-2.5">

                    {{-- Annuler --}}
                    <button
                        type="button"
                        class="inline-flex h-10 items-center justify-center rounded-md border border-gray-200 bg-white px-5 text-[12px] font-medium text-gray-600 transition-all duration-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200 active:scale-[0.99]"
                        onclick="delete_account_modal.close()"
                    >
                        Annuler
                    </button>


                    {{-- Supprimer --}}
                    <form
                        method="POST"
                        action="{{ route('profile.destroy') }}"
                    >

                        @csrf
                        @method('delete')

                        <button
                            type="submit"
                            class="inline-flex h-10 items-center justify-center gap-2 rounded-md bg-red-600 px-5 text-[12px] font-semibold text-white shadow-sm transition-all duration-200 hover:bg-red-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:ring-offset-1 active:scale-[0.99]"
                        >

                            {{-- Icône corbeille --}}
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="h-[15px] w-[15px]"
                                aria-hidden="true"
                            >
                                <path d="M4 7h16" stroke-linecap="round"/>
                                <path d="M10 11v5M14 11v5" stroke-linecap="round"/>
                                <path
                                    d="M6.5 7l.7 12.2a2 2 0 0 0 2 1.8h5.6a2 2 0 0 0 2-1.8L17.5 7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 7V4.8A.8.8 0 0 1 9.8 4h4.4a.8.8 0 0 1 .8.8V7"
                                    stroke-linecap="round"
                                />
                            </svg>

                            Supprimer

                        </button>

                    </form>

                </div>

            </div>

        </div>


        {{-- Fermeture en cliquant sur l'arrière-plan --}}
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>

</section>