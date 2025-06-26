@extends('backend.layouts.master')

@section('title', __('admin_categories.edit_title'))

@section('content')
    <div class="content-page" style="margin-top: 0; padding-top: 0;">
        <div class="content">
            <div class="container-fluid pt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('admin_categories.edit_title') }}: {{ $category->name }}</h4>
                            <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> {{ __('admin_categories.back_to_categories') }}
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
                                <label for="name" class="form-label">{{ __('admin_categories.category_name_label') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="ri-save-line me-1"></i> {{ __('admin_categories.update_button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
