@extends('BackEnd.layouts.main')
@section('title', 'create post')

@section('content')
    <br><br><br><br><br><br>
{{-- 
    <div class="container">
        <h2 style="color:red;" class=" d-flex text-center"> Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" required="">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10" required=""></textarea>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">photo</label><br>
                <input type="file" name="photo" id="photo">
            </div>
            <br>

            <button type="submit" class="btn btn-primary btn-block">save</button>

        </form>
    </div> --}}
    <br><br><br><br><br><br>
@endsection
