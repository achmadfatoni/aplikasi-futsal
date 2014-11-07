@if(Auth::check())
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{URL::to('/admin')}}">Beranda</a></li>
    <li><a href="{{URL::to('/pendaftaran/list')}}">Pendaftar</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrasi<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{URL::to('/gelombang-pendaftaran')}}">Gelombang Pendaftaran</a></li>
        </ul>
    <li><a href="{{URL::to('/login/sign-out')}}">Logout</a></li>
</ul>
@else
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{URL::to('/')}}">Home</a></li>
    <li><a href="{{URL::to('/booking')}}">Booking</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Help</a></li>
</ul>    
@endif