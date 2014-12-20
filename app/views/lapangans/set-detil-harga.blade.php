@extends('layouts.main')

@section('contents')
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <h3>Detil Harga</h3>
            <hr>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            @include('layouts.notifikasi')
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" action="{{ $actionUrl }}" method="POST" id="formSetHarga">
                <input type="hidden" name="lapangan_id" value="{{ $lapanganId }}"/>
                <input type="hidden" name="jam_id" value="{{ $jamId }}"/>
                <div class="form-group">
                    <label class="control-label col-lg-3" for="nama">Jam</label>
                    <div class="col-lg-9">
                        <input type="text" name="nama" class="form-control"  value="{{ $jam->nama }}" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3" for="harga">Harga</label>
                    <div class="col-lg-9">
                        <input type="text" name="harga" class="form-control" value="{{ isset($lapanganjam->harga) ? $lapanganjam->harga : null }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-success pull-right" value="Simpan" type="submit"/>
                </div>
            </form>
        </div>
    </div>

@stop

@section('js')
    {{HTML::script('assets/js/jquery.validate.min.js')}}
    @include('lapangans.js.set_harga_validation')
@stop