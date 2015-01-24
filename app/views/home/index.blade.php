@extends('layouts.main')

@section('contents')
    <div class="row mt">
        <div class="col-lg-12">
            <h2 class="text-center">Promo Hari Ini</h2>
            <hr>
            <div>{{$promo}}</div>
         </div>
    </div>
    @include('booking.partial.book')

@stop