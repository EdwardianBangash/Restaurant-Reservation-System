@include('includes.header')


<form action="{{route('storeReservation')}}" method="POST" id="reservationForm">
    @csrf
    <h2>Reservation Form</h2>
    @php
echo "<div class='alert alert-success'>".Session::has('msg') ? Session::get('msg') : ''."</div>";
@endphp
    <div class="form-group">
        <label for="">Table</label>
        <select name="table_id" id="" class="form-control">
            <option value="" selected disabled>Choose Table</option>
            @foreach ($tables as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Menu</label>
        <select name="menu_id" id="" class="form-control">
            <option value="" selected disabled>Choose Menu</option>
            @foreach ($menu as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Date</label>
        <input type="date" name="on_date" id="" name="date" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Time</label>
        <input type="time" name="time" id="" class="form-control">
    </div>

    <input type="submit" value="Confirm" class="btn btn-primary">
</form>



@include('includes.footer')