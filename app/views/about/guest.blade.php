@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <h2>ABOUT</h2>
        <hr>
    </div>
</div><div class="row mt">
    <div class="col-md-8 col-md-offset-2">
       <div>
           {{$page->contents}}
       </div>
        @if($page->gambar1 != "")
            <div class="text-center">
                <img src="{{ URL::to('page/'.$page->gambar1) }}" width="600px" height="600px"/>
            </div>
        @endif
        <br>
        @if($page->gambar2 != "")
            <div class="text-center">
                <img src="{{ URL::to('page/'.$page->gambar2) }}" width="600px" height="600px"/>
            </div>
        @endif
        @if($page->gambar3 != "")
            <div class="text-center">
                <img src="{{ URL::to('page/'.$page->gambar3) }}" width="600px" height="600px"/>
            </div>
        @endif
    </div>
</div>

@stop
