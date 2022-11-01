<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 "/>
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


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

        @media only screen and (max-width: 640px) {
            .em_img {
                width: 100% !important;
                height: auto !important;
            }

            .em_image {
                width: 150px !important;
                height: auto !important;
            }

            .em_main_table {
                width: 100% !important;
            }

            .em_wrapper {
                width: 100% !important;
            }

            .em_width70 {
                width: 60% !important;
            }

            .em_width5 {
                width: 5% !important;
            }

            .em_width25 {
                width: 35% !important;
            }

            .em_height {
                height: auto !important;
            }

            .em_hide {
                display: none !important;
            }

            .em_font18 {
                font-size: 15px !important;
            }

            u + .em_body .em_full_wrap {
                width: 100% !important;
                width: 100vw !important;
            }
        }

    </style>
</head>

<body class="em_body" style="margin:0px auto; padding:0px; background-color:#FFFFFF" background="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap">

    <tr>
        <td align="center" valign="top" style="padding:0 10px">
            <table class="em_main_table" align="center" width="700" border="0" cellspacing="0" cellpadding="0"
                   style="width:700px; table-layout:fixed;">
                <tr>
                    <td align="center" style="padding:22px 0 0 0">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"
                               style="width:700px; background-color:#F5F5F5; border-radius:12px ">
                            <tr>
                                <td align="center"
                                    style="font-family:'Roboto Slab', Arial, Tahoma; font-size:14px; line-height:19px; font-weight:normal; font-style:normal; color:#575757; padding:25px 10px 25px 10px">
                                    Dit is een automatisch gegenereerde e-mail. Uw mail wordt niet beantwoord.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:22px 0 0 0">
                        <table class="em_wrapper" align="center" width="700px" border="0" cellspacing="0"
                               cellpadding="0" style="width:150px;">
                            <tr>
                                <td align="center" style="padding:0 0 0 0">
                                    @if($store->page_logo)
                                        <img class="em_image" src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File($store->email_page_logo) }}"
                                             style="display:block" border="0"
                                             alt="Eatcard - De online reserveringssysteem en loyaliteiten programma voor elke type restaurant"/>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:22px 0 0 0">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"
                               style="width:700px; background-color:#FFFFFF">
                            <tr>
                                <td align="center"
                                    style="padding:0 0 0 0; border:1px solid #E0E0E0; display:block; border-radius:12px">
                                    <table class="em_wrapper" align="center" width="100%" border="0" cellspacing="0"
                                           cellpadding="0" style="width:100%">
                                        <tr>
                                            <td align="center" style="padding:0 15px 0 15px; ">
                                                <table class="em_wrapper" align="center" width="620" border="0"
                                                       cellspacing="0" cellpadding="0" style="width:620px">
                                                    <tr>
                                                        <td align="left"
                                                            style="font-family:'Roboto Slab', Arial, Tahoma; font-size:18px; line-height:32px; font-weight:normal; font-style:normal; color:#575757; padding:35px 0 36px 0;">
                                                            Beste {{ (isset($order['first_name']) && !empty ($order['first_name'])) ? $order['first_name']: ''  }}  {{ (isset($order['last_name']) && !empty($order['last_name']) ) ? $order['last_name']: ''  }},<br/><br/>

                                                            {!! __('messages.takeaway_order_done_mail_content', ['store_name' => $store->store_name]) !!}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        @if(isset($store->store_img))
                                            <tr>
                                                <td align="center" style="padding:0 0 0 0">
                                                    <img class="em_img" src="{{\Weboccult\EatcardMailCompanion\Helpers\getS3File($store->store_img)}}"
                                                         style="display:block" width="698" border="0" alt="Image"/>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr></tr>

                                        @if($store)

                                            <tr>
                                                <td align="center"
                                                    style="padding:0 15px 0 15px; border-top:1px solid #E0E0E0;">
                                                    <table class="em_wrapper" align="center" width="620" border="0"
                                                           cellspacing="0" cellpadding="0" style="width:620px">

                                                        <tr>
                                                            <td align="left"
                                                                style="font-family:'Roboto Slab', Arial, Tahoma; font-size:18px; line-height:32px; font-weight:normal; font-style:normal; color:#575757; padding:28px 0 0 0;">
                                                                <strong style="font-family:'Roboto Slab', Arial, Tahoma;">
                                                                    Hartelijk bedankt, wij kijken ernaar uit voor uw volgende bestelling.</strong>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td align="left"
                                                                style="font-family:'Roboto Slab', Arial, Tahoma; font-size:18px; line-height:32px; font-weight:normal; font-style:normal; color:#575757; padding:26px 0 26px 0;">


                                                                Met vriendelijke groeten,<br/>
                                                                <b>{{ $store->store_name }}</b><br />
                                                                {{$store->address}}<br />
                                                                {{$store->store_phone}}<br />
                                                                <a href="{{$store->store_email}}" style="text-decoration:none; color:#000000">{{$store->store_email}}</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:0 0 0 0">
                        <table class="em_wrapper" align="center" width="700" border="0" cellspacing="0" cellpadding="0"
                               style="width:700px; ">
                            <tr>
                                <td align="center" style="padding:20px 0 35px 0">
                                    <a href="https://eatcard.nl"
                                       title="Eatcard - De online reserveringssysteem en loyaliteiten programma voor elke type restaurant"
                                       target="_blank"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL').'assets/eatcard-email.png') }}"
                                                            style="display:block" width="146" height="24" border="0"
                                                            alt="Image"/></a>
                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="padding:20px 0 35px 0">
                                    @if($store->facebook_url)
                                        <a style="display: inline-block; padding-right: 10px" href="{{ $store->facebook_url }}"
                                           title="Facebook"
                                           target="_blank"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL').'assets/facebook.png') }}"
                                                                style="display:block" width="24" height="24" border="0"
                                                                alt="Image"/></a>
                                    @endif

                                    @if($store->instagram_url)
                                        <a  style="display: inline-block; padding-right: 10px" href="{{ $store->instagram_url }}"
                                            title="Instagram"
                                            target="_blank"><img src="{{ \Weboccult\EatcardMailCompanion\Helpers\getS3File(config('eatcardMailCompanion.AWS_URL').'assets/instagram.png') }}"
                                                                 style="display:block" width="24" height="24" border="0"
                                                                 alt="Image"/></a>
                                    @endif
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
