@extends('layouts.adminTheme-v1')

@section('title')
    <title>Edit Kategori - {{ $site_title }}</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="{{ route('kategori') }}">Kategori</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-thumb-tack"></i> Edit Kategori</h3>
                        </div>
                        <div class="box-body">
                        {!! Form::model($kategori, ['route' => ['kategori.update', $kategori->slug], 'method' => 'PUT']) !!}
                            @if (session('error'))
                            @component('component.alert-danger')
                                {{ session('error') }}
                            @endcomponent
                            @endif
                            <div class="form-group {{ $errors->has('nama_kategori') ? 'has-error':'' }}">
                                <label>Nama Kategori</label>
                                {!! Form::text('nama_kategori', old('nama_kategori'), ['class' => 'form-control', 'id' => 'nama_kategori', 'required' => true, 'placeholder' => 'Nama Kategori']) !!}
                                <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
                            </div>
                            <div class="form-group {{ $errors->has('deskripsi') ? 'has-error':'' }}">
                                <label>Deskripsi</label>
                                {!! Form::textarea('deskripsi', old('deskripsi'), ['class' => 'form-control', 'id' => 'deskripsi', 'cols' => 5, 'rows' => 5]) !!}
                                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm btn-flat">Perbaharui</button>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection