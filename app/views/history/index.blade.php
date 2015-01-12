@extends('layouts.main')


@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('contents')
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <h3 class="text-center">History</h3>
            <hr>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="table-responsive">
                <table id='list' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Lapangan</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($list as $row)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="text-center">{{$row->tanggal}}</td>
                            <td class="text-center">{{ $row->lapangan->nama }}</td>
                            <td class="text-center">{{ $row->jam->nama }}</td>
                            <td class="text-center">

                                @if($row->status == BOOKING_PENDING)
                                    <button class="btn btn-warning" disabled>Pending</button>
                                @elseif($row->status == BOOKING_CANCELED)
                                    <button class="btn btn-danger" disabled>Dibatalkan</button>
                                @elseif($row->status == BOOKING_VALIDATED)
                                    <button class="btn btn-primary" disabled>Valid</button>
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
    <script>
        $(document).ready(function () {
            $('#list').dataTable();
        });
    </script>
@stop
