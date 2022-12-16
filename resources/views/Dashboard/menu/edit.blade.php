@extends('Dashboard.index')

@section('content')
<div class="category-wrapper">
<h3>Edit Table</h3>
<form action="{{route('updateTable')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="">Name</label>
    <input type="hidden" class="form-control" name="id" value="{{$table->id}}">
    <input type="text" class="form-control" name="name" value="{{$table->name}}">
    </div>

    <div class="form-group">
        <label for="">Guest</label>
        <input type="text" class="form-control" name="guest" value="{{$table->guest}}">
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="Free">Free</option>
            <option value="Booked">Booked</option>
        </select>
    </div>

    <input type="submit" class="btn btn-dark" value="Edit">
</form>
</div>
@endsection

