<!DOCTYPE html>
<html lang="en" data-random-animation="false" data-animation="24">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <!--Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="vcard, resume, portfolio, cv curriculum vitae" />
    <meta name="description" content="vCard / Resume / ielemson cv " />
    <meta name="author" content="Elemson Ifeanyi" />

    <!--Page Title-->
    <title>ielemson - vCard / Resume/ CV</title>

    <!--Plugins Css-->
    <link rel="stylesheet" href="{{ asset('resume/css/plugins.css') }}">
    <!--Main Styles Css-->
    <link rel="stylesheet" href="{{ asset('resume/css/style.css') }}">
   
    <!--Color Css-->
    <link class="site-color" rel="stylesheet" href="{{ asset('resume/css/blue-color.css') }}">

    <!--Modernizr Js-->
    <script src="{{ asset('resume/js/modernizr.js') }}"></script>

    <!--Favicons-->
    <link rel="shortcut icon" href="{{asset('resume/img/favicon.png')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900%7cOpen+Sans:400,600,700,800"
        rel="stylesheet">
        <!--====== Toaster Alert css ======-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('before-styles')

    @stack('after-styles')

</head>

<body>

    <!--Preloader Start-->
    @include('includes.preloader')
    <!--Preloader End-->

    <div id="page">

        <!--Header Start-->
        @include('includes.header')
        <!--Header End-->

        <!--Main Start-->
        <div id="main" class="site-main">

        <!--Banner Section Start-->

        @include('includes.banner')
        <!--Banner Section End-->


        <!--About Section Start-->
        {{-- <x-about/> --}}
        @include('includes.about')
        <!--About Section Start-->


        <!--Resume Section Start-->
        @include('includes.resume')
        <!--Resume Section End-->


        <!--Porfolio Section Start-->
        @include('includes.portfolio')
        
        <!--Porfolio Section End-->


        <!--Blog Section Start-->
        {{-- <x-blog/> --}}
        <!--Blog Section End-->


        <!--Contact Section Start-->
        @include('includes.contact-us')
        <!--Contact Section End-->


        </div>
        <!--Main End-->

    </div>

    <!--Ajax Portfolio Container Start-->
    <div class="ajax-portfolio-popup">
        <span class="ajax-loader"></span>
        <div class="navigation-wrap">
            <span class="popup-close"><i class="fas fa-times-circle"></i></span>
        </div>
        <div class="content-wrap">
            <div class="popup-content"></div>
        </div>
    </div>
    <!--Ajax Portfolio Container End-->

    <!--Jquery JS-->
    <script src="{{ asset('resume/js/jquery.min.js') }}"></script>
    <!--Plugins JS-->
    <script src="{{ asset('resume/js/plugins.min.js') }}"></script>
    <script src="{{ asset('resume/js/main.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('custom-scripts')

</body>

</html>
