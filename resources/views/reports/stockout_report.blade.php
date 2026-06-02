@extends('layouts.app')

@section('title', 'Stock Out Report')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-chart-pie"></i> Stock Out Report</h2>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockOuts as $stock)
            <tr>
                <td>{{ $stock->created_at->format('M d, Y') }}</td>
                <td>{{ $stock->product->name }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->reason }}</td>
                <td>{{ $stock->notes ?? 'N/A' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">No stock out records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd;">
        <p><strong>Total Records:</strong> {{ $stockOuts->count() }}</p>
        <p><strong>Total Quantity:</strong> {{ $totalQuantity }}</p>
        <p><strong>Generated on:</strong> {{ now()->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
