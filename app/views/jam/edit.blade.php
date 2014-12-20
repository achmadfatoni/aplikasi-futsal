@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <h3>TAMBAH JAM</h3>
        <hr>
    </div>
</div>
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        @include('layouts.notifikasi')
    </div>
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{URL::to('jam/'.$jam->id)}}" method="post" id="formJam">
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label class="control-label col-lg-3" for="nama">Nama</label>
                <div class="col-lg-9">
                    <input type="text" name="nama" class="form-control" value="{{isset($jam->nama) ? $jam->nama : null}}"/>
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
    @include('jam.js.create_validation')
@stop