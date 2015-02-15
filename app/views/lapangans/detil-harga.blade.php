@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
    <div class="row mt">
        <div class="col-md-12">
            <h3>Detil Harga - {{ $lapangan->nama }}</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.notifikasi')
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id='list' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Ubah Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center">{{$row->nama}}</td>
                            <td class="text-center">{{ ($row->lapangan->count() > 0) ? $row->lapangan[0]->pivot->harga : 'Belum Ada Harga' }}</td>
                            <td class="text-center">
                                <a href="{{ $editUrl .'/'. $lapanganId . '/' . $row->id}}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil white"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                    </tbody>
                    <tfoot>
                </table>
            </div>
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
