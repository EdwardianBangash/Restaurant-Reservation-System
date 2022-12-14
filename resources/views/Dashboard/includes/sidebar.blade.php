<div class="sidebar">  
    <ul>
        <li><a href="/">Home</a></li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
                <a class="dropdown-item text-dark" href="{{route('categories')}}">All</a>
                <a class="dropdown-item text-dark" href="{{route('createCategory')}}">Add</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">Tables</a>
            <div class="dropdown-menu">
                <a class="dropdown-item text-dark" href="{{route('tables')}}">All</a>
                <a class="dropdown-item text-dark" href="{{route('createTable')}}">Add</a>
            </div>
        </li>
        <li><a href="">Reservations</a></li>
        <li><a href="">Setting</a></li>
    </ul>
</div>