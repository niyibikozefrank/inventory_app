@extends('layouts.app')

@section('title', 'Record Stock In')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-plus"></i> Record New Stock In</h2>
    </div>

    <form action="{{ route('stockins.store') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="product_id">Product <span style="color: red;">*</span></label>
                <select id="product_id" name="product_id" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} (SKU: {{ $product->sku }})
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="supplier_id">Supplier <span style="color: red;">*</span></label>
                <select id="supplier_id" name="supplier_id" required>
                    <option value="">-- Select Supplier --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="quantity">Quantity <span style="color: red;">*</span></label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" min="1" required>
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

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Record Stock In
            </button>
            <a href="{{ route('stockins.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
