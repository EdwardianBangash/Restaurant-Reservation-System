@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
@php
echo "<div class='alert alert-success'>".Session::has('msg') ? Session::get('msg') : ''."</div>";
@endphp
<h3>Add Menu</h3>
<form action="{{route('storeTable')}}" method="POST">
    @csrf
    <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Table name">
    </div>

    <div class="form-group">
        <label for="">Guest</label>
        <input type="text" class="form-control" name="guest" placeholder="Enter Guest No">
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="Free">Free</option>
            <option value="Booked">Booked</option>
        </select>
    </div>

    <input type="submit" class="btn btn-dark" value="Add">
</form>
</div>
@endsection

