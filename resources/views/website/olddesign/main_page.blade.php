<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>

    <title>الصفحة الرئيسية</title>
    <style type="text/css">
      body{
         direction: rtl;
         text-align: right;
      }
      .card{
        border: none;
        white-space: nowrap;
      }
      .green-font{
        color: green;
      }
      #app-div {
        height: 400px;
      }
      * {box-sizing: border-box;
        margin: auto;
        text-align: center;
        font-family: Tajawal;
        color: #232323}
        .mySlides {display: none}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }

        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        .dot-container{
          padding-top: 40px;
        }
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
          background-color: #717171;
        }
        .circle-badge {
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          border-radius: 50%;
          background: white;
          border: 3pt solid #3392f4;
          box-shadow: 0px 5px 5px rgba(0,0,0,.75);
        }
        .top-badge{
          width: 48px;
          height: 48px;
          color: #61ca5d;
          font-size: x-large;
          margin-top: -20px;
        }
        .bottom-badge{
          width: 97.22px;
          height: 97.22px;
          margin-bottom: -35px;
        }
        #before-nav{
           border: none;
           height: 10px;
           background-color: #61ca5d;
           margin-right: -5px;
           margin-left: -5px;
           margin-top: -5px;
        }
        #user-review{
          background-color: #3497fd;
          padding: 40px;
          color: #fff;
        }#user-review > #user-review-head > h1{
          font-size: 54.3pt;
          font-weight: bold;
          color: #fff;
        }#user-review > #user-review-head > p{
          color: #fff;
          font-size: 16pt;
        }
        #user-review > #user-review-head{
          padding-bottom: 30px;
          padding-top: 30px;
        }
        .slider-cart{
          margin: 30px;
        }
        #header-app-mockup{
          float: right;
          margin-left: 30px;
        }#header-p{
          text-align: right;
          padding-right: 10px;
          font-weight: medium;
          font-size: 27.14pt;
        }
        #header-p > span{
          font-weight: bold;
          font-size: 40.89pt;
        }
        .nav-item > a{
          font-size: 15pt;
          font-weight: bold;
        }
        .nav-item > a:hover , .active > .nav-link {
              color: #61ca5d !important;
              background-color: white;
        }
        #app-mock-div{
          display: flex;
          align-items: center;
        }
        #main-feature-div{
          margin:50px;
        }
     h2{
      font-size: 54.2pt;
      font-weight: bold;
    }#main-feature-div > p{
      font-size: 14pt;
      font-weight: regular;
      color: #7f7f7f;
    }
    .bg-green{
      background-color: #62cb5d;
    }
    #download-app-div > .right {
      background-image: url('main_page_ layers/sidelogo_0.png');
      background-repeat: no-repeat;


    }
    #download-app-div > .left{
      position: relative;
      right: 55%;
    }
    .small-hr{
      height: 3px;
      width: 10%
    }
    #main-feature-div > div > div > hr {
      background-color: #232323;
    }
    ul.service-item{
    list-style-type: none;
    }
    ul.service-item > li{
    display: inline;
    margin: 0px;
    }
    ul.service-item > li > *{
    display: inline-block;
    margin: 0px;
    }
.contact-form{
  background-image: url('main_page_ layers/contact-us-background.jpg');
  background-repeat: no-repeat;
  background-position: center; 
}

