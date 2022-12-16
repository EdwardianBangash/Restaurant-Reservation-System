@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
@php
echo "<div class='alert alert-success'>".Session::has('msg') ? Session::get('msg') : ''."</div>";
@endphp
<h3>Add Menu</h3>
<form action="{{route('storeMenu')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Menu name">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <input type="submit" class="btn btn-dark" value="Add">
</form>
</div>
@endsection

