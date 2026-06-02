@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-edit"></i> Edit Supplier</h2>
    </div>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Supplier Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact_person">Contact Person <span style="color: red;">*</span></label>
            <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person', $supplier->contact_person) }}" required>
            @error('contact_person')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="email">Email <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email', $supplier->email) }}" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone <span style="color: red;">*</span></label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}" required>
                @error('phone')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address <span style="color: red;">*</span></label>
            <textarea id="address" name="address" required>{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="{{ old('city', $supplier->city) }}">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country', $supplier->country) }}">
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Supplier
            </button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
