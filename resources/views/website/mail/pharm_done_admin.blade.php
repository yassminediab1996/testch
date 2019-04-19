<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title> monthly package </title>

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
   
    
    <div class="row">
        <div class="col-md-6">
            <p style="text-align:right;">     تم وصول الطلب للعميل  </p>
        </div>
       
    </div>
     <div class="row">
        <div class="col-md-6">
            <p style="text-align:right;">{{$phar->name}} اسم الصيدلية </p>
        </div>
        
    </div>
     <div class="row">
        <div class="col-md-6">
            <p style="text-align:right;">{{$client->name}}   اسم العميل   </p>
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-6">
            <p style="text-align:right;">{{$client->email}}   إيميل العميل   </p>
        </div>
       
    </div>
     <div class="row">
        <div class="col-md-6">
            <p style="text-align:right;">{{$client->phone}}   رقم العميل   </p>
        </div>
       
    </div>
    
 
   

</body>
</html>
