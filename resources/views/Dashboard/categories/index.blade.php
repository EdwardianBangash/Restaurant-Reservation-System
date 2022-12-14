@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>All Categories</h3>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($categories as $c)    
    <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td class="btn-group">
            <a href="{{route('editCategory', $c->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('editCategory', $c->id)}}" method="POST" class="ml-2">
                <input type="hidden" name="id" value="{{$c->id}}">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="row justify-content-center">{{$categories->links()}}</div>
</div>
@endsection