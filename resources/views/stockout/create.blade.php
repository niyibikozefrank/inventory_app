@extends('layouts.app')

@section('title', 'Record Stock Out')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-plus"></i> Record New Stock Out</h2>
    </div>

    <form action="{{ route('stockouts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_id">Product <span style="color: red;">*</span></label>
            <select id="product_id" name="product_id" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} (Available: {{ $product->quantity }})
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="error-text">{{ $message }}</div>
            @enderror
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
                <label for="reason">Reason <span style="color: red;">*</span></label>
                <select id="reason" name="reason" required>
                    <option value="">-- Select Reason --</option>
                    <option value="Sale" {{ old('reason') == 'Sale' ? 'selected' : '' }}>Sale</option>
                    <option value="Damage" {{ old('reason') == 'Damage' ? 'selected' : '' }}>Damage</option>
                    <option value="Loss" {{ old('reason') == 'Loss' ? 'selected' : '' }}>Loss</option>
                    <option value="Return" {{ old('reason') == 'Return' ? 'selected' : '' }}>Return</option>
                    <option value="Adjustment" {{ old('reason') == 'Adjustment' ? 'selected' : '' }}>Adjustment</option>
                    <option value="Other" {{ old('reason') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('reason')
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
                <i class="fas fa-save"></i> Record Stock Out
            </button>
            <a href="{{ route('stockouts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
