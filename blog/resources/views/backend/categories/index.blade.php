@extends('backend.layouts.master')

@section('title', 'Manage Categories')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Manage Categories</h1>
            <a class="btn btn-primary" href="{{ route('backend.categories.create') }}">
                <i class="fas fa-plus me-2"></i> Add New Category
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($categories->count() > 0)
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="text-muted mb-2">Slug: <code>{{ $category->slug }}</code></p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('backend.categories.destroy', $category->id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="fas fa-folder-open fa-3x mb-3"></i>
                <h3>No Categories Yet</h3>
                <p>Create your first category to start organizing your posts!</p>
                <a href="{{ route('backend.categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Create First Category
                </a>
            </div>
        @endif
    </div>
@endsection
