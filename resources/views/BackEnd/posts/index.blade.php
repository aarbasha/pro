@extends('BackEnd.layouts.main')
@section('title', 'index')

@section('content')
    <div class="container" style="background: #515151; color:#fff;">

        <br><br><br><br><br>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add
            post</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addpost" aria-hidden="true"
            style="color: black">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"" id=" addpost">Add post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">content</label>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">photo</label><br>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Add post</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- ----------------------------------------------------------------------------------------------- --}}
        {{-- <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="editpost" aria-hidden="true"
            style="color: black">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"" id=" editpost">edit post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" class="form-control" id="title" name="title" required="">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">content</label>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="5"
                                    required=""></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">photo</label><br>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Add post</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </form>
                    </div>

                </div>
            </div>
        </div> --}}
        {{-- ----------------------------------------------------------------------------------------------------------- --}}
        {{-- <div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="deletpost" aria-hidden="true"
            style="color: black">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"" id=" deletpost">Delet post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" class="form-control" id="title" name="title" required="">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">content</label>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="5"
                                    required=""></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">photo</label><br>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Add post</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </form>
                    </div>

                </div>
            </div>
        </div> --}}


        <br><br><br>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-8">
                    <h1 class="mt-4">{{ $post->title }}</h1>
                    <hr>
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" role="button" class="btn btn-info">edit</a>
                    <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" role="button"
                        class="btn btn-danger">Delete</a>


                    {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModa2">edit
                        post</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#exampleModa3">delet post</button> --}}


                    <hr>
                    <img class="img-fluid rounded" src="{{ $post->photo }}" alt="">
                    <hr>
                    <p class="lead">{{ $post->content }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
        <br><br><br>
    </div>
@endsection
