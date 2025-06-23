@extends('backend.layouts.master')

@section('title', 'Edit Category')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Edit Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('backend.categories.update', $category->id) }}" method="POST" class="w-100" style="max-width: 600px;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Enter category name"
                    required
                >
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection
