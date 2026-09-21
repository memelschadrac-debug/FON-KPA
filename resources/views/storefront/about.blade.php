<x-app-layout>

    @section('title', 'FON-KPA — À propos')

    <div class="min-h-screen overflow-hidden bg-[#FCFAF7] text-[#3B200F]">

        {{-- =========================================================
             HERO — NOTRE IDENTITÉ
        ========================================================== --}}
        <section class="relative lg:mt-10">

            {{-- Décors très subtils --}}
            <div
                class="pointer-events-none absolute -left-40 top-24 h-80 w-80
                       rounded-full bg-[#F4C451]/10 blur-3xl"
            ></div>

            <div
                class="pointer-events-none absolute -right-40 top-0 h-[500px] w-[500px]
                       rounded-full bg-[#E25F12]/[0.035] blur-3xl"
            ></div>


            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid min-h-[680px] items-center gap-14
                           py-16 sm:py-20 lg:grid-cols-[0.9fr_1.1fr]
                           lg:gap-20 lg:py-24"
                >

                    {{-- TEXTE --}}
                    <div class="relative z-10 max-w-[620px]">

                        <div class="flex items-center gap-3">

                            <span
                                class="h-px w-8 bg-[#E25F12]"
                            ></span>

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.28em] text-[#E25F12]"
                            >
                                À propos de FON-KPA
                            </span>

                        </div>


                        <h1
                            class="mt-7 max-w-[650px]
                                   text-[3.3rem] font-black
                                   leading-[0.94] tracking-[-0.065em]
                                   text-[#3B200F]
                                   sm:text-[4.5rem]
                                   lg:text-[5rem]
                                   xl:text-[5.6rem]"
                        >
                            La cuisine
                            <span class="text-[#E25F12]">
                                ivoirienne,
                            </span>

                            <br>

                            <span class="relative inline-block">

                                autrement.

                                <svg
                                    class="absolute -bottom-4 left-0
                                           h-3 w-full"
                                    viewBox="0 0 300 12"
                                    fill="none"
                                    preserveAspectRatio="none"
                                >
                                    <path
                                        d="M3 8C72 1 195 1 297 7"
                                        stroke="#F4C451"
                                        stroke-width="4"
                                        stroke-linecap="round"
                                    />
                                </svg>

                            </span>

                        </h1>


                        <p
                            class="mt-8 max-w-[520px]
                                   text-sm leading-7 text-[#756960]
                                   sm:text-[15px]"
                        >
                            FON-KPA est né d'une envie simple :
                            faire vivre les saveurs de notre cuisine
                            tout en créant une expérience moderne,
                            simple et accessible.
                        </p>


                        <div
                            class="mt-9 flex flex-col gap-3
                                   sm:flex-row"
                        >

                            <a
                                href="{{ route('plats.index') }}"
                                class="inline-flex h-12 items-center
                                       justify-center gap-2 rounded-full
                                       bg-[#593114] px-7
                                       text-[10px] font-bold text-white
                                       shadow-lg shadow-[#593114]/10
                                       transition-all duration-300
                                       hover:-translate-y-0.5
                                       hover:bg-[#E25F12]"
                            >
                                Découvrir nos plats

                                <i class="bi bi-arrow-up-right"></i>
                            </a>


                            <a
                                href="#notre-histoire"
                                class="inline-flex h-12 items-center
                                       justify-center gap-2 rounded-full
                                       border border-[#E4D8CF]
                                       bg-white px-7
                                       text-[10px] font-bold
                                       text-[#593114]
                                       transition-all duration-300
                                       hover:border-[#593114]"
                            >
                                Notre histoire

                                <i class="bi bi-arrow-down"></i>
                            </a>

                        </div>


                        {{-- Petite signature --}}
                        <div
                            class="mt-12 flex items-center gap-4"
                        >

                            <div
                                class="flex h-10 w-10 items-center
                                       justify-center rounded-full
                                       bg-[#F8EBD9] text-[#E25F12]"
                            >
                                <i class="bi bi-heart-fill text-xs"></i>
                            </div>

                            <div>

                                <p
                                    class="text-[8px] uppercase
                                           tracking-[0.18em]
                                           text-[#A09288]"
                                >
                                    Notre conviction
                                </p>

                                <p
                                    class="mt-0.5 text-[11px]
                                           font-bold text-[#593114]"
                                >
                                    Le goût commence par l'authenticité.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- VISUEL --}}
                    <div
                        class="relative flex min-h-[480px]
                               items-center justify-center
                               lg:min-h-[600px]"
                    >

                        {{-- Forme arrière --}}
                        <div
                            class="absolute h-[330px] w-[330px]
                                   rounded-full bg-[#F4E6D5]
                                   sm:h-[450px] sm:w-[450px]
                                   lg:h-[560px] lg:w-[560px]"
                        ></div>


                        <div
                            class="absolute h-[280px] w-[280px]
                                   rounded-full border
                                   border-[#E6D6C6]
                                   sm:h-[390px] sm:w-[390px]
                                   lg:h-[490px] lg:w-[490px]"
                        ></div>


                        {{-- Image principale --}}
                        <div
                            class="relative z-10
                                   h-[370px] w-[370px]
                                   sm:h-[470px] sm:w-[470px]
                                   lg:h-[560px] lg:w-[560px]"
                        >

                            <img
                                src="{{ asset('images/garba.png') }}"
                                alt="Plat ivoirien FON-KPA"
                                class="h-full w-full object-contain
                                       drop-shadow-[0_30px_40px_rgba(89,49,20,0.18)]"
                            >

                        </div>


                        {{-- Micro information --}}
                        <div
                            class="absolute bottom-4 left-2 z-20
                                   rounded-2xl border
                                   border-[#E8DDD4]
                                   bg-white/95 px-4 py-3
                                   shadow-xl backdrop-blur-sm
                                   sm:bottom-8 sm:left-4"
                        >

                            <p
                                class="text-[8px] uppercase
                                       tracking-[0.18em] text-[#A09288]"
                            >
                                Origine
                            </p>

                            <p
                                class="mt-1 text-[11px] font-black
                                       text-[#593114]"
                            >
                                Côte d'Ivoire
                            </p>

                        </div>


                        <div
                            class="absolute right-0 top-14 z-20
                                   hidden rounded-full border
                                   border-[#E8DDD4]
                                   bg-white/95 px-4 py-2.5
                                   shadow-lg backdrop-blur-sm
                                   sm:block"
                        >

                            <div class="flex items-center gap-2">

                                <span
                                    class="h-2 w-2 rounded-full
                                           bg-[#E25F12]"
                                ></span>

                                <span
                                    class="text-[8px] font-bold
                                           text-[#593114]"
                                >
                                    100% ivoirien
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             INTRODUCTION — UNE MARQUE, UNE VISION
        ========================================================== --}}
        <section
            id="notre-histoire"
            class="border-y border-[#EEE5DE] bg-white"
        >

            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid gap-12 py-20
                           sm:py-24
                           lg:grid-cols-[0.75fr_1.25fr]
                           lg:gap-24 lg:py-32"
                >

                    {{-- Petit titre --}}
                    <div>

                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.25em] text-[#E25F12]"
                        >
                            Notre histoire
                        </span>

                        <p
                            class="mt-4 max-w-[220px]
                                   text-[11px] leading-5
                                   text-[#9A8B81]"
                        >
                            Une cuisine profondément ancrée
                            dans notre culture, pensée pour
                            les habitudes d'aujourd'hui.
                        </p>

                    </div>


                    {{-- Texte principal --}}
                    <div class="max-w-[900px]">

                        <h2
                            class="text-3xl font-black
                                   leading-[1.05] tracking-[-0.045em]
                                   text-[#3B200F]
                                   sm:text-5xl lg:text-6xl"
                        >
                            Nous croyons que certains
                            goûts ne sont pas seulement
                            des goûts.

                            <span class="text-[#E25F12]">
                                Ce sont des souvenirs.
                            </span>
                        </h2>


                        <p
                            class="mt-8 max-w-[720px]
                                   text-sm leading-7 text-[#756960]
                                   sm:text-[15px]"
                        >
                            Un plat peut nous rappeler une maison,
                            une famille, une rue, une conversation
                            ou simplement un moment partagé.
                            C'est cette dimension émotionnelle de la
                            cuisine ivoirienne que FON-KPA souhaite
                            préserver et mettre en valeur.
                        </p>


                        <div
                            class="mt-10 grid gap-8
                                   sm:grid-cols-2"
                        >

                            <div>

                                <p
                                    class="text-[9px] font-bold
                                           uppercase tracking-[0.2em]
                                           text-[#E25F12]"
                                >
                                    Notre mission
                                </p>

                                <p
                                    class="mt-3 text-xs leading-6
                                           text-[#756960]"
                                >
                                    Rendre les saveurs ivoiriennes
                                    plus accessibles grâce à une
                                    expérience de commande moderne
                                    et intuitive.
                                </p>

                            </div>


                            <div>

                                <p
                                    class="text-[9px] font-bold
                                           uppercase tracking-[0.2em]
                                           text-[#E25F12]"
                                >
                                    Notre vision
                                </p>

                                <p
                                    class="mt-3 text-xs leading-6
                                           text-[#756960]"
                                >
                                    Faire de la cuisine ivoirienne
                                    une expérience aussi mémorable
                                    en ligne qu'à table.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             STORY VISUELLE
        ========================================================== --}}
        <section class="bg-[#FCFAF7] py-20 sm:py-24 lg:py-32">

            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="grid items-center gap-14
                           lg:grid-cols-[1.1fr_0.9fr]
                           lg:gap-24"
                >

                    {{-- IMAGE --}}
                    <div class="relative">

                        <div
                            class="absolute -left-6 -top-6
                                   h-28 w-28 rounded-full
                                   bg-[#F4C451]/15 blur-2xl"
                        ></div>

                        <div
                            class="relative overflow-hidden
                                   rounded-[2rem]"
                        >

                            <img
                                src="{{ asset('images/riz_poulet.png') }}"
                                alt="Cuisine FON-KPA"
                                class="aspect-[1.05/1] w-full
                                       object-cover
                                       transition duration-700
                                       hover:scale-[1.02]"
                            >

                        </div>


                        {{-- Citation --}}
                        <div
                            class="absolute -bottom-6 left-5
                                   max-w-[260px]
                                   rounded-2xl border
                                   border-[#E8DDD4]
                                   bg-white px-5 py-4
                                   shadow-xl sm:left-8"
                        >

                            <div
                                class="flex items-start gap-3"
                            >

                                <i
                                    class="bi bi-quote
                                           text-xl text-[#E25F12]"
                                ></i>

                                <p
                                    class="text-[10px]
                                           font-semibold leading-5
                                           text-[#593114]"
                                >
                                    Une cuisine qui nous ressemble
                                    et qui nous rassemble.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- TEXTE --}}
                    <div class="max-w-[570px]">

                        <div class="flex items-center gap-3">

                            <span
                                class="h-px w-7 bg-[#E25F12]"
                            ></span>

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.25em]
                                       text-[#E25F12]"
                            >
                                Plus qu'un repas
                            </span>

                        </div>


                        <h2
                            class="mt-5 text-3xl font-black
                                   leading-[1.05]
                                   tracking-[-0.045em]
                                   text-[#3B200F]
                                   sm:text-5xl"
                        >
                            Préserver le goût.
                            <br>
                            <span class="text-[#E25F12]">
                                Réinventer l'expérience.
                            </span>
                        </h2>


                        <p
                            class="mt-7 text-sm leading-7
                                   text-[#756960]"
                        >
                            FON-KPA s'inspire de cette cuisine
                            généreuse que nous connaissons tous :
                            celle qui ne cherche pas à impressionner,
                            mais qui sait immédiatement faire plaisir.
                        </p>


                        <p
                            class="mt-4 text-sm leading-7
                                   text-[#756960]"
                        >
                            Notre approche consiste à conserver
                            l'essentiel — les goûts, les recettes,
                            la générosité — tout en simplifiant
                            la manière de découvrir et de commander
                            ses plats préférés.
                        </p>


                        <div
                            class="mt-9 h-px w-full
                                   bg-[#E8DDD4]"
                        ></div>


                        <div
                            class="mt-7 flex items-center gap-8"
                        >

                            <div>

                                <p
                                    class="text-2xl font-black
                                           tracking-tight
                                           text-[#593114]"
                                >
                                    01
                                </p>

                                <p
                                    class="mt-1 text-[9px]
                                           uppercase tracking-[0.15em]
                                           text-[#9A8B81]"
                                >
                                    Authenticité
                                </p>

                            </div>


                            <div
                                class="h-10 w-px bg-[#E8DDD4]"
                            ></div>


                            <div>

                                <p
                                    class="text-2xl font-black
                                           tracking-tight
                                           text-[#593114]"
                                >
                                    02
                                </p>

                                <p
                                    class="mt-1 text-[9px]
                                           uppercase tracking-[0.15em]
                                           text-[#9A8B81]"
                                >
                                    Simplicité
                                </p>

                            </div>


                            <div
                                class="h-10 w-px bg-[#E8DDD4]"
                            ></div>


                            <div>

                                <p
                                    class="text-2xl font-black
                                           tracking-tight
                                           text-[#593114]"
                                >
                                    03
                                </p>

                                <p
                                    class="mt-1 text-[9px]
                                           uppercase tracking-[0.15em]
                                           text-[#9A8B81]"
                                >
                                    Partage
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             NOS VALEURS
        ========================================================== --}}
        <section class="bg-white py-20 sm:py-24 lg:py-32">

            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                {{-- Header --}}
                <div
                    class="grid gap-8
                           lg:grid-cols-[0.7fr_1.3fr]
                           lg:gap-20"
                >

                    <div>

                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.25em]
                                   text-[#E25F12]"
                        >
                            Nos valeurs
                        </span>

                        <h2
                            class="mt-3 text-3xl font-black
                                   tracking-[-0.04em]
                                   text-[#3B200F]
                                   sm:text-4xl"
                        >
                            Ce qui guide
                            <br>
                            FON-KPA.
                        </h2>

                    </div>


                    <p
                        class="max-w-[620px] self-end
                               text-sm leading-7
                               text-[#756960]"
                    >
                        Chaque décision que nous prenons revient
                        à une même question : comment proposer
                        une expérience qui respecte notre cuisine,
                        nos clients et notre identité ?
                    </p>

                </div>


                {{-- Valeurs --}}
                <div
                    class="mt-16 divide-y divide-[#EDE5DE]
                           border-y border-[#EDE5DE]"
                >

                    {{-- 01 --}}
                    <div
                        class="group grid gap-6 py-8
                               transition-all duration-300
                               lg:grid-cols-[100px_1fr_1fr]
                               lg:items-center"
                    >

                        <span
                            class="text-xs font-black
                                   text-[#D8C7BA]"
                        >
                            01
                        </span>

                        <h3
                            class="text-xl font-black
                                   tracking-tight
                                   text-[#593114]
                                   sm:text-2xl"
                        >
                            Authenticité
                        </h3>

                        <p
                            class="max-w-[480px]
                                   text-xs leading-6
                                   text-[#887A70]"
                        >
                            Des recettes inspirées de notre
                            patrimoine culinaire et de ces
                            saveurs qui font partie de notre
                            quotidien.
                        </p>

                    </div>


                    {{-- 02 --}}
                    <div
                        class="group grid gap-6 py-8
                               transition-all duration-300
                               lg:grid-cols-[100px_1fr_1fr]
                               lg:items-center"
                    >

                        <span
                            class="text-xs font-black
                                   text-[#D8C7BA]"
                        >
                            02
                        </span>

                        <h3
                            class="text-xl font-black
                                   tracking-tight
                                   text-[#593114]
                                   sm:text-2xl"
                        >
                            Qualité
                        </h3>

                        <p
                            class="max-w-[480px]
                                   text-xs leading-6
                                   text-[#887A70]"
                        >
                            Nous accordons de l'importance
                            aux produits, aux préparations et
                            à chaque détail qui compose votre
                            expérience.
                        </p>

                    </div>


                    {{-- 03 --}}
                    <div
                        class="group grid gap-6 py-8
                               transition-all duration-300
                               lg:grid-cols-[100px_1fr_1fr]
                               lg:items-center"
                    >

                        <span
                            class="text-xs font-black
                                   text-[#D8C7BA]"
                        >
                            03
                        </span>

                        <h3
                            class="text-xl font-black
                                   tracking-tight
                                   text-[#593114]
                                   sm:text-2xl"
                        >
                            Générosité
                        </h3>

                        <p
                            class="max-w-[480px]
                                   text-xs leading-6
                                   text-[#887A70]"
                        >
                            Parce qu'une bonne cuisine ne se
                            limite jamais à ce qu'il y a dans
                            l'assiette. Elle se partage.
                        </p>

                    </div>


                    {{-- 04 --}}
                    <div
                        class="group grid gap-6 py-8
                               transition-all duration-300
                               lg:grid-cols-[100px_1fr_1fr]
                               lg:items-center"
                    >

                        <span
                            class="text-xs font-black
                                   text-[#D8C7BA]"
                        >
                            04
                        </span>

                        <h3
                            class="text-xl font-black
                                   tracking-tight
                                   text-[#593114]
                                   sm:text-2xl"
                        >
                            Simplicité
                        </h3>

                        <p
                            class="max-w-[480px]
                                   text-xs leading-6
                                   text-[#887A70]"
                        >
                            Commander un plat que l'on aime
                            devrait être aussi simple que
                            prendre place autour d'une table.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             IMAGE IMMERSIVE
        ========================================================== --}}
        <section class="relative">

            <div
                class="relative h-[520px] overflow-hidden
                       sm:h-[620px] lg:h-[700px]"
            >

                <img
                    src="{{ asset('images/Hero2.jpg') }}"
                    alt="Cuisine ivoirienne FON-KPA"
                    class="absolute inset-0 h-full w-full
                           object-cover"
                >


                {{-- Overlay --}}
                <div
                    class="absolute inset-0
                           bg-[#2B1609]/45"
                ></div>

                <div
                    class="absolute inset-0
                           bg-gradient-to-t
                           from-[#2B1609]/80
                           via-[#2B1609]/10
                           to-transparent"
                ></div>


                {{-- Texte --}}
                <div
                    class="relative z-10 flex h-full
                           items-end"
                >

                    <div
                        class="mx-auto w-full max-w-[1720px]
                               px-[clamp(2rem,7vw,7.5rem)]
                               pb-12 sm:pb-16 lg:pb-20"
                    >

                        <div class="max-w-[760px]">

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.25em]
                                       text-[#F4C451]"
                            >
                                L'esprit FON-KPA
                            </span>

                            <h2
                                class="mt-4 text-3xl font-black
                                       leading-[1]
                                       tracking-[-0.05em]
                                       text-white
                                       sm:text-5xl
                                       lg:text-6xl"
                            >
                                Une table peut nourrir
                                le corps.

                                <span class="text-[#F4C451]">
                                    La cuisine nourrit aussi
                                    les souvenirs.
                                </span>
                            </h2>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             NOTRE PROMESSE
        ========================================================== --}}
        <section class="bg-[#FCFAF7] py-20 sm:py-24 lg:py-32">

            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="mx-auto max-w-[900px] text-center"
                >

                    <span
                        class="text-[9px] font-bold uppercase
                               tracking-[0.25em]
                               text-[#E25F12]"
                    >
                        Notre promesse
                    </span>


                    <h2
                        class="mt-4 text-3xl font-black
                               leading-[1.05]
                               tracking-[-0.045em]
                               text-[#3B200F]
                               sm:text-5xl"
                    >
                        Vous faire retrouver
                        <span class="text-[#E25F12]">
                            le goût du vrai.
                        </span>
                    </h2>


                    <p
                        class="mx-auto mt-6 max-w-[650px]
                               text-sm leading-7
                               text-[#756960]"
                    >
                        Derrière chaque commande, il y a une
                        volonté simple : proposer une cuisine
                        qui reste fidèle à ses racines tout en
                        s'intégrant naturellement dans votre
                        quotidien.
                    </p>


                    {{-- Signature --}}
                    <div
                        class="mt-10 flex items-center
                               justify-center gap-4"
                    >

                        <span
                            class="h-px w-12 bg-[#DCCDC1]"
                        ></span>

                        <span
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.25em]
                                   text-[#593114]"
                        >
                            FON-KPA
                        </span>

                        <span
                            class="h-px w-12 bg-[#DCCDC1]"
                        ></span>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             CTA FINAL
        ========================================================== --}}
        <section class="bg-white py-16 sm:py-20">

            <div
                class="mx-auto w-full max-w-[1720px]
                       px-[clamp(2rem,7vw,7.5rem)]"
            >

                <div
                    class="relative overflow-hidden
                           rounded-[2rem] bg-[#593114]"
                >

                    {{-- Décors --}}
                    <div
                        class="absolute -right-20 -top-20
                               h-64 w-64 rounded-full
                               border border-white/10"
                    ></div>

                    <div
                        class="absolute -bottom-24 -left-20
                               h-72 w-72 rounded-full
                               bg-[#E25F12]/20 blur-3xl"
                    ></div>


                    <div
                        class="relative grid items-center
                               gap-10 px-7 py-14
                               sm:px-12 sm:py-16
                               lg:grid-cols-[1fr_auto]
                               lg:px-16"
                    >

                        <div class="max-w-[650px]">

                            <span
                                class="text-[9px] font-bold uppercase
                                       tracking-[0.25em]
                                       text-[#F4C451]"
                            >
                                À vous de goûter
                            </span>


                            <h2
                                class="mt-4 text-3xl font-black
                                       leading-[1.05]
                                       tracking-[-0.045em]
                                       text-white
                                       sm:text-4xl"
                            >
                                Découvrez les saveurs
                                qui font l'identité
                                de FON-KPA.
                            </h2>


                            <p
                                class="mt-5 max-w-[540px]
                                       text-xs leading-6
                                       text-white/65
                                       sm:text-sm"
                            >
                                Parcourez notre menu et découvrez
                                une sélection de plats inspirés
                                de la richesse de la cuisine
                                ivoirienne.
                            </p>

                        </div>


                        <a
                            href="{{ route('plats.index') }}"
                            class="inline-flex h-12 items-center
                                   justify-center gap-2
                                   rounded-full bg-white
                                   px-7 text-[10px]
                                   font-bold text-[#593114]
                                   transition-all duration-300
                                   hover:-translate-y-0.5
                                   hover:bg-[#F4C451]"
                        >
                            Découvrir le menu

                            <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>