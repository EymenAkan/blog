@extends('backend.layouts.master')

@section('title', 'Categories')

@section('content')
    <div class="content-page" style="margin-top: 0; padding-top: 0;">
        <div class="content">
            <div class="container-fluid pt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">All Categories</h4>
                            <a href="{{ route('backend.categories.create') }}" class="btn btn-primary">
                                <i class="ri-add-line me-1"></i> Add New Category
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
                                <h4 class="header-title">Category List</h4>
                            </div>
                            <div class="card-body">
                                @if($categories->isEmpty())
                                    <p class="text-muted">No categories created yet.</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        <a href="{{ route('backend.categories.edit', $category->id) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <form action="{{ route('backend.categories.destroy', $category->id) }}"
                                                              method="POST" class="d-inline"
                                                              onsubmit="return confirm('Are you sure?');">
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
                            <a href="javascript:void(0);">About</a>
                            <a href="javascript:void(0);">Support</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
