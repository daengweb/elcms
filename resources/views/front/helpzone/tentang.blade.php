@extends('layouts.helpzone')

@section('title')
	<title>Tentang Kami - {{ $site_title }}</title>

    <meta name="description" content="{{ $site_meta_description }}">
    <meta name="keywords" content="{{ $site_meta_keyword }}">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="all,index,follow" />
    <meta name="MSSmartTagsPreventParsing" content="TRUE">
    <meta http-equiv="Content-Language" content="id">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General"> 
    <link rel="shortcut icon" href="{{ asset('front/d-blog/img/favicon.png') }}"/>

    <meta property="og:site_name" content="{{ $site_title }}" />
    <link rel="canonical" href="{{ url('/tentang') }}" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Tentang Kami - {{ $site_title }}"/>
    <meta property="og:description" content="{{ $site_meta_description }}" />
    <meta property="og:url" content="{{ url('/tentang') }}" />
    <meta property="og:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $site_meta_description }}" />
    <meta name="twitter:title" content="Tentang Kami - {{ $site_title }}" />
    <meta name="twitter:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />  
@endsection

@section('content')
    <div class="article__head" data-parallax="scroll" data-image-src="{{ asset('front/elcms-theme/img/bg-artikel.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="title">
                        <h1>Tentang Kami</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="card-grid clearfix">
                            <div class="col-xs-12">
                                <div class="card faq-card">
                                    <div class="text-center">
                                        <img src="{{ asset('front/d-blog/img/favicon.png') }}" alt="{{ $site_title }}" class="img-circle img-responsive" width="100px" style="display: block; margin: 0 auto;">
                                    </div>
                                    <hr>
                                    <p>Daeng Web adalah sebuah website pembelajaran seputar pemrograman, tips & trik teknologi. Besar harapan <a href="{{ url('/') }}">Daengweb.id</a> dapat menjadi media belajar dan saling berbagi tentang programming, Saat ini <a href="{{ url('/') }}">Daeng Web</a> masih fokus kepada tutorial web: PHP, HTML, Javascript dan framework PHP seperti Laravel. Kedepannya dengan dukungan rekan-rekan semua, tutorial yang ada di Daeng Web akan semakin lengkap. Daeng Web, Media Pemrograman Makassar…</p>
                                    
                                    <hr>
                                    <div class="text-center">
                                        <a href="https://www.facebook.com/DaengWebId/" target="_BLANK" class="btn btn-primary btn-md"> 
                                            <i class="zmdi zmdi-facebook-box"></i>
                                        </a>
                                        <a href="https://github.com/daengweb" target="_BLANK" class="btn btn-default btn-md"> 
                                            <i class="zmdi zmdi-github-box"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection