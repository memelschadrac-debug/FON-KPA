<x-app-layout>

    @section('title', 'FON-KPA — Contact')

    {{-- =========================================================
         PAGE CONTACT
    ========================================================== --}}
    <section class="bg-[#FAF9F7] py-12 sm:py-16 lg:py-20">

        <div class="mx-auto max-w-6xl px-5 sm:px-8 lg:px-10">

            {{-- =====================================================
                 HEADER
            ====================================================== --}}
            <div class="mx-auto max-w-2xl text-center">

                <span
                    class="inline-flex items-center gap-2
                           text-xs font-semibold uppercase
                           tracking-[0.18em] text-[#E25F12]"
                >
                    <i class="bi bi-chat-dots-fill"></i>
                    Contact
                </span>

                <h2
                    class="mt-3 text-3xl font-bold tracking-tight
                           text-[#593114]
                           sm:text-4xl lg:text-5xl"
                >
                    Contactez-nous
                </h2>

                <p
                    class="mx-auto mt-4 max-w-xl
                           text-sm leading-6 text-[#756D67]
                           sm:text-base"
                >
                    Nous sommes à votre écoute pour toute question,
                    suggestion ou commande spéciale.
                    N'hésitez pas à nous joindre !
                </p>

            </div>


            {{-- =====================================================
                 CONTACT + FORMULAIRE
            ====================================================== --}}
            <div
                class="mt-10 grid gap-6
                       lg:grid-cols-[280px_1fr]"
            >

                {{-- =================================================
                     INFORMATIONS
                ================================================== --}}
                <div class="space-y-5">

                    {{-- INFORMATIONS --}}
                    <div
                        class="rounded-2xl bg-white p-6
                               shadow-[0_5px_25px_rgba(89,49,20,0.06)]
                               ring-1 ring-black/[0.03]"
                    >

                        <h3
                            class="text-lg font-bold text-[#593114]"
                        >
                            Informations
                        </h3>

                        <div class="mt-6 space-y-5">

                            {{-- Téléphone --}}
                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-10 w-10 shrink-0
                                           items-center justify-center
                                           rounded-xl bg-[#FCE7D8]
                                           text-[#E25F12]"
                                >
                                    <i class="bi bi-telephone-fill"></i>
                                </div>

                                <div>
                                    <p
                                        class="text-xs font-semibold
                                               uppercase tracking-wide
                                               text-[#8A817B]"
                                    >
                                        Téléphone
                                    </p>

                                    <p
                                        class="mt-1 text-sm font-medium
                                               text-[#593114]"
                                    >
                                        +225 01 23 45 67 89
                                    </p>
                                </div>

                            </div>


                            {{-- WhatsApp --}}
                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-10 w-10 shrink-0
                                           items-center justify-center
                                           rounded-xl bg-green-50
                                           text-green-600"
                                >
                                    <i class="bi bi-whatsapp text-lg"></i>
                                </div>

                                <div>
                                    <p
                                        class="text-xs font-semibold
                                               uppercase tracking-wide
                                               text-[#8A817B]"
                                    >
                                        WhatsApp
                                    </p>

                                    <p
                                        class="mt-1 text-sm font-medium
                                               text-[#593114]"
                                    >
                                        +225 01 23 45 67 89
                                    </p>
                                </div>

                            </div>


                            {{-- Email --}}
                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-10 w-10 shrink-0
                                           items-center justify-center
                                           rounded-xl bg-[#FCE7D8]
                                           text-[#E25F12]"
                                >
                                    <i class="bi bi-envelope-fill"></i>
                                </div>

                                <div class="min-w-0">

                                    <p
                                        class="text-xs font-semibold
                                               uppercase tracking-wide
                                               text-[#8A817B]"
                                    >
                                        Email
                                    </p>

                                    <p
                                        class="mt-1 break-all text-sm
                                               font-medium text-[#593114]"
                                    >
                                        bonjour@fonkpa.ci
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ADRESSE --}}
                    <div
                        class="rounded-2xl bg-white p-6
                               shadow-[0_5px_25px_rgba(89,49,20,0.06)]
                               ring-1 ring-black/[0.03]"
                    >

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-xl bg-[#FCE7D8]
                                       text-[#E25F12]"
                            >
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>

                                <p
                                    class="text-xs font-semibold
                                           uppercase tracking-wide
                                           text-[#8A817B]"
                                >
                                    Adresse
                                </p>

                                <p
                                    class="mt-2 text-sm leading-6
                                           text-[#593114]"
                                >
                                    Cocody, Angré 7ème Tranche
                                    <br>
                                    Abidjan, Côte d'Ivoire
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- HORAIRES --}}
                    <div
                        class="rounded-2xl bg-white p-6
                               shadow-[0_5px_25px_rgba(89,49,20,0.06)]
                               ring-1 ring-black/[0.03]"
                    >

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-xl bg-[#FCE7D8]
                                       text-[#E25F12]"
                            >
                                <i class="bi bi-clock-fill"></i>
                            </div>

                            <div>

                                <p
                                    class="text-xs font-semibold
                                           uppercase tracking-wide
                                           text-[#8A817B]"
                                >
                                    Horaires
                                </p>

                                <p
                                    class="mt-2 text-sm leading-6
                                           text-[#593114]"
                                >
                                    Lun - Sam : 10h00 - 22h00
                                    <br>
                                    Dimanche : 12h00 - 20h00
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- WHATSAPP --}}
                    <a
                        href="#"
                        class="flex items-center justify-center
                               gap-2 rounded-xl
                               bg-[#22C55E]
                               px-5 py-3.5
                               text-sm font-semibold
                               text-white
                               shadow-sm
                               transition-all duration-300
                               hover:-translate-y-0.5
                               hover:bg-[#16A34A]
                               hover:shadow-lg"
                    >
                        <i class="bi bi-whatsapp text-lg"></i>

                        Message WhatsApp
                    </a>

                </div>


                {{-- =================================================
                     FORMULAIRE
                ================================================== --}}
                <div
                    x-data="contactForm()"
                    class="rounded-2xl bg-white p-6
                           shadow-[0_8px_30px_rgba(89,49,20,0.07)]
                           ring-1 ring-black/[0.03]
                           sm:p-8"
                >

                    {{-- HEADER FORMULAIRE --}}
                    <div
                        class="flex items-start justify-between gap-5"
                    >

                        <div>

                            <span
                                class="text-xs font-semibold uppercase
                                       tracking-[0.16em]
                                       text-[#E25F12]"
                            >
                                Écrivez-nous
                            </span>

                            <h3
                                class="mt-2 text-2xl font-bold
                                       tracking-tight text-[#593114]
                                       sm:text-3xl"
                            >
                                Envoyez-nous un message
                            </h3>

                            <p
                                class="mt-2 text-sm leading-6
                                       text-[#918983]"
                            >
                                Une question, une commande ou une suggestion ?
                                Nous sommes là pour vous répondre.
                            </p>

                        </div>


                        <div
                            class="hidden h-12 w-12 shrink-0
                                   items-center justify-center
                                   rounded-full bg-[#FCE7D8]
                                   text-[#E25F12]
                                   sm:flex"
                        >
                            <i class="bi bi-send-fill text-lg"></i>
                        </div>

                    </div>


                    {{-- =================================================
                         MESSAGE DE SUCCÈS
                    ================================================== --}}
                    @if (session('success'))

                        <div
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 7000)"
                            x-show="show"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-[-8px]"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-[-8px]"
                            role="alert"
                            class="alert alert-success mt-6
                                   rounded-xl border border-green-200
                                   bg-green-50 px-4 py-4
                                   text-green-800 shadow-sm"
                        >

                            {{-- Icône --}}
                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-full bg-green-100
                                       text-green-600"
                            >
                                <i class="bi bi-check-lg text-xl"></i>
                            </div>


                            {{-- Contenu --}}
                            <div class="min-w-0 flex-1">

                                <h4
                                    class="font-semibold text-green-800"
                                >
                                    Message envoyé avec succès
                                </h4>

                                <p
                                    class="mt-0.5 text-sm leading-5
                                           text-green-700"
                                >
                                    {{ session('success') }}
                                </p>

                            </div>


                            {{-- Fermer --}}
                            <button
                                type="button"
                                @click="show = false"
                                class="btn btn-sm btn-circle
                                       btn-ghost text-green-700
                                       hover:bg-green-100"
                                aria-label="Fermer"
                            >
                                <i class="bi bi-x-lg"></i>
                            </button>

                        </div>

                    @endif


                    {{-- =================================================
                         ERREURS DE VALIDATION
                    ================================================== --}}
                    @if ($errors->any())

                        <div
                            role="alert"
                            class="alert alert-error mt-6
                                   rounded-xl border border-red-200
                                   bg-red-50 text-red-800 shadow-sm"
                        >

                            <div
                                class="flex h-10 w-10 shrink-0
                                       items-center justify-center
                                       rounded-full bg-red-100
                                       text-red-600"
                            >
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>

                            <div>

                                <h4 class="font-semibold">
                                    Vérifiez les informations saisies
                                </h4>

                                <ul class="mt-1 text-sm">

                                    @foreach ($errors->all() as $error)

                                        <li class="flex items-start gap-2">
                                            <span>•</span>
                                            <span>{{ $error }}</span>
                                        </li>

                                    @endforeach

                                </ul>

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
                                    class="mb-2 block text-sm
                                           font-semibold text-[#593114]"
                                >
                                    Nom complet
                                </label>

                                <div class="relative">

                                    <i
                                        class="bi bi-person
                                               pointer-events-none
                                               absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-base text-[#A69D97]"
                                    ></i>

                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        value="{{ old('name') }}"
                                        x-model="form.name"
                                        placeholder="Votre nom"
                                        class="h-12 w-full rounded-xl
                                               border border-[#E8E1DC]
                                               bg-[#FAF9F7]
                                               pl-11 pr-4
                                               text-sm text-[#593114]
                                               outline-none transition-all
                                               placeholder:text-[#AAA29D]
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
                                    class="mb-2 block text-sm
                                           font-semibold text-[#593114]"
                                >
                                    Adresse Email
                                </label>

                                <div class="relative">

                                    <i
                                        class="bi bi-envelope
                                               pointer-events-none
                                               absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-base text-[#A69D97]"
                                    ></i>

                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email') }}"
                                        x-model="form.email"
                                        placeholder="votre@email.com"
                                        class="h-12 w-full rounded-xl
                                               border border-[#E8E1DC]
                                               bg-[#FAF9F7]
                                               pl-11 pr-4
                                               text-sm text-[#593114]
                                               outline-none transition-all
                                               placeholder:text-[#AAA29D]
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
                                    class="mb-2 block text-sm
                                           font-semibold text-[#593114]"
                                >
                                    Téléphone
                                </label>

                                <div class="relative">

                                    <i
                                        class="bi bi-telephone
                                               pointer-events-none
                                               absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-base text-[#A69D97]"
                                    ></i>

                                    <input
                                        id="phone"
                                        name="phone"
                                        type="tel"
                                        value="{{ old('phone') }}"
                                        x-model="form.phone"
                                        placeholder="+225 00 00 00 00"
                                        class="h-12 w-full rounded-xl
                                               border border-[#E8E1DC]
                                               bg-[#FAF9F7]
                                               pl-11 pr-4
                                               text-sm text-[#593114]
                                               outline-none transition-all
                                               placeholder:text-[#AAA29D]
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
                                    class="mb-2 block text-sm
                                           font-semibold text-[#593114]"
                                >
                                    Sujet
                                </label>

                                <div class="relative">

                                    <i
                                        class="bi bi-list
                                               pointer-events-none
                                               absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-base text-[#A69D97]"
                                    ></i>

                                    <select
                                        id="subject"
                                        name="subject"
                                        x-model="form.subject"
                                        class="h-12 w-full appearance-none
                                               rounded-xl
                                               border border-[#E8E1DC]
                                               bg-[#FAF9F7]
                                               pl-11 pr-10
                                               text-sm text-[#593114]
                                               outline-none transition-all
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

                                        <option value="autre">
                                            Autre demande
                                        </option>

                                    </select>

                                    <i
                                        class="bi bi-chevron-down
                                               pointer-events-none
                                               absolute right-4 top-1/2
                                               -translate-y-1/2
                                               text-sm text-[#A69D97]"
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
                                    class="text-sm font-semibold
                                           text-[#593114]"
                                >
                                    Message
                                </label>

                                <span
                                    class="text-xs text-[#AAA29D]"
                                    x-text="form.message.length + '/500'"
                                ></span>

                            </div>


                            <div class="relative">

                                <i
                                    class="bi bi-chat-left-text
                                           pointer-events-none
                                           absolute left-4 top-4
                                           text-base text-[#A69D97]"
                                ></i>

                                <textarea
                                    id="message"
                                    name="message"
                                    x-model="form.message"
                                    maxlength="500"
                                    rows="6"
                                    placeholder="Comment pouvons-nous vous aider ?"
                                    class="min-h-[150px] w-full resize-none
                                           rounded-xl
                                           border border-[#E8E1DC]
                                           bg-[#FAF9F7]
                                           pl-11 pr-4 pt-4
                                           text-sm leading-6
                                           text-[#593114]
                                           outline-none transition-all
                                           placeholder:text-[#AAA29D]
                                           focus:border-[#E25F12]
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-[#E25F12]/10"
                                ></textarea>

                            </div>

                        </div>


                        {{-- BOUTON --}}
                        <div
                            class="mt-6 flex flex-col gap-4
                                   sm:flex-row sm:items-center
                                   sm:justify-between"
                        >

                            <div></div>

                            <button
                                type="submit"
                                :disabled="loading"
                                class="inline-flex items-center
                                       justify-center gap-2
                                       rounded-xl
                                       bg-[#E25F12]
                                       px-6 py-3.5
                                       text-sm font-semibold
                                       text-white
                                       shadow-sm
                                       transition-all duration-300
                                       hover:-translate-y-0.5
                                       hover:bg-[#593114]
                                       hover:shadow-lg
                                       disabled:cursor-not-allowed
                                       disabled:opacity-60
                                       sm:ml-auto"
                            >

                                <i
                                    class="bi"
                                    :class="loading
                                        ? 'bi-arrow-repeat animate-spin'
                                        : 'bi-send-fill'"
                                ></i>

                                <span
                                    x-text="loading
                                        ? 'Envoi...'
                                        : 'Envoyer le message'"
                                ></span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- =====================================================
                 CARTE
            ====================================================== --}}
            <div
                class="mt-8 overflow-hidden rounded-2xl
                       bg-white p-2
                       shadow-[0_5px_25px_rgba(89,49,20,0.06)]
                       ring-1 ring-black/[0.03]"
            >

                <div
                    class="relative h-[240px] overflow-hidden
                           rounded-xl
                           sm:h-[300px]
                           lg:h-[360px]"
                >

                    {{-- GOOGLE MAPS --}}
                    <iframe
                        src="https://www.google.com/maps?q=Cocody,+Angré+7ème+Tranche,+Abidjan,+Côte+d'Ivoire&output=embed"
                        class="h-full w-full border-0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>


                    {{-- MARQUEUR / INFORMATIONS --}}
                    <div
                        class="absolute left-1/2 top-1/2
                               -translate-x-1/2
                               -translate-y-1/2"
                    >

                        <div
                            class="rounded-xl bg-white
                                   px-5 py-4 text-center
                                   shadow-xl"
                        >

                            <i
                                class="bi bi-geo-alt-fill
                                       text-xl text-[#E25F12]"
                            ></i>

                            <p
                                class="mt-1 text-sm font-bold
                                       text-[#593114]"
                            >
                                FON-KPA
                            </p>

                            <p
                                class="text-xs text-[#8A817B]"
                            >
                                Angré 7ème Tranche
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         ALPINE.JS
    ========================================================== --}}
    <script>

        function contactForm() {

            return {

                loading: false,

                form: {
                    name: '',
                    email: '',
                    phone: '',
                    subject: 'general',
                    message: ''
                },

                submitForm() {

                    this.loading = true;

                }

            }

        }

    </script>

</x-app-layout>