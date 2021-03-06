@extends('layouts.material-theme')

@section('title')
	<title>{{ ucfirst($kategori->nama_kategori) }} - {{ $site_title }}</title>

    <meta name="description" content="{{ $kategori->deskripsi }}">
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
    <link rel="canonical" href="{{ url('/kategori/' . $kategori->slug) }}" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $kategori->nama_kategori }} - {{ $site_title }}"/>
    <meta property="og:description" content="{{ $kategori->deskripsi }}" />
    <meta property="og:url" content="{{ url('/kategori/' . $kategori->slug) }}" />
    <meta property="og:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $kategori->deskripsi }}" />
    <meta name="twitter:title" content="{{ $kategori->nama_kategori }} - {{ $site_title }}" />
    <meta name="twitter:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" /> 
@endsection

@section('css')
    <style type="text/css">
        .matikan-link {
           pointer-events: none;
           cursor: default;
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
                <div class="row">
                    <div id="masonry">
                        <ul class="grid">
                            @if ($post->count() > 0)
                            @foreach ($post as $posts)
                            <li class="col-md-6">
                                <div class="post">
                                    <a href="{{ url($posts->slug) }}">
                                        <img src="{{ asset($posts->gambar) }}" alt="{{ $posts->judul }}">
                                    </a>
                                    <div class="content">
                                        <h3><a href="{{ url($posts->slug) }}">{{ $posts->judul }}</a></h3>
                                        @foreach ($posts->kategori as $post_kategoris)
                                        <a href="{{ url('kategori/' . $post_kategoris->slug) }}" class="btn btn-white btn-tag btn-xs">{{ $post_kategoris->nama_kategori }}</a>
                                        @endforeach
                                        <div class="description">{{ strip_tags(str_limit($posts->isi, 200)) }}</div>
                                            
                                        <ul class="list-inline details">
                                            <li>
                                                <a><i class="material-icons">date_range</i>{{ $posts->created_at->diffForHumans() }}</a>
                                            </li>
                                            <li>
                                                <a><i class="material-icons">visibility</i>{{ $posts->dilihat }}</a>
                                            </li>
                                            <li class="pull-right">
                                                <a><i class="material-icons">comment</i></a><a href="#">0</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @else
                            <li class="text-center">Tidak ada artikel</li>
                            @endif
                        </ul>
                        <div class="pull-right">
                            {!! $post->links() !!}
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