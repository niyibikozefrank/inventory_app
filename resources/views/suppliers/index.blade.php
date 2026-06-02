@extends('layouts.app')

@section('title', 'Suppliers')
@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <h2><i class="fas fa-people-carry"></i> Suppliers Management</h2>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Supplier
        </a>
    </div>

    <div class="supplier-controls">
        <div class="supplier-search">
            <input id="supplier-search" type="search" placeholder="Search suppliers by name, city, email..." />
        </div>
        <div>
            <a href="{{ route('suppliers.create') }}" class="btn btn-outline">New Supplier</a>
        </div>
    </div>

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

    <div class="pagination" style="margin-top:18px;">
        {{ $suppliers->links() }}
    </div>

    <div id="infinite-scroll-sentinel"></div>

    <!-- Photo preview modal is injected by suppliers.js -->
</div>
@endsection
