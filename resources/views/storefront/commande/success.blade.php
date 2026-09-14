<x-blank-layout>

    @section('title', 'FON-KPA — Commande confirmée')

    <div class="min-h-screen bg-[#FFFF] px-4 py-8 sm:px-6">

        <div class="mx-auto flex min-h-[86vh] max-w-xl items-center justify-center">

            {{-- ========================================================= --}}
            {{-- CARTE PRINCIPALE                                           --}}
            {{-- ========================================================= --}}

            <div
                
            >

                {{-- Ligne décorative --}}
               


                <div class="px-5 py-9 text-center sm:px-10 sm:py-11">


                    {{-- ================================================= --}}
                    {{-- ICÔNE CHAPEAU DE CHEF                              --}}
                    {{-- ================================================= --}}

                    <div class="mx-auto flex h-[82px] w-[82px] items-center justify-center rounded-full bg-[#EAF8EF]">

                        <div
                            class="flex h-[60px] w-[60px] items-center justify-center rounded-full bg-[#22A447] text-white shadow-lg shadow-green-100"
                        >
                            <i class="bi bi-check-lg text-[31px] font-bold"></i>
                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- BADGE                                               --}}
                    {{-- ================================================= --}}

                    <div class="mt-5">

                        <span
                            class="inline-flex items-center rounded-full bg-[#FFF1E8] px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] text-[#B84A0A]"
                        >
                            Commande confirmée
                        </span>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TITRE                                                --}}
                    {{-- ================================================= --}}

                    <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-[#2F1608] sm:text-[28px]">
                        Merci pour votre commande ! 🎉
                    </h2>


                    {{-- ================================================= --}}
                    {{-- DESCRIPTION                                         --}}
                    {{-- ================================================= --}}

                    <p class="mx-auto mt-3 max-w-md text-[13px] leading-6 text-[#756B65]">
                        Votre commande a bien été enregistrée.
                        Notre équipe va maintenant préparer votre repas avec soin.
                    </p>


                    {{-- ================================================= --}}
                    {{-- NUMÉRO DE COMMANDE                                  --}}
                    {{-- ================================================= --}}

                    <div class="mx-auto mt-6 max-w-sm">

                        <div
                            class="rounded-xl border border-[#EDE3DC] bg-[#FAF9F7] px-5 py-4"
                        >

                            <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#918780]">
                                Numéro de commande
                            </p>


                            <div class="mt-2 flex items-center justify-center gap-2">

                                <span class="text-xl font-extrabold tracking-wide text-[#593114]">
                                    #{{ $order->order_number }}
                                </span>


                                {{-- Copier --}}
                                <button
                                    type="button"
                                    onclick="navigator.clipboard.writeText('{{ $order->order_number }}')"
                                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-white text-[#E25F12] shadow-sm transition hover:bg-[#FFF0E8]"
                                    title="Copier le numéro de commande"
                                >
                                    <i class="bi bi-copy text-[11px]"></i>
                                </button>

                            </div>


                            <p class="mt-1.5 text-[10px] text-[#918780]">
                                Conservez ce numéro pour suivre votre commande.
                            </p>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MESSAGE EMAIL                                       --}}
                    {{-- ================================================= --}}

                    <div
                        class="mx-auto mt-4 flex max-w-sm items-start gap-3 rounded-xl border border-[#F2E4D9] bg-[#FFF9F5] px-4 py-3.5 text-left"
                    >

                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#FFF0E8] text-[#E25F12]"
                        >
                            <i class="bi bi-envelope-check text-base"></i>
                        </div>


                        <div>

                            <p class="text-[12px] font-bold text-[#593114]">
                                Reçu envoyé par email
                            </p>

                            <p class="mt-1 text-[11px] leading-4.5 text-[#756B65]">
                                Un reçu détaillé contenant toutes les informations
                                de votre commande vous a été envoyé par email.
                            </p>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TOTAL                                                --}}
                    {{-- ================================================= --}}

                    <div
                        class="mx-auto mt-4 flex max-w-sm items-center justify-between rounded-xl border border-[#EDE3DC] bg-white px-5 py-4"
                    >

                        <div class="text-left">

                            <p class="text-[11px] font-medium text-[#756B65]">
                                Total de la commande
                            </p>

                            <p class="mt-0.5 text-[9px] text-[#A69C96]">
                                Livraison incluse
                            </p>

                        </div>


                        <p class="text-xl font-extrabold text-[#B84A0A]">
                            {{ number_format($order->total, 0, ',', ' ') }}
                            FCFA
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTIONS                                             --}}
                    {{-- ================================================= --}}

                    <div class="mx-auto mt-6 flex max-w-sm flex-col gap-2.5 sm:flex-row">

                        {{-- Continuer les achats --}}
                        <a
                            href="{{ route('plats.index') }}"
                            class="flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-[#E25F12] text-[11px] font-bold text-white shadow-md shadow-orange-100 transition hover:bg-[#D9570D]"
                        >
                            <i class="bi bi-shop"></i>
                            Continuer mes achats
                        </a>


                        {{-- Voir la commande --}}
                        <a
                            href="{{ route('commande.success', $order) }}"
                            class="flex h-11 flex-1 items-center justify-center gap-2 rounded-xl border border-[#E2D8D0] bg-white text-[11px] font-semibold text-[#593114] transition hover:border-[#E25F12] hover:bg-[#FFF9F5]"
                        >
                            <i class="bi bi-receipt"></i>
                            Voir ma commande
                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- RÉASSURANCE                                         --}}
                    {{-- ================================================= --}}

                    <div class="mx-auto mt-7 flex max-w-sm items-center justify-center gap-4 border-t border-[#F0EAE5] pt-4">

                        <span class="flex items-center gap-1.5 text-[9px] text-[#918780]">
                            <i class="bi bi-shield-check text-sm text-[#E25F12]"></i>
                            Commande sécurisée
                        </span>

                        <span class="h-3 w-px bg-[#E8DED7]"></span>

                        <span class="flex items-center gap-1.5 text-[9px] text-[#918780]">
                            <i class="bi bi-envelope-check text-sm text-[#E25F12]"></i>
                            Reçu envoyé
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-blank-layout>