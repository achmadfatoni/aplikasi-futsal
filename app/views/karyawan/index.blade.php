@extends('layouts.main')

@section('css')
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
<div class="row mt">
    <div class="col-md-12">
        <h3>DAFTAR KARYAWAN</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{URL::to('karyawan/create')}}" class="btn btn-success pull-right">Tambah</a>
    </div>
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
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Pangkat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center">{{$row->nama}}</td>
                        <td class="text-center">{{$row->alamat}}</td>
                        <td class="text-center">{{$row->pangkat->name}}</td>
                        <td class="text-center">
                            <div>
                                <a href="{{URL::to('karyawan/edit/'.$row->id)}}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil white"></i></a>
                                <a href="{{URL::to('karyawan/delete/'.$row->id)}}" class="btn btn-danger btn-delete"><i class="glyphicon glyphicon-trash white"></i></a> 
                            </div>
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
