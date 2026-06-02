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
            <div class="supplier-avatar" role="button" title="Click to preview"
                 @php
                     $photo = $supplier->photo ?? null;
                     $avatar = $photo ? asset('storage/' . $photo) : 'https://ui-avatars.com/api/?name=' . urlencode($supplier->name) . '&background=667eea&color=fff&size=256';
                 @endphp
                 data-photo="{{ $avatar }}">
                <div class="avatar-placeholder" aria-hidden="true">
                    <div class="avatar-shimmer"></div>
                </div>
                @if($photo)
                    <img data-src="{{ asset('storage/' . $photo) }}" alt="{{ $supplier->name }}" class="supplier-avatar-img" loading="lazy" />
                @else
                    <img data-src="https://ui-avatars.com/api/?name={{ urlencode($supplier->name) }}&background=667eea&color=fff&size=256" alt="{{ $supplier->name }}" class="supplier-avatar-img" loading="lazy" />
                @endif
            </div>

            <div class="supplier-body">
                <div class="supplier-name">
                    <a href="{{ route('suppliers.show', $supplier) }}">{{ $supplier->name }}</a>
                    <span class="supplier-pill">{{ $supplier->city }}</span>
                </div>

                <div class="supplier-meta">
                    <div><strong>Contact:</strong> {{ $supplier->contact_person ?? '—' }}</div>
                    <div><strong>Phone:</strong> <span id="phone-{{ $supplier->id }}">{{ $supplier->phone ?? '—' }}</span> <button class="btn btn-outline" data-copy="#phone-{{ $supplier->id }}" title="Copy phone">Copy</button></div>
                    <div><strong>Email:</strong> <span id="email-{{ $supplier->id }}">{{ $supplier->email ?? '—' }}</span> <button class="btn btn-outline" data-copy="#email-{{ $supplier->id }}" title="Copy email">Copy</button></div>
                    <div><strong>Address:</strong> {{ $supplier->address ?? '—' }}</div>
                </div>
            </div>

            <div class="supplier-actions">
                <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-secondary">View</a>
                <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="supplier-delete-form" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @empty
            <div style="text-align:center; padding:30px;">No suppliers found</div>
        @endforelse
    </div>

        <div class="card-footer supplier-panel-footer" style="margin-top:18px; display:flex; flex-direction:column; align-items:center; gap:10px;">
            <div class="pagination">
                {{ $suppliers->links() }}
            </div>
            <div id="infinite-scroll-sentinel" role="status" aria-hidden="true"></div>
        </div>

        <!-- Photo preview modal is injected by suppliers.js -->
    </div>

</div>

@endsection
