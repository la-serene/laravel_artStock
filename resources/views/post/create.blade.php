@extends('layout.welcome')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/user.css?v=3') }}">
@endpush
@section('content')
    @include('users.user_menu')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form id="newPost_form" class="row" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @csrf
                <div class="col-12">
                    <label for="inputTitle4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputTitle4" name="title">
                </div>
                <div class="col-12">
                    <label for="inputCaption4" class="form-label">Caption</label>
                    <textarea type="textarea" class="form-control" id="inputCaption4" style="height: 200px" name="caption"></textarea>
                </div>
                <div class="col-12">
                    <label for="inputPhoto" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="inputPhoto" name="photo">
                </div>
                <div class="col-12">
                    <label for="inputPrompt4" class="form-label">Prompt (optional)</label>
                    <input type="text" class="form-control" id="inputPrompt4" name="prompt">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
@endsection
