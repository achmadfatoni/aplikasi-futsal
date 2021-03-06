@extends('layouts.main')

@section('css')
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
<div class="row mt">
    <div class="col-md-12">
        <h3>DAFTAR CUSTOMER</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{URL::to('customer/create')}}" class="btn btn-success pull-right">Tambah</a>
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
                        <th class="text-center">Username</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No Telepon</th>
                        <th class="text-center">Team</th>
                        <th class="text-center">Jenis Customer</th>
                        <th class="text-center">Tanggal daftar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center">{{$row->nama}}</td>
                        <td class="text-center">{{ $row->user ? $row->user->username : null }}</td>
                        <td class="text-center">{{$row->alamat}}</td>
                        <td class="text-center">{{$row->no_telp}}</td>
                        <td class="text-center">{{$row->team}}</td>
                        <td class="text-center">{{Lang::get('jenis_customer.'.$row->jenis_customer)}}</td>
                        <td class="text-center">{{ Date('d - m - Y', strtotime($row->created_at))}}</td>
                        <td class="text-center">
                            <div>
                                <a href="{{URL::to('customer/edit/'.$row->id)}}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil white"></i></a>
                                <a href="{{URL::to('customer/delete/'.$row->id)}}" class="btn btn-danger btn-delete"><i class="glyphicon glyphicon-trash white"></i></a>
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
