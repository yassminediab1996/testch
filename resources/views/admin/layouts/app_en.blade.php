<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin_en/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('admin_en/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="{{asset('admin_en/assets/plugins/themify/css/themify.css')}}" rel="stylesheet" type="text/css">

    <!-- Angular Tooltip Css -->
    <link href="{{asset('admin_en/assets/plugins/angular-tooltip/angular-tooltips.css')}}" rel="stylesheet">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin_en/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Page level plugin CSS -->
    <link href="{{asset('admin_en/assets/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{asset('admin_en/assets/plugins/morris.js/morris.css')}}" rel="stylesheet">

    <!-- Page level plugin CSS -->
    <link href="{{asset('admin_en/css/animate.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('admin_en/css/glovia.css')}}" rel="stylesheet">
    <link href="{{asset('admin_en/css/glovia-responsive.css')}}" rel="stylesheet">

    <!-- Custom styles for Color -->
    <link href="{{asset('admin_en/css/skins/default.css')}}" rel="stylesheet">
    
    @yield('style')
</head>
<style>
.gredient-btn{
        background: #71c571 !important;
        color :white;
}
   .gredient-btn, .gredient-btn:hover
   {
        background: #71c571 !important;
   }
.theme-cl {
    color: #28a745;
}
    .br-theme {
    border-color: #277a3a !important;
}
.theme-bg {
    background-color: #28a745 !important;
}
.theme-bg {
    background: #3c8f4f !important;
}
.bg-dark {
    background-color: #1c3221 !important;
}
.br-light-dark {
    border-color: #28a745 !important;
}
.bg-light-dark {
    background-color: #2c4f34 !important;
}
#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
    color: #49a25d;
}
.header.header-logo .navbar-brand {
    color: #448f55;
}
</style>
<body class="fixed-nav sticky-footer" id="page-top">
@include('admin.layouts.navbar_en')
@yield('content')
</div>
 
 
@include('admin.layouts.footer_en')