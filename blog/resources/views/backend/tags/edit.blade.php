@extends('backend.layouts.master')

@section('title', 'Edit Tag')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Edit Tag: {{ $tag->name }}</h4>
                            <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> Back to Tags
                            </a>
                        </div>
                    </div>
                </div>

                <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tag Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $tag->name) }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="theme_color" class="form-label">Theme Color</label>
                                <input type="color" class="form-control form-control-color" id="theme_color"
                                       name="theme_color" value="{{ old('theme_color', $tag->theme_color) }}" required>
                                @error('theme_color')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning">
                                <i class="ri-save-line me-1"></i> Update Tag
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
