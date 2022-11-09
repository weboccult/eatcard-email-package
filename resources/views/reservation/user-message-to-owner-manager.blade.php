<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!-- Define Charset -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <title></title>
    <style type="text/css">

        body{
            width: 100%;
            background-color: #FFFFFF;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust:none;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
        }

        p,h1,h2,h3,h4{
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:0;
        }


        html{
            width: 100%;
        }

        a:link, span.MsoHyperlink {
            mso-style-priority:99;
            color:blue;
            text-decoration:underline;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        .fix {
            display:none;
            display:none!important;
        }

        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px){

            /*----- main image -------*/
            *[class=image700] img{width: 100% !important; height: auto !important;}
            *[class=padding10] {padding-top:0px !important;}

            /*-------- Container --------*/
            *[class=min_width] {min-width: 100% !important}
            *[class=container700] {width: 100% !important}
            *[class=container100] {width: 100% !important; display:block !important}

        }


    </style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">

    <tr>
        <td align="center" class="min_width" style="min-width:700px; padding:0 8px">
            <table class="container700" align="center" border="0" width="700" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                <tr>
                    <td align="center" style="padding:0 15px 0 15px">
                        <table class="container700" align="center" border="0" width="150" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                            <tr>
                                <td align="center" style="padding:47px 15px 50px 15px">
                                    @if($store->page_logo)
                                        <img src="{{ getS3File($store->email_page_logo) }}" style="display:block" border="0" alt="Eatcard - Online reserveren voor restaurants"/>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <table class="container700" align="center" border="0" width="700" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                            <tr>
                                <td align="center" style="border:1px solid #E0E0E0; border-radius:8px; display:block">
                                    <table class="container700" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                        <tr>
                                            <td align="center" style="padding:0 15px 0 15px">
                                                <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                    <tr>
                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#575757; padding:60px 0 0 0">
                                                            <strong>Beste {{ (isset($storeRes->voornaam) && !empty($storeRes->voornaam)) ? $storeRes->voornaam : ''  }}  {{ (isset($storeRes->achternaam) && !empty($storeRes->achternaam)) ? $storeRes->achternaam : ''  }}</strong>,
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757; padding:30px 0 35px 0">
                                                            Hartelijk bedankt voor uw reservering. Wij hebben uw reservering in goede orde ontvangen. <br/> Hieronder vindt u een overzicht van uw gemaakte reservering.

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" style="padding:0 15px 0 15px;">
                                                <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                    <tr>
                                                        <td align="center" style=" border:1px solid #E0E0E0; border-radius:8px; box-shadow: 0 0 12px 1px #E0E0E0; padding:0 0 0 0; display:block">
                                                            <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                <tr>
                                                                    <td align="center" style="padding:18px 15px 18px 15px; border-bottom:1px solid #E0E0E0;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td class="container100" align="left" width="300" valign="top">
                                                                                    <table class="container700" align="left" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                <span style="color:#B4B4B4">Naam:</span>  {{ (isset($storeRes->voornaam) && !empty($storeRes->voornaam)) ? $storeRes->voornaam : ''  }}  {{ (isset($storeRes->achternaam) && !empty($storeRes->achternaam)) ? $storeRes->achternaam : ''  }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>

                                                                                <td class="container100" align="right" width="280" valign="top">
                                                                                    <table class="container700" align="right" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                <span style="color:#B4B4B4"> Email:</span> {{ isset($storeRes->email) ? $storeRes->email : ''}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center" style="padding:0 15px">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td class="container100" align="left" width="300" valign="top">
                                                                                    <table class="container700" align="left" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="center" style="padding:20px 0 0 0">
                                                                                                <table class="container700" align="center" border="0" width="300" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                                    <tr>
                                                                                                        <td align="left" width="50">
                                                                                                            <img src="{{ getS3File(env('AWS_URL').'assets/calendar-with-a-clock-time-tools.png') }}" style="display:block" width="23" height="23" border="0" alt="Image"/>
                                                                                                        </td>

                                                                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                            {{ $storeRes->res_date  }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>

                                                                                <td class="container100" align="right" width="280" valign="top">
                                                                                    <table class="container700" align="right" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="center" style="padding:20px 0 0 0">
                                                                                                <table class="container700" align="center" border="0" width="280" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                                    <tr>
                                                                                                        <td align="left" width="53">
                                                                                                            <img src="{{ getS3File(env('AWS_URL').'assets/wall-clock.png') }}" style="display:block" width="23" height="23" border="0" alt="Image"/>
                                                                                                        </td>

                                                                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                            {{ @$storeRes->meal->name }} om {{ $storeRes->from_time }}
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
                                                                    <td class="padding10" align="center" style="padding:10px 15px 20px 15px">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td class="container100" align="left" width="300" valign="top">
                                                                                    <table class="container700" align="left" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="center" style="padding:20px 0 0 0">
                                                                                                <table class="container700" align="center" border="0" width="300" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                                    <tr>
                                                                                                        <td align="left" width="50">
                                                                                                            <img src="{{ getS3File(env('AWS_URL').'assets/Group.png') }}" style="display:block" width="30" height="25" border="0" alt="Image"/>
                                                                                                        </td>

                                                                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                            {{ $storeRes->person }}  personen
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>

                                                                                <td class="container100" align="right" width="280" valign="top">
                                                                                    <table class="container700" align="right" border="0" width="100%" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                        <tr>
                                                                                            <td align="center" style="padding:20px 0 0 0">
                                                                                                <table class="container700" align="center" border="0" width="280" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                                    <tr>
                                                                                                        <td align="left" width="53">
                                                                                                            <img src="{{ getS3File(env('AWS_URL').'assets/phone-call.png') }}" style="display:block" width="23" height="23" border="0" alt="Image"/>
                                                                                                        </td>

                                                                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#707070;">
                                                                                                            <a href="tel:{{ $store->gsm_no }}" style="text-decoration:none; color:#707070; font-family: arial , tahoma;">{{ $storeRes->gsm_no }}</a>
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
                                                                    <td align="center" style="padding:22px 15px 20px 15px; border-top:1px solid #E0E0E0;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td align="left" style="font-family:Arial, Tahoma; Font-size:16px; line-height:20px; font-weight:normal; font-style:normal; color:#FF4376;">
                                                                                    <a href="" style="text-decoration:none; font-family:Arial, Tahoma; color:#FF4376">Opmerkingen:</a>
                                                                                </td>
                                                                                <td align="right" width="53">
                                                                                    <a href=""><img src="{{ getS3File(env('AWS_URL').'assets/right-arrow.png') }}" style="display:block" width="10" height="14" border="0" alt="arrow"/></a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center" style="padding:22px 15px 24px 15px; border-top:1px solid #E0E0E0;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757;">
                                                                                    {{ !empty($storeRes->comments) ? $storeRes->comments : 'Er zijn geen opmerkingen.' }}

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="padding:22px 15px 20px 15px; border-top:1px solid #E0E0E0;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td align="left" style="font-family:Arial, Tahoma; Font-size:16px; line-height:20px; font-weight:normal; font-style:normal; color:#FF4376;">
                                                                                    <a href="" style="text-decoration:none; font-family:Arial, Tahoma;
                                            color:#FF4376">Recente bericht van de gast:</a>
                                                                                </td>
                                                                                <td align="right" width="53">
                                                                                    <a href=""><img src="{{ getS3File(env('AWS_URL').'assets/right-arrow.png') }}" style="display:block" width="10" height="14" border="0" alt="arrow"/></a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center" style="padding:22px 15px 24px 15px; border-top:1px solid #E0E0E0;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757;">
                                                                                    {{ !empty($message->body) ? $message->body : 'Er zijn geen
                                                                                    opmerkingen
                                                                                    .' }}

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
                                            <td align="center" style="padding:10px 30px 35px 30px;">
                                                <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                    <tr>
                                                        <td align="right" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#707070;">
                                                            Reserveringsnummer: {{ $storeRes->reservation_id }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        @if(count($resHis) > 0)
                                            <tr>
                                                <td align="center" style="padding:0 15px 0 15px;">
                                                    <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                        <tr>
                                                            <td align="center" style=" border:1px solid #E0E0E0; border-radius:8px; box-shadow: 0 0 12px 1px #E0E0E0; padding:0 0 0 0; display:block">
                                                                <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                    <tr>
                                                                        <td align="center" style="padding:22px 15px 20px 15px;">
                                                                            <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                <tr>
                                                                                    <td align="left" style="font-family:Arial, Tahoma; Font-size:16px; line-height:20px; font-weight:normal; font-style:normal; color:#FF4376;">
                                                                                        <a href="" style="text-decoration:none; font-family:Arial, Tahoma; color:#FF4376">Opmerking restaurant:</a>



                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" style="padding:22px 15px 36px 15px; border-top:1px solid #E0E0E0;">
                                                                            <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                                <tr>
                                                                                    <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757;">
                                                                                        @forelse($resHis as $resH)
                                                                                            Comment : {!! $resH->comment !!} <br>

                                                                                            <hr>
                                                                                        @empty
                                                                                            No comments available at the moment.
                                                                                        @endforelse
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
                                        @endif

                                        <tr>
                                            <td align="center" style="padding:0 15px 0 15px">
                                                <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                    <tr>
                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757; padding:30px 0 47px 0">
                                                            Wij zullen uw reservering z.s.m. bevestigen. Mocht u binnen 24 uur nog geen bevestiging ontvangen, neem dan contact op met ons via het telefoonnummer: {{$store->store_phone}}.<br/><br/>

                                                            Meer informatie vindt u ook op <a style="color:#000;" href="{{isset($store->website_url) ? $store->website_url : '#'}}}}">onze site</a>.<br /><br />


                                                            <strong style="color:#ff4376;">Let op!</strong> Dit is een automatisch gegenereerde e-mail. Uw mail wordt niet beantwoord.<br/><br/>
                                                            <p>
                                                                <a href="{{route('chat.index', ['id' => $chat_link_url,
                                    'so_user_id' => encrypt($user->id)])}}"> Klik hier</a> om de chatpagina te openen
                                                            </p><br>
                                                            Met vriendelijke groeten,<br />
                                                            {{ $store->store_name }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding:20px 0 60px 0">
                                    <table class="container700" align="center" border="0" width="700" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                        <tr>
                                            <td align="right" style="font-family:Arial, Tahoma; Font-size:14px; line-height:20px; font-weight:normal; font-style:normal; color:#D0D0D0; padding:0 0px 0 0">
                                                Powered by
                                            </td>
                                            <td align="right" width="58">
                                                <a href="https://eatcard.nl" title="Eatcard - Sparen en reserveren" target="_blank"><img src="{{ getS3File(env('AWS_URL').'assets/reservation-eatcard-logo.png') }}" style="display:block" width="auto" height="25" border="0" alt="Eatcard - Klantenkaart en reserveringen"/></a>
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
        <td align="center" class="min_width" style="min-width:700px">
            <table class="container700" align="center" border="0" width="700" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                <tr>
                    <td width="50%" class="image700"><img src="{{ getS3File(env('AWS_URL').'assets/fix_image.png') }}" style="display:block" width="300" height="1" border="0" alt=""/></td>
                    <td width="50%" class="image700"><img src="{{ getS3File(env('AWS_URL').'assets/fix_image.png') }}" style="display:block" width="300" height="1" border="0" alt=""/></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="fix" style="display:none; white-space:nowrap; font:15px courier; line-height:0;">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</div>
</body>
</html>
