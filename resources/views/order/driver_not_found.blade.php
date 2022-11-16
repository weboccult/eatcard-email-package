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
    <meta name="format-detection" content="telephone=no"/>
    <style type="text/css" media="all">
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

        @media only screen and (max-width: 640px){
            .em_img { width: 100% !important; height: auto !important; }
            .em_main_table {width: 100% !important;}
            .em_wrapper {width: 100% !important;}
            .em_width1 {width: 55% !important;}
            .em_width2 {width: 5% !important;}
            .em_width3 {width: 40% !important;}
            .em_width4 {width: 3% !important;}
            .em_width5 {width: 20% !important;}
            .em_width6 {width: 54% !important;}
            .em_width7 {width: 20% !important;}
            .em_height {height:auto !important;}
            .em_hide {display: none !important;	}
            .em_padding {padding-left: 10px !important; padding-right: 10px !important;	}
            .em_font {font-size: 10px !important; line-height: 14px !important;	}
            u + .em_body .em_full_wrap { width: 100% !important; width: 100vw !important;}
        }
        .paid{
            background-color: #31DD2A;
        }
        .canceled{
            background-color: #f44336;
        }
        .failed{
            background-color: #f44336;
        }
    </style>
</head>

<body class="em_body" style="margin:0px auto; padding:0px; background-color:#dddddd">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap">
    <tr>
        <td align="center" valign="top">
            <table class="em_main_table" align="center" width="600" border="0" cellspacing="0" cellpadding="0"  style="width:600px; table-layout:fixed; background-color:#FFFFFF">
                <tr>
                    <td align="center">
                        <table class="em_wrapper {{$order['status']}}" align="center" width="600" border="0"
                               cellspacing="0" cellpadding="0" style="width:600px;">
                            <tr>
                                <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:bold; font-style:normal; color:#FFFFFF; padding:5px 10px 5px 10px">
                                    Uw bestelling is {!! __('messages.'.$order['status']) !!}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td align="center">
                        <table class="em_wrapper" align="center" width="600" border="0" cellspacing="0" cellpadding="0" style="width:600px; background-color:#FFFFFF">
                            <tr>
                                <td align="center" style="padding:0 10px 0 10px">
                                    <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                        <tr>
                                            <td align="center" style="padding:32px 0 0 0">
                                                @if($store->page_logo)
                                                    <img src="{{\Weboccult\EatcardMailCompanion\Helpers\getS3File($store->page_logo)}}" style="display:block" width="120" height="auto"
                                                         border="0" alt="Logo"/>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding:48px 0 18px 0">
                                                <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                    <tr>
                                                        <td class="em_width1" align="left" valign="top" width="150">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:5px 0 0 0">
                                                                        <b>Klantgegevens</b><br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:2px 0 0 0">
                                                                        {{$order['full_name']}}<br />
                                                                        {{$order['contact_no']}}<br />
                                                                        <a href="mailto:wing@pixel2code.nl" style="text-decoration:none; color:#000000">{{$order['email']}}</a><br /><br />

                                                                        Besteldatum:<br />
                                                                        Bestelnummer
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td class="em_width2" align="right" valign="top" width="130"></td>
                                                        <td class="em_width3" align="right" valign="top" width="120">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:5px 0 0 0">
                                                                        @if($order['order_type'] == 'delivery')<b>Bezorgen</b>@endif<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:2px 0 5px 0">
                                                                        {{$order['delivery_address']}}<br />
                                                                        {{$order['delivery_postcode']}}<br />
                                                                        {{$order['delivery_place']}}<br /><br />

                                                                        {{$order['paid_on']}} <br />
                                                                        {{$order['order_id']}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:bold; font-style:normal; color:#000000; padding:10px 10px 10px 10px; border-top:1px solid #000000; border-bottom:1px solid #000000">
                                                {!! __('messages.'.$order['order_type']) !!} op {{$order['order_date']}} om {{$order['order_time']}}
                                            </td>
                                        </tr>
                                        @if($order['comment'])
                                            <tr>
                                                <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:18px; font-weight:normal; font-style:normal; color:#000000; padding:10px 10px 10px 10px; border-top:1px solid #000000; border-bottom:1px solid #000000">
                                                    <b>Opmerking</b><br />
                                                    {{$order['comment']}}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td align="center" style="padding:20px 0 12px 0">
                                                <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                    <tr>
                                                        <td class="em_width5" align="left" valign="top" width="100">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                        Aantal
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td class="em_width4" align="right" valign="top" width="8"></td>
                                                        <td class="em_width6"align="right" valign="top" width="200">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                        Item
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td class="em_width4" align="right" valign="top" width="20"></td>
                                                        <td class="em_width7" align="right" valign="top" width="72">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="right" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                        Prijs
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        @foreach($order['order_items'] as $item)
                                            <tr>
                                                <td align="center" style="padding:0px 0 10px 0">
                                                    <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                        <tr>
                                                            <td class="em_width5" align="left" valign="top" width="100">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            {{$item['quantity']}}x
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="em_width4" align="right" valign="top" width="8"></td>
                                                            <td class="em_width6" align="right" valign="top" width="200">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            {{$item['product_name']}}<br />
                                                                            @php
                                                                                $item_total = 0;
                                                                            @endphp
                                                                            @if(isset($item['extra']) && $item['extra'])
                                                                                @if(isset($item['extra']->serve_type) && $item['extra']->serve_type)
                                                                                    <span>{{$item['extra']->serve_type}}</span> <br />
                                                                                @endif
                                                                                @if(isset($item['extra']->size) && $item['extra']->size)
                                                                                    @php
                                                                                        $size_price = isset ($item['extra']->size->price) ? (float) $item['extra']->size->price : 0;
                                                                                        $item_total += $size_price;
                                                                                    @endphp
                                                                                    <span style="font-size:10px; line-height:18px">
                                                                                    @lang('messages.'.$item['extra']->size->name) <br />
{{--                                                                                    @if ($size_price) € {{changePriceFormat ($size_price)}} @endif <br />--}}
                                                                                        @endif
                                                                                        @if(isset($item['extra']->supplements) && $item['extra']->supplements)
                                                                                            @foreach($item['extra']->supplements as $sup)
                                                                                                @php
                                                                                                    $item_total += isset($sup->val) ? (float)$sup->val : 0;
                                                                                                @endphp
                                                                                                + {{$sup->name}} {{--@if($sup->val) € {{changePriceFormat($sup->val)}}@endif--}}<br />
                                                                                            @endforeach</span>
                                                                                @endif
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="em_width4" align="right" valign="top" width="20"></td>
                                                            <td class="em_width7" align="right" valign="top" width="72">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            € {{\Weboccult\EatcardMailCompanion\Helpers\changePriceFormat(($item['unit_price'] + $item_total)*$item['quantity'])}}<br />

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($order['order_type'] == 'delivery')
                                            <tr>
                                                <td align="center" style="padding:10px 0 10px 0; border-top:1px solid #000000; border-bottom:1px solid #000000">
                                                    <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                        <tr>
                                                            <td align="left" valign="top" width="50%">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            Bezorgkosten
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="left" valign="top" width="50%">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            € {{\Weboccult\EatcardMailCompanion\Helpers\changePriceFormat($order['delivery_fee'])}}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($order['discount_amount'])
                                            <tr>
                                                <td align="center" style="padding:10px 0 10px 0; border-top:1px solid #000000; border-bottom:1px solid #000000">
                                                    <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                        <tr>
                                                            <td align="left" valign="top" width="50%">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            @lang('messages.discount_amount') (<span>{{$order['discount']}}</span>%)
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="left" valign="top" width="50%">
                                                                <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                            € {{\Weboccult\EatcardMailCompanion\Helpers\changePriceFormat( ($order['discount_amount']))}}
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
                                            <td align="center" style="padding:10px 0 10px 0; border-top:1px solid #000000; border-bottom:1px solid #000000">
                                                <table class="em_wrapper" align="center" width="400" border="0" cellspacing="0" cellpadding="0" style="width:400px;">
                                                    <tr>
                                                        <td align="left" valign="top" width="50%">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="left" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:bold; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                        Totaal
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="left" valign="top" width="50%">
                                                            <table class="em_wrapper" align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%">
                                                                <tr>
                                                                    <td align="right" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:bold; font-style:normal; color:#000000; padding:0 0 0 0">
                                                                        €{{\Weboccult\EatcardMailCompanion\Helpers\changePriceFormat($order['total_price'])}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding:0 0 0 0">
                                                <table class="em_wrapper" align="center" width="350" border="0" cellspacing="0" cellpadding="0" style="width:350px;">
                                                    <tr>
                                                        <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:20px 0 0 0">
                                                            <b>{{ $store->store_name }}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:2px 0 0 0">
                                                            {{$store->address}}<br />
                                                            {{$store->store_phone}}<br />
                                                            <a href="{{$store->store_email}}" style="text-decoration:none; color:#000000">{{$store->store_email}}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding:16px 0 0 0">
                                                            <a href="http://maps.google.com/maps?q=<?=$store->address?>"><img src="{{ getS3File(env('AWS_URL').'assets/show-on-map.png') }}" style="display:block" width="115" height="42" border="0" alt="Toon op kaart"/></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding:20px 0 20px 0">
                                                            <table align="center" border="0" cellspacing="0" cellpadding="0" >
                                                                <tr>
                                                                    @if($store->facebook_url)
                                                                        <td align="center">
                                                                            <a href="{{ $store->facebook_url }}"><img class="em_img" src="{{ 'https://eatcard.s3.eu-central-1.amazonaws.com/assets/facebook2.png' }}" style="display:block" width="34" height="34" border="0" alt="FB"/></a>
                                                                        </td>
                                                                    @endif
                                                                    <td width="10"></td>
                                                                    @if($store->instagram_url)
                                                                        <td align="center">
                                                                            <a href="{{ $store->instagram_url }}"><img class="em_img" src="{{ 'https://eatcard.s3.eu-central-1.amazonaws.com/assets/instagram.png' }}" style="display:block" width="34" height="34" border="0" alt="IG"/></a>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" style="padding:0 0 0 0; border-top:1px solid #000000">
                                                <table class="em_wrapper" align="center" width="330" border="0" cellspacing="0" cellpadding="0" style="width:380px;">
                                                    <tr>
                                                        <td align="center" style="font-family:Verdana, Arial, Tahoma; font-size:12px; line-height:15px; font-weight:normal; font-style:normal; color:#000000; padding:20px 0 0 0">
                                                            Uw order word verwerkt door Eatcard, onze partner
                                                            voor Takeaway
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding:15px 0 80px 0">
                                                            <a href=""><img src="{{ 'https://eatcard.s3.eu-central-1.amazonaws.com/assets/eat_card.png' }}" style="display:block" width="56" height="25" border="0" alt="eat card"/></a>
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
        </td>
    </tr>
</table>
</body>
</html>
