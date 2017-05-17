@extends('layouts.adminTheme-v1')

@section('title')
    <title>Edit User - {{ $site_title }}</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li><a href="{{ route('user') }}">User</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-thumb-tack"></i> Edit User</h3>
                        </div>
                        <div class="box-body">
                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                            @if (session('error'))
                            @component('component.alert-danger')
                                {{ session('error') }}
                            @endcomponent
                            @endif
                            <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                                <label>Nama Lengkap</label>
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name', 'required' => true, 'placeholder' => 'Nama Lengkap']) !!}
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                                <label>Email</label>
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => true, 'placeholder' => 'Email: cs@example.com', 'readonly' => true]) !!}
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="******">
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                                <label>Password Konfirmasi</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="******">
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="form-group {{ $errors->has('avatar') ? 'has-error':'' }}">
                                <label>Avatar</label>
                                @if ($user->avatar != NULL || $user->avatar != '')
                                <img src="{{ asset('uploads/img/' . $user->avatar) }}" class="img-responsive" width="250px" height="250px">
                                @else
                                <img src="{{ asset('uploads/img/user-default.png') }}" width="100px" height="100px" class="img-responsive">
                                @endif
                                <br><hr>
                                {!! Form::file('avatar', ['class' => 'form-control', 'id' => 'avatar']) !!}
                                <p class="text-danger">{{ $errors->first('avatar') }}</p>
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