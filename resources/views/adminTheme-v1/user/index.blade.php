@extends('layouts.adminTheme-v1')

@section('title')
    <title>User - {{ $site_title }}</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">

                        </div>
                        <div class="box-body">
                            @if (session('success'))
                            @component('component.alert-success')
                                {!! session('success') !!}
                            @endcomponent
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($user->count() > 0)
                                        @foreach ($user as $users)
                                        <tr>
                                            <td></td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', ['id' => $users->id]) }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada user</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="pull-right">
                                {!! $user->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection