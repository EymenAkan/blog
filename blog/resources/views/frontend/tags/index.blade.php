@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="titlebar">
            <a class="btn btn-secondary float-end mt-3" href="{{ route('tags.create') }}" role="button">Add Tag</a>
            <h1>Tag List</h1>
        </div>

        <hr>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (count($tags) > 0)
            @foreach ($tags as $tag)
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{ $tag->name }}</h4>
                        </div>
                        <div>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this tag?')">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        @else
            <p>No Tags found</p>
        @endif
    </div>
@endsection
