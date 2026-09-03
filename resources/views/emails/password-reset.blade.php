<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réinitialisation de votre mot de passe - FON-KPA</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f7f5f2; font-family: Arial, Helvetica, sans-serif; color: #333333;">

    <div style="width: 100%; padding: 40px 0;">

        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden;">

            {{-- En-tête --}}
            <div style="background-color: #593114; padding: 30px; text-align: center;">
                <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 700;">
                    FON-KPA
                </h1>

                <p style="margin: 8px 0 0; color: #f5e9df; font-size: 14px;">
                    La cuisine ivoirienne, avec passion.
                </p>
            </div>

            {{-- Contenu --}}
            <div style="padding: 40px 35px;">

                <h2 style="margin-top: 0; color: #593114; font-size: 24px;">
                    Réinitialisation de votre mot de passe
                </h2>

                <p style="font-size: 15px; line-height: 1.7;">
                    Bonjour,
                </p>

                <p style="font-size: 15px; line-height: 1.7;">
                    Vous avez demandé à réinitialiser le mot de passe
                    de votre compte <strong>FON-KPA</strong>.
                </p>

                <p style="font-size: 15px; line-height: 1.7;">
                    Cliquez sur le bouton ci-dessous pour choisir un nouveau
                    mot de passe :
                </p>

                {{-- Bouton --}}
                <div style="text-align: center; margin: 32px 0;">

                    <a href="{{ $url }}"
                       style="
                           display: inline-block;
                           background-color: #e25f12;
                           color: #ffffff;
                           text-decoration: none;
                           padding: 14px 28px;
                           border-radius: 7px;
                           font-size: 15px;
                           font-weight: 700;
                       ">
                        Réinitialiser mon mot de passe
                    </a>

                </div>

                <p style="font-size: 13px; line-height: 1.6; color: #666666;">
                    Pour votre sécurité, ce lien de réinitialisation est
                    temporaire. S'il expire, vous pourrez demander un
                    nouveau lien depuis la page « Mot de passe oublié ».
                </p>

                <p style="font-size: 13px; line-height: 1.6; color: #666666;">
                    Si vous n'êtes pas à l'origine de cette demande,
                    vous pouvez simplement ignorer cet e-mail.
                </p>

                {{-- Lien de secours --}}
                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eeeeee;">

                    <p style="font-size: 12px; color: #888888; line-height: 1.6;">
                        Si le bouton ne fonctionne pas, copiez et collez le
                        lien suivant dans votre navigateur :
                    </p>

                    <p style="font-size: 12px; word-break: break-all;">
                        <a href="{{ $url }}" style="color: #e25f12;">
                            {{ $url }}
                        </a>
                    </p>

                </div>

            </div>

            {{-- Pied de page --}}
            <div style="background-color: #f3f3f3; padding: 20px; text-align: center;">

                <p style="margin: 0; font-size: 12px; color: #777777;">
                    © {{ date('Y') }} FON-KPA. Tous droits réservés.
                </p>

            </div>

        </div>

    </div>

</body>
</html>