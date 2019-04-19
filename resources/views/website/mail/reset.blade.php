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
    <div style="text-align: center;">
        <img style="place-content: center; width:100%; max-width:200px;"
             src="https://chefaa.com/images/final%20site%20logo.png">
        <h1 style="text-align: center; padding-top: 20px;  color: #000;">
هل نسيت كلمة مرور حسابك الشخصى            
        </h1>
        <h3 style="text-align: center; color: #1b5c2e; padding-top: 40px; padding-bottom: 10px;">
لتغيير كلمة المرور الخاصة بحاسبك اضغط هنا        
</h3>
        <a href="{{url('/resetaccount?email='.$email.'&token='.$token)}}" >
            <button style="width: 200px;justify-content: center; padding: 0px; font-size: large; border: none; height: 50px; color: white; background-color: #62CB5D;">
استرجاع الحساب
</button>
                </a>

        <h4 style="text-align: center; padding-top: 20px;  color: #000;">
            لاستكمال عملية التسوق برجاء زيارة الموقع
          <br>  <a href="{{url('/store')}}" target="_blank" style="color:#62CB5D; text-decoration: none; ">من هنا</a>
        </h4>
    </div>
</div>

</body>
</html>
