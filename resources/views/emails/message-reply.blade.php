<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $replySubject }}</title>
</head>

<body
    style="
        margin:0;
        padding:0;
        background:#f4f2ef;
        font-family:Arial, Helvetica, sans-serif;
        color:#333333;
    "
>

    {{-- ========================================================= --}}
    {{-- CONTENEUR PRINCIPAL                                      --}}
    {{-- ========================================================= --}}
    <div
        style="
            width:100%;
            padding:40px 16px;
            box-sizing:border-box;
            background:#f4f2ef;
        "
    >

        <table
            role="presentation"
            cellpadding="0"
            cellspacing="0"
            border="0"
            width="100%"
            style="
                max-width:640px;
                margin:0 auto;
                background:#ffffff;
                border-radius:18px;
                overflow:hidden;
                box-shadow:0 8px 30px rgba(89,49,20,0.08);
            "
        >

            {{-- ================================================= --}}
            {{-- HEADER                                             --}}
            {{-- ================================================= --}}
            <tr>
                <td
                    style="
                        padding:30px 36px;
                        background:#593114;
                    "
                >

                    <table
                        role="presentation"
                        width="100%"
                        cellpadding="0"
                        cellspacing="0"
                        border="0"
                    >

                        <tr>

                            <td>

                                <div
                                    style="
                                        font-size:25px;
                                        font-weight:700;
                                        letter-spacing:-0.5px;
                                        color:#ffffff;
                                    "
                                >
                                    FON-KPA
                                </div>

                                <div
                                    style="
                                        margin-top:5px;
                                        font-size:12px;
                                        color:#eadfd7;
                                        letter-spacing:0.4px;
                                    "
                                >
                                    Saveurs authentiques · Côte d'Ivoire
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
                                        border:1px solid rgba(255,255,255,0.20);
                                        border-radius:20px;
                                        font-size:10px;
                                        font-weight:600;
                                        color:#ffffff;
                                        letter-spacing:0.5px;
                                    "
                                >
                                    SERVICE CLIENT
                                </div>

                            </td>

                        </tr>

                    </table>

                </td>
            </tr>


            {{-- ================================================= --}}
            {{-- CONTENU                                            --}}
            {{-- ================================================= --}}
            <tr>

                <td
                    style="
                        padding:38px 36px 34px;
                    "
                >

                    {{-- Sujet --}}
                    <div
                        style="
                            margin-bottom:30px;
                            padding-bottom:20px;
                            border-bottom:1px solid #eeeeee;
                        "
                    >

                        <div
                            style="
                                margin-bottom:8px;
                                font-size:10px;
                                font-weight:700;
                                color:#E25F12;
                                letter-spacing:1.2px;
                                text-transform:uppercase;
                            "
                        >
                            Réponse à votre demande
                        </div>

                        <div
                            style="
                                font-size:22px;
                                line-height:1.35;
                                font-weight:700;
                                color:#593114;
                            "
                        >
                            {{ $replySubject }}
                        </div>

                    </div>


                    {{-- Salutation --}}
                    <p
                        style="
                            margin:0 0 16px;
                            font-size:15px;
                            line-height:1.8;
                            color:#333333;
                        "
                    >
                        Bonjour <strong>{{ $customerMessage->name }}</strong>,
                    </p>


                    <p
                        style="
                            margin:0 0 24px;
                            font-size:15px;
                            line-height:1.8;
                            color:#555555;
                        "
                    >
                        Nous avons bien reçu votre message et nous revenons vers
                        vous avec les informations suivantes :
                    </p>


                    {{-- ================================================= --}}
                    {{-- BLOC RÉPONSE                                       --}}
                    {{-- ================================================= --}}
                    <table
                        role="presentation"
                        width="100%"
                        cellpadding="0"
                        cellspacing="0"
                        border="0"
                        style="
                            margin:26px 0;
                            background:#faf8f6;
                            border:1px solid #eee7e2;
                            border-radius:12px;
                        "
                    >

                        <tr>

                            <td
                                style="
                                    padding:22px 24px;
                                    border-left:4px solid #E25F12;
                                "
                            >

                                <div
                                    style="
                                        margin-bottom:10px;
                                        font-size:10px;
                                        font-weight:700;
                                        color:#593114;
                                        text-transform:uppercase;
                                        letter-spacing:1px;
                                    "
                                >
                                    Réponse de FON-KPA
                                </div>

                                <div
                                    style="
                                        font-size:15px;
                                        line-height:1.9;
                                        color:#444444;
                                    "
                                >
                                    {!! nl2br(e($replyBody)) !!}
                                </div>

                            </td>

                        </tr>

                    </table>


                    <p
                        style="
                            margin:24px 0 0;
                            font-size:15px;
                            line-height:1.8;
                            color:#555555;
                        "
                    >
                        Nous restons à votre disposition pour toute question
                        complémentaire ou pour vous accompagner dans votre commande.
                    </p>


                    {{-- ================================================= --}}
                    {{-- CTA                                                 --}}
                    {{-- ================================================= --}}
                    <table
                        role="presentation"
                        cellpadding="0"
                        cellspacing="0"
                        border="0"
                        style="margin:28px 0 6px;"
                    >

                        <tr>

                            <td
                                style="
                                    border-radius:9px;
                                    background:#593114;
                                "
                            >

                                <a
                                    href="mailto:{{ $customerMessage->email }}"
                                    style="
                                        display:inline-block;
                                        padding:12px 20px;
                                        font-size:12px;
                                        font-weight:700;
                                        color:#ffffff;
                                        text-decoration:none;
                                    "
                                >
                                    Répondre à FON-KPA
                                </a>

                            </td>

                        </tr>

                    </table>


                    {{-- Signature --}}
                    <div
                        style="
                            margin-top:34px;
                            padding-top:24px;
                            border-top:1px solid #eeeeee;
                        "
                    >

                        <p
                            style="
                                margin:0;
                                font-size:14px;
                                line-height:1.7;
                                color:#555555;
                            "
                        >
                            Cordialement,
                        </p>

                        <p
                            style="
                                margin:3px 0 0;
                                font-size:14px;
                                font-weight:700;
                                color:#593114;
                            "
                        >
                            L'équipe FON-KPA
                        </p>

                        <p
                            style="
                                margin:4px 0 0;
                                font-size:12px;
                                color:#999999;
                            "
                        >
                            Votre satisfaction, notre priorité.
                        </p>

                    </div>

                </td>

            </tr>


            {{-- ================================================= --}}
            {{-- FOOTER                                             --}}
            {{-- ================================================= --}}
            <tr>

                <td
                    style="
                        padding:24px 36px;
                        background:#faf9f7;
                        border-top:1px solid #eeeae6;
                    "
                >

                    <div
                        style="
                            font-size:11px;
                            line-height:1.7;
                            color:#999999;
                        "
                    >
                        Cet email vous a été envoyé par
                        <strong style="color:#593114;">
                            FON-KPA
                        </strong>
                        suite à votre demande de contact.
                    </div>

                    <div
                        style="
                            margin-top:8px;
                            font-size:10px;
                            color:#b2aaa4;
                        "
                    >
                        © {{ date('Y') }} FON-KPA · Côte d'Ivoire
                    </div>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>