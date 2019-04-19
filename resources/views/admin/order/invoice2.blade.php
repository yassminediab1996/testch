
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>invoice </title>

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
    <div style="margin-top: 50px;">
    <button onclick="myFunction()">Print this page</button>
</div>
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
                            الفاتورة  :# {{$getproducts[0]->order_id}} <br>
                            التاريخ : {{$getproducts[0]->created_at}} <br/>
                            إيصال شراء منتجات
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
                            اسم العميل : {{$getproducts[0]->order->user->name}}
                            <br>
                            العنوان : {{$getproducts[0]->order->address}} <br>
                            التليفون : {{$getproducts[0]->order->user->phone}}
                        </td>

                        <td style="text-align: right">
                            الايميل : {{$getproducts[0]->order->user->email}}<br>
                            ملاحظات : {{$getproducts[0]->order->note}} <br>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading rtl">
            <td style="text-align: right;">
                الحالة
            </td>
            <td style="text-align: right">
                طريقة الدفع
            </td>

        </tr>

        <tr class="payment rtl">
            <td style="text-align: right;">
                <!-- تقدا عند الاستلام  -->
            </td>
            <td style="text-align: right">
                {{$getproducts[0]->order->payment}}
            </td>
        </tr>

        <tr class="heading2 rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px;">الكمية</td>
                        <td style="padding: 0px;text-align: right;">السعر</td>
                    </tr>
                </table>
            </td>
            <td style="text-align: right">
                المنتج
            </td>
        </tr>
        @foreach($getproducts as $prod)
        <tr class="item rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px; width: 50%;">
                             {{$prod->qty}}
                            </td>
                        <td style="padding: 0px;text-align: right;">
                        {{\App\AdminModel\Product::Price($prod->product->id)}}
                        </td>
                    </tr>
                </table>
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
        
        <tr class="line1">
            <td></td>
            <td></td>
        </tr>

        <tr class="item rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px; width: 50%;">المجموع</td>
                        <td style="padding: 0px;text-align: right;">{{$getproducts[0]->order->total}}</td>
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>

        <tr class="line">
            <td></td>
        </tr>

        <tr class="item rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px; width: 50%;">الخصم</td>
                        <td style="padding: 0px;text-align: right;">{{$getproducts[0]->order->discount}}</td>
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>

        <tr class="line">
            <td></td>
        </tr>

 <tr class="item rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px; width: 50%;">الشحن</td>
                        <td style="padding: 0px;text-align: right;">{{$getproducts[0]->order->fees}}</td>
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>

        <tr class="line2">
            <td></td>
        </tr>
        <tr class="item rtl">
            <td>
                <table>
                    <tr>
                        <td style="padding: 0px; width: 50%;">الأجمالى</td>
                        <td style="padding: 0px;text-align: right;">{{$getproducts[0]->order->total + $getproducts[0]->order->fees}}</td>
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>
       <!--
        <div>
            <tr class="footer" style="border-top: 50px;">
                <td colspan="3 ">
                    <table>
                        <tr>

                            <td style="text-align: right">
                                <div class="list-social">
                                    <a href="https://www.instagram.com/getchefaa/"><i
                                            class="fab fa-instagram fa-3x" style="color: black; margin: 4px;"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.linkedin.com/company/getchefaa" ><i
                                            class="fab  fa-linkedin  fa-3x" style="color: #0077B5;  margin: 4px;"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.twitter.com/getchefaa" ><i
                                            class="fab fa-twitter  fa-3x" style="color: #1DA1F2;  margin: 4px;"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.facebook.com/GetChefaa" ><i
                                            class="fab fa-facebook  fa-3x" style="color: #0e2259;  margin: 4px;"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.chefaa.com" ><i
                                            class="fas fa-globe fa-3x" style="color: #62CB5D;  margin: 4px;"
                                            aria-hidden="true"></i></a>
                                </div>
                            </td>

                            <td class="title" style="text-align: right">
                                <h1>تواصل معنا من خلال</h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </div>
        
        -->
    </table>

</div>
</body>
</html>

<script>
function myFunction() {
    window.print();
}
</script>

