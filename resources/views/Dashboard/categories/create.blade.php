@include('Dashboard.includes.header')


<form action="" method="POST">
    @csrf
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Category name">

    <input type="submit" class="btn btn-primary" value="Add">
</form>




@include('Dashboard.includes.footer')
