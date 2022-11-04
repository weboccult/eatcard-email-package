<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!-- Define Charset -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <title></title>
    <style type="text/css">

        img {
            max-width: 100%;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
            margin: 0px
        }

        .mesgs {
            padding: 30px 15px 0 25px;
            overflow-y: auto;
            max-height: 300px;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }


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
            color:#24ABFF;
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
            .image700 img{width: 100% !important; height: auto !important;}
            .logo img{width: 120px !important; height: auto !important;}
            .padding10 {padding-top:0px !important;}

            /*-------- Container --------*/
            .min_width {min-width: 100% !important}
            .container700 {width: 100% !important}
            .container100 {width: 100% !important; display:block !important}

        }


    </style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">

    <tr>
        <td align="center">
            <table class="container700" align="center" border="0" width="700" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                <tr>
                    <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:22px; font-weight:normal; font-style:normal; color:#575757; padding:20px 20px 20px 20px; background-color:#F5F5F5; border-radius: 10px;">
                        Dit is een automatisch gegenereerde e-mail. Uw mail wordt niet beantwoord.<br />
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:0 15px 0 15px">
                        <table class="container700" align="center" border="0" width="150" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                            <tr>
                                <td class="logo" align="center" style="padding:47px 15px 50px 15px">
                                    <img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL') .'assets/eatcard-logo-white.png') }}" style="display:block" width="auto" height="auto" border="0" alt="Eatcard - Online reserveren voor restaurants"/>
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
                                                            <strong style="font-family:Arial, Tahoma;">Beste Admin</strong>,
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="left" style="font-family:Arial, Tahoma; Font-size:14px; line-height:18px; font-weight:normal; font-style:normal; color:#575757; padding:30px 0 35px 0">
                                                            De volgende locaties verlopen op {{ isset($exp_date) ? \Weboccult\EatcardMailCompanion\Helpers\getDutchDateTable($exp_date) : '' }} <br/>.
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
                                                                    <td align="center" style="padding:22px 15px 20px 15px;">
                                                                        <table class="container700" align="center" border="0" width="580" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
                                                                            <tr>
                                                                                <td align="left" style="font-family:Arial, Tahoma; Font-size:16px; line-height:20px; font-weight:normal; font-style:normal; color:#FF4376;">
                                                                                    <a href="" style="text-decoration:none; font-family:Arial, Tahoma; color:#FF4376">Store Details:</a>
                                                                                </td>
                                                                                <td align="right" style="font-family:Arial, Tahoma; Font-size:16px; line-height:20px; font-weight:normal; font-style:normal; color:#FF4376;">
                                                                                    <a href="" style="text-decoration:none; font-family:Arial, Tahoma; color:#FF4376">Total Stores: {{ count($stores) }} </a>
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
                                                                                    @forelse($stores as $store)
                                                                                        <b>Name</b> : {!! $store->store_name !!} <br>
                                                                                        <b>Owner Name</b> : {!! @$store->store_owner->user->name !!} <br>
                                                                                        <b>Email</b> : {!! @$store->store_email !!} <br>
                                                                                        <b>Phone</b> : {!! @$store->store_phone !!} <br>
                                                                                        <b>Address</b> : {!! @$store->address !!} <br>
                                                                                        <hr>
                                                                                    @empty
                                                                                        Geen locatie beschikbaar op dit moment.
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

                                        <tr>
                                            <td align="center" style="padding:0 15px 20px 15px">
                                                <table class="container700" align="center" border="0" width="620" cellpadding="0" cellspacing="0"  style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">

                                                </table>
                                            </td>

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
                                                <a href="https://eatcard.nl" title="Eatcard - Sparen en reserveren" target="_blank"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL') .'assets/reservation-eatcard-logo.png') }}" style="display:block" width="auto" height="25" border="0" alt="Eatcard - Klantenkaart en reserveringen"/></a>
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
</table>
</body>
</html>
