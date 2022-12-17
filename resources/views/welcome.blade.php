@include('includes.header')


<a href="{{route('createReservation')}}">Make Reservation</a>

@if (Auth::check())
<form action="{{route('logout')}}" method="POST">
    @csrf 
    <input type="submit" value="Logout" class="btn btn-primary">
</form>
@endif


@include('includes.footer')