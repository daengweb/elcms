<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('front/elcms-theme/img/icon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('front/elcms-theme/img/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('front/elcms-theme/img/icon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('front/elcms-theme/img/icon/apple-touch-icon-152x152.png') }}">
    <link rel="icon" href="{{ asset('front/elcms-theme/img/icon/favicon.ico') }}">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700%7COpen+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/material-design-iconic-font.min.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/main.css') }}">
    <link id="switch-color" rel="stylesheet" href="{{ asset('front/elcms-theme/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('front/elcms-theme/css/media.css') }}">
    @yield('css')
</head>
<body>
    <div class="preloader">
        <div class="preloader__figure"></div>
    </div>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-4">
                    <a class="header__logo" href="{{ url('/') }}">
                        <img src="{{ asset('front/d-blog/img/favicon.png') }}" alt="{{ $site_title }}" width="50px" height="50px">
                    </a>
                </div>

                <div class="col-xs-2 col-sm-8">
                    <nav class="desktop-navigation-wrap">
                        <ul class="desktop-navigation">
                            <li>
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>

                            <li class="dropdown">
                                <a id="dropdown-link2" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artikel
                                <i class="zmdi zmdi-chevron-down"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-link2">
                                    @foreach ($site_kategori as $site_kategoris)
                                    <li>
                                        <a href="{{ url('/kategori/' . $site_kategoris->slug) }}">{{ $site_kategoris->nama_kategori }}</a>
                                    </li>
                                    @endforeach
                                    <li><a href="{{ url('/artikel') }}">Semua Kategori</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Projects</a></li>
                        </ul>   
                    </nav>
                    
                    <!-- mobile navigation button -->
                    <button class="navigation-button">
                        <i class="zmdi zmdi-menu"></i>
                        <i class="zmdi zmdi-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <div class="mobile-navigation">
        <ul>
            <li class="dropdown">
                <a href="{{ url('/') }}">Beranda</a>
            </li>

            <li class="dropdown">
                <a id="drop2" class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artikel<i class="zmdi zmdi-chevron-down"></i></a>

                <ul class="dropdown-menu" aria-labelledby="drop2">
                    @foreach ($site_kategori as $site_kategoris)
                    <a href="{{ url('/kategori/' . $site_kategoris->slug) }}">{{ $site_kategoris->nama_kategori }}</a>
                    @endforeach
                    <li><a href="{{ url('/artikel') }}">Semua Kategori</a></li>
                </ul>
            </li>
            <li><a href="#">Projects</a></li>
        </ul>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">

                <!-- Social links -->
                <div class="col-xs-12 col-sm-6 col-sm-push-6">
                    <ul class="footer__social-list">
                        <li><a href="https://www.facebook.com/DaengWebId/"><i class="zmdi zmdi-facebook"></i></a></li>
                        <li><a href="https://github.com/daengweb"><i class="zmdi zmdi-github-alt"></i></a></li>
                        <li><a href="{{ url('/sitemap.xml') }}"><i class="zmdi zmdi-navigation"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                    </ul>
                </div>
                <!-- End Social links -->

                <!-- Copyright -->
                <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                    <div class="footer__copyright">
                        <small>Copyright © 2017 <a href="#">{{ $site_title }}</a>. All Rights Reserved.</small>
                    </div>
                </div>
                <!-- End Copyright -->

                <!-- Back to top -->
                <button class="back-to-top"><i class="zmdi zmdi-chevron-up"></i></button>
                <!-- End Back to top -->
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!--JS-->
    <script src="{{ asset('front/elcms-theme/js/jquery-1.12.4.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBknhSY15CjOP_Ld9ThcX80ibC29uhP2jY"></script>
    <script src="{{ asset('front/elcms-theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/elcms-theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/elcms-theme/js/parallax.min.js') }}"></script>
    <script src="{{ asset('front/elcms-theme/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/elcms-theme/js/main.js') }}"></script>
    <script id="dsq-count-scr" src="//daengwebs.disqus.com/count.js" async></script>
    @yield('js')
</body>
</html>