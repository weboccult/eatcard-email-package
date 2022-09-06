<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if gte mso 9]><xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap" rel="stylesheet">
    <meta name="format-detection" content="telephone=no"/>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }
        img {
            border: 0 !important;
            outline: none !important;
        }
        p {
            Margin: 0px !important;
            Padding: 0px !important;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0px;
            mso-table-rspace: 0px;
        }
        td, a, span {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
        }
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        .em_img { width: 100% !important; height: auto !important; }

        .ExternalClass * {
            line-height: 100%;
        }
        .em_defaultlink a {
            color: inherit !important;
            text-decoration: none !important;
        }
        .em_g_img + div {
            display: none;
        }

        @media only screen and (max-width: 640px){
            .em_main_table {width: 100% !important;}
            .em_wrapper {width: 100% !important;}
            .em_wrapper1 {width: 100% !important; display:block !important;}
            .em_height {height:auto !important;}
            .em_hide {display: none !important;	}
            .em_side10 {width: 10px !important;	}
            u + .em_body .em_full_wrap { width: 100% !important; width: 100vw !important;}
        }

    </style>
</head>

<body class="em_body" style="margin:0px auto; padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap">
    <tr>
        <td align="center" valign="top" style="padding:0 10px">
            <table class="em_main_table" align="center" width="700" border="0" cellspacing="0" cellpadding="0"  style="width:700px; table-layout:fixed;">
                <tr>
                    <td align="center" style="padding:22px 0 0 0">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"
                               style="width:700px; background-color:#F5F5F5; border-radius:12px">
                            <tr>
                                <td align="center"
                                    style="font-family:'Roboto Slab', Arial, Tahoma; font-size:14px; line-height:19px; font-weight:normal; font-style:normal; color:#575757; padding:25px 10px 25px 10px">
                                    Dit is een automatisch gegenereerde e-mail. Wij kunnen een antwoord op deze e-mail
                                    niet beantwoorden.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"  style="width:700px; background-color:#FFFFFF">
                            <tr>
                                <td align="center" style="padding:60px 0">
                                    <img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL') .'assets/reservation-eatcard-logo.png') }}"
                                         style="display:block" width="108" height="49" border="0" alt="Logo"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"  style="width:700px; background-color:#FFFFFF">
                            <tr>
                                <td align="center" style="border:1px solid #DFDFDF; display:block; border-radius:12px; padding:0 5px">
                                    <table class="em_wrapper" align="center" width="100%" border="0" cellspacing="0" cellpadding="0"  style="width:100%; background-color:#FFFFFF; border-radius:12px">
                                        <tr>
                                            <td align="center" style="padding:0 10px 0 10px">
                                                <table class="em_wrapper" align="center" width="620" border="0" cellspacing="0" cellpadding="0"  style="width:620px;">
                                                    <tr>
                                                        <td align="left" style="font-family:'Roboto Slab', Georgia; font-size:16px; line-height:21px; font-weight:normal; font-style:normal; color:#575757; padding:58px 0 0 0;">
                                                            Beste {{ @$user->name }},
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:19px; font-weight:normal; font-style:normal; color:#575757; padding:28px 0 35px 0;">
                                                            We hebben uw restaurant gekoppeld aan uw account. Hieronder vindt u uw account gegevens.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" style="padding:0 0 0 0">
                                                            <table class="em_wrapper" align="center" width="620" border="0" cellspacing="0" cellpadding="0"  style="width:620px;">
                                                                <tr>
                                                                    <td align="center" style="padding:0 20px 20px 20px; border:1px solid #F2F2F2; display:block; border-radius:12px;">
                                                                        <table class="em_wrapper" align="center" width="580" border="0" cellspacing="0" cellpadding="0"  style="width:580px;">
                                                                            <tr>
                                                                                <td class="em_wrapper1" align="left" width="50%" style="font-family:'Roboto Slab', Georgia; font-size:16px; line-height:21px; font-weight:normal; font-style:normal; color:#707070; padding:20px 0 0 0;">
                                                                                    <span style="color:#B4B4B4;">Gebruikersnaam:</span> <a href="mailto:{{$user['email']}}" style="color:#707070; text-decoration:none"> {{ ($user['email']) ? $user['email'] : ''  }}</a>
                                                                                </td>
                                                                                {{--<td class="em_wrapper1" align="left" width="50%" style="font-family:'Roboto Slab', Georgia; font-size:16px; line-height:21px; font-weight:normal; font-style:normal; color:#707070; padding:20px 0 0 0;">--}}
                                                                                    {{--<span style="color:#B4B4B4;">Wachtwoord:</span> {{ ($data['password']) ? $data['password'] : ''  }}--}}
                                                                                {{--</td>--}}
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="left" style="font-family:'Roboto Slab', Georgia; font-size:16px; line-height:21px; font-weight:bold; font-style:normal; color:#24ABFF; padding:30px 0 0 0;">
                                                            Download de APP
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:19px; font-weight:normal; font-style:normal; color:#575757; padding:4px 0 8px 0; border-bottom:1px solid #E7E7E7">
                                                            U kunt de app downloaden in de Apple App Store of Android Google Play Store
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding:20px 0 0 0">
                                                            <table align="left" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="left" style="padding:0 15px 0 0">
                                                                        <a href="https://itunes.apple .com/us/app/eatcard-nl/id1435486737"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL').'assets/app_store.png') }}" style="display:block" width="120" height="40" border="0" alt="App Store"/></a>
                                                                    </td>
                                                                    <td align="left" style="padding:0 0">
                                                                        <a href="https://play.google .com/store/apps/details?id=com.eatcard .nl&hl=en"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL').'assets/play_store.png') }}" style="display:block" width="120" height="40" border="0" alt="Play Store"/></a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="font-family:'Roboto Slab', Georgia; font-size:16px; line-height:21px; font-weight:bold; font-style:normal; color:#24ABFF; padding:30px 0 8px 0; border-bottom:1px solid #E7E7E7">
                                                            Enkele tips
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="left" style="padding:22px 0 0 0">
                                                            <table class="em_wrapper" align="left" border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="left" valign="top" width="15" style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        1.
                                                                    </td>

                                                                    <td align="left" valign="top"  style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        U kunt ten alle tijden de reservering van vandaag pauzeren vanuit de app.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding:0 0 0 0">
                                                            <table class="em_wrapper" align="left" border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="left" valign="top" width="15" style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        2.
                                                                    </td>

                                                                    <td align="left" valign="top"  style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        Indien er opmerkingen / wensen zijn, verschijnt er een icoontje bij de reservering.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding:0 0 0 0">
                                                            <table class="em_wrapper" align="left" border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="left" valign="top" width="15" style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        3.
                                                                    </td>

                                                                    <td align="left" valign="top"  style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding: 0  0; ">
                                                                        U kunt in de kalender zien hoeveel reserveringen u heeft en hoeveel mensen er komen.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top"  style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:19px; font-weight:normal; font-style:normal; color:#575757; padding:36px 0 42px 0">
                                                            <b>Nog vragen?</b><br />
                                                            Indien u nog vragen heeft kunt u ons bereiken op het volgende<br class="em_hide"/>
                                                            telefoonnummer: <a href="tel:073 7 11 09 76" style="color:#575757; text-decoration:none">073 7 11 09 76</a> of mail naar <a href="mailto:support@eatcard.nl" style="color:#575757; text-decoration:none">support@eatcard.nl</a><br /><br />

                                                            Met vriendelijke groeten,<br />
                                                            <b>Eatcard</b>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"  style="width:700px; background-color:#FFFFFF">
                            <tr>
                                <td align="center" valign="top"  style="font-family:'Roboto Slab', Georgia; font-size:14px; line-height:24px; font-weight:normal; font-style:normal; color:#575757; padding:21px 15px 60px 15px">
                                    &copy;{{ date('Y') }} Eatcard<br />
                                    Europalaan 2, 5232 BC 's-Hertogenbosch<br />
                                    <a href="http://www.eatcard.nl/" style="color:#575757; text-decoration:none">www.eatcard.nl</a> | <a href="mailto:support@eatcard.nl" style="color:#575757; text-decoration:none">support@eatcard.nl</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
