@extends('layouts.adminTheme-v1')

@section('title')
    <title>Tag - {{ $site_title }}</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Tag</li>
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
                        {!! Form::open(['route' => 'tag.store']) !!}
                            @if (session('error'))
                            @component('component.alert-danger')
                                {{ session('error') }}
                            @endcomponent
                            @endif
                            <div class="form-group {{ $errors->has('nama_tag') ? 'has-error':'' }}">
                                <label>Nama Tag</label>
                                {!! Form::text('nama_tag', old('nama_tag'), ['class' => 'form-control', 'id' => 'nama_tag', 'required' => true, 'placeholder' => 'Nama Tag']) !!}
                                <p class="text-danger">{{ $errors->first('nama_tag') }}</p>
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
                    {!! Form::open(['route' => 'tag.hapus', 'method' => 'DELETE']) !!}
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
                                            <th>Nama Tag</th>
                                            <th>Deskripsi</th>
                                            <th>Slug</th>
                                            <th>Hitung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($tag->count() > 0)
                                        @foreach ($tag as $tags)
                                        <tr>
                                            <td>{!! Form::checkbox('hapus_tag[]', $tags->id) !!}</td>
                                            <td><a href="{{ route('tag.edit', ['slug' => $tags->slug]) }}"><strong>{{ $tags->nama_tag }}</strong></a></td>
                                            <td>{{ $tags->deskripsi }}</td>
                                            <td>{{ $tags->slug }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada tag</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Tag</th>
                                            <th>Deskripsi</th>
                                            <th>Slug</th>
                                            <th>Hitung</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $tag->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection