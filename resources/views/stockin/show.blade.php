@extends('layouts.app')

@section('title', 'View Stock In')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-arrow-down"></i> Stock In Details</h2>
        <a href="{{ route('stockins.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>Stock In Information</h3>
            <p><strong>Product:</strong> 
                @if($stockIn->product)
                    <a href="{{ route('products.show', $stockIn->product) }}">{{ $stockIn->product->name }}</a>
                @else
                    <span style="color: #dc3545;">Product not found</span>
                @endif
            </p>
            <p><strong>Supplier:</strong> 
                @if($stockIn->supplier)
                    <a href="{{ route('suppliers.show', $stockIn->supplier) }}">{{ $stockIn->supplier->name }}</a>
                @else
                    <span style="color: #dc3545;">Supplier not found</span>
                @endif
            </p>
            <p><strong>Quantity:</strong> {{ $stockIn->quantity }}</p>
            <p><strong>Unit Price:</strong> ${{ number_format($stockIn->unit_price, 2) }}</p>
            <p><strong>Total Cost:</strong> ${{ number_format($stockIn->quantity * $stockIn->unit_price, 2) }}</p>
        </div>

        <div>
            <h3>Additional Details</h3>
            <p><strong>Notes:</strong> {{ $stockIn->notes ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ $stockIn->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Updated:</strong> {{ $stockIn->updated_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
