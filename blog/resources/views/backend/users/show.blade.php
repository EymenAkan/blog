@extends('backend.layouts.master')

@section('title', 'User Detail')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>User Details</h1>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                        <p><strong>Created At:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to User List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
