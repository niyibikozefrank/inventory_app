@extends('layouts.app')

@section('title', 'View Stock Out')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-arrow-up"></i> Stock Out Details</h2>
        <a href="{{ route('stockouts.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>Stock Out Information</h3>
            <p><strong>Product:</strong> 
                @if($stockOut->product)
                    <a href="{{ route('products.show', $stockOut->product) }}">{{ $stockOut->product->name }}</a>
                @else
                    <span style="color: #dc3545;">Product not found</span>
                @endif
            </p>
            <p><strong>Quantity:</strong> {{ $stockOut->quantity }}</p>
            <p><strong>Reason:</strong> {{ $stockOut->reason }}</p>
        </div>

        <div>
            <h3>Additional Details</h3>
            <p><strong>Notes:</strong> {{ $stockOut->notes ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ $stockOut->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Updated:</strong> {{ $stockOut->updated_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
