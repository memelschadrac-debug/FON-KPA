<x-app-layout>

    @section('title', 'FON-KPA — Contact')

    {{-- =========================================================
         PAGE CONTACT — FON-KPA
         Direction UI :
         - Minimaliste
         - Premium
         - Beaucoup d'espace
         - Hiérarchie forte
         - Responsive
    ========================================================== --}}

    <div
        x-data="contactForm()"
        class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3D1F0D]"
    >

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="relative lg:mt-20">

            {{-- Décors très subtils --}}
            <div
                class="pointer-events-none absolute -left-40 top-20
                       h-80 w-80 rounded-full
                       bg-[#F4C451]/10 blur-3xl"
            ></div>

            <div
                class="pointer-events-none absolute -right-40 top-0
                       h-[500px] w-[500px] rounded-full
                       bg-[#E25F12]/[0.045] blur-3xl"
            ></div>


            <div
                class="relative mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="flex flex-col items-center
                           pb-14 pt-16 text-center
                           sm:pb-16 sm:pt-20
                           lg:pb-20 lg:pt-24"
                >

                    {{-- Eyebrow --}}
                    <div class="flex items-center gap-3">

                        <span
                            class="h-px w-8 bg-[#E5D7CC]"
                        ></span>

                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.28em] text-[#E25F12]"
                        >
                            Parlons-nous
                        </span>

                        <span
                            class="h-px w-8 bg-[#E5D7CC]"
                        ></span>

                    </div>


                    {{-- Titre --}}
                    <h1
                        class="mt-5 max-w-3xl
                               text-4xl font-black
                               leading-[0.98]
                               tracking-[-0.055em]
                               text-[#3B200F]
                               sm:text-5xl
                               lg:text-[4.5rem]"
                    >
                        Une question ?
                        <span class="text-[#E25F12]">
                            Parlons-en.
                        </span>
                    </h1>


                    {{-- Description --}}
                    <p
                        class="mx-auto mt-6 max-w-xl
                               text-sm leading-7 text-[#756960]
                               sm:text-[15px]"
                    >
                        Une question sur votre commande, une suggestion
                        ou simplement envie d'échanger avec nous ?
                        L'équipe FON-KPA est à votre écoute.
                    </p>

                </div>

            </div>

        </section>


        {{-- =====================================================
             CONTACT + FORMULAIRE
        ====================================================== --}}

        <main
            class="mx-auto w-full max-w-[1720px]
                   px-[clamp(2rem,7vw,7.5rem)]
                   pb-20 sm:pb-24 lg:pb-28"
        >

            <div
                class="grid overflow-hidden
                       rounded-[2rem]
                       border border-[#E9DED5]
                       bg-white
                       shadow-[0_25px_80px_rgba(89,49,20,0.07)]
                       lg:grid-cols-[0.72fr_1.28fr]"
            >

                {{-- =================================================
                     COLONNE INFORMATIONS
                ================================================== --}}

                <aside
                    class="relative overflow-hidden
                           bg-[#593114]
                           px-7 py-9
                           sm:px-10 sm:py-11
                           lg:px-12 lg:py-12"
                >

                    {{-- Décoration --}}
                    <div
                        class="pointer-events-none absolute
                               -right-24 -top-24
                               h-64 w-64 rounded-full
                               border border-white/10"
                    ></div>

                    <div
                        class="pointer-events-none absolute
                               -bottom-28 -left-20
                               h-72 w-72 rounded-full
                               bg-[#E25F12]/20 blur-3xl"
                    ></div>


                    <div class="relative z-10">

                        {{-- Label --}}
                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.24em] text-[#F4C451]"
                        >
                            FON-KPA
                        </span>


                        <h2
                            class="mt-4 max-w-sm
                                   text-2xl font-black
                                   leading-tight
                                   tracking-[-0.035em]
                                   text-white
                                   sm:text-3xl"
                        >
                            Nous sommes là
                            <span class="text-[#F4C451]">
                                pour vous.
                            </span>
                        </h2>


                        <p
                            class="mt-4 max-w-sm
                                   text-xs leading-6
                                   text-white/65
                                   sm:text-sm"
                        >
                            Que vous soyez client, partenaire ou simplement
                            curieux de découvrir FON-KPA, vous pouvez nous
                            contacter directement.
                        </p>


                        {{-- Ligne --}}
                        <div
                            class="my-8 h-px w-full
                                   bg-white/10"
                        ></div>


                        {{-- =================================================
                             CONTACTS
                        ================================================== --}}

                        <div class="space-y-6">

                            {{-- Téléphone --}}
                            <a
                                href="tel:+2250123456789"
                                class="group flex items-start gap-4"
                            >

                                <div
                                    class="flex h-11 w-11 shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-white/10
                                           text-[#F4C451]
                                           transition-all duration-300
                                           group-hover:bg-[#E25F12]
                                           group-hover:text-white"
                                >
                                    <i class="bi bi-telephone-fill text-sm"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[8px] font-bold
                                               uppercase tracking-[0.16em]
                                               text-white/40"
                                    >
                                        Téléphone
                                    </p>

                                    <p
                                        class="mt-1 text-sm font-semibold
                                               text-white"
                                    >
                                        +225 01 23 45 67 89
                                    </p>

                                    <p
                                        class="mt-1 text-[9px]
                                               text-white/45"
                                    >
                                        Appelez-nous directement
                                    </p>

                                </div>

                            </a>


                            {{-- WhatsApp --}}
                            <a
                                href="https://wa.me/2250123456789"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex items-start gap-4"
                            >

                                <div
                                    class="flex h-11 w-11 shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-white/10
                                           text-[#F4C451]
                                           transition-all duration-300
                                           group-hover:bg-[#22C55E]
                                           group-hover:text-white"
                                >
                                    <i class="bi bi-whatsapp text-lg"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[8px] font-bold
                                               uppercase tracking-[0.16em]
                                               text-white/40"
                                    >
                                        WhatsApp
                                    </p>

                                    <p
                                        class="mt-1 text-sm font-semibold
                                               text-white"
                                    >
                                        +225 01 23 45 67 89
                                    </p>

                                    <p
                                        class="mt-1 text-[9px]
                                               text-white/45"
                                    >
                                        Réponse rapide
                                    </p>

                                </div>

                            </a>


                            {{-- Email --}}
                            <a
                                href="mailto:bonjour@fonkpa.ci"
                                class="group flex items-start gap-4"
                            >

                                <div
                                    class="flex h-11 w-11 shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-white/10
                                           text-[#F4C451]
                                           transition-all duration-300
                                           group-hover:bg-[#E25F12]
                                           group-hover:text-white"
                                >
                                    <i class="bi bi-envelope-fill text-sm"></i>
                                </div>

                                <div class="min-w-0">

                                    <p
                                        class="text-[8px] font-bold
                                               uppercase tracking-[0.16em]
                                               text-white/40"
                                    >
                                        Email
                                    </p>

                                    <p
                                        class="mt-1 break-all
                                               text-sm font-semibold
                                               text-white"
                                    >
                                        bonjour@fonkpa.ci
                                    </p>

                                    <p
                                        class="mt-1 text-[9px]
                                               text-white/45"
                                    >
                                        Pour toute demande
                                    </p>

                                </div>

                            </a>

                        </div>


                        {{-- =================================================
                             HORAIRES
                        ================================================== --}}

                        <div
                            class="mt-9 rounded-2xl
                                   border border-white/10
                                   bg-white/[0.055]
                                   p-5"
                        >

                            <div class="flex items-start gap-3">

                                <div
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-lg
                                           bg-[#F4C451]/10
                                           text-[#F4C451]"
                                >
                                    <i class="bi bi-clock-fill text-xs"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[8px] font-bold
                                               uppercase tracking-[0.16em]
                                               text-white/40"
                                    >
                                        Nos horaires
                                    </p>

                                    <p
                                        class="mt-1 text-[11px]
                                               font-semibold text-white"
                                    >
                                        Lun – Sam · 10h00 – 22h00
                                    </p>

                                    <p
                                        class="mt-1 text-[10px]
                                               text-white/55"
                                    >
                                        Dimanche · 12h00 – 20h00
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Adresse --}}
                        <div class="mt-6 flex items-start gap-3">

                            <i
                                class="bi bi-geo-alt-fill
                                       mt-0.5 text-sm
                                       text-[#F4C451]"
                            ></i>

                            <p
                                class="text-[10px]
                                       leading-5 text-white/60"
                            >
                                Cocody, Angré 7ème Tranche<br>
                                Abidjan, Côte d'Ivoire
                            </p>

                        </div>

                    </div>

                </aside>


                {{-- =================================================
                     FORMULAIRE
                ================================================== --}}

                <section
                    class="px-7 py-9
                           sm:px-10 sm:py-11
                           lg:px-14 lg:py-12"
                >

                    <div class="max-w-2xl">

                        {{-- Header --}}
                        <div>

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.24em]
                                       text-[#E25F12]"
                            >
                                Envoyez-nous un message
                            </span>

                            <h2
                                class="mt-3
                                       text-2xl font-black
                                       tracking-[-0.04em]
                                       text-[#3B200F]
                                       sm:text-3xl"
                            >
                                Comment pouvons-nous
                                vous aider ?
                            </h2>

                            <p
                                class="mt-3 max-w-lg
                                       text-xs leading-6
                                       text-[#8A7B71]"
                            >
                                Remplissez le formulaire ci-dessous.
                                Nous reviendrons vers vous dans les meilleurs
                                délais.
                            </p>

                        </div>


                        {{-- =================================================
                             SUCCESS
                        ================================================== --}}

                        @if (session('success'))

                            <div
                                x-data="{ show: true }"
                                x-init="setTimeout(() => show = false, 7000)"
                                x-show="show"
                                x-transition
                                role="alert"
                                class="mt-7 flex items-start gap-4
                                       rounded-2xl
                                       border border-[#D9E9DE]
                                       bg-[#F4FAF5]
                                       p-4"
                            >

                                <div
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-full
                                           bg-[#DFF1E4]
                                           text-[#3B7650]"
                                >
                                    <i class="bi bi-check-lg"></i>
                                </div>

                                <div class="min-w-0 flex-1">

                                    <p
                                        class="text-xs font-bold
                                               text-[#315F40]"
                                    >
                                        Message envoyé
                                    </p>

                                    <p
                                        class="mt-1 text-[10px]
                                               leading-5 text-[#527260]"
                                    >
                                        {{ session('success') }}
                                    </p>

                                </div>

                                <button
                                    type="button"
                                    @click="show = false"
                                    class="flex h-7 w-7 shrink-0
                                           items-center justify-center
                                           rounded-full
                                           text-[#527260]
                                           transition
                                           hover:bg-[#DFF1E4]"
                                    aria-label="Fermer"
                                >
                                    <i class="bi bi-x text-sm"></i>
                                </button>

                            </div>

                        @endif


                        {{-- =================================================
                             ERREURS
                        ================================================== --}}

                        @if ($errors->any())

                            <div
                                role="alert"
                                class="mt-7 rounded-2xl
                                       border border-[#F0D2CC]
                                       bg-[#FFF7F5]
                                       p-4"
                            >

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-9 w-9 shrink-0
                                               items-center justify-center
                                               rounded-full
                                               bg-[#FDE8E3]
                                               text-[#C4523A]"
                                    >
                                        <i
                                            class="bi bi-exclamation-triangle-fill text-xs"
                                        ></i>
                                    </div>

                                    <div>

                                        <p
                                            class="text-xs font-bold
                                                   text-[#963E2B]"
                                        >
                                            Vérifiez les informations
                                        </p>

                                        <ul
                                            class="mt-2 space-y-1
                                                   text-[10px]
                                                   leading-5 text-[#A65A4A]"
                                        >

                                            @foreach ($errors->all() as $error)

                                                <li class="flex gap-2">
                                                    <span>•</span>
                                                    <span>{{ $error }}</span>
                                                </li>

                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        @endif


                        {{-- =================================================
                             FORM
                        ================================================== --}}

                        <form
                            method="POST"
                            action="{{ route('contact.store') }}"
                            @submit="submitForm"
                            class="mt-8"
                        >

                            @csrf


                            {{-- NOM + EMAIL --}}
                            <div class="grid gap-5 sm:grid-cols-2">

                                {{-- NOM --}}
                                <div>

                                    <label
                                        for="name"
                                        class="mb-2 block text-[10px]
                                               font-bold text-[#593114]"
                                    >
                                        Nom complet
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-person
                                                   pointer-events-none
                                                   absolute left-4 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A79B93]"
                                        ></i>

                                        <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            value="{{ old('name') }}"
                                            x-model="form.name"
                                            autocomplete="name"
                                            placeholder="Votre nom complet"
                                            required
                                            class="h-12 w-full rounded-xl
                                                   border border-[#E8E0D9]
                                                   bg-[#FCFAF7]
                                                   pl-11 pr-4
                                                   text-xs font-medium
                                                   text-[#593114]
                                                   outline-none
                                                   transition-all
                                                   placeholder:text-[#AAA19A]
                                                   focus:border-[#E25F12]
                                                   focus:bg-white
                                                   focus:ring-4
                                                   focus:ring-[#E25F12]/10"
                                        >

                                    </div>

                                </div>


                                {{-- EMAIL --}}
                                <div>

                                    <label
                                        for="email"
                                        class="mb-2 block text-[10px]
                                               font-bold text-[#593114]"
                                    >
                                        Adresse email
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-envelope
                                                   pointer-events-none
                                                   absolute left-4 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A79B93]"
                                        ></i>

                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            value="{{ old('email') }}"
                                            x-model="form.email"
                                            autocomplete="email"
                                            placeholder="votre@email.com"
                                            required
                                            class="h-12 w-full rounded-xl
                                                   border border-[#E8E0D9]
                                                   bg-[#FCFAF7]
                                                   pl-11 pr-4
                                                   text-xs font-medium
                                                   text-[#593114]
                                                   outline-none
                                                   transition-all
                                                   placeholder:text-[#AAA19A]
                                                   focus:border-[#E25F12]
                                                   focus:bg-white
                                                   focus:ring-4
                                                   focus:ring-[#E25F12]/10"
                                        >

                                    </div>

                                </div>


                                {{-- TELEPHONE --}}
                                <div>

                                    <label
                                        for="phone"
                                        class="mb-2 block text-[10px]
                                               font-bold text-[#593114]"
                                    >
                                        Téléphone
                                        <span
                                            class="ml-1 font-normal text-[#A79B93]"
                                        >
                                            (optionnel)
                                        </span>
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-telephone
                                                   pointer-events-none
                                                   absolute left-4 top-1/2
                                                   -translate-y-1/2
                                                   text-sm text-[#A79B93]"
                                        ></i>

                                        <input
                                            id="phone"
                                            name="phone"
                                            type="tel"
                                            value="{{ old('phone') }}"
                                            x-model="form.phone"
                                            autocomplete="tel"
                                            placeholder="+225 00 00 00 00"
                                            class="h-12 w-full rounded-xl
                                                   border border-[#E8E0D9]
                                                   bg-[#FCFAF7]
                                                   pl-11 pr-4
                                                   text-xs font-medium
                                                   text-[#593114]
                                                   outline-none
                                                   transition-all
                                                   placeholder:text-[#AAA19A]
                                                   focus:border-[#E25F12]
                                                   focus:bg-white
                                                   focus:ring-4
                                                   focus:ring-[#E25F12]/10"
                                        >

                                    </div>

                                </div>


                                {{-- SUJET --}}
                                <div>

                                    <label
                                        for="subject"
                                        class="mb-2 block text-[10px]
                                               font-bold text-[#593114]"
                                    >
                                        Sujet
                                    </label>

                                    <div class="relative">

                                        <i
                                            class="bi bi-chat-square-text
                                                   pointer-events-none
                                                   absolute left-4 top-1/2
                                                   z-10
                                                   -translate-y-1/2
                                                   text-sm text-[#A79B93]"
                                        ></i>

                                        <select
                                            id="subject"
                                            name="subject"
                                            x-model="form.subject"
                                            class="h-12 w-full
                                                   appearance-none
                                                   rounded-xl
                                                   border border-[#E8E0D9]
                                                   bg-[#FCFAF7]
                                                   pl-11 pr-10
                                                   text-xs font-medium
                                                   text-[#593114]
                                                   outline-none
                                                   transition-all
                                                   focus:border-[#E25F12]
                                                   focus:bg-white
                                                   focus:ring-4
                                                   focus:ring-[#E25F12]/10"
                                        >

                                            <option value="general">
                                                Information générale
                                            </option>

                                            <option value="commande">
                                                Question sur une commande
                                            </option>

                                            <option value="livraison">
                                                Livraison
                                            </option>

                                            <option value="suggestion">
                                                Suggestion
                                            </option>

                                            <option value="partenariat">
                                                Partenariat
                                            </option>

                                            <option value="autre">
                                                Autre demande
                                            </option>

                                        </select>

                                        <i
                                            class="bi bi-chevron-down
                                                   pointer-events-none
                                                   absolute right-4 top-1/2
                                                   -translate-y-1/2
                                                   text-[10px]
                                                   text-[#A79B93]"
                                        ></i>

                                    </div>

                                </div>

                            </div>


                            {{-- MESSAGE --}}
                            <div class="mt-5">

                                <div
                                    class="mb-2 flex items-center
                                           justify-between"
                                >

                                    <label
                                        for="message"
                                        class="text-[10px] font-bold
                                               text-[#593114]"
                                    >
                                        Votre message
                                    </label>

                                    <span
                                        class="text-[9px] text-[#A79B93]"
                                        x-text="form.message.length + ' / 500'"
                                    ></span>

                                </div>


                                <div class="relative">

                                    <i
                                        class="bi bi-chat-left-text
                                               pointer-events-none
                                               absolute left-4 top-4
                                               text-sm text-[#A79B93]"
                                    ></i>

                                    <textarea
                                        id="message"
                                        name="message"
                                        x-model="form.message"
                                        maxlength="500"
                                        rows="6"
                                        required
                                        placeholder="Écrivez votre message..."
                                        class="min-h-[160px] w-full
                                               resize-none rounded-xl
                                               border border-[#E8E0D9]
                                               bg-[#FCFAF7]
                                               pl-11 pr-4 pt-4
                                               text-xs leading-6
                                               text-[#593114]
                                               outline-none
                                               transition-all
                                               placeholder:text-[#AAA19A]
                                               focus:border-[#E25F12]
                                               focus:bg-white
                                               focus:ring-4
                                               focus:ring-[#E25F12]/10"
                                    ></textarea>

                                </div>

                            </div>


                            {{-- FOOTER FORMULAIRE --}}
                            <div
                                class="mt-6 flex flex-col
                                       gap-4
                                       sm:flex-row
                                       sm:items-center
                                       sm:justify-between"
                            >

                                {{-- Confidentialité --}}
                                <div class="flex items-start gap-2">

                                    <i
                                        class="bi bi-shield-check
                                               mt-0.5 text-sm
                                               text-[#593114]"
                                    ></i>

                                    <p
                                        class="max-w-xs text-[9px]
                                               leading-4 text-[#9A8E86]"
                                    >
                                        Vos informations sont utilisées
                                        uniquement pour répondre à votre
                                        demande.
                                    </p>

                                </div>


                                {{-- Bouton --}}
                                <button
                                    type="submit"
                                    :disabled="loading"
                                    class="group inline-flex h-12
                                           items-center justify-center
                                           gap-3 rounded-full
                                           bg-[#593114]
                                           px-7 text-[10px]
                                           font-bold text-white
                                           shadow-[0_8px_25px_rgba(89,49,20,0.16)]
                                           transition-all duration-300
                                           hover:-translate-y-0.5
                                           hover:bg-[#E25F12]
                                           hover:shadow-[0_12px_30px_rgba(226,95,18,0.18)]
                                           active:translate-y-0
                                           disabled:cursor-not-allowed
                                           disabled:opacity-50
                                           sm:shrink-0"
                                >

                                    <i
                                        class="bi"
                                        :class="loading
                                            ? 'bi-arrow-repeat animate-spin'
                                            : 'bi-arrow-up-right'"
                                    ></i>

                                    <span
                                        x-text="loading
                                            ? 'Envoi en cours...'
                                            : 'Envoyer le message'"
                                    ></span>

                                    <span
                                        class="flex h-6 w-6
                                               items-center justify-center
                                               rounded-full
                                               bg-white/10
                                               transition
                                               group-hover:bg-white/20"
                                    >
                                        <i
                                            class="bi bi-arrow-right text-[9px]"
                                        ></i>
                                    </span>

                                </button>

                            </div>

                        </form>

                    </div>

                </section>

            </div>


            {{-- =====================================================
                 LOCALISATION
            ====================================================== --}}

            <section class="mt-10 sm:mt-12">

                <div
                    class="mb-5 flex flex-col gap-3
                           sm:flex-row sm:items-end
                           sm:justify-between"
                >

                    <div>

                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.24em]
                                   text-[#E25F12]"
                        >
                            Nous trouver
                        </span>

                        <h2
                            class="mt-2 text-2xl font-black
                                   tracking-[-0.04em]
                                   text-[#3B200F]"
                        >
                            Venez nous rendre visite.
                        </h2>

                    </div>


                    <p
                        class="max-w-md text-[10px]
                               leading-5 text-[#8A7B71]
                               sm:text-right"
                    >
                        Retrouvez FON-KPA à Cocody, Angré 7ème Tranche,
                        au cœur d'Abidjan.
                    </p>

                </div>


                <div
                    class="overflow-hidden rounded-[1.75rem]
                           border border-[#E9DED5]
                           bg-white p-2
                           shadow-[0_15px_50px_rgba(89,49,20,0.06)]"
                >

                    <div
                        class="relative h-[280px]
                               overflow-hidden rounded-[1.25rem]
                               sm:h-[340px]
                               lg:h-[400px]"
                    >

                        <iframe
                            src="https://www.google.com/maps?q=Cocody,+Angré+7ème+Tranche,+Abidjan,+Côte+d'Ivoire&output=embed"
                            class="h-full w-full border-0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Localisation FON-KPA"
                        ></iframe>


                        {{-- Carte localisation --}}
                        <div
                            class="absolute bottom-4 left-4
                                   max-w-[250px]
                                   rounded-2xl
                                   border border-white/70
                                   bg-white/95
                                   p-4
                                   shadow-xl
                                   backdrop-blur-md
                                   sm:bottom-5 sm:left-5"
                        >

                            <div class="flex items-start gap-3">

                                <div
                                    class="flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-[#FCE7D8]
                                           text-[#E25F12]"
                                >
                                    <i class="bi bi-geo-alt-fill text-sm"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-[10px] font-black
                                               text-[#593114]"
                                    >
                                        FON-KPA
                                    </p>

                                    <p
                                        class="mt-1 text-[9px]
                                               leading-4 text-[#8A7B71]"
                                    >
                                        Cocody, Angré 7ème Tranche<br>
                                        Abidjan, Côte d'Ivoire
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- =====================================================
                 CTA WHATSAPP
            ====================================================== --}}

            <section class="mt-10 sm:mt-12">

                <div
                    class="relative overflow-hidden
                           rounded-[1.75rem]
                           bg-[#F8EAD8]
                           px-7 py-9
                           sm:px-10 sm:py-11
                           lg:px-14"
                >

                    {{-- Décors --}}
                    <div
                        class="pointer-events-none absolute
                               -right-20 -top-28
                               h-64 w-64 rounded-full
                               bg-[#E25F12]/10 blur-3xl"
                    ></div>

                    <div
                        class="pointer-events-none absolute
                               -bottom-20 -left-20
                               h-52 w-52 rounded-full
                               bg-[#F4C451]/20 blur-3xl"
                    ></div>


                    <div
                        class="relative z-10 flex flex-col
                               gap-7
                               lg:flex-row
                               lg:items-center
                               lg:justify-between"
                    >

                        <div class="max-w-2xl">

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.24em]
                                       text-[#E25F12]"
                            >
                                Besoin d'une réponse rapide ?
                            </span>

                            <h2
                                class="mt-2 text-2xl font-black
                                       tracking-[-0.04em]
                                       text-[#3B200F]
                                       sm:text-3xl"
                            >
                                Écrivez-nous directement sur WhatsApp.
                            </h2>

                            <p
                                class="mt-3 max-w-xl
                                       text-xs leading-6
                                       text-[#786A60]"
                            >
                                Pour une question urgente ou une demande
                                concernant votre commande, WhatsApp reste
                                le moyen le plus direct de nous joindre.
                            </p>

                        </div>


                        <a
                            href="https://wa.me/2250123456789"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group inline-flex h-12
                                   items-center justify-center
                                   gap-3 rounded-full
                                   bg-[#22C55E]
                                   px-6
                                   text-[10px] font-bold
                                   text-white
                                   shadow-[0_10px_25px_rgba(34,197,94,0.18)]
                                   transition-all duration-300
                                   hover:-translate-y-0.5
                                   hover:bg-[#16A34A]
                                   hover:shadow-[0_14px_30px_rgba(34,197,94,0.24)]
                                   lg:shrink-0"
                        >

                            <i class="bi bi-whatsapp text-lg"></i>

                            <span>
                                Démarrer une conversation
                            </span>

                            <i
                                class="bi bi-arrow-up-right
                                       text-[10px]
                                       transition-transform
                                       duration-300
                                       group-hover:-translate-y-0.5
                                       group-hover:translate-x-0.5"
                            ></i>

                        </a>

                    </div>

                </div>

            </section>


            {{-- =====================================================
                 PETITE SIGNATURE
            ====================================================== --}}

            <div
                class="mt-12 flex items-center justify-center
                       gap-3 sm:mt-14"
            >

                <span class="h-px w-8 bg-[#E5D7CC]"></span>

                <span
                    class="text-[8px] font-semibold uppercase
                           tracking-[0.22em]
                           text-[#A09288]"
                >
                    Le goût de chez nous
                </span>

                <span class="h-px w-8 bg-[#E5D7CC]"></span>

            </div>

        </main>

    </div>


    {{-- =========================================================
         ALPINE.JS
    ========================================================== --}}

    <script>

        function contactForm() {

            return {

                loading: false,

                form: {
                    name: @json(old('name', '')),
                    email: @json(old('email', '')),
                    phone: @json(old('phone', '')),
                    subject: @json(old('subject', 'general')),
                    message: @json(old('message', ''))
                },

                submitForm() {

                    this.loading = true;

                }

            }

        }

    </script>

</x-app-layout>