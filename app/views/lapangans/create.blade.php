@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <h3>TAMBAH LAPANGAN</h3>
        <hr>
    </div>
</div>
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        @include('layouts.notifikasi')
    </div>
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{URL::to('lapangan')}}" method="POST" id="formLapangan">
            <div class="form-group">
                <label class="control-label col-md-3" for="nama">Nama</label>
                <div class="col-md-9">
                    <input type="text" name="nama" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="alamat">Jenis Lapangan</label>
                <div class="col-md-9">
                    <label class="radio-inline">
                        <input type="radio" name="jenis_lapangan_id" value="{{LAPANGAN_SINTESIS}}" required="" checked=''}}/> Sintensis
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_lapangan_id" value="{{LAPANGAN_MATRAS}}" required=""/> Matras
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
@include('lapangans.js.create_validation')
@stop