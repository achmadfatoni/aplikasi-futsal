@extends('layouts.main')

@section('css')
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
<div class="row mt">
    <div class="col-lg-12">
        <h3>Lapangan</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{URL::to('lapangan/create')}}" class="btn btn-success pull-right">Tambah</a>
    </div>
    <div class="col-lg-12">
        @include('layouts.notifikasi')
    </div>
</div>
<div class="row mt">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id='list' class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <td class="text-center">Harga Siang</td>
                        <td class="text-center">Harga Malam</td>
                        <th class="text-center">Jenis Lapangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center">{{$row->nama}}</td>
                        <td class="text-center">{{ $row->harga_siang }}</td>
                        <td class="text-center">{{ $row->harga_malam }}</td>
                        <td class="text-center">{{Lang::get('jenis_lapangan.'.$row->jenis_lapangan_id)}}</td>
                        <td class="text-center">
                            <form  action="{{URL::to('lapangan/'.$row->id)}}" method="post">
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{URL::to('lapangan/'.$row->id.'/edit')}}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil white"></i></a>
                                <button type="submit" class="btn btn-danger btn-delete"><i class="glyphicon glyphicon-trash white"></i></button>
                            </form>
                                                       
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
