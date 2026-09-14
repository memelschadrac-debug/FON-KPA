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
        background:#F6F3F0;
        font-family:Arial, Helvetica, sans-serif;
        color:#2F1608;
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
        background:#F6F3F0;
        padding:35px 15px;
    "
>

<tr>

<td align="center">


    {{-- ================================================= --}}
    {{-- CONTAINER PRINCIPAL                               --}}
    {{-- ================================================= --}}

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
            border-radius:18px;
            overflow:hidden;
        "
    >


        {{-- ============================================= --}}
        {{-- HEADER                                        --}}
        {{-- ============================================= --}}

        <tr>

            <td
                align="center"
                style="
                    background:#593114;
                    padding:28px 20px;
                "
            >

                <div
                    style="
                        color:#FFFFFF;
                        font-size:25px;
                        font-weight:800;
                        letter-spacing:1px;
                    "
                >
                    FON-KPA
                </div>

                <div
                    style="
                        margin-top:6px;
                        color:#EADDD4;
                        font-size:12px;
                    "
                >
                    La cuisine ivoirienne, directement chez vous.
                </div>

            </td>

        </tr>


        {{-- ============================================= --}}
        {{-- CONFIRMATION                                  --}}
        {{-- ============================================= --}}

        <tr>

            <td
                align="center"
                style="
                    padding:38px 30px 25px;
                "
            >

                <div
                    style="
                        width:58px;
                        height:58px;
                        line-height:58px;
                        margin:0 auto 18px;
                        border-radius:50%;
                        background:#22A447;
                        color:#FFFFFF;
                        font-size:30px;
                        font-weight:bold;
                    "
                >
                    ✓
                </div>


                <div
                    style="
                        font-size:25px;
                        line-height:32px;
                        font-weight:800;
                        color:#2F1608;
                    "
                >
                    Merci pour votre commande !
                </div>


                <div
                    style="
                        margin-top:10px;
                        font-size:14px;
                        line-height:22px;
                        color:#756B65;
                    "
                >
                    Bonjour {{ $order->user->name }},
                    <br>

                    votre commande a bien été enregistrée.
                    Merci pour votre confiance.
                </div>

            </td>

        </tr>


        {{-- ============================================= --}}
        {{-- INFORMATIONS COMMANDE                          --}}
        {{-- ============================================= --}}

        <tr>

            <td style="padding:0 30px 25px;">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        border:1px solid #EDE3DC;
                        border-radius:14px;
                    "
                >

                    <tr>

                        <td style="padding:20px;">

                            <div
                                style="
                                    font-size:10px;
                                    color:#918780;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                    font-weight:bold;
                                "
                            >
                                Numéro de commande
                            </div>


                            <div
                                style="
                                    margin-top:7px;
                                    font-size:21px;
                                    font-weight:800;
                                    color:#593114;
                                "
                            >
                                #{{ $order->order_number }}
                            </div>


                            <table
                                width="100%"
                                cellpadding="0"
                                cellspacing="0"
                                border="0"
                                role="presentation"
                                style="
                                    margin-top:16px;
                                    border-top:1px solid #F0EAE5;
                                "
                            >

                                <tr>

                                    <td
                                        width="50%"
                                        style="
                                            padding-top:15px;
                                            vertical-align:top;
                                        "
                                    >

                                        <div
                                            style="
                                                font-size:9px;
                                                color:#918780;
                                                text-transform:uppercase;
                                            "
                                        >
                                            Date
                                        </div>

                                        <div
                                            style="
                                                margin-top:5px;
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
                                            padding-top:15px;
                                            vertical-align:top;
                                        "
                                    >

                                        <div
                                            style="
                                                font-size:9px;
                                                color:#918780;
                                                text-transform:uppercase;
                                            "
                                        >
                                            Statut
                                        </div>

                                        <div
                                            style="
                                                display:inline-block;
                                                margin-top:5px;
                                                padding:5px 10px;
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

                </table>

            </td>

        </tr>


        {{-- ============================================= --}}
        {{-- TITRE PRODUITS                                --}}
        {{-- ============================================= --}}

        <tr>

            <td
                style="
                    padding:0 30px 15px;
                "
            >

                <div
                    style="
                        font-size:19px;
                        font-weight:800;
                        color:#2F1608;
                    "
                >
                    Vos plats
                </div>

                <div
                    style="
                        margin-top:4px;
                        font-size:12px;
                        color:#918780;
                    "
                >
                    Détail de votre commande
                </div>

            </td>

        </tr>


        {{-- ============================================= --}}
        {{-- PRODUITS                                     --}}
        {{-- ============================================= --}}

        @foreach($order->items as $item)

        <tr>

            <td style="padding:0 30px 12px;">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        border:1px solid #EDE3DC;
                        border-radius:14px;
                        background:#FFFFFF;
                    "
                >

                    <tr>


                        {{-- IMAGE --}}

                        <td
                            width="95"
                            style="
                                width:95px;
                                padding:12px;
                                vertical-align:middle;
                            "
                        >

                            @php
                                $productImage = $item->product->images
                                    ->where('is_primary', true)
                                    ->sortBy('sort_order')
                                    ->first()
                                    ?? $item->product->images->sortBy('sort_order')->first();
                            @endphp

                            @if($productImage?->media?->path)

                                <img
                                    src="{{ $productImage->media->path }}"
                                    alt="{{ $item->product->name }}"
                                    width="82"
                                    height="82"
                                    style="
                                        display:block;
                                        width:82px;
                                        height:82px;
                                        border-radius:12px;
                                        object-fit:cover;
                                        border:1px solid #EEE5DE;
                                    "
                                >

                            @else

                                <div
                                    style="
                                        width:82px;
                                        height:82px;
                                        line-height:82px;
                                        text-align:center;
                                        background:#FAF5F1;
                                        border-radius:12px;
                                        font-size:25px;
                                    "
                                >
                                    🍽️
                                </div>

                            @endif
                            
                        </td>


                        {{-- INFORMATIONS --}}

                        <td
                            style="
                                padding:12px 5px;
                                vertical-align:middle;
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
                                {{ $item->product->name }}
                            </div>


                            <div
                                style="
                                    margin-top:6px;
                                    font-size:11px;
                                    color:#918780;
                                "
                            >
                                Quantité :
                                <strong>
                                    {{ $item->quantity }}
                                </strong>
                            </div>


                            <div
                                style="
                                    margin-top:3px;
                                    font-size:11px;
                                    color:#918780;
                                "
                            >
                                {{ number_format($item->unit_price, 0, ',', ' ') }}
                                FCFA / unité
                            </div>

                        </td>


                        {{-- PRIX --}}

                        <td
                            width="125"
                            style="
                                width:125px;
                                padding:12px;
                                text-align:right;
                                vertical-align:middle;
                            "
                        >

                            <div
                                style="
                                    font-size:9px;
                                    color:#918780;
                                    text-transform:uppercase;
                                "
                            >
                                Sous-total
                            </div>

                            <div
                                style="
                                    margin-top:5px;
                                    font-size:14px;
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


        {{-- ============================================= --}}
        {{-- TOTAL                                        --}}
        {{-- ============================================= --}}

        <tr>

            <td style="padding:15px 30px 28px;">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        background:#593114;
                        border-radius:14px;
                    "
                >

                    <tr>

                        <td
                            style="
                                padding:20px;
                                color:#F4E9E1;
                                font-size:13px;
                                font-weight:bold;
                            "
                        >
                            Total de la commande
                        </td>

                        <td
                            style="
                                padding:20px;
                                text-align:right;
                                color:#FFFFFF;
                                font-size:22px;
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


        {{-- ============================================= --}}
        {{-- LIVRAISON                                    --}}
        {{-- ============================================= --}}

        <tr>

            <td style="padding:0 30px 25px;">

                <div
                    style="
                        font-size:19px;
                        font-weight:800;
                        color:#2F1608;
                        margin-bottom:14px;
                    "
                >
                    🚚 Livraison
                </div>


                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    role="presentation"
                    style="
                        border:1px solid #EDE3DC;
                        border-radius:14px;
                        background:#FAF9F7;
                    "
                >

                    <tr>

                        <td style="padding:18px;">

                            <div
                                style="
                                    font-size:9px;
                                    color:#918780;
                                    text-transform:uppercase;
                                "
                            >
                                Mode de livraison
                            </div>

                            <div
                                style="
                                    margin-top:5px;
                                    font-size:13px;
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
                                    padding-top:15px;
                                    border-top:1px solid #EEE5DE;
                                "
                            >

                                <div
                                    style="
                                        font-size:9px;
                                        color:#918780;
                                        text-transform:uppercase;
                                    "
                                >
                                    Localisation
                                </div>

                                <div
                                    style="
                                        margin-top:5px;
                                        font-size:13px;
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
                                    padding-top:15px;
                                    border-top:1px solid #EEE5DE;
                                "
                            >

                                <div
                                    style="
                                        font-size:9px;
                                        color:#918780;
                                        text-transform:uppercase;
                                    "
                                >
                                    Adresse
                                </div>

                                <div
                                    style="
                                        margin-top:5px;
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
                                    padding-top:15px;
                                    border-top:1px solid #EEE5DE;
                                "
                            >

                                <div
                                    style="
                                        font-size:9px;
                                        color:#918780;
                                        text-transform:uppercase;
                                    "
                                >
                                    Téléphone
                                </div>

                                <div
                                    style="
                                        margin-top:5px;
                                        font-size:13px;
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


        {{-- ============================================= --}}
        {{-- BOUTON                                       --}}
        {{-- ============================================= --}}

        <tr>

            <td
                align="center"
                style="
                    padding:5px 30px 30px;
                "
            >

                <a
                    href="{{ route('commande.success', $order) }}"
                    style="
                        display:inline-block;
                        background:#E25F12;
                        color:#FFFFFF;
                        text-decoration:none;
                        padding:14px 28px;
                        border-radius:10px;
                        font-size:13px;
                        font-weight:bold;
                    "
                >
                    Voir ma commande
                </a>

            </td>

        </tr>


        {{-- ============================================= --}}
        {{-- FOOTER                                        --}}
        {{-- ============================================= --}}

        <tr>

            <td
                align="center"
                style="
                    background:#FAF7F4;
                    border-top:1px solid #EEE5DE;
                    padding:24px 25px;
                "
            >

                <div
                    style="
                        font-size:13px;
                        font-weight:800;
                        color:#593114;
                    "
                >
                    FON-KPA
                </div>

                <div
                    style="
                        margin-top:6px;
                        font-size:11px;
                        line-height:18px;
                        color:#918780;
                    "
                >
                    Merci pour votre confiance ❤️
                    <br>
                    La cuisine ivoirienne, directement chez vous.
                </div>

            </td>

        </tr>


    </table>

</td>

</tr>

</table>

</body>

</html>