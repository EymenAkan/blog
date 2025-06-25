@extends('backend.layouts.master')

@section('title', 'Edit Comment')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Edit Comment</h4>
                            <a href="{{ route('comments.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> Back to Comments
                            </a>
                        </div>
                    </div>
                </div>

                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="4" required maxlength="255">{{ old('comment', $comment->comment) }}</textarea>
                                @error('comment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">
                                <i class="ri-save-line me-1"></i> Update Comment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
