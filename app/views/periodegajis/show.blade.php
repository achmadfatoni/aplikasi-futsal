@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <h3 class="text-center">Status Gaji</h3>
            <hr>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <table id="list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td class="text-center">No</td>
                        <td class="text-center">Nama Karyawan</td>
                        <td class="text-center">Nominal</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $data)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $data->karyawan->nama }}</td>
                            <td>{{ $data->nominal }}</td>
                            <td>{{ $data->status }}</td>
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