.contact-form > form {
  box-shadow: 0px 5px 5px rgba(0,0,0,.75); 
  background-color:  #fff;
  padding: 10px 20px;
  margin: auto;
}
.contact-form > form >input{
    font-size: 14.2pt;
}
.contact-form > form >input::placeholder , .contact-form > form >textarea::placeholder{
    font-size: 14.2pt;
    color: #dfdfdf;
}
form *{
  margin-bottom:5px;
  line-height: 30px;
}
form > #name {
  padding-top: 20px;
}
.entry {
  margin-left:5px;
  font-size:20px;
  padding:2px;
  width: fit-content;
  color: #ff99cc;
  border: 1px solid #fff7e6;
  border-radius: 4px;
  width:100%;
}
#comments{
  width:100%;
  margin-right:25px;
}
#calculation{
  color: #fff;
}
#calculation > div >div > h5{
  font-size: 16pt;
  font-weight: bold;
}
#calculation > div > div > b {
  border-radius: 50%;
  background: #fff;
  padding: 5pt;
  font-size: 34.25pt;
  color: #62cb5d;
}#calculation > h3 {
  font-size: 44.01pt;
  font-weight: bold;
}
.entry:focus ,.entry:hover,.entry:visited{
  transform: scale(1.02);
}
#submit{
  border: 1px solid #ff99cc;
  border-radius: 4px;
  font-weight: bold;
}
.footer{
  padding-top: 50px;
  padding-bottom: 10px;
}
.footer > h2{
  font-size: 23.91pt;
  font-weight: bold;
}
.footer > p{
  font-size: 16pt;
}
.footer-form >form{
  background-color: #5bbd57;
  width: fit-content;
  padding: 5px;
}
.footer-form >form > * ::placeholder{
  color: #fff;
}
.footer-form >form > *{
   margin-left: 10px;
   color: #fff}
/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
@media only screen and (min-width : 992px) {
    .contact-form > form{
      width: 50%;
  }
}
    </style>
  </head>
  <body>
<hr id="before-nav">
<nav class="navbar navbar-expand-lg navbar-light">
  <img src="main_page_ layers/logo.jpg" width="90px" class="mr-1">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">الرئيسية</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">نبذة عنا</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">سوليوشنز</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">المتجر</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">المسئولية المجتمعية</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">المدونة</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">تواصل معنا</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="d-flex flex-column justify-content-center">
      <div  id="app-mock-div">
        <img src="main_page_ layers/app_screen_mockup.jpg" width="200px" id="header-app-mockup">
        <p id="header-p" >اسهل طريقة ل <br><span class="green-font">ايجاد , شراء , و استلام</span><br>الدواء <br><a href="#"><img src="main_page_ layers/google-play-badge.png" width="150px"></a></p>
      </div>
      <div id="main-feature-div">
        <h2>المميزات الرئيسية</h2>
        <hr class="bg-green small-hr">
        <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
          <div class="d-flex justify-content-center">
            <div class=" m-5">
              <img src="main_page_ layers/buyMedicine.jpg" width="50px">
              <p>شراء الادوية</p>
              <hr class="small-hr">
            </div>
            <div class="m-5">
              <img src="main_page_ layers/buyCosmetic.jpg" width="50px">
              <p>شراء مستحضرات التجميل</p>
              <hr class="small-hr">
            </div>
            <div class="m-5">
              <img  src="main_page_ layers/searchForMedicine.jpg" width="50px">
              <p>البحث عن و ايجاد الادوية الناقصة</p>
              <hr class="small-hr">
            </div>
          </div>
        </div>
        <div id="app-services">
          <h2>خدمات التطبيق</h2>
          <hr class="bg-green small-hr">
          <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
          <table>
            <tr>
              <td>
                <ul class="service-item">
                  <li><img src="output-136.jpg"></li>
                  <li>
                    <b>توصيل الدواء</b>
                    <hr class="small-hr">
                    <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
                  </li>
                </ul>
              </td>
              <td>
                <img src="output-136.jpg">
                <b>توصيل الدواء</b>
                <hr>
                <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
              </td>
              <td rowspan="3">
                <img src="output-105.jpg">
              </td>
            </tr>
            <tr>
              <td>
                <img src="output-136.jpg">
                <b>توصيل الدواء</b>
                <hr>
                <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
              </td>
              <td>
                <img src="output-136.jpg">
                <b>توصيل الدواء</b><hr>
                <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
              </td>
            </tr>
            <tr>
              <td>
                <img src="output-136.jpg">
                <b>توصيل الدواء</b><hr>
                <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
              </td>
              <td>
                <img src="output-136.jpg">
                <b>توصيل الدواء</b><hr>
                <p>هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
              </td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</div>
<div id="user-review" class="container-fluid bg-primary">
        <div id="user-review-head">
          <h1 class="text-center">شهادات المستخدمين</h1>
          <hr class="small-hr bg-light">
          <p class="text-center">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما</p>
        </div>
      <div class="slideshow-container">

      <div class="mySlides">
        <div class="row slider-cart" >
          <div class="col bg-light mr-2">
            <h6 class="circle-badge text-center top-badge">;;</h6>
            <p class="text-center">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
            <img src="output-75.jpg" class="circle-badge bottom-badge">
          </div>
          <div class="col bg-light mr-2">
            <h6 class="circle-badge text-center top-badge">;;</h6>
            <p class="text-center">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
            <img src="output-75.jpg" class="circle-badge bottom-badge">
          </div>
          <div class="col bg-light mr-2">
            <h6 class="circle-badge text-center top-badge">;;</h6>
            <p class="text-center">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
            <img src="output-75.jpg" class="circle-badge bottom-badge">
          </div>
        </div>
      </div>
      <br>

      <div style="text-align:center" class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
      </div>
      </div>
</div>
      <div id="download-app-div" class="row">
        <div class="col-6">
          <img src="main_page_ layers/phone-app.jpg" width="400px">
        </div>
        <div class="col-6">
            <h4>حمل التطبيق</h4><hr class="bg-green">
            <p>متوفر فى اندرويد و اى او اس</p>
        </div>
      </div>
      <div class="bg-green py-4" id="calculation">
        <h3>احصائيات شفاء</h3>
        <hr class="small-hr bg-light">
        <p class="text-light">هناك حقيقة مثبته و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ</p>
        <div class="d-flex pt-4">
          <div>
            <b>1MIL</b><br>
            <h5 class="text-light mt-2">عدد ايه مش فاكر</h5>
          </div>
          <div>
            <b>25K</b><br>
            <h5 class="text-light mt-2">عدد زيارات الموقغ</h5>
          </div>
          <div>
            <b>145K</b><br>
            <h5 class="text-light mt-2">عدد التحميلات</h5>
          </div>
        </div>
      </div>
      <div>
        <h3>شركات متعاونة معنا</h3>
        <p>هناك حقيقة مثبتى و هى ان المحتوى </p>
        <div id="cop-comp">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
          <img src="output-136.jpg">
        </div>
      </div>
      <div class="contact-form">
          <h1 id="title">تواصل معنا</h1>
          <p id="description">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
          <form action="">
            <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="name" placeholder="الاسم"><br>
              <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="mail" placeholder="الايميل"><br>
              <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="phone" placeholder="الهاتف"><br>
            <textarea class="form-control form-control-lg border-0 text-right" id="message" rows="5" placeholder="الرساله....."></textarea>
            <button type="submit" class="btn btn-primary btn-lg btn-block">ارسال</button>
          </form>
      </div>
      <div class="footer bg-green">
        <h2 class="text-light">الاشتراك فى النشرة الاخبارية</h2>
        <hr class="bg-light small-hr">
        <p class="text-light" id="description">هناك حقيقة مثبتة منذ زمن طويل و هى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل االخارجى للنص او شكل توضع الصفحات</p>
        <div class="footer-form">
          <form class="form-inline my-4">
            <div class="form-group mb-1">
              <input type="text" class="form-control-plaintext text-right border-top-0 border-left-0 border-right-0 border-light text-right" id="mail" placeholder="ادخل البريد الالكترونى">
            </div>
            <div class="form-group mb-1">
              <input type="numer" class="form-control-plaintext text-right border-top-0 border-left-0 border-right-0 text-right border-light" id="number" placeholder="ادخل عدد الاخطارات التى ترغب بها">
            </div>
            <button type="submit" class="btn btn-outline-light mb-1">الاشتراك الان</button>
          </form>
        </div>
        <b class="text-light">تابعنا و اعرف كل جديد</b>
        <hr class="small-hr bg-light">
        <div class="d-flex mx-1  mb-5">
          <a href="#"><img src="main_page_ layers/linkedin.png"></a>
          <a href="#"><img src="main_page_ layers/twitter.png"></a>
          <a href="#"><img src="main_page_ layers/facebook.png"></a>
        </div>
        <div class="bg-light mt-25 mb-2 py-2 mx-0">
            <p><img src="main_page_ layers/sidelogo.png" width="20px">  By chefaa , all rights received </p>
        </div>
      </div>
      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>