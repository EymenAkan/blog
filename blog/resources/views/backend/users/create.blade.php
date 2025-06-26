@extends('backend.layouts.master')

@section('title', __('users.create_user_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('users.create_new_user') }}</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> {{ __('users.back_to_users') }}
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('users.name_label') }}</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name"
                                               value="{{ old('name') }}"
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
                                               value="{{ old('email') }}"
                                               placeholder="{{ __('users.email_label') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('users.password_label') }}</label>
                                        <div class="input-group">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   id="password" name="password"
                                                   placeholder="{{ __('users.password_label') }}">
                                            <button type="button" class="btn btn-outline-secondary toggle-password" title="Toggle password visibility">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">{{ __('users.confirm_password_label') }}</label>
                                        <div class="input-group">
                                            <input type="password"
                                                   class="form-control"
                                                   id="password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="{{ __('users.confirm_password_label') }}">
                                            <button type="button" class="btn btn-outline-secondary toggle-password" title="Toggle password visibility">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">{{ __('users.role_label') }}</label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>{{ __('users.role_admin') }}</option>
                                            <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>{{ __('users.role_editor') }}</option>
                                            <option value="author" {{ old('role') == 'author' ? 'selected' : '' }}>{{ __('users.role_author') }}</option>
                                            <option value="subscriber" {{ old('role') == 'subscriber' ? 'selected' : '' }}>{{ __('users.role_subscriber') }}</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-check-line me-1"></i> {{ __('users.create_user_button') }}
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

@push('scripts')
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
@endpush
