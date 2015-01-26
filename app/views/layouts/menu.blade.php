@if(Auth::check())
    <?php $role = Auth::user()->role_id; ?>
    @if($role == USER_ADMINISTRATOR)
        @include('menu.administrator')
    @elseif($role == USER_GOLD)
        @include('menu.customer')
    @elseif($role == USER_KASIR)
        @include('menu.kasir')
    @endif
@else
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li><a href="{{URL::to('/booking')}}">Booking</a></li>
        <li><a href="{{URL::to('about')}}">About</a></li>
        <li><a href="{{URL::to('help')}}">Help</a></li>
    </ul>
@endif