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
     @php
$discound = 0;
@endphp
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
                            رقم الطلب  :# {{$getproducts[0]->order->numbers}} <br>
                            التاريخ : {{$getproducts[0]->created_at}} <br/>
                            تم تاكيد طلبك                     
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
تم تاكيد الطلب و سوف يتم تجهيزة للشحن
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
@php
           $isfreeshipping = 0;
          	$product = App\AdminModel\Product::find($prod->product_id);
                if($product->checkfree == 0) {
                    $isfreeshipping=0;
                }else{
                   $isfreeshipping = 1;
                }
                
        @endphp
        @endforeach
        @php
        if($isfreeshipping == 0)
         $fees = $getproducts[0]->order->user->GetFees($getproducts[0]->order->user->id);
         else
           $fees = 0;
        @endphp        

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
                        <td style="padding: 0px;text-align: right;">@if($getproducts[0]->order->discount != null) {{$discound = $getproducts[0]->order->discount }} % @else 0 @endif</td>
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
                        <td style="padding: 0px;text-align: right;">{{$fees}}</td>
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
                    @php
				      $dis =  ($getproducts[0]->order->total *($discound/100));
				      $finalto = $getproducts[0]->order->total - $dis;
				    @endphp
				  
                    <tr>
                        <td style="padding: 0px; width: 50%;">الأجمالى</td>
                          @if($getproducts[0]->order->discount != null)
                        <td style="padding: 0px;text-align: right;">{{$finalto + $fees}}</td>
                        @else
                           <td style="padding: 0px;text-align: right;">{{ $getproducts[0]->order->total + $fees}}</td>

                        @endif
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>
    
    </table>

</div>
</body>
</html>
