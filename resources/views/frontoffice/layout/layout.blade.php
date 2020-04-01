<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Diemme</title>
    <meta name=”keywords” content="abbigliamento, personalizzato, bici, ciclismo, Triathlon, sport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/themify-icons.cs') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area white-bg">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="/">
                                    <img src="{{ URL::asset('img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('index')}}">Home</a></li>
                                        <li><a href="{{route('news.index')}}">News</a></li>
                                        <li><a href="{{route('prodotti')}}">Prodotti</a></li>
                                        <li><a href="{{route('tecnologie')}}">Tecnologie</a></li>
                                        <li><a href="{{route('preventivi')}}">Preventivi</a></li>
                                        <li><a href="{{route('contatti')}}">Contatti</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        @auth
                        <div class="get_in_tauch">
                            <a href="#" class="boxed-btn">Pannello</a>
                        </div>
                        @endauth
                        @guest
                        <div class="get_in_tauch">
                            <a href="{{ route('login') }}" class="boxed-btn">Accedi</a>
                        </div>
                        @endguest
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')
    <!-- footer_start -->
    <footer class="footer" style="background-image: linear-gradient(black,#1F1F1F)">
        <div class="footer_top">
            <div class="container-fluid p-0">
                <div class="row no-gutters ">
                    <div class="col-xl-3 col-12 col-md-4">
                        <div class="footer_widget">
                            <ul class="social_links">
                                <li>
                                    <a href="https://www.facebook.com/technicalclothing/"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/diemme_abbigliamento/"><i
                                            class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-12 col-md-8">
                        <div class="footer_header d-flex justify-content-between">
                            <div class="footer_header_left">
                                <h3>Hai domande?</h3>
                                <p>Contattaci siamo a tua disposizione</p>
                            </div>
                            <div class="footer_btn">
                                <a href="contatti.html" class="boxed-btn2">Contatti</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copy_right">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <p>Sviluppato e ideato da Alessandro Sallese</p>
        </div>
    </footer>
    <!-- footer_end -->

    <!-- JS here -->
    <script src="{{ URL::asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('js/ajax-form.js') }}"></script>
    <script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('js/scrollIt.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ URL::asset('js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('js/nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins.js') }}"></script>

    <!--contact js-->
    <script src="{{ URL::asset('js/contact.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.form.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('js/mail-script.js') }}"></script>

    <script src="{{ URL::asset('js/main.js') }}"></script>



    <!-- Start cookieyes banner -->
    <script id="cookieyes" type="text/javascript"
        src="https://app.cookieyes.com/client_data/d417c2c353f0b0ee7f8e74f0.js"></script>
    <!-- End cookieyes banner -->


</body>

</html>