@extends('layouts.d-blog')

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

@section('css')
    <style type="text/css">
        .matikan-link {
           pointer-events: none;
           cursor: default;
        } 
    </style>
@endsection()

@section('content')
<!-- BANNER POSTS -->
<section class="banners">
    <div class="container">
        <div class="row">
        	@foreach ($slide1 as $slides1)
            <div class="col-md-6 col-xs-12">
                <div class="banner-wrapper">
                    <a href="{{ url($slides1->slug) }}" title="{{ $slides1->judul }}">
                        <div class="banner-wrapper-content">
                            <h1 class="h2">{{ $slides1->judul }}</h1>
                            <span class="category-tag category-tag-white">
                            	<?php $first = true; ?>
                            	@foreach ($slides1->kategori as $kategori_posts)
                            		@if ($first)
                            		{{ $kategori_posts->nama_kategori }}
                            		<?php $first = false;  ?>
                            		@endif
                            	@endforeach
                            </span>
                            <time datetime="{{ $slides1->created_at }}" class="">{{ $slides1->created_at->toFormattedDateString() }}</time>
                        </div>
                    </a>
                    <img class="img-fluid" src="{{ asset($slides1->gambar) }}" alt="{{ $slides1->judul }}" data-rjs="2">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
        	@foreach ($slide2 as $slides2)
        	<div class="col-lg-4 col-md-6 col-xs-12">
                <div class="banner-wrapper">
                    <a href="{{ $slides2->slug }}" title="{{ $slides2->judul }}">
                        <div class="banner-wrapper-content">
                            <h1 class="h2">{{ str_limit($slides2->judul,10) }}</h1>
                            <span class="category-tag category-tag-white">
                            	<?php $first2 = true; ?>
                            	@foreach ($slides2->kategori as $kategori_posts2)
                            		@if ($first2)
                            		{{ $kategori_posts2->nama_kategori }}
                            		<?php $first2 = false;  ?>
                            		@endif
                            	@endforeach
                            </span>
                            <time datetime="{{ $slides2->created_at }}" class="">{{ $slides2->created_at->toFormattedDateString() }}</time>
                        </div>
                    </a>
                    <img class="img-fluid" src="{{ asset($slides2->gambar) }}" alt="{{ $slides2->judul }}" data-rjs="2">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end BANNER POSTS -->

<!-- MAIN -->
<main>
    <div class="container">
        <div class="row">
            <!-- ARTICLES -->
            <div class="col-lg-8 col-xs-12">
                <section class="articles">
                	<?php 
                        $warna_artikel = ['blue', 'red', 'yellow', 'green']; 
                    ?>

                    @if ($post->count() > 0)
                    @foreach ($post as $posts)
                    <article class="{{ $warna_artikel[array_rand($warna_artikel)] }}-article">
                        <div class="articles-header">
                            <time datetime="{{ $posts->created_at }}">{{ $posts->created_at->diffForHumans() }}</time>
                            <span class="articles-header-tag-blue"></span>
                            <span class="articles-header-category">
                            	@foreach ($posts->kategori as $post_kategoris)
                            	<a href="{{ url('kategori/' . $post_kategoris->slug) }}" class="blue" title="">{{ $post_kategoris->nama_kategori }}</a>
                            	@endforeach
                            </span>
                        </div>
                        <div class="articles-content">
                            <h1><a href="{{ url($posts->slug) }}" title="">{{ $posts->judul }}</a></h1>
                            {!! str_limit(strip_tags($posts->isi), 200) !!}
                        </div>
                        <div class="articles-footer">
                            <ul class="articles-footer-info">
                                <li><a href="#" class="light-link" title=""><i class="pe-7s-comment"></i> 0 Komentar</a>
                                </li>
                                <li><a href="#" class="light-link" title=""><i class="pe-7s-like"></i> 0</a></li>
                            </ul>
                            <a title="" class="btn" href="{{ url($posts->slug) }}">Read more</a>
                        </div>
                    </article>
                    @endforeach
                    @else
                    <article class="{{ $warna_artikel[array_rand($warna_artikel)] }}-article">
                        <div class="articles-header">
                            
                        </div>
                        <div class="articles-content">
                            <h3 class="text-center" style="text-align: center;">Tidak ada artikel :|</h3>
                        </div>
                        <div class="articles-footer">
                            
                        </div>
                    </article>
                    @endif

                    <!-- PAGINATION -->
                    @if ($post->lastPage() > 1)
                    <nav aria-label="...">
                        <a title="" href="{{ $post->url(1) }}" class="btn-small-white pagination-back {{ ($post->currentPage() == 1) ? 'matikan-link' : '' }}">Back</a>
                        <ul class="pagination">
                            @for ($i = 1; $i <= $post->lastPage(); $i++)
                            <li class="page-item {{ ($post->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $post->url($i) }}">{{ $i }} <span class="sr-only">(current)</span></a>
                            </li>
                            @endfor
                        </ul>
                        <a title="" href="{{ $post->url($post->currentPage()+1) }}" class="btn-small-white pagination-next{{ ($post->currentPage() == $post->lastPage()) ? ' matikan-link' : '' }}">Next</a>
                    </nav>
                    @endif
                </section>
            </div>

            @include('front.d-blog.module.sidebar')
        </div>
    </div>
</main>
<!-- end MAIN -->

@endsection