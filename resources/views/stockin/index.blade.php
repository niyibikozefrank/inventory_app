@extends('layouts.app')

@section('title', 'Stock In')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-arrow-down"></i> Stock In Management</h2>
        <a href="{{ route('stockins.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Record Stock In
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockIns as $stock)
            <tr>
                <td>
                    @if($stock->product)
                        {{ $stock->product->name }}
                    @else
                        <span style="color: #dc3545;">Product not found</span>
                    @endif
                </td>
                <td>
                    @if($stock->supplier)
                        {{ $stock->supplier->name }}
                    @else
                        <span style="color: #dc3545;">Supplier not found</span>
                    @endif
                </td>
                <td>{{ $stock->quantity }}</td>
                <td>${{ number_format($stock->unit_price, 2) }}</td>
                <td>${{ number_format($stock->quantity * $stock->unit_price, 2) }}</td>
                <td>{{ $stock->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('stockins.show', $stock) }}" class="btn btn-secondary btn-sm">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">No stock in records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $stockIns->links() }}
    </div>
</div>
@endsection
