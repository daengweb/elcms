@extends('layouts.adminTheme-v1')

@section('title')
    <title>Kategori - {{ $site_title }}</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Kategori</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-thumb-tack"></i> Tambah Baru</h3>
                        </div>
                        <div class="box-body">
                        {!! Form::open(['route' => 'kategori.store']) !!}
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
                                <button class="btn btn-primary btn-sm btn-flat">Tambah Baru</button>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    {!! Form::open(['route' => 'kategori.hapus', 'method' => 'DELETE']) !!}
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
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Slug</th>
                                            <th>Hitung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($kategori->count() > 0)
                                        @foreach ($kategori as $kategoris)
                                        <tr>
                                            <td>{!! Form::checkbox('hapus_kategori[]', $kategoris->id) !!}</td>
                                            <td><a href="{{ route('kategori.edit', ['slug' => $kategoris->slug]) }}"><strong>{{ $kategoris->nama_kategori }}</strong></a></td>
                                            <td>{{ $kategoris->deskripsi }}</td>
                                            <td>{{ $kategoris->slug }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada kategori</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Slug</th>
                                            <th>Hitung</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $kategori->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection