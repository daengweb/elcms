<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/avatar04.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Post Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('post') }}"><i class="fa fa-circle-o-notch"></i> Semua Postingan</a></li>
            <li><a href="{{ route('post.tambah') }}"><i class="fa fa-circle-o-notch"></i> Tambah Baru</a></li>
            <li><a href="{{ route('kategori') }}"><i class="fa fa-circle-o-notch"></i> Kategori</a></li>
            <li><a href="{{ route('tag') }}"><i class="fa fa-circle-o-notch"></i> Tag</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-globe"></i>
            <span>Konfigurasi Web</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('pengaturan') }}"><i class="fa fa-circle-o-notch"></i> Pengaturan</a></li>
            <li><a href="{{ route('user') }}"><i class="fa fa-circle-o-notch"></i> User</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>