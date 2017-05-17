@extends('layouts.adminTheme-v1')

@section('title')
  <title>Pengaturan - {{ $site_title }}</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-gears"></i> Pengaturan</h3>
            </div>
            <div class="box-body">
            {!! Form::model($setting, ['route' => 'pengaturan.update']) !!}

              @if (session('success'))
              @component('component.alert-success')
                  {{ session('success') }} <strong>Disimpan!</strong>
              @endcomponent
              @endif

              <div class="form-group {{ $errors->has('site_title') ? 'has-error':'' }}">
                <label>Nama Website</label>
                {!! Form::text('site_title', old('site_title'), ['class' => 'form-control', 'id' => 'site_title', 'required' => true, 'placeholder' => 'Nama Website']) !!}
                <p class="text-danger">{{ $errors->first('site_title') }}</p>
              </div>
              <div class="form-group {{ $errors->has('tagline') ? 'has-error':'' }}">
                <label>Tagline</label>
                {!! Form::text('tagline', old('tagline'), ['class' => 'form-control', 'id' => 'tagline', 'required' => true]) !!}
                <p class="text-danger">{{ $errors->first('tagline') }}</p>
              </div>
              <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                <label>Email</label>
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => true, 'placeholder' => 'admin@example.com']) !!}
                <p class="text-danger">{{ $errors->first('email') }}</p>
              </div>
              <div class="form-group {{ $errors->has('blog_show_item') ? 'has-error':'' }}">
                <label>Artikel Tampil</label>
                {!! Form::number('blog_show_item', old('blog_show_item'), ['class' => 'form-control', 'id' => 'blog_show_item', 'required' => true, 'min' => 1]) !!}
                <p class="text-danger">{{ $errors->first('blog_show_item') }}</p>
              </div>
              <div class="form-group {{ $errors->has('meta_keyword') ? 'has-error':'' }}">
                <label>Meta Keyword</label>
                {!! Form::textarea('meta_keyword', old('meta_keyword'), ['class' => 'form-control', 'id' => 'meta_keyword', 'cols' => 5, 'rows' => 5]) !!}
                <p class="text-danger">{{ $errors->first('meta_keyword') }}</p>
              </div>
              <div class="form-group {{ $errors->has('meta_description') ? 'has-error':'' }}">
                <label>Meta Description</label>
                {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'id' => 'meta_description', 'cols' => 5, 'rows' => 5]) !!}
                <p class="text-danger">{{ $errors->first('meta_description') }}</p>
              </div>
              <div class="form-group {{ $errors->has('google_webmaster') ? 'has-error':'' }}">
                <label>Google Webmaster</label>
                {!! Form::text('google_webmaster', old('google_webmaster'), ['class' => 'form-control', 'id' => 'google_webmaster']) !!}
                <p class="text-danger">{{ $errors->first('google_webmaster') }}</p>
              </div>
              <div class="form-group {{ $errors->has('bing_webmaster') ? 'has-error':'' }}">
                <label>Bing Webmaster</label>
                {!! Form::text('bing_webmaster', old('bing_webmaster'), ['class' => 'form-control', 'id' => 'bing_webmaster']) !!}
                <p class="text-danger">{{ $errors->first('bing_webmaster') }}</p>
              </div>
              <div class="form-group {{ $errors->has('google_analystic') ? 'has-error':'' }}">
                <label>Google Analystic</label>
                {!! Form::textarea('google_analystic', old('google_analystic'), ['class' => 'form-control', 'id' => 'google_analystic', 'cols' => 5, 'rows' => 5]) !!}
                <p class="text-danger">{{ $errors->first('google_analystic') }}</p>
              </div>
              <div class="form-group {{ $errors->has('pixel_fb') ? 'has-error':'' }}">
                <label>Pixel ID</label>
                {!! Form::text('pixel_fb', old('pixel_fb'), ['class' => 'form-control', 'id' => 'pixel_fb']) !!}
                <p class="text-danger">{{ $errors->first('pixel_fb') }}</p>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-sm btn-flat">Update <i class="fa fa-refresh"></i></button>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection