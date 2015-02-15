@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <h3>TAMBAH KARYAWAN</h3>
        <hr>
    </div>
</div>
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        @include('layouts.notifikasi')
    </div>
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{$actionUrl}}" method="POST" id='formKaryawan'>
            <input type="hidden" name="id" value="{{isset($id) ? $id : null}}"/>
            <div class="form-group">
                <label class="control-label col-md-3" for="nama">Nama</label>
                <div class="col-md-9">
                    <input type="text" name="nama" class="form-control" value="{{isset($karyawan->nama) ? $karyawan->nama : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="alamat">Alamat</label>
                <div class="col-md-9">
                    <input type="text" name="alamat" class="form-control" value="{{isset($karyawan->alamat) ? $karyawan->alamat : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="no_telp">Jabatan</label>
                <div class="col-md-9">
                    <select name="pangkat_id" class="form-control">
                        @foreach($pangkatLov as $row)
                        <option value="{{$row->id}}" {{isset($karyawan->pangkat_id) ? ($karyawan->pangkat_id == $row->id) ? 'selected' : null : null}}>{{$row->name}}</option>
                        @endforeach
                        
                    </select>
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
    @include('karyawan.js.create_edit_validation')
@stop
