@extends('layouts.helpzone')

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
    <div class="article">
        <div class="article__head" data-parallax="scroll" data-image-src="{{ asset('front/elcms-theme/img/bg-artikel.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <div class="title">
                            @foreach ($post->kategori as $post_kategoris)
                            <a href="{{ url('kategori/' . $post_kategoris->slug) }}"><div class="category category--orange">{{ $post_kategoris->nama_kategori }}</div></a>
                            @endforeach
                            <h1>{{ $post->judul }}</h1>
                            <div class="share">
                                <button class=""><i class="zmdi zmdi-share"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <div class="widget subscribe">
                        <div class="article__text">
                            {!! $post->isi !!}
                        </div>

                        <ul class="article__statistic">
                            <li class="likes">
                                <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                <span>{{ $post->dilihat }}</span>
                            </li>
                            <li class="comments">
                                <a href="#"><i class="zmdi zmdi-time"></i></a>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </li>
                        </ul>
                    </div>

                    <div id="disqus_thread"></div>
                    <script>

                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    
                    var disqus_config = function () {
                    this.page.url = '{{ url($post->slug) }}';  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = '{{ $post->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://daengwebs.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                    
                </div>
                @include('front.helpzone.modul.samping')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection