@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <h3>TAMBAH CUSTOMER</h3>
        <hr>
    </div>
</div>
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{$actionUrl}}" method="POST">
            <div class="form-group">
                <label class="control-label col-lg-3" for="username">Username</label>
                <div class="col-lg-9">
                    <input type="text" name="username" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="nama">Nama</label>
                <div class="col-lg-9">
                    <input type="text" name="nama" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="password">Password</label>
                <div class="col-lg-9">
                    <input type="text" name="password" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="alamat">Alamat</label>
                <div class="col-lg-9">
                    <input type="text" name="alamat" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="no_telp">No Telepon</label>
                <div class="col-lg-9">
                    <input type="text" name="no_telp" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="team">Team</label>
                <div class="col-lg-9">
                    <input type="text" name="team" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_customer" class="col-lg-3 control-label">Jenis Customer *</label>
                <div class="col-lg-9">
                    <label class="radio-inline">
                        <input type="radio" name="jenis_customer" value="{{CUSTOMER_GOLD}}" checked required=""/> Gold
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_customer" value="{{CUSTOMER_SILVER}}" required=""/> Silver
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-success pull-right" value="simpan" type="submit"/>
            </div>
        </form>
    </div>
</div>

@stop