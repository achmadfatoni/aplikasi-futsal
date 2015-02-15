@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <h2>HELP</h2>
        <hr>
    </div>
</div><div class="row mt">
    <div class="col-md-8 col-md-offset-2">
       <div>{{$contents}}
       </div>
    </div>
</div>

@stop
