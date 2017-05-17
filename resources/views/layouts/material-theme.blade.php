<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        @yield('title')
		
		<link rel="shortcut icon" href="{{ asset('front/d-blog/img/favicon.png') }}" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="{{ asset('front/material-theme/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/material-theme/css/material-kit.css') }}">
        <link href="{{ asset('front/material-theme/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('front/material-theme/css/theme.css') }}" rel="stylesheet">
		
        <script src="{{ asset('front/material-theme/js/jquery.min.js') }}"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

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
    <body class="index-page">
		<nav class="navbar navbar-with navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ url('/') }}">
						<div class="logo-container">
							<div class="logo">
								<img src="{{ asset('front/d-blog/img/favicon.png') }}" alt="{{ $site_title }}" />
							</div>
							<div class="brand">
								{{ $site_title }}
							</div>
						</div>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navigation-index">
					
					<ul class="nav navbar-nav">
						<li >
							<a href="#">
								<i class="material-icons">weekend</i> Projects
							</a>
						</li>
						<li >
							<a href="#post">
								<i class="material-icons">view_module</i> Article
							</a>
						</li>
						<!--
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="material-icons">whatshot</i> Labs
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li ><a href="#"><i class="fa fa-code"></i> CODE</a></li>
								<li ><a href="#"><i class="fa fa-film"></i> GALLERY</a></li>
							</ul>
						</li>-->
					</ul>
					<div class="col-sm-3 col-md-3 navbar-right">
						{!! Form::open(['url' => 'cari', 'method' => 'GET', 'class' => 'navbar-form', 'role' => 'search']) !!}
							<div class="input-group">
								<input type="text" class="form-control" value="" name="q" placeholder="Cari">
								<div class="input-group-btn">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</nav>
		
		@yield('content')

		<footer class="footer">
			<div class="container">
				<nav class="menu-bottom pull-right">
					<ul>
						<li>
							<a href="{{ url('tentang') }}">
							Tentang
							</a>
						</li>
						<li>
							<a href="{{ asset('sitemap.xml') }}">
								  Sitemap
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright pull-left">
					<p>&copy; 2017 <a href="{{ url('/') }}" target="_BLANK">{{ $site_title }}</a>. Theme by <a href="https://github.com/creativetimofficial/material-kit" target="_BLANK">Material Kit</a>.</p>				
				</div>
			</div>
		</footer>

		<div id="keatas">
			<a href="#" class="btn btn-primary btn-fab btn-fab-mini btn-round"><i class="material-icons">keyboard_arrow_up</i></a>
		</div>

		<script src="{{ asset('front/material-theme/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('front/material-theme/js/material.min.js') }}"></script>
		<script src="{{ asset('front/material-theme/js/material-kit.js') }}"></script>

		@yield('js')
	</body>
</html>
