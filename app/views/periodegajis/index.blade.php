@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
    <div class="row mt" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">
            <h3 class="text-center">Periode Gaji</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{URL::to('periode-gaji/create')}}" class="btn btn-success pull-right">Tambah</a>
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
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Bulan</th>
                        <th class="text-center">Aksi</th>
                        {{--<th class="text-center">Laporan</th>--}}
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center">{{ $row->tahun }}</td>
                            <td class="text-center">{{ Lang::get('bulan.'.$row->bulan) }}</td>
                            <td class="text-center">
                                @if($row->gaji->count() > 0)
                                    {{--<a href="{{ URL::to('periode-gaji/'.$row->id.'/gaji') }}" class="btn btn-primary">Rincian</a>--}}
                                    <a href="{{ URL::to('periode-gaji/'.$row->id.'/gaji') }}"><i class="glyphicon glyphicon-file"></i> Laporan</a>
                                @else
                                    <form action="{{ URL::to('periode-gaji/'.$row->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <a href="{{  URL::to('periode-gaji/'.$row->id.'/edit') }}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil white"></i></a>
                                        <button type="submit" class="btn btn-danger btn-delete"><i class="glyphicon glyphicon-trash white"></i></button>
                                    </form>
                                @endif
                            </td>
                            {{--<th class="text-center"><a href="#"><i class="glyphicon glyphicon-file"></i> Laporan</a></th>--}}
                            <td class="text-center">
                                @if($row->gaji->count() > 0)
                                    <button class="btn btn-default" disabled>Sudah digenerate</button>
                                @else
                                    <a href="{{ URL::to('generate-gaji/'. $row->id)  }}" class="btn btn-primary btn-generate">Generate</a>
                                @endif
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
