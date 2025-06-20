@extends('backend.layouts.master')

@section('title', 'Admin Posts')

@section('content')
    <style>
        :root {
            --ct-leftbar-width: 240px;
        }

    </style>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">All Posts</h4>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="header-title">Posts</h4>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-balanced">
                                    <i class="ri-add-line me-1"></i> Add New Post
                                </a>
                            </div>
                            <div class="card-body">
                                @if($posts->isEmpty())
                                    <p class="text-muted">No posts available.</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Content (Preview)</th>
                                                <th>Author</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($post->content, 50) }}</td>
                                                    <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-line"></i></a>
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning"><i class="ri-edit-line"></i></a>
                                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></button>
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
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/js/vendor/dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[3, 'desc']],
            });
        });
    </script>
@endpush
