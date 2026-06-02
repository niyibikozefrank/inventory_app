@extends('layouts.app')

@section('title', 'Inventory Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-chart-bar"></i> Inventory Report</h2>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Value</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category ?? 'N/A' }}</td>
                <td>{{ $product->quantity }}</td>
                <td>${{ number_format($product->unit_price, 2) }}</td>
                <td>${{ number_format($product->quantity * $product->unit_price, 2) }}</td>
                <td>
                    @if($product->quantity < 10)
                        <span style="background-color: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 3px;">Low Stock</span>
                    @elseif($product->quantity == 0)
                        <span style="background-color: #f5c6cb; color: #721c24; padding: 5px 10px; border-radius: 3px;">Out of Stock</span>
                    @else
                        <span style="background-color: #d4edda; color: #155724; padding: 5px 10px; border-radius: 3px;">In Stock</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">No products found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd;">
        <p><strong>Total Products:</strong> {{ $products->count() }}</p>
        <p><strong>Total Inventory Value:</strong> ${{ number_format($products->sum(function($p) { return $p->quantity * $p->unit_price; }), 2) }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
