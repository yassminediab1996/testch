<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>تفاصيل الطلب</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
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
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
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
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            {{--<img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">--}}
                        </td>

                        <td>
                            رقم الطلب  :# {{$getproducts[0]->order->numbers}} <br>
                            التاريخ: {{$getproducts[0]->created_at}}<br>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                         <td>
                            {{$getproducts[0]->order->user->name}}<br>
                            {{$getproducts[0]->order->address}}<br>
                            {{$getproducts[0]->order->user->email}}
                        </td>
                        <td>
                            اسم العميل<br>
                            العنوان<br>
                            الايميل
                        </td>

                       
                    </tr>
                </table>
            </td>
        </tr>
         <tr class="heading">
             <td>
                السعر بعد الخصم
            </td>
            <td>
                المنتج
            </td>

            
        </tr>
        @foreach($getproducts as $prod)
            <tr class="item">
                 <td>
                    {{\App\AdminModel\Product::Price($prod->product->id)}}
                </td>
                
                <td>
                    {{$prod->product->name_ar}}
                </td>
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

        <tr class="heading">
            <td>
                كاش
            </td>

            <td>
                المبلغ
            </td>
        </tr>

        <tr class="details">
            <td>
                المبلغ صافى
            </td>

            <td>
                {{$getproducts[0]->order->total}}
            </td>
        </tr>
         <tr>
                        <td style="padding: 0px; width: 50%;">الخصم</td>
                        <td style="padding: 0px;text-align: right;">@if($getproducts[0]->order->discount != null) {{$discound = $getproducts[0]->order->discount }} % @else 0 @endif</td>
                    </tr>

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
    
</div>


<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
