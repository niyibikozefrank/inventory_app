@extends('layouts.app')

@section('title', 'View Supplier')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-truck"></i> {{ $supplier->name }}</h2>
        <div>
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h3>Supplier Details</h3>
            <p><strong>Name:</strong> {{ $supplier->name }}</p>
            <p><strong>Contact Person:</strong> {{ $supplier->contact_person }}</p>
            <p><strong>Email:</strong> {{ $supplier->email }}</p>
            <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
            <p><strong>Address:</strong> {{ $supplier->address }}</p>
            <p><strong>City:</strong> {{ $supplier->city ?? 'N/A' }}</p>
            <p><strong>Country:</strong> {{ $supplier->country ?? 'N/A' }}</p>
        </div>

        <div>
            <h3>Stock History</h3>
            <p><strong>Total Stock Ins:</strong> {{ $stockIns->count() }}</p>
            <p><strong>Total Quantity Supplied:</strong> {{ $stockIns->sum('quantity') }}</p>
            <p><strong>Created:</strong> {{ $supplier->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Updated:</strong> {{ $supplier->updated_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
