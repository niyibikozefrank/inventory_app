@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-edit"></i> Edit User</h2>
    </div>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Full Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email <span style="color: red;">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="password">New Password (Leave blank to keep current)</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update User
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
