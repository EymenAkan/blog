@extends('backend.layouts.master')

@section('title', __('b_posts.edit_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{ __('b_posts.edit_title') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('b_posts.title_label') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">{{ __('b_posts.content_label') }}</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content" name="content" rows="6">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('b_posts.change_image_label') }}</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                       id="image" name="image">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="categories" class="form-label">{{ __('b_posts.categories_label') }}</label>
                                <select class="form-select" id="categories" name="categories[]" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">{{ __('b_posts.tags_label') }}</label>
                                <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('b_posts.update_button') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
