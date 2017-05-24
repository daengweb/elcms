@extends('layouts.helpzone')

@section('title')
	<title>{{ $site_title }} - {{ $tagline }}</title>

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
    <link rel="canonical" href="{{ url('/') }}" />
    <meta property="og:locale" content="id" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $site_title }} - {{ $tagline }}"/>
    <meta property="og:description" content="{{ $site_meta_description }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $site_meta_description }}" />
    <meta name="twitter:title" content="{{ $site_title }} - {{ $tagline }}" />
    <meta name="twitter:image" content="{{ asset('front/d-blog/img/logo-daengweb.png') }}" />  
@endsection

@section('content')
    <!-- Home Section -->
    <section class="home" data-parallax="scroll" data-image-src="{{ asset('front/material-theme/img/bg.jpg') }}">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 home__title">
            <div class="home__text-wrap">
                <div class="brand element"></div>
                <div class="home__search">
                    {!! Form::open(['url' => 'cari', 'method' => 'GET']) !!}
                        {!! Form::text('q', old('q'), ['placeholder' => 'Apa yang anda cari ?']) !!}
                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Section -->

    <!-- Articles Section -->
    <section class="section-padding-100 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h2>Artikel Terbaru</h2>
                    </div>
                </div>

                @if ($post->count() > 0)
                @foreach ($post as $posts)
                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-6">
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
                                    <a href="{{ url($posts->slug . '/#disqus_thread') }}"><i class="zmdi zmdi-comment-outline"></i></a>
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

                <!-- View all -->
                <div class="col-xs-12">
                    <div class="view-all">
                        <a href="{{ url('artikel') }}" class="default-button">View more</a>
                    </div>
                </div>
                <!-- End View all -->

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('front/material-theme/js/typed.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            var subtitles = [
            "<h1>D^500a^500e^500n^500g ^500W^500e^500b^500</h1> <h3 style='color: #fff'> ^2000 Media ^1000 Pemgrograman ^1000 Makassar ^1000</h3>"
            ];
            $(".element").typed({
                strings: subtitles,
                typeSpeed: 20,
                backDelay: 500,
                contentType: 'html'
            });
        });
    </script>
@endsection