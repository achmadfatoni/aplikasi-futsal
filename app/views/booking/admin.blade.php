@extends('layouts.main')

@section('css')
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop



@section('contents')
    <div class="row mt">
        <div class="col-lg-12">
            <h3>Booking</h3>
        </div>
    </div>

    <div class="row">
        {{--<div class="col-lg-12">--}}
        {{--<a href="{{URL::to('customer/create')}}" class="btn btn-success pull-right">Tambah</a>--}}
        {{--</div>--}}
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
                        <th class="text-center">Nama Customer</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Lapangan</th>
                        <th class="text-center">Jam</th>
                        {{--<th class="text-center">Status</th>--}}
                        <th class="text-center">Aksi</th>
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
{{--                            <td class="text-center">{{ Lang::get('book_status.'.$data->status) }}</td>--}}
                            <td class="text-center">
                                @if($data->status == BOOKING_PENDING)
                                    <div>
                                        <a href="{{URL::to('booking/validate/'.$data->id)}}" class="btn btn-warning"><i
                                                    class="glyphicon glyphicon-check white"></i></a>
                                        <a href="{{URL::to('booking/delete/'.$data->id)}}"
                                           class="btn btn-danger btn-delete"><i
                                                    class="glyphicon glyphicon-remove-circle white"></i></a>
                                    </div>
                                @elseif($data->status == BOOKING_CANCELED)
                                    <button class="btn btn-danger" disabled>Dibatalkan</button>
                                @elseif($data->status == BOOKING_VALIDATED)
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
    {{HTML::script("assets/js/delete-confirmation.js")}}
    <script>
        $(document).ready(function () {
            $('#list').dataTable();
        });
    </script>
@stop