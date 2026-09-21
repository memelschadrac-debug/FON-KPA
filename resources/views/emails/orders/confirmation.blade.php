<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Confirmation de commande {{ $order->order_number }}
    </title>
</head>


<body
    style="
        margin:0;
        padding:0;
        background:#F5F1ED;
        font-family:Arial, Helvetica, sans-serif;
        color:#2F1608;
        -webkit-font-smoothing:antialiased;
    "
>

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    role="presentation"
    style="
        width:100%;
        background:#F5F1ED;
        padding:36px 15px;
    "
>

<tr>
<td align="center">


    {{-- =========================================================
         CONTAINER PRINCIPAL
    ========================================================== --}}

    <table
        width="620"
        cellpadding="0"
        cellspacing="0"
        border="0"
        role="presentation"
        style="
            width:100%;
            max-width:620px;
            background:#FFFFFF;
            border-radius:20px;
            overflow:hidden;
        "
    >


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <tr>

            <td
                style="
                    background:#593114;
                    padding:30px;
                "
            >

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                >

                    <tr>

                        <td>

                            <div
                                style="
                                    color:#FFFFFF;
                                    font-size:25px;
                                    line-height:30px;
                                    font-weight:800;
                                    letter-spacing:1px;
                                "
                            >
                                FON-KPA
                            </div>

                            <div
                                style="
                                    margin-top:7px;
                                    color:#EADDD4;
                                    font-size:12px;
                                    line-height:18px;
                                "
                            >
                                La cuisine ivoirienne, directement chez vous.
                            </div>

                        </td>


                        <td
                            align="right"
                            valign="middle"
                        >

                            <div
                                style="
                                    display:inline-block;
                                    padding:7px 11px;
                                    border:1px solid rgba(255,255,255,0.22);
                                    border-radius:30px;
                                    color:#F8EDE5;
                                    font-size:10px;
                                    font-weight:bold;
                                    letter-spacing:.5px;
                                "
                            >
                                COMMANDE CONFIRMÉE
                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <tr>

            <td
                align="center"
                style="
                    padding:40px 30px 30px;
                "
            >

                <div
                    style="
                        width:58px;
                        height:58px;
                        line-height:58px;
                        margin:0 auto 20px;
                        border-radius:50%;
                        background:#EAF7EE;
                        color:#22A447;
                        font-size:27px;
                        font-weight:bold;
                    "
                >
                    ✓
                </div>


                <div
                    style="
                        font-size:26px;
                        line-height:34px;
                        font-weight:800;
                        color:#2F1608;
                    "
                >
                    Merci pour votre commande !
                </div>


                <div
                    style="
                        margin-top:11px;
                        font-size:14px;
                        line-height:23px;
                        color:#756B65;
                    "
                >

                    Bonjour {{ $order->user->name }},

                    <br>

                    votre commande a bien été enregistrée.

                    <br>

                    Nous préparons votre repas avec soin.

                </div>

            </td>

        </tr>


        {{-- =====================================================
             INFORMATIONS COMMANDE
        ====================================================== --}}

        <tr>

            <td
                style="
                    padding:0 30px 25px;
                "
            >

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        background:#FAF7F4;
                        border:1px solid #EEE5DE;
                        border-radius:15px;
                    "
                >

                    <tr>

                        <td
                            style="
                                padding:19px 20px;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    line-height:13px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1.2px;
                                    font-weight:bold;
                                "
                            >
                                Numéro de commande
                            </div>


                            <div
                                style="
                                    margin-top:6px;
                                    font-size:21px;
                                    line-height:27px;
                                    font-weight:800;
                                    color:#593114;
                                "
                            >
                                #{{ $order->order_number }}
                            </div>

                        </td>


                        <td
                            align="right"
                            valign="middle"
                            style="
                                padding:19px 20px;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    line-height:13px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                "
                            >
                                Statut
                            </div>


                            <div
                                style="
                                    display:inline-block;
                                    margin-top:6px;
                                    padding:6px 11px;
                                    border-radius:20px;
                                    background:#FFF1E8;
                                    color:#B84A0A;
                                    font-size:10px;
                                    font-weight:bold;
                                "
                            >
                                {{ ucfirst($order->status) }}
                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>


        {{-- =====================================================
             RÉSUMÉ
        ====================================================== --}}

        <tr>

            <td
                style="
                    padding:0 30px 28px;
                "
            >

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                >

                    <tr>

                        <td
                            width="50%"
                            style="
                                padding-right:8px;
                                vertical-align:top;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                "
                            >
                                Date
                            </div>

                            <div
                                style="
                                    margin-top:6px;
                                    font-size:13px;
                                    font-weight:bold;
                                    color:#593114;
                                "
                            >
                                {{ $order->created_at->format('d/m/Y à H:i') }}
                            </div>

                        </td>


                        <td
                            width="50%"
                            style="
                                padding-left:8px;
                                vertical-align:top;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                "
                            >
                                Livraison
                            </div>

                            <div
                                style="
                                    margin-top:6px;
                                    font-size:13px;
                                    font-weight:bold;
                                    color:#593114;
                                "
                            >
                                {{ $order->delivery_method === 'delivery'
                                    ? 'À domicile'
                                    : 'Retrait sur place' }}
                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>


        {{-- =====================================================
             TITRE PRODUITS
        ====================================================== --}}

        <tr>

            <td
                style="
                    padding:0 30px 16px;
                "
            >

                <div
                    style="
                        font-size:20px;
                        line-height:26px;
                        font-weight:800;
                        color:#2F1608;
                    "
                >
                    Votre sélection
                </div>

                <div
                    style="
                        margin-top:5px;
                        font-size:12px;
                        line-height:18px;
                        color:#918780;
                    "
                >
                    Retrouvez vos plats et les personnalisations choisies.
                </div>

            </td>

        </tr>


        {{-- =====================================================
             PRODUITS + OPTIONS
        ====================================================== --}}

        @foreach($order->items as $item)

        <tr>

            <td
                style="
                    padding:0 30px 14px;
                "
            >

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        border:1px solid #EDE3DC;
                        border-radius:16px;
                        background:#FFFFFF;
                    "
                >

                    <tr>


                        {{-- =========================================
                             IMAGE
                        ========================================== --}}

                        <td
                            width="92"
                            style="
                                width:92px;
                                padding:12px;
                                vertical-align:top;
                            "
                        >

                            @php

                                $productImage = $item->product->images
                                    ->where('is_primary', true)
                                    ->sortBy('sort_order')
                                    ->first()
                                    ?? $item->product->images
                                        ->sortBy('sort_order')
                                        ->first();

                            @endphp


                            @if($productImage?->media?->path)

                                <img
                                    src="{{ $productImage->media->path }}"
                                    alt="{{ $item->product->name }}"
                                    width="80"
                                    height="80"
                                    style="
                                        display:block;
                                        width:80px;
                                        height:80px;
                                        border-radius:13px;
                                        object-fit:cover;
                                        border:1px solid #EEE5DE;
                                    "
                                >

                            @else

                                <div
                                    style="
                                        width:80px;
                                        height:80px;
                                        line-height:80px;
                                        text-align:center;
                                        background:#FAF5F1;
                                        border-radius:13px;
                                        font-size:24px;
                                    "
                                >
                                    🍽️
                                </div>

                            @endif

                        </td>


                        {{-- =========================================
                             PRODUIT
                        ========================================== --}}

                        <td
                            style="
                                padding:14px 5px 14px 4px;
                                vertical-align:top;
                            "
                        >

                            <div
                                style="
                                    font-size:14px;
                                    line-height:20px;
                                    font-weight:800;
                                    color:#593114;
                                "
                            >
                                {{ $item->product->name }}
                            </div>


                            <div
                                style="
                                    margin-top:6px;
                                    font-size:11px;
                                    line-height:17px;
                                    color:#918780;
                                "
                            >
                                Quantité :
                                <strong style="color:#593114;">
                                    {{ $item->quantity }}
                                </strong>
                            </div>


                            <div
                                style="
                                    margin-top:2px;
                                    font-size:11px;
                                    line-height:17px;
                                    color:#918780;
                                "
                            >
                                {{ number_format($item->unit_price, 0, ',', ' ') }}
                                FCFA / unité
                            </div>


                            {{-- =====================================
                                 PERSONNALISATIONS
                            ====================================== --}}

                            @if($item->options->isNotEmpty())

                                <div
                                    style="
                                        margin-top:13px;
                                        padding-top:11px;
                                        border-top:1px solid #F0EAE5;
                                    "
                                >

                                    <div
                                        style="
                                            margin-bottom:8px;
                                            font-size:9px;
                                            line-height:13px;
                                            color:#918780;
                                            text-transform:uppercase;
                                            letter-spacing:1px;
                                            font-weight:bold;
                                        "
                                    >
                                        Vos personnalisations
                                    </div>


                                    @foreach($item->options as $itemOption)

                                        <table
                                            width="100%"
                                            cellpadding="0"
                                            cellspacing="0"
                                            border="0"
                                            role="presentation"
                                            style="
                                                margin-bottom:7px;
                                            "
                                        >

                                            <tr>

                                                <td
                                                    style="
                                                        width:7px;
                                                        vertical-align:top;
                                                        padding-top:5px;
                                                    "
                                                >

                                                    <span
                                                        style="
                                                            display:block;
                                                            width:5px;
                                                            height:5px;
                                                            border-radius:50%;
                                                            background:#E25F12;
                                                        "
                                                    ></span>

                                                </td>


                                                <td
                                                    style="
                                                        padding-left:7px;
                                                        vertical-align:top;
                                                    "
                                                >

                                                    {{-- Groupe d'option --}}

                                                    <div
                                                        style="
                                                            font-size:10px;
                                                            line-height:15px;
                                                            color:#918780;
                                                        "
                                                    >
                                                        {{ $itemOption->group_name }}
                                                    </div>


                                                    {{-- Choix --}}

                                                    <div
                                                        style="
                                                            margin-top:1px;
                                                            font-size:11px;
                                                            line-height:17px;
                                                            font-weight:bold;
                                                            color:#593114;
                                                        "
                                                    >
                                                        {{ $itemOption->choice_name }}

                                                        @if((int) $itemOption->price_modifier !== 0)

                                                            <span
                                                                style="
                                                                    color:#B84A0A;
                                                                    font-weight:bold;
                                                                "
                                                            >

                                                                @if($itemOption->price_modifier > 0)
                                                                    +{{ number_format($itemOption->price_modifier, 0, ',', ' ') }}
                                                                @else
                                                                    {{ number_format($itemOption->price_modifier, 0, ',', ' ') }}
                                                                @endif

                                                                FCFA

                                                            </span>

                                                        @endif

                                                    </div>

                                                </td>

                                            </tr>

                                        </table>

                                    @endforeach

                                </div>

                            @endif

                        </td>


                        {{-- =========================================
                             SOUS-TOTAL
                        ========================================== --}}

                        <td
                            width="115"
                            style="
                                width:115px;
                                padding:14px;
                                text-align:right;
                                vertical-align:top;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    line-height:13px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:.7px;
                                "
                            >
                                Sous-total
                            </div>


                            <div
                                style="
                                    margin-top:6px;
                                    font-size:14px;
                                    line-height:20px;
                                    font-weight:800;
                                    color:#B84A0A;
                                "
                            >
                                {{ number_format($item->subtotal, 0, ',', ' ') }}
                                FCFA
                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>

        @endforeach


        {{-- =====================================================
             TOTAL
        ====================================================== --}}

        <tr>

            <td
                style="
                    padding:10px 30px 30px;
                "
            >

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        background:#593114;
                        border-radius:16px;
                    "
                >

                    <tr>

                        <td
                            style="
                                padding:21px;
                                color:#F4E9E1;
                                font-size:13px;
                                line-height:19px;
                                font-weight:bold;
                            "
                        >
                            Total de la commande
                        </td>


                        <td
                            align="right"
                            style="
                                padding:21px;
                                color:#FFFFFF;
                                font-size:22px;
                                line-height:27px;
                                font-weight:800;
                            "
                        >
                            {{ number_format($order->total, 0, ',', ' ') }}
                            FCFA
                        </td>

                    </tr>

                </table>

            </td>

        </tr>


        {{-- =====================================================
             LIVRAISON
        ====================================================== --}}

        <tr>

            <td
                style="
                    padding:0 30px 28px;
                "
            >

                <div
                    style="
                        font-size:19px;
                        line-height:25px;
                        font-weight:800;
                        color:#2F1608;
                        margin-bottom:13px;
                    "
                >
                    Livraison
                </div>


                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        border:1px solid #EDE3DC;
                        border-radius:15px;
                        background:#FAF9F7;
                    "
                >

                    <tr>

                        <td
                            style="
                                padding:18px;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    line-height:13px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                "
                            >
                                Mode de livraison
                            </div>


                            <div
                                style="
                                    margin-top:6px;
                                    font-size:13px;
                                    line-height:19px;
                                    font-weight:bold;
                                    color:#593114;
                                "
                            >
                                {{ $order->delivery_method === 'delivery'
                                    ? 'Livraison à domicile'
                                    : 'Retrait sur place' }}
                            </div>


                            <div
                                style="
                                    margin-top:15px;
                                    padding-top:14px;
                                    border-top:1px solid #EEE5DE;
                                "
                            >

                                <div
                                    style="
                                        font-size:9px;
                                        line-height:13px;
                                        color:#918780;
                                        text-transform:uppercase;
                                        letter-spacing:1px;
                                    "
                                >
                                    Localisation
                                </div>


                                <div
                                    style="
                                        margin-top:6px;
                                        font-size:13px;
                                        line-height:19px;
                                        font-weight:bold;
                                        color:#593114;
                                    "
                                >
                                    {{ $order->city }}
                                    —
                                    {{ $order->commune }}
                                </div>

                            </div>


                            @if($order->delivery_address)

                                <div
                                    style="
                                        margin-top:15px;
                                        padding-top:14px;
                                        border-top:1px solid #EEE5DE;
                                    "
                                >

                                    <div
                                        style="
                                            font-size:9px;
                                            line-height:13px;
                                            color:#918780;
                                            text-transform:uppercase;
                                            letter-spacing:1px;
                                        "
                                    >
                                        Adresse
                                    </div>


                                    <div
                                        style="
                                            margin-top:6px;
                                            font-size:13px;
                                            line-height:20px;
                                            color:#593114;
                                        "
                                    >
                                        {{ $order->delivery_address }}
                                    </div>

                                </div>

                            @endif


                            <div
                                style="
                                    margin-top:15px;
                                    padding-top:14px;
                                    border-top:1px solid #EEE5DE;
                                "
                            >

                                <div
                                    style="
                                        font-size:9px;
                                        line-height:13px;
                                        color:#918780;
                                        text-transform:uppercase;
                                        letter-spacing:1px;
                                    "
                                >
                                    Téléphone
                                </div>


                                <div
                                    style="
                                        margin-top:6px;
                                        font-size:13px;
                                        line-height:19px;
                                        font-weight:bold;
                                        color:#593114;
                                    "
                                >
                                    {{ $order->phone }}
                                </div>

                            </div>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>


        {{-- =====================================================
             BOUTON
        ====================================================== --}}

        <tr>

            <td
                align="center"
                style="
                    padding:0 30px 34px;
                "
            >

                <a
                    href="{{ route('commande.success', $order) }}"
                    style="
                        display:inline-block;
                        background:#E25F12;
                        color:#FFFFFF;
                        text-decoration:none;
                        padding:14px 30px;
                        border-radius:11px;
                        font-size:13px;
                        line-height:18px;
                        font-weight:bold;
                    "
                >
                    Voir ma commande
                </a>


                <div
                    style="
                        margin-top:12px;
                        font-size:10px;
                        line-height:16px;
                        color:#918780;
                    "
                >
                    Retrouvez tous les détails de votre commande depuis votre espace FON-KPA.
                </div>

            </td>

        </tr>


        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <tr>

            <td
                align="center"
                style="
                    background:#FAF7F4;
                    border-top:1px solid #EEE5DE;
                    padding:25px;
                "
            >

                <div
                    style="
                        font-size:14px;
                        line-height:19px;
                        font-weight:800;
                        color:#593114;
                    "
                >
                    FON-KPA
                </div>


                <div
                    style="
                        margin-top:7px;
                        font-size:11px;
                        line-height:18px;
                        color:#918780;
                    "
                >
                    Merci pour votre confiance ❤️

                    <br>

                    La cuisine ivoirienne, directement chez vous.
                </div>


                <div
                    style="
                        margin-top:13px;
                        font-size:9px;
                        line-height:15px;
                        color:#B0A49D;
                    "
                >
                    © {{ date('Y') }} FON-KPA — Tous droits réservés.
                </div>

            </td>

        </tr>


    </table>

</td>
</tr>

</table>

</body>

</html>