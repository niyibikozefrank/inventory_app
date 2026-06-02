@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-plus"></i> Add New Product</h2>
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Product Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="quantity">Initial Quantity <span style="color: red;">*</span></label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 0) }}" min="0" required>
                @error('quantity')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price <span style="color: red;">*</span></label>
                <input type="number" id="unit_price" name="unit_price" value="{{ old('unit_price') }}" step="0.01" required>
                @error('unit_price')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Product
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
