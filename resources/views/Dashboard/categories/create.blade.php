@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
@php
echo "<div class='alert alert-success'>".Session::has('msg') ? Session::get('msg') : ''."</div>";
@endphp
<h3>Add Category</h3>
<form action="{{route('storeCategory')}}" method="POST">
    @csrf
    <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Category name">
    </div>
    <input type="submit" class="btn btn-dark" value="Add">
</form>
</div>
@endsection

