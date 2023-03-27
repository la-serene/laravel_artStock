@php
if (session()->has('username')) {
    return view('user');
} else {
@endphp
<form action="" method="post">
    @csrf
    <label>
        Username
        <input type="text" name="username">
    </label>
    <br>
    <label>
        Password
        <input type="password" name="password">
    </label>
    <br>
    <button type="submit">Sign in</button>
</form>
<?php
}
