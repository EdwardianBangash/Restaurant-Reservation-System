@include('includes.header')


<form action="{{route('storeReservation')}}" method="POST" id="reservationForm">
    @csrf
    <h2>Reservation Form</h2>
    <div class="form-group">
        <label for="">Table</label>
        <select name="table_id" id="" class="form-control">
            <option value="" selected disabled>Choose Table</option>
            @foreach ($tables as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
    </div>

    <input type="submit" value="Confirm" class="btn btn-primary">
</form>



@include('includes.footer')