@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>Edit Menu</h3>
<form action="{{route('updateMenu')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="">Name</label>
    <input type="hidden" class="form-control" name="id" value="{{$menu->id}}">
    <input type="hidden" class="form-control" name="old_image" value="{{$menu->image}}">
    <input type="text" class="form-control" name="name" value="{{$menu->name}}">
    </div>

    <div class="form-group">
        <label for="">New Image</label>
        <input type="file" class="form-control mb-2" name="new_image">
        <img src="{{asset('storage/images/'.$menu->image)}}" alt="{{$menu->name}}" height="100px" width="100px">
    </div>

    <input type="submit" class="btn btn-dark" value="Edit">
</form>
</div>
@endsection

