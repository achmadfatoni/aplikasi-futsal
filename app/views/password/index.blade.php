@extends('layouts.main')

@section('contents')
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <h3>Ubah Password</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            @include('layouts.notifikasi')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" method="POST" action="{{ $action }}" id="formPassword">
                <!-- Input Password Lama -->
                <div class="form-group">
                    <label for="passwordLama" class="col-lg-3 col-md-3 col-sm-3 control-label">Password Lama</label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="text" name="passwordLama" class="form-control" }}/>
                    </div>
                </div>
                <!-- Input Password Baru -->
                <div class="form-group">
                    <label for="passworBaru" class="col-lg-3 col-md-3 col-sm-3 control-label">Password Baru</label>

                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="password" name="passwordBaru" id="password" class="form-control"/>
                    </div>
                </div>
                <!-- Input Konfirmasi Password -->
                <div class="form-group">
                    <label for="konfirmasiPassword" class="col-lg-3 col-md-3 col-sm-3 control-label">Konfirmasi
                        Password</label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="password" name="konfirmasiPassword" class="form-control"/>
                    </div>
                </div>
                <!-- Submit -->
                <div class="form-group">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-lg-offset-3 col-md-offset-3
                    col-sm-offset-3">
                        <input type="submit" class="btn btn-primary" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    {{HTML::script('assets/js/jquery.validate.min.js')}}
    <script>
        $(document).ready(function(){
            var formPassword = $('#formPassword');
            formPassword.validate({
               rules : {
                   'passwordLama' : 'required',
                   'passwordBaru' : 'required',
                   'konfirmasiPassword' : {
                       'required' : true,
                       'equalTo' : '#password'
                   }
               }
               ,
                messages :{
                    'passwordLama' : 'Password Lama harus diisi',
                    'passwordBaru' : 'Password Baru harus diisi',
                    'konfirmasiPassword' : {
                        'required' : 'Harus diisi',
                        'equalTo'  : 'Password tidak sama'
                    }
                }
            });
        });
    </script>
@stop