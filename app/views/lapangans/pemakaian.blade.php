@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop


@section('contents')
<div class="row mt">
    <div class="col-md-12 centered">
        <form class="form-inline">
            <div class="form-group">
                <input type="date" name="dari" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="date" name="sampai" class="form-control"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Tampilkan</button>
            </div>
        </form>
        <br>
        <form class="form-inline" action="{{ URL::to('lapangan/export') }}">
            <div class="form-group">
                <input type="date" name="dari" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="date" name="sampai" class="form-control"/>
            </div>
            <div class="form-group">
                <button class="pull-right btn btn-primary white"><i class="glyphicon glyphicon-file white"></i> Export</button>
                {{--<a href="" class="pull-right btn btn-primary white"><i class="glyphicon glyphicon-file white"></i> Export</a>--}}
            </div>
        </form>
    </div>
</div>

<div class="row mt">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id='list' class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Lapangan</th>
                    <th class="text-center">Jam</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                @foreach($list as $data)
                    <tr>
                        <td class="text-center">{{ $no }}</td>
                        <td class="text-center">{{ $data->customer->nama }}</td>
                        <td class="text-center">{{ $data->tanggal }}</td>
                        <td class="text-center">{{ $data->lapangan->nama }}</td>
                        <td class="text-center">{{ $data->jam->nama }}</td>
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