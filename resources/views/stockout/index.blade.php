@extends('layouts.app')

@section('title', 'Stock Out')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-arrow-up"></i> Stock Out Management</h2>
        <a href="{{ route('stockouts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Record Stock Out
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockOuts as $stock)
            <tr>
                <td>
                    @if($stock->product)
                        {{ $stock->product->name }}
                    @else
                        <span style="color: #dc3545;">Product not found</span>
                    @endif
                </td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->reason }}</td>
                <td>{{ $stock->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('stockouts.show', $stock) }}" class="btn btn-secondary btn-sm">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">No stock out records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $stockOuts->links() }}
    </div>
</div>
@endsection
