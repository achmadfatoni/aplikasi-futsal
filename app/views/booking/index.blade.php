@extends('layouts.main')

@section('contents')
@if(Auth::guest())
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3">
            <h3 class="text-center">Login</h3>
            <p class="text-center">Anda harus login dulu</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3">
            <form method="POST" action="" role="form">
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
@else



@endif
@stop