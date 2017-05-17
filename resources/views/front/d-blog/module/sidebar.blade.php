<!-- AUTHOR -->
<div class="aside-blocks col-lg-4 col-xs-12">
    <!--
    <aside class="author">
        <img src="{{ asset('uploads/img/nuge.jpg') }}" alt="" data-rjs="2" class="img-responsive" width="200px" height="250px">
        <h2>Anugrah Sandi</h2>
        <span class="author-info">Web Developer</span>
        <span class="author-info">Dropshipperbisinfo.co.id</span>
        <div class="social">
            <a href="" title="Twitter"><i class="icon-social_twitter_circle"></i></a>
            <a href="" title="Github"><i class="icon-social_github_circle"></i></a>
            <a href="" title="LinkedIn"><i class="icon-social_linkedin_circle"></i></a>
        </div>
        <ul class="author-nav">
            <li><a href="" title=""><i class="pe-7s-bookmarks"></i> Download my CV</a></li>
            <li><a href="" title=""><i class="pe-7s-paper-plane"></i> Write message</a></li>
        </ul>
    </aside>
    -->
    <aside class="categories">
        <h2 class="aside-title">Kategori</h2>
        <ul>
            <?php 
                $warna_kategori = ['blue', 'red', 'yellow', 'green']; 
            ?>
            @foreach ($site_kategori as $site_kategoris)
                <li class="nav-elipse-{{ $warna_kategori[array_rand($warna_kategori)] }}">
                    <a href="{{ url('kategori/' . $site_kategoris->slug) }}" title="{{ $site_kategoris->nama_kategori }}">{{ $site_kategoris->nama_kategori }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
    <!--
    <aside class="advertisement">
        <a href=""><img src="img/advertisement.jpg" alt="Advertisement" data-rjs="2"></a>
    </aside>

    <aside class="last-project">
        <h2 class="aside-title">Last Project</h2>
        <div class="last-project-one">
            <h3 class="h4"><a href="">Microsoft TypeScript</a></h3>
            <time datetime="2016-12-31T23:59:59Z">January 18, 2016</time>
            <p class="font-primary">TypeScript starts from the same syntax and semantics that millions of
                            JavaScript developers know... </p>
            <a href="#" title="Watch it" class="btn btn-small">Watch it</a>
        </div>
    </aside>
    -->

    <aside class="tags">
        <h2 class="aside-title">Tags</h2>
        <div class="tags-content">
            @foreach ($site_tag as $site_tags)
            <span class="tag tag-pill tag-default"><a href="{{ url('tag/' . $site_tags->slug) }}">{{ $site_tags->nama_tag }}</a></span>
            @endforeach
        </div>
    </aside>
</div>