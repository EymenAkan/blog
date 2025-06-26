@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">{{ __('tags.page_title') }}</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (count($tags) > 0)
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="tag-card h-100">
                            <div class="tag-header" style="background: {{ $tag->theme_color }};">
                                <h5 class="text-white mb-0">{{ $tag->name }}</h5>
                            </div>
                            <div class="tag-body">
                                <div class="tag-info mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="color-dot me-2"
                                              style="background: {{ $tag->theme_color }};"></span>
                                        <code class="small">{{ $tag->theme_color }}</code>
                                    </div>
                                    <small class="text-muted">{{ __('tags.slug_label') }}
                                        : {{ $tag->slug }}</small>
                                </div>

                                <div class="tag-actions d-flex gap-2">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-tags fa-3x text-muted mb-3"
                   aria-label="{{ __('tags.no_tags_icon_alt') }}"></i>
                <h3>{{ __('tags.no_tags_title') }}</h3>
            </div>
        @endif
    </div>
@endsection


@push('styles')
    <style>
        .tag-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .tag-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .tag-header {
            padding: 1rem;
            background: linear-gradient(135deg, var(--tag-color), var(--tag-color-dark));
        }

        .tag-body {
            padding: 1rem;
        }

        .color-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid white;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary:hover {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .btn-outline-danger:hover {
            background-color: #ef4444;
            border-color: #ef4444;
        }
    </style>
@endpush
