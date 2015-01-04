@extends('layouts.main')

@section('contents')
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3 centered">
            <form class="form-inline">
                <div class="form-group">
                    <select name="tanggal" class="form-control">
                        @for($no = 1; $no <= 31; $no++)
                            <option value="{{ $no }}" {{($no == $tanggal) ? 'selected' : null }}> {{ $no }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <select name="bulan" class="form-control">
                        @foreach($bulans as $key => $value)
                        <option value="{{ $key }}" {{($key == $bulan) ?  'selected' : null}}> {{ $value }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="tahun" class="form-control">
                        @for($no = $tahun; $no <= ($tahun + 1); $no++)
                            <option value="{{ $no }}" {{($no == $tahun) ? 'selected' : null }}> {{ $no }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Cari</button>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        @include('layouts.notifikasi')
    </div>
    <div class="row mt">
        @foreach($lapangans as $lapangan)
        <div class="col-lg-3 centered">
            <h1 class="form-control btn-primary">{{ $lapangan->nama }}</h1>
            @foreach($lapangan->jam as $jam)
                <?php
                    $bookings = $jam->booking;
                ?>
                @if($bookings->count() > 0)
                    @foreach($bookings as $booking)
                        @if($booking->lapangan_id == $lapangan->id)
                        <button class="form-control btn btn-danger" disabled>Booked</button>
                        @endif
                    @endforeach
                @else
                    <button class="form-control btn btn-default booking" lapangan-id="{{ $lapangan->id }}" jam-id="{{ $jam->id }}">Jam : {{ $jam->nama }} | Harga : {{ $jam->pivot->harga }}</button>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
    <div class="row mt">
        <div class="col-lg-12 centered">
            {{--<form action="{{URL::to('booking/save')}}" method="post">--}}
                {{--<input type="hidden" name="data" />--}}
                <button class="btn btn-lg btn-danger proses">PROSES</button>
            {{--</form>--}}

        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var booking = $('.booking');
            var booked = [];
            booking.click(function(){
                var totalBooked = booked.length;
                var bookedClass = 'btn-warning';
                var lapanganId = $(this).attr('lapangan-id');
                var jamId = $(this).attr('jam-id');
                var tanggal = $('select[name=tanggal]').val();
                var bulan = $('select[name=bulan]').val();
                var tahun = $('select[name=tahun]').val();
                var time = tahun +'-'+ bulan + '-' + tanggal;
                $(this).toggleClass(bookedClass);
                if($(this).hasClass('btn-warning')){
                    var booking = {
                        'lapangan_id': lapanganId,
                        'jam_id': jamId,
                        'tanggal' : time,
                    };

                    booked.push(booking);
//                    alert('booked');
                }else{
                    for (var i =0; i < totalBooked; i++){
                        if (booked[i].lapangan_id === lapanganId && booked[i].jam_id === jamId) {
                            booked.splice(i,1);
                            break;
                        }
                    }
//                    alert('Book Canceled')
                }
                console.log(booked);

            });
            var proses = $('.proses');;
            proses.click(function(){
//                console.log(data);
                $.ajax({
                    type: "POST",
                    url: "{{ URL::to('booking/save') }}",
                    data: {data : JSON.stringify(booked)},
                    dataType : 'json',
                    success: function(result){
                        console.log(result);
                    }
                });
            });
        });
    </script>
@stop