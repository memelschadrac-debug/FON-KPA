<x-blank-layout>

    @section('title', 'FON-KPA — Profil')

    {{-- ========================================================= --}}
    {{-- CONTENU PRINCIPAL                                         --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-base-200 py-10">

        <div class="mx-auto max-w-3xl space-y-6 sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- EN-TÊTE DU PROFIL                                  --}}
            {{-- ================================================= --}}

            <div class="mb-8">

                {{-- Retour vers l'accueil --}}
                <a
                    href="{{ route('home') }}"
                    class="group inline-flex items-center gap-2 text-[12px] font-medium text-gray-500 transition-colors duration-200 hover:text-[#593114]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    {{ __('Retour à l’accueil') }}
                </a>


                {{-- Titre --}}
                <h2 class="mt-4 text-2xl font-semibold tracking-tight text-gray-900">
                    {{ __('Profil') }}
                </h2>


                {{-- Description --}}
                <p class="mt-1 text-xs text-gray-500">
                    {{ __('Gérez vos informations personnelles et les paramètres de votre compte.') }}
                </p>

            </div>



            {{-- ================================================= --}}
            {{-- CARTE PROFIL                                       --}}
            {{-- ================================================= --}}

            <div class="card rounded-2xl bg-base-100 shadow-sm">

                <div class="card-body flex-row items-center justify-between p-6">

                    <div class="flex items-center gap-4">

                        <div class="avatar">

                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[#593114] text-xl font-bold text-white ring-2 ring-[#E25F12]/20 ring-offset-2">

                                {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}

                            </div>

                        </div>


                        <div class="min-w-0">

                            {{-- Nom --}}
                            <h3 class="truncate text-lg font-semibold tracking-tight text-base-content">
                                {{ $user->name }}
                            </h3>


                            {{-- Rôle --}}
                            <div class="mt-1">

                                <span class="inline-flex items-center rounded-full bg-[#593114]/10 px-2.5 py-1 text-xs font-medium text-[#593114]">
                                    {{ $user->role ?? 'Profil utilisateur' }}
                                </span>

                            </div>


                            {{-- Email --}}
                            <div class="mt-2 flex items-center gap-2 text-sm text-base-content/60">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 shrink-0 text-base-content/40"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 8l9 6 9-6M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"
                                    />
                                </svg>

                                <span class="truncate">
                                    {{ $user->email ?? '' }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Bouton Edit --}}
                    <button
                        type="button"
                        class="btn btn-sm gap-2 rounded-full"
                        onclick="document.getElementById('profile_edit_modal')?.showModal()"
                    >
                        {{ __('Edit') }}

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                            />
                        </svg>

                    </button>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- INFORMATIONS PERSONNELLES                         --}}
            {{-- ================================================= --}}

            <div class="card rounded-2xl border border-base-200 bg-base-100 shadow-sm">

                <div class="card-body p-6 sm:p-7">

                    {{-- En-tête --}}
                    <div class="mb-6 flex items-center justify-between">

                        <div>

                            <h3 class="text-base font-semibold tracking-tight text-base-content">
                                Informations personnelles
                            </h3>

                            <p class="mt-1 text-xs text-base-content/50">
                                Vos informations de compte
                            </p>

                        </div>


                        {{-- Bouton Modifier --}}
                        <button
                            type="button"
                            class="btn btn-sm h-9 min-h-9 rounded-full border-base-300 bg-base-100 px-4 text-xs font-medium text-base-content transition hover:border-[#E25F12] hover:bg-[#E25F12]/5 hover:text-[#E25F12]"
                            onclick="document.getElementById('personal_info_modal')?.showModal()"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                />
                            </svg>

                            Modifier

                        </button>

                    </div>


                    {{-- Informations --}}
                    <div class="space-y-5">

                        {{-- Nom --}}
                        <div class="rounded-xl bg-base-200/40 p-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#593114]/10 text-[#593114]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0"
                                        />
                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-xs font-medium text-base-content/50">
                                        Nom
                                    </p>

                                    <p class="mt-0.5 truncate text-sm font-semibold text-base-content">
                                        {{ $user->name }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="rounded-xl bg-base-200/40 p-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#E25F12]/10 text-[#E25F12]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 8.25 12 14l9-5.75M5.25 19.5h13.5A2.25 2.25 0 0 0 21 17.25v-10.5A2.25 2.25 0 0 0 18.75 4.5H5.25A2.25 2.25 0 0 0 3 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Z"
                                        />
                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-xs font-medium text-base-content/50">
                                        Adresse e-mail
                                    </p>

                                    <p class="mt-0.5 truncate text-sm font-semibold text-base-content">
                                        {{ $user->email }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- SÉCURITÉ                                          --}}
            {{-- ================================================= --}}

            <div class="card rounded-2xl bg-base-100 shadow-sm">

                <div class="card-body p-6">

                    <div class="max-w-xl">

                        @include('profile.partials.update-password-form')

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- SUPPRESSION DU COMPTE                             --}}
            {{-- ================================================= --}}

            <div class="card rounded-2xl border border-error/20 bg-base-100 shadow-sm">

                <div class="card-body p-6">

                    <div class="max-w-xl">

                        @include('profile.partials.delete-user-form')

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- MODALE : INFORMATIONS PERSONNELLES                        --}}
    {{-- ========================================================= --}}

    <dialog id="personal_info_modal" class="modal">

        <div class="modal-box max-w-xl">

            <form method="dialog">

                <button
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                >
                    ✕
                </button>

            </form>

            @include('profile.partials.update-profile-information-form')

        </div>


        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>


</x-blank-layout>