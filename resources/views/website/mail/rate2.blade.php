<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Rate </title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #62CB5D;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #000;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #fff;
        }

        .invoice-box table tr.information2 table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #62CB5D;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            color: #fff;
        }

        .invoice-box table tr.heading2 td {
            background: #62CB5D;
            font-weight: bold;
            color: #fff;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.line td {
            border-bottom: 1px solid #62CB5D;
        }

        .invoice-box table tr.line2 td {
            border-bottom: 2px solid #62CB5D;
        }

        .invoice-box table tr.item td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.footer td {
            padding-top: 50px;
        }

        .invoice-box table tr.payment td {
            border-bottom: 1px solid #62CB5D;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #62CB5D;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
<div class="invoice-box" style="background-color: #EBEBEB;">
    <table cellpadding="1" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr class="rtl">
                        <td class="title">
                            <img src="https://chefaa.com/images/final%20site%20logo.png"
                                 style="width:100%; max-width:200px;">
                        </td>

                        <td style="text-align: right">
                            رقم الطلب  :# {{$getproducts[0]->order_id}} <br>
                            التاريخ : {{$getproducts[0]->created_at}} <br/>
                            تقييم منتجات طلبك
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information2 rtl">
            <td colspan="2">
                <table>
                    <tr>
                        <td style="text-align: right">
                            مرحبا {{$getproducts[0]->order->user->name}}
                            <br>
                            شكرا للتسوق معنا! يرجى مساعدتنا في تحسين خدماتنا وإعطاء العملاء فهمًا أفضل للمنتج (المنتجات)
                            الذي طلبته!
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information rtl">
            <td colspan="2">
                <table>
                    <tr>
                        <td style="text-align: right">
                            يرجى الملاحظة ما يلى
                            <br>
                            يمكنك تقييم المنتجات من <span style="color: #62CB5D;"> ★ </span> (سيئ جدًا) إلى <span
                                style="color: #62CB5D;"> ★★★★★ </span> (جيد جدًا).
                            <br>
                            إذا لم تكن راضيًا عن عملية الشراء ، فقد تظل قادرًا على إعادتها. يرجى الرجوع إلى
                            <a href="https://chefaa.com/contact2" target="_blank"
                               style="color: #62CB5D; text-decoration: none">سياسة
                                الاسترداد.</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading2 rtl">
            <td>

            </td>
            <td style="text-align: right">
                المنتج
            </td>
        </tr>
        
        @foreach($getproducts as $prod)
        <tr class="item rtl">
            <td style="text-align: center">
                <a href="{{url('details/'.$prod->product->id)}}">
                    <button style="color: #008000;"> تقييم ★★★★★</button>
                </a>
            </td>
            <td style="text-align: right">
                {{$prod->product->name_ar}}
            </td>
        </tr>

        <tr class="line">
            <td></td>
            <td></td>
        </tr>
        @endforeach

    </table>
    <h1 style="text-align: center; padding-top: 20px;">شكرا لك</h1>

</div>

</body>
</html>
