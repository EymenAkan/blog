@extends('backend.layouts.master')

@section('title', __('users.edit_user_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('users.edit_user_title') }}</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> {{ __('users.back_to_users') }}
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('users.name_label') }}</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name"
                                               value="{{ old('name', $user->name) }}"
                                               placeholder="{{ __('users.name_label') }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('users.email_label') }}</label>
                                        <input type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email"
                                               value="{{ old('email', $user->email) }}"
                                               placeholder="{{ __('users.email_label') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">{{ __('users.role_label') }}</label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>{{ __('users.role_admin') }}</option>
                                            <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>{{ __('users.role_editor') }}</option>
                                            <option value="author" {{ old('role', $user->role) == 'author' ? 'selected' : '' }}>{{ __('users.role_author') }}</option>
                                            <option value="subscriber" {{ old('role', $user->role) == 'subscriber' ? 'selected' : '' }}>{{ __('users.role_subscriber') }}</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i> {{ __('users.update_user_button') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
