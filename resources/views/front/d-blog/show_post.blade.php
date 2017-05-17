@extends('layouts.d-blog')

@section('title')
	<title>{{ $post->judul }} - {{ $site_title }}</title>

    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keyword }}">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="all,index,follow" />
    <meta name="MSSmartTagsPreventParsing" content="TRUE">
    <meta http-equiv="Content-Language" content="id">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General"> 
    <link rel="shortcut icon" href="{{ asset('front/d-blog/img/favicon.png') }}"/>

    <meta property="og:site_name" content="{{ $site_title }}" />
    <link rel="canonical" href="{{ url($post->slug) }}" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->judul }} - {{ $site_title }}"/>
    <meta property="og:description" content="{{ $post->meta_description }}" />
    <meta property="og:url" content="{{ url($post->slug) }}" />
    <meta property="og:image" content="{{ asset($post->gambar) }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $post->meta_description }}" />
    <meta name="twitter:title" content="{{ $post->judul }} - {{ $site_title }}" />
    <meta name="twitter:image" content="{{ asset($post->gambar) }}" />  
@endsection

@section('css')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/styles/monokai-sublime.min.css">
    <style type="text/css">
        img-responsive {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('content')
<main>
	<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
    			<section class="articles articles-blog-post">
        			<article class="articles-blog-post">

                        <!-- TEXT ARTICLE -->
                        <div class="articles-header">
                            <time datetime="{{ $post->created_at }}">{{ $post->created_at->toFormattedDateString() }}</time>
                            <span class="articles-header-category">
                            	@foreach ($post->kategori as $kategoris)
                            	<a href="{{ url('kategori/' . $kategoris->slug) }}" class="green" title="">{{ $kategoris->nama_kategori }}</a>
                            	@endforeach
                            </span>
                        </div>
                        <div class="articles-content">
                            <h1 class="articles-content-blog-post-title">
                            	<a href="#" title="{{ $post->judul }}" style="text-decoration: none">{{ $post->judul }}</a>
                            </h1>
                            {!! $post->isi !!}
                        </div>
        			</article>
    			</section>
            </div>
        </div>
    </div>
    <!-- end ARTICLE BLOG POST -->

    <!-- ARTICLE BOTTOM INFO -->
    <div class="articles-info">

        <!-- ARTICLE BOTTOM INFO AUTHOR -->
        <section class="articles-info-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xs-12">

                        <div class="articles-footer">
                            <ul class="articles-footer-info">
                                <li><a title="" href="#" class="light-link"><i class="pe-7s-comment"></i> 0 Komentar</a></li>
                                <li><a title="" href="#" class="light-link"><i class="pe-7s-like"></i> 0</a></li>
                            </ul>
                            <button class="btn btn-light-blue"><a title="Write a response" href="#">Write a response</a></button>
                        </div>

                        <div class="articles-author">
                        	@if ($post->user->avatar != NULL || $post->user->avatar != '') 
                            <img src="img/profile-picture.png" alt="{{ $post->user->name }}" data-rjs="2">
                            @else
                            <img src="{{ asset('uploads/img/user-default.png') }}" alt="{{ $post->user->name }}" data-rjs="2">
                            @endif
                            <div class="articles-author-right">
                                <h4>{{ Auth::user()->name }}</h4>
                                <div class="social">
                                    <a href="" title="Twitter"><i class="icon-social_twitter_circle"></i></a>
                                    <a href="" title="Github"><i class="icon-social_github_circle"></i></a>
                                    <a href="" title="LinkedIn"><i class="icon-social_linkedin_circle"></i></a>
                                </div>
                                <p>{{ $post->user->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ARTICLE BOTTOM INFO LAST ARTICLES -->
        <section class="articles-info-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="articles-info-section-title">Artikel Terbaru</h1>
                    </div>
                </div>
            </div>

            <div class="banners">
                <div class="container">
                    <div class="row">
                    	@if ($artikel->count() > 0)
                    	@foreach ($artikel as $artikels)
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="banner-wrapper">
                                <a href="{{ url($artikels->slug) }}" title="Angular 2 versus React: There Will Be Blood">
                                    <div class="banner-wrapper-content">
                                        <h1 class="h2">{{ $artikels->judul }}</h1>
                                        @foreach ($artikels->kategori as $artikel_kategoris)
                                        <span class="category-tag category-tag-yellow">{{ $artikel_kategoris->nama_kategori }}</span>
                                        @endforeach
                            	
                                        <time datetime="{{ $artikels->created_at }}" class="">{{ $artikels->created_at->toFormattedDateString() }}</time>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                        	<h3 style="text-align: center">Tidak ada artikel Terbaru :|</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@section('js')
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
@endsection