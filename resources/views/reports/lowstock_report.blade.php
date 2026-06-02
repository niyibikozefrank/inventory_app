@extends('layouts.app')

@section('title', 'Low Stock Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-exclamation-triangle"></i> Low Stock Report</h2>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </button>
    </div>

    <p style="color: #666; margin-bottom: 20px;">Products with quantity less than 10 units</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Current Quantity</th>
                <th>Unit Price</th>
                <th>Total Value</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->category ?? 'N/A' }}</td>
                <td><strong style="color: #dc3545;">{{ $product->quantity }}</strong></td>
                <td>${{ number_format($product->unit_price, 2) }}</td>
                <td>${{ number_format($product->quantity * $product->unit_price, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">No low stock items found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd;">
        <p><strong>Total Low Stock Products:</strong> {{ $products->count() }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
