@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Post</h1>
        <section class="mt-3">
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Error messages when data is invalid -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card p-3">
                    <label for="floatingInput">Title</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}">

                    <label for="floatingTextArea">content</label>
                    <textarea class="form-control" name="content" id="floatingTextarea" cols="30"
                              rows="10">{{old('content')}}</textarea>

                    <label for="formFile" class="form-label">Add Image</label>
                    <input class="form-control" type="file" name="image">
                </div>

                <div class="card p-3 mt-3">
                    <label>Tags</label>
                    <div class="d-flex flex-wrap">
                        @foreach($tags as $tag)
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}"
                                       value="{{ $tag->id }}"
                                    {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tag{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>


                <button class="btn btn-secondary m-3">Save</button>
            </form>
        </section>
    </div>
@endsection
