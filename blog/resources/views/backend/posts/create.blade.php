@extends('backend.layouts.master')

@section('title', __('b_posts.create_title'))

@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('b_posts.create_title') }}</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('b_posts.title_label') }}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">{{ __('b_posts.content_label') }}</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror"
                                              id="content" name="content" rows="6">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">{{ __('b_posts.image_label') }}</label>
                                    <input class="form-control @error('image') is-invalid @enderror"
                                           type="file" id="image" name="image">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="categories" class="form-label">{{ __('b_posts.categories_label') }}</label>
                                    <select class="form-select" id="categories" name="categories[]" multiple>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">{{ __('b_posts.tags_label') }}</label>
                                    <select class="form-select @error('tags') is-invalid @enderror"
                                            id="tags" name="tags[]" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('b_posts.create_button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
