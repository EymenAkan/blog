@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <h1>Add Tag</h1>
        <section class="mt-3">
            <form method="POST" action="{{ route('tags.store') }}">
                @csrf

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
                    <label for="name">Tag Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                </div>

                <button class="btn btn-secondary m-3">Save</button>
            </form>
        </section>
    </div>
@endsection
