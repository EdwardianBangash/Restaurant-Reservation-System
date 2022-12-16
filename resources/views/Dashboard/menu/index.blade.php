@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>All Menu</h3>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach ($menus as $t)    
    <tr>
        <td>{{$t->id}}</td>
        <td>{{$t->name}}</td>
        <td>
            <img src="{{asset('storage/images/'.$t->image)}}" alt="{{$t->name}}" height="100px" width="100px" />
        </td>
        <td class="btn-group">
            <a href="{{route('editMenu', $t->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('deleteMenu', $t->id)}}" method="POST" class="ml-2">
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="row justify-content-center">{{$menus->links()}}</div>
</div>
@endsection