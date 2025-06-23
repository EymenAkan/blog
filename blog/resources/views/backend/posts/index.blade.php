@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control shadow border-0" id="dash-daterange"
                                               placeholder="Select date range">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="ri-calendar-todo-fill fs-13"></i>
                                        </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                        <i class="ri-refresh-line"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">My Posts</h4>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="header-title">Your Posts</h4>
                                <p>@php
                                    $roles = auth()->user()->roles()->pluck('name')->toArray();
                                @endphp
                                <p>User Roles: {{ implode(', ', $roles) ?: 'No roles assigned' }}</p>
                                </p>
                                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-balanced">
                                    <i class="ri-add-line me-1"></i> Add New Post
                                </a>
                            </div>
                            <div class="card-body">
                                @if($posts->isEmpty())
                                    <p class="text-muted">You haven't created any posts yet.</p>
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Create
                                        Your First Post</a>
                                @else
                                    <div class="table-responsive">
                                        <table
                                            class="table table-borderless table-hover table-nowrap table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Content (Preview)</th>
                                                <th>Created At</th>
                                                @if(auth()->user()->hasRole('admin'))
                                                    <th>Author</th>
                                                @endif
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($post->content, 50) }}</td>
                                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                                    @if(auth()->user()->hasRole('admin'))
                                                        <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('post.show', $post->slug) }}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="ri-eye-line"></i></a>
                                                        <a href="{{ route('posts.edit', $post->slug) }}"
                                                           class="btn btn-sm btn-warning"><i
                                                                class="ri-edit-line"></i></a>
                                                        <form action="{{ route('posts.destroy', $post->slug) }}"
                                                              method="POST" style="display: inline;"
                                                              onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                                    class="ri-delete-bin-line"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $posts->links() }}
                                    </div>
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
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/js/vendor/dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[2, 'desc']],
            });
        });
    </script>
@endpush
