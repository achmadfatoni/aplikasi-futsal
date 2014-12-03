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
        <form class="form-horizontal" action="{{$actionUrl}}" method="POST" id='formPangkat'>
            <input type="hidden" name="id" value="{{isset($id) ? $id : null}}"/>
            <div class="form-group">
                <label class="control-label col-lg-3" for="nama">Nama</label>
                <div class="col-lg-9">
                    <input type="text" name="name" class="form-control" value="{{isset($pangkat->name) ? $pangkat->name : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="alamat">Gaji</label>
                <div class="col-lg-9">
                    <input type="text" name="gaji" class="form-control" value="{{isset($pangkat->gaji) ? $pangkat->gaji : ''}}"/>
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
    @include('pangkat.js.create_edit_validation')
@stop