@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <h2>HELP</h2>
        <hr>
    </div>
</div><div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
       <div>{{$contents}}
       </div>
    </div>
</div>

@stop
