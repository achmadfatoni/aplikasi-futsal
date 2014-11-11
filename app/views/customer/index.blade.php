@extends('layouts.main')

@section('css')
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
<div class="row mt">
    <div class="col-lg-12">
        <h3>DAFTAR CUSTOMER</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{URL::to('customer/create')}}" class="btn btn-success pull-right">Tambah</a>
    </div>
</div>
<div class="row mt">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id='list' class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No Telepon</th>
                        <th class="text-center">Team</th>
                        <th class="text-center">Jenis Customer</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center">{{$row->username}}</td>
                        <td class="text-center">{{$row->nama}}</td>
                        <td class="text-center">{{$row->alamat}}</td>
                        <td class="text-center">{{$row->no_telp}}</td>
                        <td class="text-center">{{$row->team}}</td>
                        <td class="text-center">{{Lang::get('jenis_customer.'.$row->jenis_customer)}}</td>
                        <td class="text-center"></td>

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
<script>
    $(document).ready(function () {
        $('#list').dataTable({
            "bPaginate": false
        });
    });
</script>
@stop
