@extends('layouts.material-theme')

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

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/styles/monokai-sublime.min.css">
    <style type="text/css">
        .hljs {
            white-space: pre;
            overflow-x: auto;
        }
        .site_title {
            font-size: 23pt;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="wrapper profile-page">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{ asset('front/d-blog/img/favicon.png') }}" alt="{{ $site_title }}" class="img-circle img-responsive img-raised">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $site_title }}</h3>
                            </div>
                        </div>
                        <div class="description text-center">
                            <p>Daeng Web adalah sebuah website pembelajaran seputar pemrograman, tips & trik teknologi. Besar harapan <a href="{{ url('/') }}">Daengweb.id</a> dapat menjadi media belajar dan saling berbagi tentang programming, Saat ini <a href="{{ url('/') }}">Daeng Web</a> masih fokus kepada tutorial web: PHP, HTML, Javascript dan framework PHP seperti Laravel. Kedepannya dengan dukungan rekan-rekan semua, tutorial yang ada di Daeng Web akan semakin lengkap. Daeng Web, Media Pemrograman Makassar…</p>
                        </div>
                        <div class="row findme-area text-center" style="padding-bottom: 30px">
                            <a href="https://www.facebook.com/DaengWebId/" target="_BLANK" class="btn btn-facebook"> 
                                <i class=" fa fa-facebook"></i>
                            </a>
                            <a href="https://github.com/daengweb" target="_BLANK" class="btn btn-github"> 
                                <i class=" fa fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection