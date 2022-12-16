@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>All Reservations</h3>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Table</th>
        <th>Guest</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($reservations as $t)    
    <tr>
        <td>{{$t->id}}</td>
        <td>{{$t->name}}</td>
        <td>{{$t->guest}}</td>
        <td>
            @if ($t->status == 'Free')
            <span class="badge badge-success">{{$t->status}}</span>
            @else
            <span class="badge badge-danger">{{$t->status}}</span>
            @endif
        </td>
        <td class="btn-group">
            {{-- <a href="{{route('editTable', $t->id)}}" class="btn btn-warning">Edit</a> --}}
            <form action="{{route('deleteTable', $t->id)}}" method="POST" class="ml-2">
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="row justify-content-center">{{$reservations->links()}}</div>
</div>
@endsection