@php
    if (session()->has('username')) {
        return view('user');
    } else {
@endphp
<form action="">
    @csrf
    Name
    <input type="text" name="name">
    <button type="submit">Dang ky</button>
</form>
    <?php
}
