@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
    <div class="row mt">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-center">Status Gaji</h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('layouts.notifikasi')
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-8 col-md-offset-2">
            <table id="list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nama Karyawan</td>
                    <td class="text-center">Nominal</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Aksi</td>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                @foreach($list as $data)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->karyawan->nama }}</td>
                        <td>{{ $data->nominal }}</td>
                        <td>{{ Lang::get('gaji_status.'.$data->status) }}</td>
                        <td class="centered">
                            @if($data->status == GAJI_BELUM)
                                <form action="{{ URL::route('periode-gaji.gaji.update', array($periodeId, $data->id)) }}"
                                      method="POST">
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-hand-right white"></i>
                                    </button>
                                </form>
                            @else
                                <button disabled class="btn btn-danger">
                                    <i class="glyphicon glyphicon-hand-left white"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    {{HTML::script("assets/js/datatables/jquery.dataTables.js")}}
    {{HTML::script("assets/js/datatables/dataTables.bootstrap.js")}}
    {{HTML::script("assets/js/delete-confirmation.js")}}
    <script>
        $(document).ready(function () {
            $('#list').dataTable();
        });
    </script>
@stop
