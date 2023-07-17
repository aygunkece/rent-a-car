<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jewel Theme">
    <meta name="description" content="Wheel - Responsive and Modern Car Rental Website Template">
    <meta name="keywords" content="">
    <title>@yield("title")</title>
    <link rel="shortcut icon" href="{{ asset("wheel/images/favicon.ico") }}" type="image/x-icon">
    <!-- reset css -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/front/css/css_reset.css") }}">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/front/css/bootstrap.min.css") }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/front/css/jquery.datetimepicker.min.css") }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset("assets/front/css/bootstrap-select.min.css") }}">
    <!-- preload -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/front/css/loaders.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/front/css/index.css") }}">
    @yield("style")
    <!--[if lt IE 9]>
    <script src="{{ asset("assets/front/js/html5shiv.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/respond.min.js") }}"></script>
    <![endif]-->
</head>
<body class="">
<!-- MAIN -->
{{--<div class="load-wrap">--}}
{{--    <div class="wheel-load">--}}
{{--        <img src="{{ asset("wheel/images/loader.gif") }}" alt="" class="image">--}}
{{--    </div>--}}
{{--</div>--}}
@include("layouts.sections.front.header")
@yield("content")
<!-- ////////////////////////////////////////// -->
<!-- FOOTER -->
<!-- ///////////////// -->
@include("layouts.sections.front.footer")
<!-- Scripts project -->
<script type="text/javascript" src="{{ asset("assets/front/js/jquery-2.2.4.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/front/js/bootstrap.min.js") }}"></script>
<!-- count -->
<script type="text/javascript" src='{{ asset("assets/front/js/jquery.countTo.js") }}'></script>
<!-- google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt5tJTim4lOO3ojbGARhPd1Z3O3CnE-C8" type="text/javascript"></script>
<!-- swiper -->
<script type="text/javascript" src="{{ asset("assets/front/js/idangerous.swiper.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/front/js/equalHeightsPlugin.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/front/js/jquery.datetimepicker.full.min.js") }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="{{ asset("assets/front/js/bootstrap-select.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/front/js/index.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@include('sweetalert::alert')
@yield("js")
<script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>
</body>
</html>
