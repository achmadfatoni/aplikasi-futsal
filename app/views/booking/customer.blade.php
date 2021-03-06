@extends('layouts.main')

@section('contents')

    <div class="row">
        @include('layouts.notifikasi')
    </div>
    <p><h2>Tatacara Pemesanan Lapangan:</h2>
    <ol>
        <h4><li>Silahkan memilih tanggal dan bulan kapan anda bermain futsal dan tekan tombol cari.</li></h4>
        <h4><li>Setelah memilih tanggal silahkan pilih lapangan dan klik pada jam yang ingin anda pesan.</li></h4>
        <h4><li>Anda dapat memilih jam pada lapangan manapun maksimal 2 jam pemesanan sekali pesan, 
                jika ingin memesan lebih dari 2 jam silahkan konfirmasi ke aka benpas.</li></h4>
        <h4><li>Jika sudah, klik tombol "Proses" yang berada di bawah jadwal lapangan futsal.</li></h4>
        <h4><li>secara otomatis Nota booking akan terunduh dalam bentuk "pdf".</li></h4>
        <h4><li>Silahkan dibawa nota booking ketika anda akan bermain dan di perlihatkan ke kasir.</li></h4>
    </ol></p>
    @include('booking.partial.book')
    <div class="row mt">
        <div class="col-md-12 centered">
            {{--<form action="{{URL::to('booking/save')}}" method="post">--}}
                {{--<input type="hidden" name="data" />--}}
                <button class="btn btn-md btn-danger proses">PROSES</button>
            {{--</form>--}}

        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var booking = $('.booking');
            var booked = [];
            var cari = $('.cari');
            var tanggal = $('select[name=tanggal]').val();
            var bulan = $('select[name=bulan]').val();
            var tahun = $('select[name=tahun]').val();
            $('select[name=tanggal]').on('change', function(){
                tanggal = $('select[name=tanggal]').val();
                console.log(tanggal);
            });
            $('select[name=bulan]').on('change', function(){
                bulan = $('select[name=bulan]').val();
                console.log(bulan);
            }); $('select[name=tahun]').on('change', function(){
                tahun = $('select[name=tahun]').val();
                console.log(tahun);
            });
            cari.click(function(e){
                e.preventDefault();
                window.location.href = "{{ URL::to('booking/customer/')}}" + "/" +tahun+ "/" +bulan+ "/" +tanggal;
            });
            booking.click(function(){
                var totalBooked = booked.length;
                var bookedClass = 'btn-warning';
                var lapanganId = $(this).attr('lapangan-id');
                var maxBook = 2;
                var jamId = $(this).attr('jam-id');
                var time = tahun +'-'+ bulan + '-' + tanggal;
                $(this).toggleClass(bookedClass);
                if($(this).hasClass('btn-warning')){
                    var booking = {
                        'lapangan_id': lapanganId,
                        'jam_id': jamId,
                        'tanggal' : time,
                    };
                    if(booked.length >= maxBook){
                        $(this).removeClass('btn-warning');
                        alert('Maksimal 2 Booking Lapangan');
                    }else{
                        booked.push(booking);
                    }
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
                console.log(booked.length);

            });
            var proses = $('.proses');;
            proses.click(function(){
//                console.log(data);
                if(booked.length < 1){
                    alert("Anda belum memilih lapangan");
                }else{
                    $.ajax({
                        type: "POST",
                        url: "{{ URL::to('booking/save') }}",
                        data: {data : JSON.stringify(booked)},
                        dataType : 'json',
                        success: function(result){
                            var message = result.message;
                            if(message == 'success')
                            {
{{--                                window.location.href = '{{ URL::to('booking/kwitansi') }}';--}}
{{--                                window.location.href = '{{ URL::to(Request::path()) }}';--}}
                                window.open('{{ URL::to('booking/kwitansi') }}', '_blank');
                                window.location.href = '{{ URL::to(Request::path()) }}';
                            }else{
                                alert("anda sudah booking 2 lapangan, silahkan hubungi operator untuk info lebih lanjut.")
                            }
                        }
                    });
                }

            });
        });
    </script>
@stop