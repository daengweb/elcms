@extends('layouts.adminTheme-v1')

@section('title')
    <title>Postingan - {{ $site_title }}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <a href="{{ route('post.tambah') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i> Tambah Baru</a>
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Postingan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'post.hapus', 'method' => 'DELETE']) !!}
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="action" required="" id="action">
                                        <option value="">Bulk Action</option>
                                        <option value="y">Hapus</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-sm btn-flat">Terapkan</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            @if (session('success'))
                            @component('component.alert-success')
                                {!! session('success') !!}
                            @endcomponent
                            @endif

                            @if (session('error_action'))
                            @component('component.alert-danger')
                                {{ session('error_action') }}
                            @endcomponent
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Author</th>
                                            <th>Kategori</th>
                                            <th>Tag</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Dilihat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($post->count() > 0)
                                        @foreach ($post as $posts)
                                        <tr>
                                            <td><input type="checkbox" name="hapus_post[]" value="{{ $posts->id }}" class="minimal"></td>
                                            <td><a href="{{ route('post.edit', ['slug' => $posts->slug]) }}"><strong>{{ $posts->judul }}</strong></a></td>
                                            <td>{{ $posts->user->name }}</td>
                                            <td>
                                                @foreach ($posts->kategori as $kategori)
                                                <a href="{{ url(route('kategori.edit', [$kategori->slug])) }}">{{ $kategori->nama_kategori }}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($posts->tag as $tag)
                                                <a href="{{ route('tag.edit', [$tag->slug]) }}">{{ $tag->nama_tag }}</a>
                                                @endforeach
                                            </td>
                                            <td>{{ $posts->created_at->format('d-m-Y H:i:s') }}</td>
                                            <td>
                                                @if ($posts->is_publish == 1)
                                                <label class="label label-success">Aktif</label>
                                                @else
                                                <label class="label label-default">Draft</label>
                                                @endif
                                            </td>
                                            <td>{{ $posts->dilihat }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada Postingan</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Author</th>
                                            <th>Kategori</th>
                                            <th>Tag</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Dilihat</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $post->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
  </script>
@endsection