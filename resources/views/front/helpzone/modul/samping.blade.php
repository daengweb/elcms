<div class="col-xs-12 col-md-4 col-lg-3 sidebar">
    <div class="row">
        <div class="col-xs-12">
            <ul class="widget category-menu">
                @foreach ($sidebar_kategori as $sidebar_kategoris)
                <li>
                    <a href="{{ url('kategori/' . $sidebar_kategoris->slug) }}">{{ $sidebar_kategoris->nama_kategori }} <span class="quantity">{{ $sidebar_kategoris->post_count }}</span></a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12">
            <div class="widget subscribe">
                <h4>Newsletter</h4>
                <form action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Email...">
                    </div>
                    <button type="button" class="default-button">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="widget subscribe">
                <h4>Tag</h4>
                @foreach ($site_tag as $site_tags)
                <a href="{{ url('tag/' . $site_tags->slug) }}" class="btn btn-primary btn-xs btn-flat">{{ $site_tags->nama_tag }}</a> 
                @endforeach  
            </div>
        </div>
    </div>
</div>