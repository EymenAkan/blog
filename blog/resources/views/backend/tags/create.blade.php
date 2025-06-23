@extends('backend.layouts.master')

@section('title', 'Create Tag')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Add New Tag</h4>
                            <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-left-line me-1"></i> Back to Tags
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title mb-0">Create a New Tag</h4>
                            </div>
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('tags.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tag Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter tag name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="theme_color" class="form-label">Theme Color</label>
                                        <input type="color" class="form-control form-control-color"
                                               id="theme_color" name="theme_color"
                                               value="{{ old('theme_color', '#3b82f6') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Quick Presets</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach(['#ef4444','#f97316','#eab308','#22c55e','#06b6d4','#3b82f6','#8b5cf6','#ec4899'] as $color)
                                                <button type="button"
                                                        class="btn border"
                                                        style="background-color: {{ $color }}; width: 30px; height: 30px; border-radius: 50%;"
                                                        onclick="document.getElementById('theme_color').value = '{{ $color }}'">
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-check-line me-1"></i> Save Tag
                                        </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div>
        </div>
    </div>
@endsection
