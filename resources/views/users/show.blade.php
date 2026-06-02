@extends('layouts.app')

@section('title', 'View User')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-user"></i> {{ $user->name }}</h2>
        <div>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>User Details</h3>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Email Verified:</strong> @if($user->email_verified_at) <span style="color: green;">Yes</span> @else <span style="color: red;">No</span> @endif</p>
        </div>

        <div>
            <h3>Account Information</h3>
            <p><strong>Created:</strong> {{ $user->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Updated:</strong> {{ $user->updated_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
