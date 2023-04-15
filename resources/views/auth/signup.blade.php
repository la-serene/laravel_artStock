@extends('auth.auth')
@section('login_form')
    <form class="row g-3" action=" {{ route('store') }} " method="POST">
        @csrf
        <div class="col-12 text-center">
            <a href="{{ route('index') }}">
                <img src="{{ asset('/assets/logo/logo.png') }}" alt="Logo" height="90px">
            </a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-6">
            <label for="first_name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="col-6">
            <label for="last_name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password">
        </div>
        <div class="col-12">
            <label for="password_confirmation" class="form-label">Confirm your password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="col-6">
            <label for="date_of_birth" class="form-label">Date of birth</label>
            <div class="input-group">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" aria-label="Date of birth" value="2020-04-15">
                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
            </div>
        </div>
        <div class="col-4">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" aria-label="Gender">
                <option value="">Choose...</option>
                <option selected value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <div class="col-5"></div>
        <div class="col-4">
            <button type="submit" class="btn btn-lg btn-block btn-primary">Sign up</button>
        </div>
        <div class="col-5"></div>
    </form>
@endsection
@push('js')
    <script>
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>
@endpush
