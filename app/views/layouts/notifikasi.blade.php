@if(Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>{{Session::get('success')}}</p>
</div>
@elseif(Session::get('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p class="text-center">{{Session::get('error')}}</p>
</div>
@endif