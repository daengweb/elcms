@extends('layouts.material-theme')

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

    <script src="{{ asset('front/material-theme/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('front/material-theme/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/material-theme/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/material-theme/js/cbpGridGallery.js') }}"></script>

    <div class="wrapper wall">
        <div class="container">
            <div class="col-sm-8 col-md-8">
                <div class="post">
                    <div class="thumbnail blog-detail-thumb">
                        <img src="{{ asset($post->gambar) }}" alt="{{ $post->judul }}">
                    </div>
                    <div class="content">
                        <h1 class="site_title">{{ $post->judul }}</h1>
                        <ul class="list-inline details">
                            <li>
                                <a><i class="material-icons">date_range</i>{{ $post->created_at->toFormattedDateString() }}</a>
                            </li><li>
                                <a><i class="material-icons">visibility</i>{{ $post->dilihat }}</a>
                            </li><li>
                                <a><i class="material-icons">comment</i></a><a href="#">0</a>
                            <!--</li><li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Share">
                                    <i class="material-icons">share</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><div id="share" data-share="#"></div></li>
                                </ul>
                            </li>-->
                        </ul>
                        <div class="description">
                            {!! $post->isi !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <aside>
                    <h3><i class="fa fa-tags"></i> Kategori</h3>
                    <ul>
                        @foreach ($site_kategori as $site_kategoris)
                        <li><a href="{{ url('kategori/' . $site_kategoris->slug) }}">{{ $site_kategoris->nama_kategori }}</a></li>
                        @endforeach
                    </ul>           
                </aside>
                <!--
                <aside>
                    <h3><i class="fa fa-star"></i> Populer</h3>
                    <div class="small-post">
                        <a href="#"><img src="#" alt="#"></a>
                        <a href="#"><p>#</p></a>
                    </div>
                </aside>-->
                <aside>
                    <h3><i class="fa fa-hashtag"></i> Tags</h3>
                    @foreach ($site_tag as $site_tags)
                    <a href="{{ url('tag/' . $site_tags->slug) }}" class="btn btn-white btn-tag btn-xs ">{{ $site_tags->nama_tag }}</a> 
                    @endforeach             
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection