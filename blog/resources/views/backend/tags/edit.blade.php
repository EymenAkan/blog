@extends('backend.layouts.master')

@section('title', __('b_tags.edit_tag_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('b_tags.edit_tag_title') }}: {{ $tag->name }}</h4>
                            <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> {{ __('b_tags.back_to_tags') }}
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
                                <label for="name" class="form-label">{{ __('b_tags.tag_name_label') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $tag->name) }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="theme_color" class="form-label">{{ __('b_tags.theme_color_label') }}</label>
                                <input type="color" class="form-control form-control-color" id="theme_color"
                                       name="theme_color" value="{{ old('theme_color', $tag->theme_color) }}" required>
                                @error('theme_color')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="ri-save-line me-1"></i> {{ __('b_tags.update_tag_button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
