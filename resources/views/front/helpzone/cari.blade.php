@extends('layouts.helpzone')

@section('title')
    <title>{{ ucfirst($q) }} - {{ $site_title }}</title>

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
    <link rel="canonical" href="{{ url('/cari?q=' . $q) }}" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $q }} - {{ $site_title }}"/>
    <meta property="og:description" content="{{ $site_meta_description }}" />
    <meta property="og:url" content="{{ url('/cari?q=' . $q) }}" />
    <meta property="og:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $site_meta_description }}" />
    <meta name="twitter:title" content="{{ $q }} - {{ $site_title }}" />
    <meta name="twitter:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />  
@endsection

@section('content')
    <section class="page-title" data-parallax="scroll">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="headkatag">{{ ucfirst($q) }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="border-bottom">
        @include('front.helpzone.modul.filter')

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <div class="row">

                        <div class="card-grid clearfix">
                            @if ($post->count() > 0)
                            @foreach ($post as $posts)
                            <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6">
                                <div class="card article-card article-card--white">
                                    <img src="{{ asset($posts->gambar) }}" class="img-responsive" width="100%">
                                    <div class="card-wrap" style="padding-top: 150px">
                                        <a href="{{ url($posts->slug) }}"></a>

                                        @foreach ($posts->kategori as $post_kategoris)
                                        <span class="category category--purple">{{ $post_kategoris->nama_kategori }}</span>
                                        @endforeach


                                        <h3>{{ str_limit($posts->judul, 40) }}</h3>
                                        <p>{{ strip_tags(str_limit($posts->isi, 200)) }}</p>
                                        <ul class="statistic">
                                            <li class="likes">
                                                <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <span>{{ $posts->dilihat }}</span>
                                            </li>
                                            <li class="comments">
                                                <a href="#"><i class="zmdi zmdi-comment-outline"></i></a>
                                                <span>0</span>
                                            </li>
                                            <li class="comments">
                                                <a href="#"><i class="zmdi zmdi-time"></i></a>
                                                <span>{{ $posts->created_at->diffForHumans() }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <h3 class="text-center">Tidak ada artikel</h3>
                            </div>
                            @endif
                        </div>

                        <div class="col-xs-12 text-center">
                            {!! $post->appends(compact('q'))->links() !!}
                        </div>
                    </div>
                </div>
                @include('front.helpzone.modul.samping')
            </div>
        </div>
    </section>
@endsection