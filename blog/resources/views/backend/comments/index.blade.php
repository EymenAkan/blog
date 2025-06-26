@extends('backend.layouts.master')

@section('title', __('admin_comments.index_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('admin_comments.all_comments') }}</h4>
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
                                <h4 class="header-title">{{ __('admin_comments.comment_list') }}</h4>
                            </div>
                            <div class="card-body">
                                @if($comments->isEmpty())
                                    <p class="text-muted">{{ __('admin_comments.no_comments') }}</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>{{ __('admin_comments.table_comment') }}</th>
                                                <th>{{ __('admin_comments.table_post') }}</th>
                                                <th>{{ __('admin_comments.table_user') }}</th>
                                                <th>{{ __('admin_comments.table_date') }}</th>
                                                <th>{{ __('admin_comments.table_actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($comments as $comment)
                                                <tr>
                                                    <td>{{ Str::limit($comment->comment, 50) }}</td>
                                                    <td><a href="{{ route('blog.show', $comment->post->id) }}">{{ Str::limit($comment->post->title, 30) }}</a></td>
                                                    <td>{{ $comment->user->name }}</td>
                                                    <td>{{ $comment->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('comments.edit', $comment->id) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <form action="{{ route('comments.destroy', $comment->id) }}"
                                                              method="POST" class="d-inline"
                                                              onsubmit="return confirm('{{ __('admin_comments.delete_confirm') }}');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $comments->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Attex - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript:void(0);">{{ __('admin_comments.footer_about') }}</a>
                            <a href="javascript:void(0);">{{ __('admin_comments.footer_support') }}</a>
                            <a href="javascript:void(0);">{{ __('admin_comments.footer_contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
