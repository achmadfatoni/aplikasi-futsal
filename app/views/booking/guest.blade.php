@extends('layouts.main')

@section('contents')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3 class="text-center">Login</h3>
            <p class="text-center">Anda harus login dulu</p>
             <p class="text-center">jika anda belum mempunyai username dan password silakan datang ke aka benpas futsal mojokerto</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('layouts.notifikasi')
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{$actionLogin}}" role="form">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success centered" value="Login"/>
                </div>
            </form>
        </div>
    </div>
@stop