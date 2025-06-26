@extends('backend.layouts.master')

@section('title', __('users.user_detail_title'))

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex justify-content-between align-items-center">
                            <h4 class="page-title">{{ __('users.user_details_header') }}</h4>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-go-back-line me-1"></i> {{ __('users.back_to_users') }}
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p><strong>{{ __('users.name_label') }}:</strong> {{ $user->name }}</p>
                                <p><strong>{{ __('users.email_label') }}:</strong> {{ $user->email }}</p>
                                <p><strong>{{ __('users.role_label') }}:</strong> {{ ucfirst($user->role) }}</p>
                                <p><strong>{{ __('users.created_at_label') }}:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">
                                    <i class="ri-arrow-go-back-line me-1"></i> {{ __('users.back_to_users') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
