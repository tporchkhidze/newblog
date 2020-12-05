<form  method="post" action="{{route('post.login')}}">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="name" class="form-control">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <button type="submit">Login</button>
    </div>

</form>
