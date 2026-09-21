{{-- resources/views/storefront/commande/success.blade.php --}}

<x-blank-layout>

    @section('title', 'FON-KPA — Commande confirmée')

    <div class="min-h-screen bg-[#FFFF] px-4 py-8 sm:px-6">

        <div class="mx-auto flex min-h-[86vh] max-w-xl items-center justify-center">

            <div class="w-full">

                <div class="px-5 py-9 text-center sm:px-10 sm:py-11">

                    {{-- =====================================================
                         ICÔNE DE CONFIRMATION
                    ====================================================== --}}
                    <div class="mx-auto flex h-[82px] w-[82px] items-center justify-center rounded-full bg-[#EAF8EF]">

                        <div
                            class="flex h-[60px] w-[60px] items-center justify-center rounded-full bg-[#22A447] text-white shadow-lg shadow-green-100"
                        >
                            <i class="bi bi-check-lg text-[31px] font-bold"></i>
                        </div>

                    </div>


                    {{-- =====================================================
                         BADGE
                    ====================================================== --}}
                    <div class="mt-5">

                        <span
                            class="inline-flex items-center rounded-full bg-[#FFF1E8] px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] text-[#B84A0A]"
                        >
                            Commande confirmée
                        </span>

                    </div>


                    {{-- =====================================================
                         TITRE
                    ====================================================== --}}
                    <h2
                        class="mt-4 text-2xl font-extrabold tracking-tight text-[#2F1608] sm:text-[28px]"
                    >
                        Merci pour votre commande ! 🎉
                    </h2>


                    {{-- =====================================================
                         DESCRIPTION
                    ====================================================== --}}
                    <p
                        class="mx-auto mt-3 max-w-md text-[13px] leading-6 text-[#756B65]"
                    >
                        Votre commande a bien été enregistrée.
                        Notre équipe va maintenant préparer votre repas avec soin.
                    </p>


                    {{-- =====================================================
                         NUMÉRO DE COMMANDE
                    ====================================================== --}}
                    <div class="mx-auto mt-6 max-w-sm">

                        <div
                            class="rounded-xl border border-[#EDE3DC] bg-[#FAF9F7] px-5 py-4"
                        >

                            <p
                                class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#918780]"
                            >
                                Numéro de commande
                            </p>

                            <div class="mt-2 flex items-center justify-center gap-2">

                                <span
                                    class="text-xl font-extrabold tracking-wide text-[#593114]"
                                >
                                    #{{ $order->order_number }}
                                </span>

                                <button
                                    type="button"
                                    onclick="navigator.clipboard.writeText('{{ $order->order_number }}')"
                                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-white text-[#E25F12] shadow-sm transition hover:bg-[#FFF0E8]"
                                    title="Copier le numéro de commande"
                                >
                                    <i class="bi bi-copy text-[11px]"></i>
                                </button>

                            </div>

                            <p
                                class="mt-1.5 text-[10px] text-[#918780]"
                            >
                                Conservez ce numéro pour suivre votre commande.
                            </p>

                        </div>

                    </div>


                    {{-- =====================================================
                         PRODUITS COMMANDÉS
                    ====================================================== --}}
                    @if ($order->items->isNotEmpty())

                        <div class="mx-auto mt-4 max-w-sm text-left">

                            <div
                                class="overflow-hidden rounded-xl border border-[#EDE3DC] bg-white"
                            >

                                {{-- -------------------------------------------------
                                     HEADER
                                -------------------------------------------------- --}}
                                <div
                                    class="flex items-center justify-between border-b border-[#F0EAE5] px-4 py-3"
                                >

                                    <div class="flex items-center gap-2">

                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#FFF0E8] text-[#E25F12]"
                                        >
                                            <i class="bi bi-bag-check text-sm"></i>
                                        </div>

                                        <div>

                                            <p
                                                class="text-[11px] font-bold text-[#593114]"
                                            >
                                                Votre commande
                                            </p>

                                            <p
                                                class="text-[9px] text-[#918780]"
                                            >
                                                {{ $order->items->sum('quantity') }}
                                                article{{ $order->items->sum('quantity') > 1 ? 's' : '' }}
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- -------------------------------------------------
                                     LIGNES DE COMMANDE
                                -------------------------------------------------- --}}
                                <div class="divide-y divide-[#F3ECE7]">

                                    @foreach ($order->items as $item)

                                        @php
                                            $product = $item->product;

                                            /*
                                            |--------------------------------------------------------------------------
                                            | Récupérer l'image directement depuis :
                                            |
                                            | Product
                                            |   → ProductImage
                                            |       → Media
                                            |
                                            | On reprend la même logique que le panier.
                                            |--------------------------------------------------------------------------
                                            */

                                            $productImage = $product?->productImages?->first();

                                            $media = $productImage?->media;

                                            $imageUrl = null;

                                            if ($media && $media->path) {
                                                $disk = $media->disk ?: 'public';

                                                if (\Illuminate\Support\Facades\Storage::disk($disk)->exists($media->path)) {
                                                    $imageUrl = \Illuminate\Support\Facades\Storage::disk($disk)->url($media->path);
                                                }
                                            }
                                        @endphp

                                        <div class="px-4 py-4">

                                            <div class="flex gap-3">

                                                {{-- =================================================
                                                     IMAGE DU PRODUIT
                                                ================================================== --}}
                                                <div
                                                    class="h-[68px] w-[68px] shrink-0 overflow-hidden rounded-xl bg-[#F7F2EE]"
                                                >

                                                    @if ($imageUrl)

                                                        <img
                                                            src="{{ $imageUrl }}"
                                                            alt="{{ $product?->name ?? 'Plat FON-KPA' }}"
                                                            class="block h-full w-full object-cover"
                                                            loading="eager"
                                                        >

                                                    @else

                                                        <div
                                                            class="flex h-full w-full items-center justify-center bg-[#F7F2EE]"
                                                        >
                                                            <i
                                                                class="bi bi-image text-2xl text-[#C7B8AE]"
                                                            ></i>
                                                        </div>

                                                    @endif

                                                </div>


                                                {{-- =================================================
                                                     INFORMATIONS PRODUIT
                                                ================================================== --}}
                                                <div class="min-w-0 flex-1">

                                                    <div class="flex items-start justify-between gap-3">

                                                        <div class="min-w-0">

                                                            <h3
                                                                class="truncate text-[12px] font-bold text-[#3D1F0D]"
                                                            >
                                                                {{ $product?->name ?? 'Plat' }}
                                                            </h3>

                                                            <p
                                                                class="mt-0.5 text-[10px] text-[#918780]"
                                                            >
                                                                Quantité :
                                                                {{ $item->quantity }}
                                                            </p>

                                                        </div>

                                                        <p
                                                            class="shrink-0 text-[12px] font-extrabold text-[#593114]"
                                                        >
                                                            {{ number_format($item->subtotal, 0, ',', ' ') }}
                                                            FCFA
                                                        </p>

                                                    </div>


                                                    {{-- =================================================
                                                         OPTIONS
                                                    ================================================== --}}
                                                    @if ($item->options->isNotEmpty())

                                                        <div class="mt-3 space-y-1.5">

                                                            @foreach ($item->options as $option)

                                                                <div
                                                                    class="flex items-center justify-between gap-3 rounded-lg bg-[#FAF7F4] px-2.5 py-2"
                                                                >

                                                                    <div class="flex min-w-0 items-center gap-2">

                                                                        <span
                                                                            class="flex h-5 w-5 shrink-0 items-center justify-center rounded-md bg-white text-[#E25F12]"
                                                                        >
                                                                            <i class="bi bi-check2 text-[10px]"></i>
                                                                        </span>

                                                                        <div class="min-w-0">

                                                                            <p
                                                                                class="truncate text-[9px] font-medium text-[#918780]"
                                                                            >
                                                                                {{ $option->group_name }}
                                                                            </p>

                                                                            <p
                                                                                class="truncate text-[10px] font-semibold text-[#593114]"
                                                                            >
                                                                                {{ $option->choice_name }}
                                                                            </p>

                                                                        </div>

                                                                    </div>


                                                                    {{-- ---------------------------------------------
                                                                         SUPPLÉMENT DE L'OPTION
                                                                    ---------------------------------------------- --}}
                                                                    @if ((float) $option->price_modifier > 0)

                                                                        <span
                                                                            class="shrink-0 text-[9px] font-bold text-[#E25F12]"
                                                                        >
                                                                            +{{ number_format($option->price_modifier, 0, ',', ' ') }}
                                                                            FCFA
                                                                        </span>

                                                                    @else

                                                                        <span
                                                                            class="shrink-0 text-[9px] font-medium text-[#A69C96]"
                                                                        >
                                                                            Inclus
                                                                        </span>

                                                                    @endif

                                                                </div>

                                                            @endforeach

                                                        </div>

                                                    @endif


                                                    {{-- =================================================
                                                         PRIX UNITAIRE
                                                    ================================================== --}}
                                                    <div
                                                        class="mt-2 flex items-center justify-between"
                                                    >

                                                        <span
                                                            class="text-[9px] text-[#A69C96]"
                                                        >
                                                            Prix unitaire
                                                        </span>

                                                        <span
                                                            class="text-[10px] font-semibold text-[#756B65]"
                                                        >
                                                            {{ number_format($item->unit_price, 0, ',', ' ') }}
                                                            FCFA
                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- =====================================================
                         REÇU EMAIL
                    ====================================================== --}}
                    <div
                        class="mx-auto mt-4 flex max-w-sm items-start gap-3 rounded-xl border border-[#F2E4D9] bg-[#FFF9F5] px-4 py-3.5 text-left"
                    >

                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#FFF0E8] text-[#E25F12]"
                        >
                            <i class="bi bi-envelope-check text-base"></i>
                        </div>

                        <div>

                            <p
                                class="text-[12px] font-bold text-[#593114]"
                            >
                                Reçu envoyé par email
                            </p>

                            <p
                                class="mt-1 text-[11px] leading-4.5 text-[#756B65]"
                            >
                                Un reçu détaillé contenant toutes les informations
                                de votre commande vous a été envoyé par email.
                            </p>

                        </div>

                    </div>


                    {{-- =====================================================
                         TOTAL
                    ====================================================== --}}
                    <div
                        class="mx-auto mt-4 flex max-w-sm items-center justify-between rounded-xl border border-[#EDE3DC] bg-white px-5 py-4"
                    >

                        <div class="text-left">

                            <p
                                class="text-[11px] font-medium text-[#756B65]"
                            >
                                Total de la commande
                            </p>

                            <p
                                class="mt-0.5 text-[9px] text-[#A69C96]"
                            >
                                Livraison incluse
                            </p>

                        </div>

                        <p
                            class="text-xl font-extrabold text-[#B84A0A]"
                        >
                            {{ number_format($order->total, 0, ',', ' ') }}
                            FCFA
                        </p>

                    </div>


                    {{-- =====================================================
                         ACTIONS
                    ====================================================== --}}
                    <div
                        class="mx-auto mt-6 flex max-w-sm flex-col gap-2.5 sm:flex-row"
                    >

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


                    {{-- =====================================================
                         RÉASSURANCE
                    ====================================================== --}}
                    <div
                        class="mx-auto mt-7 flex max-w-sm items-center justify-center gap-4 border-t border-[#F0EAE5] pt-4"
                    >

                        <span
                            class="flex items-center gap-1.5 text-[9px] text-[#918780]"
                        >
                            <i class="bi bi-shield-check text-sm text-[#E25F12]"></i>
                            Commande sécurisée
                        </span>

                        <span
                            class="h-3 w-px bg-[#E8DED7]"
                        ></span>

                        <span
                            class="flex items-center gap-1.5 text-[9px] text-[#918780]"
                        >
                            <i class="bi bi-envelope-check text-sm text-[#E25F12]"></i>
                            Reçu envoyé
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-blank-layout>