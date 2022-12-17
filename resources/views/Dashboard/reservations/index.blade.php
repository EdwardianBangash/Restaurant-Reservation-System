@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>All Reservations</h3>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Menu</th>
        <th>Table</th>
        <th>Guest</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    @foreach ($reservations as $t)    
    <tr>
        <td>{{$t->id}}</td>
        <td>{{$t->user->name}}</td>
        <td>{{$t->menu->name}}</td>
        <td>{{$t->table->name}}</td>
        <td>{{$t->table->guest}}</td>
        <td>{{$t->on_date}}</td>
        <td>{{$t->time}}</td>
        <td class="btn-group">
            <form action="{{route('deleteReservation', $t->id)}}" method="POST" class="ml-2">
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{-- <div class="row justify-content-center">{{$reservations->links()}}</div> --}}
</div>
@endsection