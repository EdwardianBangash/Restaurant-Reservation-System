@include('includes.header')


<a href="/" class="m-5 pt-5">HOME</a>

<form action="{{route('makeLogin')}}" method="post" style="background:rgb(227, 223, 223);width: 450px;margin: 0 auto;padding: 20px;border-radius:5px;">
    @csrf
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="" class="form-control" placeholder="Example@email.com" required>
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Enter your password" required>
    </div>

    <input type="submit" value="Login" class="btn btn-dark">

    <span>Don't have an account: <a href="{{route('register')}}" >Register now</a></span>
</form>

@include('includes.footer')