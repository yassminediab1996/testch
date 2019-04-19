<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>    <title>Rate </title>

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
               لاسترجاع البريد الإلكترونى الرجاء كتابة كلمه المرور الخاصه بك   
        </h1>
       
        <form action="{{url('reset/'.$email)}}" method= "post" >
				    {{csrf_field()}}
            
            <label >الرجاء كتابة كلمه المرور </label>
            <br>
            <input type="password" name="password" class="form-control">
            <button class="btn btn-success btn-md">ارسال </button>
        </form>
        <h4 style="text-align: center; padding-top: 20px;  color: #000;">
            لاستكمال عملية التسوق برجاء زيارة الموقع
          <br>  <a href="{{url('/store')}}" target="_blank" style="color:#62CB5D; text-decoration: none; ">من هنا</a>
        </h4>
    </div>
</div>

</body>
</html>
