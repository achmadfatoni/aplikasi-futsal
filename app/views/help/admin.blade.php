@extends('layouts.main')

@section('contents')
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <h2>HELP</h2>
        <hr>
    </div>
</div>
<div class="row mt">
    <div class="col-lg-8 col-lg-offset-2">
        <form method="POST" action="" role="form">
            <div class="form-group">
                <textarea name="about" class="ckeditor"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </form>
    </div>
</div>

@stop

@section('js')
{{HTML::script('assets/js/ckeditor.js')}}
@stop