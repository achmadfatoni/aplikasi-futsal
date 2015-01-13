@extends('layouts.main')
@section('contents')
    <div class="row mt">
        <div class="col-lg-12">
            <h3 class="text-center">Periode Gaji</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('layouts.notifikasi')
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3">
            <form class="form-horizontal" action="{{ URL::to('periode-gaji/'.$periode->id) }}" method="POST" id='formPangkat'>
                <input type="hidden" name="_method" value="PUT"/>
                <div class="form-group">
                    <label class="control-label col-lg-3" for="nama">Tahun</label>
                    <div class="col-lg-9">
                        <select name="tahun" class="form-control">
                            @for($value = $currYear; $value <= $currYear+2; $value++)
                                <option value="{{ $value }}" {{ ($value == $periode->tahun) ? 'selected' : null }}> {{ $value }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3" for="nama">Bulan</label>
                    <div class="col-lg-9">
                        <select name="bulan" class="form-control">
                            @foreach($bulans as $key => $value)
                                <option value="{{ $key }}" {{ ($key == $periode->bulan) ? 'selected' : null }}>
                                    {{ $value }} </option>
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

