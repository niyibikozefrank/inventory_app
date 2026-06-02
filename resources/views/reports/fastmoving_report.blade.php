@extends('layouts.app')

@section('title', 'Fast Moving Products Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-fire"></i> Fast Moving Products Report</h2>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </button>
    </div>

    <p style="color: #666; margin-bottom: 20px;">Top products sold in the last 30 days</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Units Sold (30 days)</th>
                <th>Current Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->category ?? 'N/A' }}</td>
                <td><strong style="color: #667eea;">{{ $product->stock_outs_count }}</strong></td>
                <td>{{ $product->quantity }}</td>
                <td>${{ number_format($product->unit_price, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd;">
        <p><strong>Total Fast Moving Products:</strong> {{ $products->count() }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
