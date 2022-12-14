@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>Edit Category</h3>
<form action="{{route('updateCategory')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="">Name</label>
    <input type="hidden" class="form-control" name="id" value="{{$category->id}}">
    <input type="text" class="form-control" name="name" value="{{$category->name}}">
    </div>
    <input type="submit" class="btn btn-dark" value="Edit">
</form>
</div>
@endsection