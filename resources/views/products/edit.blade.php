@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-edit"></i> Edit Product</h2>
    </div>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Product Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="quantity">Quantity <span style="color: red;">*</span></label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" min="0" required>
                @error('quantity')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price <span style="color: red;">*</span></label>
                <input type="number" id="unit_price" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" step="0.01" required>
                @error('unit_price')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Product
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
