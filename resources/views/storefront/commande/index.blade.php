<x-app-layout>

    @section('title', 'FON-KPA — Finaliser ma commande')

    <div
        x-data="orderPage()"
       x-init="init()"
    class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3D1F0D]"
    >

        {{-- =========================================================
             MAIN
        ========================================================== --}}
        <main
             class="mx-auto w-full max-w-[1720px] px-[clamp(2rem,7vw,7.5rem)] pb-20 pt-10 sm:pt-14 lg:pb-28 lg:pt-16 lg:mt-16"
        >


            {{-- =====================================================
                 PAGE INTRO
            ====================================================== --}}
            <div class="mb-8 max-w-2xl">

                <div class="flex items-center gap-2">

                    <span class="h-1.5 w-1.5 rounded-full bg-[#E25F12]"></span>

                    <span class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#E25F12]">
                        Dernière étape
                    </span>

                </div>

                <h2
                    class="mt-3 text-3xl font-black tracking-[-0.045em] text-[#3B200F] sm:text-4xl lg:text-[42px]"
                >
                    Finalisez votre commande.
                </h2>

                <p
                    class="mt-3 max-w-xl text-[13px] leading-6 text-[#80756D]"
                >
                    Vérifiez vos informations, choisissez votre mode de
                    livraison et votre moyen de paiement.
                </p>

            </div>


            {{-- =====================================================
                 GRID
            ====================================================== --}}
            <div
                class="grid items-start gap-7 lg:grid-cols-[minmax(0,1fr)_390px]"
            >

                {{-- =================================================
                     COLONNE GAUCHE
                ================================================== --}}
                <div class="space-y-5">

                    {{-- =================================================
                         INFORMATIONS PERSONNELLES
                    ================================================== --}}
                    <section
                        class="overflow-hidden rounded-[1.5rem] border border-[#EAE1D9] bg-white shadow-[0_8px_35px_rgba(89,49,20,0.045)]"
                    >

                        {{-- HEADER --}}
                        <div
                            class="border-b border-[#F0E8E2] px-5 py-5 sm:px-7"
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#F8EBDD] text-[#593114]"
                                >
                                    <span class="text-[11px] font-black">
                                        01
                                    </span>
                                </div>

                                <div>

                                    <h3
                                        class="text-[15px] font-black tracking-tight text-[#3B200F]"
                                    >
                                        Vos informations
                                    </h3>

                                    <p
                                        class="mt-1 text-[10px] leading-5 text-[#968A81]"
                                    >
                                        Ces informations nous permettent
                                        de vous contacter concernant votre commande.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- FORMULAIRE --}}
                        <div class="px-5 py-6 sm:px-7">

                            <form
                                action="{{ route('commande.store') }}"
                                method="POST"
                                @submit="submitOrder"
                                id="order-form"
                            >

                                @csrf


                                {{-- =================================================
                                     NOM
                                ================================================== --}}
                                <div class="grid gap-4 sm:grid-cols-2">

                                    {{-- PRÉNOM --}}
                                    <div>

                                        <label
                                            for="first_name"
                                            class="mb-2 block text-[10px] font-bold text-[#593114]"
                                        >
                                            Prénom
                                        </label>

                                        <div class="relative">

                                            <i
                                                class="bi bi-person pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                            ></i>

                                            <input
                                                id="first_name"
                                                name="first_name"
                                                type="text"
                                                value="{{ old('first_name') }}"
                                                required
                                                autocomplete="given-name"
                                                placeholder="Ex. Jean"
                                                class="h-11 w-full rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 text-[12px] font-medium text-[#593114] outline-none transition placeholder:text-[#B3AAA4] hover:border-[#DCCEC2] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                            >

                                        </div>

                                        @error('first_name')
                                            <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- NOM --}}
                                    <div>

                                        <label
                                            for="last_name"
                                            class="mb-2 block text-[10px] font-bold text-[#593114]"
                                        >
                                            Nom
                                        </label>

                                        <div class="relative">

                                            <i
                                                class="bi bi-person pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                            ></i>

                                            <input
                                                id="last_name"
                                                name="last_name"
                                                type="text"
                                                value="{{ old('last_name') }}"
                                                required
                                                autocomplete="family-name"
                                                placeholder="Ex. Kouassi"
                                                class="h-11 w-full rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 text-[12px] font-medium text-[#593114] outline-none transition placeholder:text-[#B3AAA4] hover:border-[#DCCEC2] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                            >

                                        </div>

                                        @error('last_name')
                                            <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>


                                {{-- =================================================
                                     EMAIL + TÉLÉPHONE
                                ================================================== --}}
                                <div class="mt-5 grid gap-4 sm:grid-cols-2">

                                    {{-- EMAIL --}}
                                    <div>

                                        <label
                                            for="email"
                                            class="mb-2 block text-[10px] font-bold text-[#593114]"
                                        >
                                            Adresse email
                                        </label>

                                        <div class="relative">

                                            <i
                                                class="bi bi-envelope pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                            ></i>

                                            <input
                                                id="email"
                                                name="email"
                                                type="email"
                                                value="{{ old('email', auth()->user()->email ?? '') }}"
                                                required
                                                autocomplete="email"
                                                placeholder="votre@email.com"
                                                class="h-11 w-full rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 text-[12px] font-medium text-[#593114] outline-none transition placeholder:text-[#B3AAA4] hover:border-[#DCCEC2] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                            >

                                        </div>

                                        @error('email')
                                            <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- TÉLÉPHONE --}}
                                    <div>

                                        <label
                                            for="phone"
                                            class="mb-2 block text-[10px] font-bold text-[#593114]"
                                        >
                                            Numéro de téléphone
                                        </label>

                                        <div class="relative">

                                            <i
                                                class="bi bi-telephone pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                            ></i>

                                            <input
                                                id="phone"
                                                name="phone"
                                                type="tel"
                                                value="{{ old('phone') }}"
                                                required
                                                autocomplete="tel"
                                                placeholder="+225 07 00 00 00 00"
                                                class="h-11 w-full rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 text-[12px] font-medium text-[#593114] outline-none transition placeholder:text-[#B3AAA4] hover:border-[#DCCEC2] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                            >

                                        </div>

                                        @error('phone')
                                            <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>


                                {{-- =================================================
                                     LIVRAISON
                                ================================================== --}}
                                <div class="mt-10 border-t border-[#F0E8E2] pt-8">

                                    <div class="flex items-start gap-4">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#F8EBDD] text-[#593114]"
                                        >
                                            <span class="text-[11px] font-black">
                                                02
                                            </span>
                                        </div>

                                        <div>

                                            <h3
                                                class="text-[15px] font-black tracking-tight text-[#3B200F]"
                                            >
                                                Où souhaitez-vous recevoir votre commande ?
                                            </h3>

                                            <p
                                                class="mt-1 text-[10px] leading-5 text-[#968A81]"
                                            >
                                                Indiquez précisément le lieu de livraison.
                                            </p>

                                        </div>

                                    </div>


                                    {{-- ADRESSE --}}
                                    <div class="mt-6">

                                        <label
                                            for="address"
                                            class="mb-2 block text-[10px] font-bold text-[#593114]"
                                        >
                                            Adresse de livraison
                                        </label>

                                        <div class="relative">

                                            <i
                                                class="bi bi-geo-alt pointer-events-none absolute left-3.5 top-3.5 text-[13px] text-[#A99D94]"
                                            ></i>

                                            <textarea
                                                id="address"
                                                name="address"
                                                required
                                                rows="3"
                                                autocomplete="street-address"
                                                placeholder="Ex. Cocody, Angré 7ème Tranche, près de..."
                                                class="w-full resize-none rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 pt-3 text-[12px] font-medium leading-5 text-[#593114] outline-none transition placeholder:text-[#B3AAA4] hover:border-[#DCCEC2] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                            >{{ old('address') }}</textarea>

                                        </div>

                                        <p
                                            class="mt-2 flex items-center gap-1.5 text-[9px] text-[#9B8F87]"
                                        >
                                            <i class="bi bi-info-circle"></i>
                                            Ajoutez un repère si nécessaire pour faciliter la livraison.
                                        </p>

                                        @error('address')
                                            <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- VILLE / COMMUNE --}}
                                    <div class="mt-5 grid gap-4 sm:grid-cols-2">

                                        {{-- VILLE --}}
                                        <div>

                                            <label
                                                for="city"
                                                class="mb-2 block text-[10px] font-bold text-[#593114]"
                                            >
                                                Ville
                                            </label>

                                            <div class="relative">

                                                <i
                                                    class="bi bi-buildings pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                                ></i>

                                                <input
                                                    id="city"
                                                    name="city"
                                                    type="text"
                                                    value="{{ old('city', 'Abidjan') }}"
                                                    required
                                                    autocomplete="address-level2"
                                                    class="h-11 w-full rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-3 text-[12px] font-medium text-[#593114] outline-none transition focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                                >

                                            </div>

                                            @error('city')
                                                <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>


                                        {{-- COMMUNE --}}
                                        <div>

                                            <label
                                                for="district"
                                                class="mb-2 block text-[10px] font-bold text-[#593114]"
                                            >
                                                Commune
                                            </label>

                                            <div class="relative">

                                                <i
                                                    class="bi bi-map pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-[13px] text-[#A99D94]"
                                                ></i>

                                                <select
                                                    id="district"
                                                    name="district"
                                                    required
                                                    class="h-11 w-full appearance-none rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] pl-10 pr-9 text-[12px] font-medium text-[#593114] outline-none transition focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                                >

                                                    <option value="">
                                                        Sélectionnez votre commune
                                                    </option>

                                                    @foreach([
                                                        'cocody' => 'Cocody',
                                                        'marcory' => 'Marcory',
                                                        'yopougon' => 'Yopougon',
                                                        'abobo' => 'Abobo',
                                                        'plateau' => 'Plateau',
                                                        'treichville' => 'Treichville'
                                                    ] as $value => $label)

                                                        <option
                                                            value="{{ $value }}"
                                                            @selected(old('district') === $value)
                                                        >
                                                            {{ $label }}
                                                        </option>

                                                    @endforeach

                                                </select>

                                                <i
                                                    class="bi bi-chevron-down pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] text-[#A99D94]"
                                                ></i>

                                            </div>

                                            @error('district')
                                                <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>

                                    </div>


                                    {{-- MODE LIVRAISON --}}
                                    <div class="mt-7">

                                        <div class="mb-3">

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#593114]"
                                            >
                                                Mode de réception
                                            </p>

                                        </div>


                                        <div class="grid gap-3 sm:grid-cols-2">

                                            {{-- DELIVERY --}}
                                            <label class="group cursor-pointer">

                                                <input
                                                    type="radio"
                                                    name="delivery_method"
                                                    value="delivery"
                                                    x-model="deliveryMethod"
                                                    class="peer sr-only"
                                                    @checked(old('delivery_method', 'delivery') === 'delivery')
                                                >

                                                <div
                                                    class="relative rounded-2xl border border-[#E9E1DA] bg-[#FCFAF7] p-4 transition-all peer-checked:border-[#E25F12] peer-checked:bg-[#FFF8F3] peer-checked:shadow-[0_8px_25px_rgba(226,95,18,0.08)] group-hover:border-[#D8C8BB]"
                                                >

                                                    <div class="absolute right-3 top-3 flex h-5 w-5 items-center justify-center rounded-full border border-[#D9CEC5] text-transparent peer-checked:bg-[#E25F12] peer-checked:text-white">
                                                        <i class="bi bi-check text-[11px]"></i>
                                                    </div>

                                                    <div class="flex gap-3">

                                                        <div
                                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#E25F12] shadow-sm"
                                                        >
                                                            <i class="bi bi-truck text-sm"></i>
                                                        </div>

                                                        <div class="pr-5">

                                                            <p class="text-[11px] font-black text-[#593114]">
                                                                Livraison à domicile
                                                            </p>

                                                            <p class="mt-1 text-[9px] leading-4 text-[#8E837B]">
                                                                Recevez votre commande
                                                                directement à l'adresse indiquée.
                                                            </p>

                                                            <div class="mt-2.5 flex items-center gap-2">

                                                                <span class="rounded-full bg-[#E7F5EC] px-2 py-1 text-[8px] font-bold text-[#247548]">
                                                                    Gratuit
                                                                </span>

                                                                <span class="text-[8px] text-[#9B8F87]">
                                                                    Livraison rapide
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </label>


                                            {{-- PICKUP --}}
                                            <label class="group cursor-pointer">

                                                <input
                                                    type="radio"
                                                    name="delivery_method"
                                                    value="pickup"
                                                    x-model="deliveryMethod"
                                                    class="peer sr-only"
                                                    @checked(old('delivery_method') === 'pickup')
                                                >

                                                <div
                                                    class="relative rounded-2xl border border-[#E9E1DA] bg-[#FCFAF7] p-4 transition-all peer-checked:border-[#E25F12] peer-checked:bg-[#FFF8F3] peer-checked:shadow-[0_8px_25px_rgba(226,95,18,0.08)] group-hover:border-[#D8C8BB]"
                                                >

                                                    <div class="absolute right-3 top-3 flex h-5 w-5 items-center justify-center rounded-full border border-[#D9CEC5] text-transparent peer-checked:bg-[#E25F12] peer-checked:text-white">
                                                        <i class="bi bi-check text-[11px]"></i>
                                                    </div>

                                                    <div class="flex gap-3">

                                                        <div
                                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm"
                                                        >
                                                            <i class="bi bi-shop text-sm"></i>
                                                        </div>

                                                        <div class="pr-5">

                                                            <p class="text-[11px] font-black text-[#593114]">
                                                                Retrait sur place
                                                            </p>

                                                            <p class="mt-1 text-[9px] leading-4 text-[#8E837B]">
                                                                Retirez votre commande
                                                                directement chez FON-KPA.
                                                            </p>

                                                            <div class="mt-2.5">

                                                                <span class="rounded-full bg-[#F5EEE8] px-2 py-1 text-[8px] font-bold text-[#715E51]">
                                                                    Gratuit
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </label>

                                        </div>

                                        @error('delivery_method')
                                            <p class="mt-2 text-[9px] font-medium text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>


                                {{-- =================================================
                                     PAIEMENT
                                ================================================== --}}
                                <div class="mt-10 border-t border-[#F0E8E2] pt-8">

                                    <div class="flex items-start gap-4">

                                        <div
                                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#F8EBDD] text-[#593114]"
                                        >
                                            <span class="text-[11px] font-black">
                                                03
                                            </span>
                                        </div>

                                        <div>

                                            <h3
                                                class="text-[15px] font-black tracking-tight text-[#3B200F]"
                                            >
                                                Comment souhaitez-vous payer ?
                                            </h3>

                                            <p
                                                class="mt-1 text-[10px] leading-5 text-[#968A81]"
                                            >
                                                Sélectionnez votre moyen de paiement préféré.
                                            </p>

                                        </div>

                                    </div>


                                    <div class="mt-6 grid gap-3 sm:grid-cols-3">

                                        @foreach([
                                            [
                                                'mobile_money',
                                                'bi-phone',
                                                'Mobile Money',
                                                'Paiement mobile'
                                            ],
                                            [
                                                'cash',
                                                'bi-cash-stack',
                                                'À la livraison',
                                                'Paiement en espèces'
                                            ],
                                            [
                                                'card',
                                                'bi-credit-card',
                                                'Carte bancaire',
                                                'Paiement par carte'
                                            ]
                                        ] as [$value, $icon, $label, $description])

                                            <label class="group cursor-pointer">

                                                <input
                                                    type="radio"
                                                    name="payment_method"
                                                    value="{{ $value }}"
                                                    class="peer sr-only"
                                                    @checked(old('payment_method', 'mobile_money') === $value)
                                                >

                                                <div
                                                    class="relative flex min-h-[104px] flex-col justify-between rounded-2xl border border-[#E9E1DA] bg-[#FCFAF7] p-4 transition-all peer-checked:border-[#E25F12] peer-checked:bg-[#FFF8F3] peer-checked:shadow-[0_8px_25px_rgba(226,95,18,0.08)] group-hover:border-[#D8C8BB]"
                                                >

                                                    <div class="flex items-start justify-between">

                                                        <div
                                                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#593114] shadow-sm"
                                                        >
                                                            <i class="bi {{ $icon }} text-sm"></i>
                                                        </div>

                                                        <div
                                                            class="flex h-5 w-5 items-center justify-center rounded-full border border-[#D9CEC5] text-transparent peer-checked:bg-[#E25F12] peer-checked:text-white"
                                                        >
                                                            <i class="bi bi-check text-[10px]"></i>
                                                        </div>

                                                    </div>

                                                    <div class="mt-3">

                                                        <p class="text-[10px] font-black text-[#593114]">
                                                            {{ $label }}
                                                        </p>

                                                        <p class="mt-0.5 text-[8px] text-[#9B8F87]">
                                                            {{ $description }}
                                                        </p>

                                                    </div>

                                                </div>

                                            </label>

                                        @endforeach

                                    </div>

                                    @error('payment_method')
                                        <p class="mt-2 text-[9px] font-medium text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- =================================================
                                     NOTE
                                ================================================== --}}
                                <div class="mt-10 border-t border-[#F0E8E2] pt-8">

                                    <label
                                        for="note"
                                        class="mb-2 block text-[10px] font-bold text-[#593114]"
                                    >
                                        Une précision pour votre commande ?

                                        <span class="font-normal text-[#AAA098]">
                                            (facultatif)
                                        </span>
                                    </label>

                                    <textarea
                                        id="note"
                                        name="note"
                                        rows="3"
                                        placeholder="Ex. Sans piment, appelez-moi à votre arrivée..."
                                        class="w-full resize-none rounded-xl border border-[#E9E1DA] bg-[#FCFAF7] px-3.5 py-3 text-[11px] leading-5 text-[#593114] outline-none transition placeholder:text-[#B3AAA4] focus:border-[#E25F12] focus:bg-white focus:ring-4 focus:ring-[#E25F12]/[0.08]"
                                    >{{ old('note') }}</textarea>

                                    @error('note')
                                        <p class="mt-1.5 text-[9px] font-medium text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- =================================================
                                     CONFIRMATION
                                ================================================== --}}
                                <div class="mt-8">

                                    <div
                                        class="mb-4 flex items-start gap-3 rounded-xl bg-[#F9F5F1] p-3.5"
                                    >

                                        <div
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white text-[#247548] shadow-sm"
                                        >
                                            <i class="bi bi-shield-check text-xs"></i>
                                        </div>

                                        <p
                                            class="text-[9px] leading-4 text-[#7E736B]"
                                        >
                                            Vos informations sont utilisées uniquement
                                            pour traiter et livrer votre commande.
                                        </p>

                                    </div>


                                    <button
                                        type="submit"
                                        :disabled="loading"
                                        class="group flex h-13 w-full items-center justify-center gap-2.5 rounded-xl bg-[#593114] px-6 text-[10px] font-black uppercase tracking-[0.12em] text-white shadow-[0_10px_30px_rgba(89,49,20,0.18)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#E25F12] hover:shadow-[0_15px_35px_rgba(226,95,18,0.18)] disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0"
                                    >

                                        <i
                                            class="bi text-sm"
                                            :class="loading
                                                ? 'bi-arrow-repeat animate-spin'
                                                : 'bi-lock-fill'"
                                        ></i>

                                        <span
                                            x-text="loading
                                                ? 'Traitement de votre commande...'
                                                : 'Confirmer et passer la commande'"
                                        ></span>

                                        <i
                                            x-show="!loading"
                                            class="bi bi-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"
                                        ></i>

                                    </button>

                                    <p
                                        class="mt-3 text-center text-[8px] leading-4 text-[#A19790]"
                                    >
                                        En confirmant votre commande, vous acceptez
                                        les conditions de vente de FON-KPA.
                                    </p>

                                </div>

                            </form>

                        </div>

                    </section>


                    {{-- =================================================
                         TRUST / REASSURANCE
                    ================================================== --}}
                    <section
                        class="rounded-[1.5rem] border border-[#EAE1D9] bg-white p-5 shadow-[0_8px_35px_rgba(89,49,20,0.035)] sm:p-6"
                    >

                        <div
                            class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:divide-x sm:divide-[#EEE7E0]"
                        >

                            <div class="flex items-center gap-3 sm:px-4 sm:first:pl-0">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F7F3EF] text-[#593114]"
                                >
                                    <i class="bi bi-truck text-sm"></i>
                                </div>

                                <div>

                                    <p class="text-[9px] font-black text-[#593114]">
                                        Livraison rapide
                                    </p>

                                    <p class="mt-0.5 text-[8px] text-[#9B9088]">
                                        Pensée pour Abidjan
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-3 sm:px-4">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F7F3EF] text-[#593114]"
                                >
                                    <i class="bi bi-shield-check text-sm"></i>
                                </div>

                                <div>

                                    <p class="text-[9px] font-black text-[#593114]">
                                        Paiement sécurisé
                                    </p>

                                    <p class="mt-0.5 text-[8px] text-[#9B9088]">
                                        Vos données protégées
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-3 sm:px-4 sm:last:pr-0">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F7F3EF] text-[#593114]"
                                >
                                    <i class="bi bi-heart text-sm"></i>
                                </div>

                                <div>

                                    <p class="text-[9px] font-black text-[#593114]">
                                        Cuisine authentique
                                    </p>

                                    <p class="mt-0.5 text-[8px] text-[#9B9088]">
                                        Le goût de chez nous
                                    </p>

                                </div>

                            </div>

                        </div>

                    </section>

                </div>


                {{-- =================================================
                     COLONNE DROITE
                ================================================== --}}
                <aside class="lg:sticky lg:top-6">

                    <div
                        class="overflow-hidden rounded-[1.5rem] border border-[#E7DED6] bg-white shadow-[0_12px_45px_rgba(89,49,20,0.07)]"
                    >

                        {{-- HEADER --}}
                        <div class="bg-[#593114] px-5 py-5 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-[8px] font-bold uppercase tracking-[0.2em] text-white/55">
                                        Votre commande
                                    </p>

                                    <h2 class="mt-1 text-lg font-black tracking-tight">
                                        Résumé
                                    </h2>

                                </div>

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10"
                                >
                                    <i class="bi bi-bag-check text-sm"></i>
                                </div>

                            </div>


                            <div class="mt-4 flex items-center justify-between">

                                <span class="text-[9px] text-white/60">
                                    {{ $totalArticles }}
                                    {{ $totalArticles > 1 ? 'articles' : 'article' }}
                                </span>

                                <span
                                    class="rounded-full bg-white/10 px-2.5 py-1 text-[8px] font-semibold text-white/80"
                                >
                                    FON-KPA
                                </span>

                            </div>

                        </div>


                        {{-- =================================================
                             PRODUITS DU PANIER
                        ================================================== --}}
                        <div class="px-5 py-5">

                            @forelse($cart as $item)

                                @php
                                    /*
                                     * L'image est déjà préparée par
                                     * CartController.
                                     */
                                    $imageUrl = $item['image']
                                        ?? asset('images/garba.jpg');

                                    /*
                                     * Options sélectionnées pour cette ligne.
                                     */
                                    $options = $item['options'] ?? [];

                                    /*
                                     * Prix déjà calculé côté serveur.
                                     */
                                    $quantity = (int) ($item['quantity'] ?? 1);
                                    $unitPrice = (float) ($item['price'] ?? 0);
                                    $lineSubtotal = $unitPrice * $quantity;
                                @endphp


                                <div
                                    class="{{ $loop->first ? '' : 'mt-5 border-t border-[#F0E8E2] pt-5' }}"
                                >

                                    {{-- =================================================
                                         PRODUIT
                                    ================================================== --}}
                                    <div class="flex gap-3">

                                        {{-- IMAGE --}}
                                        <div
                                            class="h-[68px] w-[68px] shrink-0 overflow-hidden rounded-xl bg-[#F5ECE4]"
                                        >

                                            <img
                                                src="{{ $imageUrl }}"
                                                alt="{{ $item['name'] ?? 'Plat FON-KPA' }}"
                                                class="h-full w-full object-cover"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('images/garba.jpg') }}';"
                                            >

                                        </div>


                                        {{-- INFORMATIONS --}}
                                        <div class="min-w-0 flex-1">

                                            <div
                                                class="flex items-start justify-between gap-3"
                                            >

                                                <h3
                                                    class="line-clamp-2 text-[11px] font-black leading-4 text-[#3B200F]"
                                                >
                                                    {{ $item['name'] ?? 'Produit FON-KPA' }}
                                                </h3>

                                                <span
                                                    class="shrink-0 text-[10px] font-black text-[#B84A0A]"
                                                >
                                                    {{ number_format($lineSubtotal, 0, ',', ' ') }}
                                                    FCFA
                                                </span>

                                            </div>


                                            {{-- QUANTITÉ + PRIX --}}
                                            <div class="mt-2 flex flex-wrap items-center gap-2">

                                                <span
                                                    class="rounded-md bg-[#F8F3EF] px-2 py-1 text-[8px] font-semibold text-[#756A62]"
                                                >
                                                    × {{ $quantity }}
                                                </span>

                                                <span
                                                    class="text-[8px] text-[#A0958D]"
                                                >
                                                    {{ number_format($unitPrice, 0, ',', ' ') }}
                                                    FCFA / unité
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- =================================================
                                         PERSONNALISATION / OPTIONS
                                    ================================================== --}}
                                    @if(!empty($options))

                                        <div
                                            class="mt-3 rounded-xl border border-[#EFE5DD] bg-[#FCFAF7] px-3 py-3"
                                        >

                                            {{-- HEADER OPTIONS --}}
                                            <div
                                                class="mb-2.5 flex items-center justify-between gap-3"
                                            >

                                                <div class="flex items-center gap-1.5">

                                                    <span
                                                        class="flex h-5 w-5 items-center justify-center rounded-md bg-white text-[#E25F12] shadow-sm"
                                                    >
                                                        <i class="bi bi-sliders2 text-[8px]"></i>
                                                    </span>

                                                    <span
                                                        class="text-[8px] font-black uppercase tracking-[0.1em] text-[#593114]"
                                                    >
                                                        Personnalisation
                                                    </span>

                                                </div>

                                                <span
                                                    class="text-[7px] font-semibold text-[#A0958D]"
                                                >
                                                    {{ count($options) }}
                                                    {{ count($options) > 1 ? 'options' : 'option' }}
                                                </span>

                                            </div>


                                            {{-- LISTE DES OPTIONS --}}
                                            <div class="space-y-2">

                                                @foreach($options as $option)

                                                    @php
                                                        $groupName = $option['group']
                                                            ?? $option['group_name']
                                                            ?? 'Option';

                                                        $choiceName = $option['choice']
                                                            ?? $option['choice_name']
                                                            ?? '';

                                                        $priceModifier = (float) (
                                                            $option['price_modifier'] ?? 0
                                                        );
                                                    @endphp

                                                    <div
                                                        class="flex items-center justify-between gap-3"
                                                    >

                                                        {{-- GROUPE + CHOIX --}}
                                                        <div
                                                            class="flex min-w-0 items-start gap-2"
                                                        >

                                                            <span
                                                                class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E25F12]"
                                                            ></span>

                                                            <div class="min-w-0">

                                                                <p
                                                                    class="truncate text-[7px] font-semibold uppercase tracking-[0.05em] text-[#A0958D]"
                                                                >
                                                                    {{ $groupName }}
                                                                </p>

                                                                <p
                                                                    class="truncate text-[9px] font-bold leading-4 text-[#593114]"
                                                                >
                                                                    {{ $choiceName }}
                                                                </p>

                                                            </div>

                                                        </div>


                                                        {{-- MODIFICATEUR --}}
                                                        @if($priceModifier > 0)

                                                            <span
                                                                class="shrink-0 rounded-md bg-[#FFF3EA] px-1.5 py-1 text-[8px] font-bold text-[#E25F12]"
                                                            >
                                                                +{{ number_format($priceModifier, 0, ',', ' ') }}
                                                                FCFA
                                                            </span>

                                                        @elseif($priceModifier < 0)

                                                            <span
                                                                class="shrink-0 rounded-md bg-[#EEF7F0] px-1.5 py-1 text-[8px] font-bold text-[#4B8B5D]"
                                                            >
                                                                -{{ number_format(abs($priceModifier), 0, ',', ' ') }}
                                                                FCFA
                                                            </span>

                                                        @else

                                                            <span
                                                                class="shrink-0 text-[8px] font-medium text-[#9B8F87]"
                                                            >
                                                                Inclus
                                                            </span>

                                                        @endif

                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>

                                    @else

                                        {{-- AUCUNE PERSONNALISATION --}}
                                        <div
                                            class="mt-3 flex items-center gap-2 rounded-xl bg-[#FCFAF7] px-3 py-2"
                                        >

                                            <span
                                                class="flex h-5 w-5 items-center justify-center rounded-full bg-[#F2EDE8] text-[#8F8178]"
                                            >
                                                <i class="bi bi-check text-[9px]"></i>
                                            </span>

                                            <span
                                                class="text-[8px] text-[#8E837B]"
                                            >
                                                Préparation standard
                                            </span>

                                        </div>

                                    @endif

                                </div>

                            @empty

                                {{-- PANIER VIDE --}}
                                <div class="py-8 text-center">

                                    <div
                                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#F8EBDD] text-[#593114]"
                                    >
                                        <i class="bi bi-cart-x text-lg"></i>
                                    </div>

                                    <p
                                        class="mt-3 text-[10px] font-bold text-[#593114]"
                                    >
                                        Votre panier est vide.
                                    </p>

                                    <a
                                        href="{{ route('plats.index') }}"
                                        class="mt-3 inline-flex text-[9px] font-bold text-[#E25F12]"
                                    >
                                        Découvrir nos plats
                                        <i class="bi bi-arrow-right ml-1"></i>
                                    </a>

                                </div>

                            @endforelse


                            {{-- =================================================
                                 TOTALS
                            ================================================== --}}
                            <div class="my-5 border-t border-[#EEE7E0]"></div>


                            {{-- SOUS-TOTAL --}}
                            <div class="flex items-center justify-between">

                                <span class="text-[10px] text-[#81766E]">
                                    Sous-total
                                </span>

                                <span
                                    class="text-[11px] font-bold text-[#3B200F]"
                                >
                                    {{ number_format($subtotal, 0, ',', ' ') }}
                                    FCFA
                                </span>

                            </div>


                            {{-- LIVRAISON --}}
                            <div
                                class="mt-3 flex items-center justify-between"
                            >

                                <div class="flex items-center gap-2">

                                    <span class="text-[10px] text-[#81766E]">
                                        Livraison
                                    </span>

                                    <span
                                        class="flex h-4 w-4 items-center justify-center rounded-full bg-[#E7F5EC] text-[#247548]"
                                    >
                                        <i class="bi bi-check text-[8px]"></i>
                                    </span>

                                </div>

                                <span
                                    class="text-[10px] font-bold text-[#247548]"
                                >
                                    Gratuit
                                </span>

                            </div>


                            {{-- TOTAL --}}
                            <div
                                class="mt-5 rounded-xl bg-[#FCF8F4] p-4"
                            >

                                <div class="flex items-end justify-between">

                                    <div>

                                        <p
                                            class="text-[8px] uppercase tracking-[0.15em] text-[#9B8F87]"
                                        >
                                            Total à payer
                                        </p>

                                        <p
                                            class="mt-1 text-[20px] font-black tracking-tight text-[#593114]"
                                        >
                                            {{ number_format($subtotal, 0, ',', ' ') }}

                                            <span class="text-[10px]">
                                                FCFA
                                            </span>
                                        </p>

                                    </div>

                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[#E25F12] shadow-sm"
                                    >
                                        <i class="bi bi-receipt text-xs"></i>
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             REASSURANCE
                        ================================================== --}}
                        <div
                            class="border-t border-[#EEE7E0] bg-[#FCFAF7] px-5 py-5"
                        >

                            <div class="flex items-start gap-3">

                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#E8F4EC] text-[#247548]"
                                >
                                    <i class="bi bi-shield-lock text-xs"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[9px] font-black text-[#593114]"
                                    >
                                        Commande en toute sérénité
                                    </p>

                                    <p
                                        class="mt-1 text-[8px] leading-4 text-[#91867E]"
                                    >
                                        Vos informations sont traitées
                                        de manière sécurisée pour préparer
                                        votre commande.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="mt-4 grid grid-cols-2 gap-2"
                            >

                                <div
                                    class="rounded-lg border border-[#E9E1DA] bg-white px-3 py-2.5"
                                >

                                    <i
                                        class="bi bi-truck text-[11px] text-[#E25F12]"
                                    ></i>

                                    <p
                                        class="mt-1 text-[8px] font-bold text-[#593114]"
                                    >
                                        Livraison rapide
                                    </p>

                                </div>


                                <div
                                    class="rounded-lg border border-[#E9E1DA] bg-white px-3 py-2.5"
                                >

                                    <i
                                        class="bi bi-patch-check text-[11px] text-[#E25F12]"
                                    ></i>

                                    <p
                                        class="mt-1 text-[8px] font-bold text-[#593114]"
                                    >
                                        Qualité garantie
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- RETOUR PANIER --}}
                    <a
                        href="{{ route('cart.index') }}"
                        class="mt-4 flex h-11 w-full items-center justify-center gap-2 rounded-xl border border-[#DDD2C9] bg-white text-[9px] font-bold text-[#593114] transition-all duration-200 hover:border-[#593114] hover:bg-[#593114] hover:text-white"
                    >

                        <i class="bi bi-arrow-left text-[10px]"></i>

                        Modifier mon panier

                    </a>

                </aside>

            </div>

        </main>


        {{-- =========================================================
             MOBILE BOTTOM SUMMARY
        ========================================================== --}}
        <div
            class="fixed bottom-0 left-0 right-0 z-40 border-t border-[#E5DDD5] bg-white/95 p-3 shadow-[0_-10px_30px_rgba(89,49,20,0.08)] backdrop-blur-md lg:hidden"
        >

            <div class="mx-auto flex max-w-xl items-center gap-3">

                <div class="min-w-0 flex-1">

                    <p
                        class="text-[8px] uppercase tracking-[0.12em] text-[#9B8F87]"
                    >
                        Total
                    </p>

                    <p
                        class="truncate text-base font-black text-[#593114]"
                    >
                        {{ number_format($subtotal, 0, ',', ' ') }}

                        <span class="text-[9px]">
                            FCFA
                        </span>
                    </p>

                </div>


                <button
                    type="button"
                    @click="document.getElementById('order-form').requestSubmit()"
                    :disabled="loading"
                    class="flex h-11 shrink-0 items-center gap-2 rounded-xl bg-[#593114] px-5 text-[9px] font-black uppercase tracking-[0.08em] text-white shadow-lg disabled:opacity-60"
                >

                    <i
                        class="bi"
                        :class="loading
                            ? 'bi-arrow-repeat animate-spin'
                            : 'bi-lock-fill'"
                    ></i>

                    <span
                        x-text="loading
                            ? 'Traitement...'
                            : 'Commander'"
                    ></span>

                </button>

            </div>

        </div>


        {{-- =========================================================
             ALPINE.JS
        ========================================================== --}}
        <script>
            function orderPage() {
                return {
                    loading: false,

                    deliveryMethod: @js(
                        old('delivery_method', 'delivery')
                    ),

                    submitOrder(event) {
                        /*
                         * Laravel effectue la validation côté serveur.
                         * Alpine empêche simplement les doubles soumissions.
                         */
                        this.loading = true;
                    }
                }
            }
        </script>

    </div>

</x-app-layout>