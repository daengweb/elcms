@extends('layouts.adminTheme-v1')

@section('title')
  <title>Tambah Baru - {{ $site_title }}</title>
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
   <style type="text/css">
     .tab-pane{
        height:150px;
        overflow-y:scroll;
    }
   </style>
@endsection

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="{{ route('post') }}"><i class="fa fa-edit"></i> Postingan</a></li>
        <li class="active">Tambah Baru</li>
      </ol>
    </section>

    <section class="content">
      {!! Form::open(['route' => 'post.simpan']) !!}
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-edit"></i> Tambah Baru</h3>
                </div>
                <div class="box-body">

                  @if (session('error'))
                  @component('component.alert-danger')
                      {{ session('error') }}
                  @endcomponent
                  @endif

                  <div class="form-group {{ $errors->has('judul') ? 'has-error':'' }}">
                    <label>Judul</label>
                    {!! Form::text('judul', old('judul'), ['class' => 'form-control', 'id' => 'judul', 'required' => true, 'placeholder' => 'Judul Postingan...']) !!}
                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                  </div>
                  <div class="form-group {{ $errors->has('isi') ? 'has-error':'' }}">
                    {!! Form::textarea('isi', old('isi'), ['class' => 'form-control', 'id' => 'isi']) !!}
                    <p class="text-danger">{{ $errors->first('isi') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header"></div>
                <div class="box-body">
                  <div class="form-group {{ $errors->has('meta_keyword') ? 'has-error':'' }}">
                    <label>Meta Keyword</label>
                    {!! Form::text('meta_keyword', old('meta_keyword'), ['class' => 'form-control', 'id' => 'meta_keyword', 'placeholder' => 'Keyword 1, Keyword 2...']) !!}
                    <p class="text-danger">{{ $errors->first('meta_keyword') }}</p>
                  </div>
                  <div class="form-group {{ $errors->has('meta_description') ? 'has-error':'' }}">
                    <label>Meta Description</label>
                    {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'id' => 'meta_description', 'placeholder' => 'Keyword 1, Keyword 2...', 'cols' => 5, 'rows' => 5]) !!}
                    <p class="text-danger">{{ $errors->first('meta_description') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header"></div>
                <div class="box-body">
                  <div class="form-group">
                    <p><strong>Waktu :</strong> {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
                  </div>
                  <div class="form-group {{ $errors->has('is_publish') ? 'has-error':'' }}">
                    <label>Status</label>
                    <select class="form-control" name="is_publish" required="" id="is_publish">
                      <option value="1">Aktif</option>
                      <option value="0">Draft</option>
                    </select>
                  </div>
                  <hr>
                  <div class="form-group">
                    <button class="btn btn-danger btn-sm btn-flat pull-right">Posting <i class="fa fa-send"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Kategori & Tag</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Semua Kategori</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                          @if ($kategori->count() > 0)
                          @foreach ($kategori as $kategoris)
                          <label>
                            <input type="checkbox" class="minimal" name="kategori_id[]" value="{{ $kategoris->id }}"> {{ $kategoris->nama_kategori }}
                          </label><br>
                          @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                  </div>
                  <div class="form-group {{ $errors->has('tag') ? 'has-error':'' }}">
                    <label>Tag</label>
                    {!! Form::text('tag', old('tag'), ['class' => 'form-control', 'id' => 'tag', 'placeholder' => 'Pisahkan dengan koma']) !!}
                    <p class="text-danger">{{ $errors->first('tag') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Gambar Utama</h3>
                </div>
                <div class="box-body">
                  <div class="form-group {{ $errors->has('gambar') }}">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      {!! Form::text('gambar', old('gambar'), ['class' => 'form-control', 'id' => 'thumbnail', 'required' => true, 'readonly' => true]) !!}
                    </div>
                    <p class="text-danger">{{ $errors->first('gambar') }}</p>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </section>
  </div>
@endsection

@section('js')
  <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
  <script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  </script>
  <script>
    CKEDITOR.replace('isi', {
      filebrowserImageBrowseUrl: "{{ url('/bd-admin/galeri?type=Images') }}",
      filebrowserImageUploadUrl: "{{ url('/bd-admin/galeri/upload?type=Images&_token=') }}",
      filebrowserBrowseUrl: "{{ url('/bd-admin/galeri?type=Files') }}",
      filebrowserUploadUrl: "{{ ('/bd-admin/galeri/upload?type=Files&_token=') }} "
    });
    CKEDITOR.config.allowedContent = true;
  </script>
  <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
  <script type="text/javascript">
    $('#lfm').filemanager('image');
  </script>
@endsection