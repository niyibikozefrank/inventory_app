@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')

<div class="card supplier-panel">
    <div class="card-header supplier-panel-header">
        <div class="supplier-panel-title">
            <h2><i class="fas fa-people-carry"></i> Suppliers</h2>
            <p class="muted">Manage suppliers, contact details and quick actions</p>
            <div class="supplier-panel-meta">
                <span class="supplier-count">{{ $suppliers->total() }} suppliers</span>
            </div>
        </div>
        <div class="supplier-panel-actions">
            <div class="supplier-search">
                <input id="supplier-search" type="search" placeholder="Search suppliers by name, city, email..." aria-label="Search suppliers" />
            </div>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Supplier
            </a>
        </div>
    </div>

    <div class="card-body supplier-panel-body">
        <div class="supplier-grid">
            @forelse($suppliers as $supplier)
            <div class="supplier-card">
                <div class="supplier-header">
                    <div class="supplier-info" style="width:100%;">
                        <h3>{{ $supplier->name }}</h3>
                        <span style="background:#fff;color:#667eea;padding:6px 14px;border-radius:25px;font-size:12px;font-weight:bold;display:inline-block;margin-top:8px;">
                            ID #{{ $supplier->id }}
                        </span>
                        <div class="supplier-city muted" style="margin-top:8px;">{{ $supplier->city }}</div>
                    </div>
                </div>

                <ul class="supplier-detail-list">
                    <li><strong>Contact Person:</strong> {{ $supplier->contact_person ?? 'N/A' }}</li>
                    <li><strong>Phone:</strong> {{ $supplier->phone ?? 'N/A' }}</li>
                    <li><strong>Email:</strong> {{ $supplier->email ?? 'N/A' }}</li>
                </ul>

                <div class="supplier-actions">
                    <a href="{{ route('suppliers.show',$supplier) }}" class="crud-btn view-btn">
                        <i class="fas fa-eye"></i>
                        View
                    </a>

                    <a href="{{ route('suppliers.edit',$supplier) }}" class="crud-btn edit-btn">
                        <i class="fas fa-pen"></i>
                        Update
                    </a>

                    <form action="{{ route('suppliers.destroy',$supplier) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="crud-btn delete-btn" onclick="return confirm('Delete this supplier?')">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @empty
                <div style="text-align:center; padding:30px; grid-column:1/-1;">No suppliers found</div>
            @endforelse
        </div>
    </div>

    <div class="card-footer supplier-panel-footer" style="margin-top:18px; display:flex; flex-direction:column; align-items:center; gap:10px;">
        <div class="pagination">
            {{ $suppliers->links() }}
        </div>
        <div id="infinite-scroll-sentinel" role="status" aria-hidden="true"></div>
    </div>

    <!-- Photo preview modal is injected by suppliers.js -->
</div>

@endsection
