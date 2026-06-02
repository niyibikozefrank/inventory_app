@extends('layouts.app')

@section('title', 'Stock In Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-chart-line"></i> Stock In Report</h2>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockIns as $stock)
            <tr>
                <td>{{ $stock->created_at->format('M d, Y') }}</td>
                <td>{{ $stock->product->name }}</td>
                <td>{{ $stock->supplier->name }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>${{ number_format($stock->unit_price, 2) }}</td>
                <td>${{ number_format($stock->quantity * $stock->unit_price, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">No stock in records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd;">
        <p><strong>Total Records:</strong> {{ $stockIns->count() }}</p>
        <p><strong>Total Quantity:</strong> {{ $totalQuantity }}</p>
        <p><strong>Total Cost:</strong> ${{ number_format($stockIns->sum(function($s) { return $s->quantity * $s->unit_price; }), 2) }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
