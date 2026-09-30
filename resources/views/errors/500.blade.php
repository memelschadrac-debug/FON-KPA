<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>500 — FON-KPA</title>

    <meta
        name="description"
        content="Une erreur est survenue sur FON-KPA. Veuillez réessayer dans quelques instants."
    >

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/lokmr.png') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


{{-- Primaire : #593114 (marron) — Secondaire : #E25F12 (orange) --}}
<body class="bg-white text-[#593114] antialiased">

    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-6">


        {{-- =========================================================
             PRISE (GAUCHE) — fiche mâle + câble
        ========================================================== --}}

        <svg
            aria-hidden="true"
            viewBox="0 0 380 300"
            fill="none"
            class="pointer-events-none absolute left-0 top-1/2 hidden w-[clamp(220px,30vw,440px)] -translate-y-[62%] md:block"
        >
            {{-- Câble --}}
            <path
                d="M0 168 C 34 150, 52 268, 122 262 C 176 257, 150 196, 170 150"
                stroke="#DCCFC5"
                stroke-width="5"
                stroke-linecap="round"
            />

            <g transform="translate(138 52) rotate(-14 60 70)">

                {{-- Corps orange --}}
                <ellipse cx="34" cy="70" rx="34" ry="56" fill="#E25F12"/>
                <rect x="34" y="14" width="44" height="112" fill="#E25F12"/>

                {{-- Face --}}
                <ellipse cx="78" cy="70" rx="34" ry="56" fill="#FFFFFF" stroke="#DCCFC5" stroke-width="3"/>
                <ellipse cx="78" cy="70" rx="24" ry="42" fill="#FFFFFF" stroke="#EFE6DE" stroke-width="2"/>

                {{-- Broches --}}
                <rect x="84" y="46" width="62" height="11" rx="5.5" fill="#EADFD5" stroke="#DCCFC5" stroke-width="2"/>
                <rect x="84" y="82" width="62" height="11" rx="5.5" fill="#EADFD5" stroke="#DCCFC5" stroke-width="2"/>

            </g>
        </svg>


        {{-- =========================================================
             PRISE (DROITE) — socle femelle + câble
        ========================================================== --}}

        <svg
            aria-hidden="true"
            viewBox="0 0 380 300"
            fill="none"
            class="pointer-events-none absolute right-0 top-1/2 hidden w-[clamp(220px,30vw,440px)] -translate-y-[66%] md:block"
        >
            {{-- Câble --}}
            <path
                d="M150 128 C 200 132, 214 84, 262 98 C 306 110, 322 48, 380 78"
                stroke="#DCCFC5"
                stroke-width="5"
                stroke-linecap="round"
            />

            <g transform="translate(24 40) rotate(8 60 70)">

                {{-- Corps orange --}}
                <ellipse cx="86" cy="70" rx="34" ry="56" fill="#E25F12"/>
                <rect x="44" y="14" width="42" height="112" fill="#E25F12"/>

                {{-- Face --}}
                <ellipse cx="44" cy="70" rx="34" ry="56" fill="#FFFFFF" stroke="#DCCFC5" stroke-width="3"/>
                <ellipse cx="44" cy="70" rx="24" ry="42" fill="#FFFFFF" stroke="#EFE6DE" stroke-width="2"/>

                {{-- Orifice --}}
                <ellipse cx="42" cy="70" rx="14" ry="26" fill="#DCCFC5"/>

            </g>
        </svg>


        {{-- =========================================================
             CONTENU CENTRAL
        ========================================================== --}}

        <section class="relative z-10 flex max-w-md flex-col items-center text-center">

            <p
                class="text-[clamp(6rem,15vw,10rem)] font-extrabold leading-[0.9] tracking-[-0.04em] text-[#593114]"
            >
                500
            </p>

            <h2
                class="mt-5 text-[clamp(1.75rem,3.2vw,2.5rem)] font-extrabold leading-tight tracking-[-0.02em] text-[#593114]"
            >
                La cuisine a <span class="text-[#E25F12]">un petit souci</span>
            </h2>

            <p class="mt-5 max-w-[22rem] text-[13px] leading-6 text-[#593114]/60">
                Une erreur est survenue de notre côté. Nos équipes
                s'en occupent. Réessayez dans quelques instants ou
                revenez à l'accueil.
            </p>

            <a
                href="{{ url('/') }}"
                class="mt-9 inline-flex h-11 items-center justify-center rounded-full bg-[#593114] px-7 text-xs font-semibold text-white transition-colors duration-200 hover:bg-[#45250F] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#E25F12]"
            >
                Retour à l'accueil
            </a>

        </section>

    </main>

</body>
</html>