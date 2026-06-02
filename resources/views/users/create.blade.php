@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-plus"></i> Add New User</h2>
    </div>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Full Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email <span style="color: red;">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="password">Password <span style="color: red;">*</span></label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password <span style="color: red;">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save User
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
