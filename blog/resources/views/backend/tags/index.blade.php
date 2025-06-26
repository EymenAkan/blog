@extends('backend.layouts.master')

@section('title', __('b_tags.tags_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('b_tags.all_tags') }}</h4>
                            <a href="{{ route('tags.create') }}" class="btn btn-primary">
                                <i class="ri-price-tag-3-line me-1"></i> {{ __('b_tags.add_new_tag') }}
                            </a>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">{{ __('b_tags.tag_list') }}</h4>
                            </div>
                            <div class="card-body">
                                @if($tags->isEmpty())
                                    <p class="text-muted">{{ __('b_tags.no_tags_created') }}</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>{{ __('b_tags.tag_name_label') }}</th>
                                                <th>{{ __('b_tags.slug_label') }}</th>
                                                <th>{{ __('b_tags.theme_color_label') }}</th>
                                                <th>{{ __('b_tags.actions_label') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tags as $tag)
                                                <tr>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->slug }}</td>
                                                    <td>
                                                        <span class="badge" style="background-color: {{ $tag->theme_color }}">
                                                            {{ $tag->theme_color }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('tags.edit', $tag->id) }}"
                                                           class="btn btn-sm btn-warning" title="{{ __('b_tags.edit_tag_title') }}">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <form action="{{ route('tags.destroy', $tag->id) }}"
                                                              method="POST" class="d-inline"
                                                              onsubmit="return confirm('{{ __('b_tags.confirm_delete_tag') }}');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
