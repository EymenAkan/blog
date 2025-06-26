@extends('backend.layouts.master')

@section('title', 'Edit Category')

@section('content')
    <div class="content-page" style="margin-top: 0; padding-top: 0;">
        <div class="content">
            <div class="container-fluid pt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Edit Category: {{ $category->name }}</h4>
                            <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> Back to Categories
                            </a>
                        </div>
                    </div>
                </div>

                <form action="{{ route('backend.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="ri-save-line me-1"></i> Update Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
