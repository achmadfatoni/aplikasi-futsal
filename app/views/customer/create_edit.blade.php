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
        @include('layouts.notifikasi')
    </div>
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{$actionUrl}}" method="POST" id="formPendaftaran">
            <input type="hidden" name="id" value="{{isset($id) ? $id : null}}"/>
            <div class="form-group">
                <label class="control-label col-lg-3" for="nama">Nama</label>
                <div class="col-lg-9">
                    <input type="text" name="nama" class="form-control" value="{{isset($customer->nama) ? $customer->nama : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="alamat">Alamat</label>
                <div class="col-lg-9">
                    <input type="text" name="alamat" class="form-control" value="{{isset($customer->alamat) ? $customer->alamat : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="no_telp">No Telepon</label>
                <div class="col-lg-9">
                    <input type="text" name="no_telp" class="form-control" value="{{isset($customer->no_telp) ? $customer->no_telp : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="team">Team</label>
                <div class="col-lg-9">
                    <input type="text" name="team" class="form-control" value="{{isset($customer->team) ? $customer->team : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_customer" class="col-lg-3 control-label">Jenis Customer *</label>
                <div class="col-lg-9">
                    <label class="radio-inline">
                        <input type="radio" name="jenis_customer" value="{{CUSTOMER_GOLD}}" required="" {{isset($customer->jenis_customer) ? ($customer->jenis_customer == CUSTOMER_GOLD) ? 'checked' : '' : 'checked'}}/> Gold
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_customer" value="{{CUSTOMER_SILVER}}" required="" {{isset($customer->jenis_customer) ? ($customer->jenis_customer == CUSTOMER_SILVER) ? 'checked' : '' : ''}}/> Silver
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

@section('js')
{{HTML::script('assets/js/jquery.validate.min.js')}}
@include('customer.js.create_validation')
    
@stop