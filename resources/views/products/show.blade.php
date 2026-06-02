@extends('layouts.app')

@section('title', 'View Product')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-box"></i> {{ $product->name }}</h2>
        <div>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>Product Details</h3>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Category:</strong> {{ $product->category ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
            <p><strong>Current Quantity:</strong> <span style="font-weight: bold; color: @if($product->quantity < 10) #dc3545 @else #28a745 @endif;">{{ $product->quantity }}</span></p>
            <p><strong>Unit Price:</strong> ${{ number_format($product->unit_price, 2) }}</p>
            <p><strong>Total Value:</strong> ${{ number_format($product->quantity * $product->unit_price, 2) }}</p>
        </div>

        <div>
            <h3>Stock History</h3>
            <p><strong>Total Stock In:</strong> {{ $stockIns->sum('quantity') }}</p>
            <p><strong>Total Stock Out:</strong> {{ $stockOuts->sum('quantity') }}</p>
            <p><strong>Created:</strong> {{ $product->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Updated:</strong> {{ $product->updated_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
