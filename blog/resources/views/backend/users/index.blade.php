@extends('backend.layouts.master')

@section('title', __('users.users_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('users.users_header') }}</h4>
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-balanced">
                                <i class="ri-add-line me-1"></i> {{ __('users.add_new_user') }}
                            </a>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">{{ __('users.users_header') }}</h4>
                            </div>
                            <div class="card-body">
                                @if($users->isEmpty())
                                    <p class="text-muted">{{ __('users.no_users_found') }}</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>{{ __('users.name_label') }}</th>
                                                <th>{{ __('users.email_label') }}</th>
                                                <th>{{ __('users.role_label') }}</th>
                                                <th>{{ __('users.created_at_label') }}</th>
                                                <th>{{ __('users.actions_label') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="{{ __('users.edit_user_title') }}">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('{{ __('users.confirm_delete_user') }}');">
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
                                        {{ $users->links() }}
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
                order: [[3, 'desc']], // created_at sütunu
            });
        });
    </script>
@endpush
