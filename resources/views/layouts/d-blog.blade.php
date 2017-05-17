
<!doctype html>
<html lang="en">
<head>
    <!-- GENERAL -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @yield('title')

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/Pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/social-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/owl.theme.css') }}">

    <!-- MY CSS -->
    <link rel="stylesheet" href="{{ asset('front/d-blog/css/main.css') }}">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="images/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32">
    @yield('css')

    @if ($site_pixel_fb != NULL || $site_pixel_fb != '')
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ $site_pixel_fb }}'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id={{ $site_pixel_fb }}&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
    @endif

    @if ($site_google_webmaster != NULL || $site_google_webmaster != '')
        {!! $site_google_webmaster !!}
    @endif

    @if ($site_bing_webmaster != NULL || $site_bing_webmaster != '')
        {!! $site_bing_webmaster !!}
    @endif

    @if ($site_google_analystic != NULL || $site_google_analystic != '')
        {!! $site_google_analystic !!}
    @endif
</head>
<body>

<!-- HEADER -->
<header class="navbar-fixed-top">
    <div class="container">
        <div class="row">
            <!-- HEADER TOP -->
            <div class="col-lg-12">
                <div class="header-top">
                    <div class="header-top-logo">
                        <a href="{{ url('/') }}" title="Logo">
                            <img src="{{ asset('front/d-blog/img/favicon.png') }}" alt="{{ $site_title }}" width="32px" height="32px" data-rjs="2">
                        </a>
                    </div>
                    <div class="header-top-text">
                        <!--<p><span class="font-italic">“Modern Javascript”</span>
                            book is available! <a href="shop.html" title="Modern Javascript Book">Check out<i
                                    class="pe-7s-angle-right"></i></a>
                        </p>-->
                    </div>
                    <nav class="header-top-nav">
                        <ul>
                            <li class="header-top-nav-search">
                                <a href="#" class="light-link" title="Search"><i class="pe-7s-search"></i></a>
                                {!! Form::open(['url' => 'cari', 'method' => 'GET']) !!}
                                    <input type="text" class="form-control" placeholder="Cari..." name="q">
                                    <button type="submit"><i class="pe-7s-search"></i></button>
                                {!! Form::close() !!}
                            </li>
                            <li><a href="#" class="light-link" title="Menu">
                                <div id="menu-animate-icon" class="header-top-nav-menu-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- end HEADER TOP -->

            <!-- HEADER NAVIGATION -->
            <div class="col-lg-12">
                <nav class="header-nav">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}" title="Start page">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" title="Blog articles">Artikel</a>
                            <ul class="dropdown-menu">
                                <?php 
                                    $data = ['blue', 'red', 'yellow', 'green']; 
                                ?>
                                @foreach ($site_kategori as $site_kategoris)
                                    <li class="nav-elipse-{{ $data[array_rand($data)] }}">
                                        <a href="{{ url('kategori/' . $site_kategoris->slug) }}" title="{{ $site_kategoris->nama_kategori }}">{{ $site_kategoris->nama_kategori }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#" title="About me">Tentang Kami</a></li>
                        <li><a href="#" title="My projects">My projects</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- end HEADER NAVIGATION -->
    </div>
</header>
<!-- end HEADER -->

<!-- MOBILE NAVIGATION -->
<nav class="mobile-nav header-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Auto Copy Header Navigation -->
            </div>
        </div>
    </div>
</nav>
<!-- end MOBILE NAVIGATION -->

    @yield('content')

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <!--
            <div class="col-md-4 col-xs-12">
                <div class="footer-section">
                    <h3 class="footer-section-title">Last Responses</h3>
                    <ul class="footer-section-content">
                        <li class="footer-section-content-response">
                            <img src="img/profile-picture2.png" alt="Profile Picture" data-rjs="2">
                            <div class="footer-section-content-response-wrapper">
                                <h4>
                                    <span class="response-author">Jobby Foster</span> 
                                    in <a href="" class="response-subject light-link" title="Subject Response">Want
                                    to learn
                                    Javascript in 2016?</a>
                                </h4>
                                <p class="font-primary">Love this guy and his dog, really nice work!</p>
                            </div>
                        </li>

                        <li class="footer-section-content-response">
                            <img src="img/profile-picture3.png" alt="Profile Picture" data-rjs="2">
                            <div class="footer-section-content-response-wrapper">
                                <h4>
                                    <span class="response-author">Sheryl Winarick</span> in 
                                    <a href="" class="response-subject light-link" title="Subject Response">Want
                                    to learn
                                    Javascript in 2016?</a>
                                </h4>
                                <p class="font-primary">Love the way you did the background image man.</p>
                            </div>
                        </li>

                        <li class="footer-section-content-response">
                            <img src="img/profile-picture4.png" alt="Profile Picture" data-rjs="2">
                            <div class="footer-section-content-response-wrapper">
                                <h4>
                                    <span class="response-author">Jobby Foster</span> in 
                                    <a href="" class="response-subject light-link" title="Subject Response">Want
                                    to learn
                                    Javascript in 2016?</a>
                                </h4>
                                <p class="font-primary">Really nice style. I need to take note for drawing people!</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-xs-12">
                <div class="footer-section">
                    <h3 class="footer-section-title">Last Tweet</h3>
                    <ul class="footer-section-content">

                        <li class="footer-section-content-twitt">
                            <h4><a href="#" title="microsoft">@microsoft</a></h4>
                            <time datetime="2016-12-31T23:59:59Z">3 days ago</time>
                            <p class="font-primary">She's climbing #50Peaks in 50 states in 50 days. Meet 
                                <a href="" title="" class="light-link">http://msft.it/Melissa</a>
                            </p>
                        </li>

                        <li class="footer-section-content-twitt">
                            <h4><a href="" title="microsoft">@microsoft</a></h4>
                            <time datetime="2016-12-31T23:59:59Z">3 days ago</time>
                            <p class="font-primary">She's climbing #50Peaks in 50 states in 50 days. Meet 
                                <a href="" title="" class="light-link">http://msft.it/Melissa</a>
                            </p>
                        </li>

                        <li class="footer-section-content-twitt">
                            <h4><a href="" title="microsoft">@microsoft</a></h4>
                            <time datetime="2016-12-31T23:59:59Z">3 days ago</time>
                            <p class="font-primary">She's climbing #50Peaks in 50 states in 50 days. Meet 
                                <a href="" title="" class="light-link">http://msft.it/Melissa</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-xs-12">
                <div class="footer-section border-bottom">
                    <img src="img/logo-grey.png" alt="" class="footer-section-title-img" data-rjs="2">
                    <div class="footer-section-content">
                        <p class="font-primary footer-section-content-about">
                            D -Blog is a responsive, beautiful, <span class="black">creative & unique</span> wordpress
                            theme best suited for blogs & personal
                            portfolio showcases. It’s
                            easy to use &amp; setup, <span class="black">SEO friendly</span> and has top notch standard
                            compliant code.
                        </p>
                    </div>
                </div>

                <div class="footer-section">
                    <h3 class="footer-section-title footer-section-newsletter">Newsletter</h3>
                    <div class="footer-section-content">
                        <p class="font-primary ">Stay up to do date with my posts, subscribe to newsletter:</p>
                        <form action="#" method="post">
                            <input type="text" class="form-control" placeholder="Type Email">
                        </form>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>

    <!-- COPYRIGHT -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="copyright">
                    <ul>
                        <li><a href="#" title="Twitter"><i class="icon-social_twitter_circle"></i></a></li>
                        <li><a href="https://github.com/daengweb" target="_blank" title="Github"><i class="icon-social_github_circle"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/anugrah-sandi-307bb9a3/" target="_blank" title="LinkedIn"><i class="icon-social_linkedin_circle"></i></a></li>
                    </ul>
                    <p class="font-primary">&copy; Copyright <a href="{{ url('/') }}" title="" class="black">Daengweb.id</a> . All
                        Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end COPYRIHT -->
</footer>
<!-- end FOOTER -->


<!-- EXTERNAL JAVASCRIPT -->
<script type="text/javascript" src="{{ asset('front/d-blog/js/jquery-1.12.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/d-blog/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/d-blog/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('front/d-blog/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/d-blog/js/webfont.js') }}"></script>

<!-- MY JAVASCRIPT -->

@yield('js')
<script type="text/javascript" src="{{ asset('front/d-blog/js/retina.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/d-blog/js/scripts.js') }}"></script>
</body>
</html>