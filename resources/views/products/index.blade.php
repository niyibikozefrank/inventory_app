@extends('layouts.app')

@section('title', 'Products - Inventory Management System')
@section('page-title', 'Products Management')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="flex-between mb-30">
        <div>
            <h1 style="color: var(--dark); margin-bottom: 5px;">
                <i class="fas fa-box" style="color: var(--primary); margin-right: 10px;"></i>
                Products Management
            </h1>
            <p style="color: #666; font-size: 14px;">Manage your product inventory</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>
            <span>Add New Product</span>
        </a>
    </div>

    <!-- Search & Filter Section -->
    <div class="card mb-30">
        <form method="GET" action="{{ route('products.index') }}" style="display: flex; gap: 10px; align-items: flex-end;">
            <div class="form-group" style="flex: 1; margin-bottom: 0;">
                <label class="form-label">Search Product</label>
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Search by name or SKU..."
                    value="{{ request('search') }}"
                >
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Products Table Card -->
    <div class="card">
        @if($products->count() > 0)
            <div class="card-header">
                <div>
                    <h3 style="margin: 0;">
                        <i class="fas fa-list" style="color: var(--primary); margin-right: 10px;"></i>
                        Product List
                    </h3>
                    <p style="font-size: 12px; color: #999; margin-top: 5px;">
                        Showing {{ $products->count() }} of {{ $products->total() }} products
                    </p>
                </div>
                <div class="actions">
                    <span style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                        {{ $products->total() }} Total
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table-striped">
                    <thead>
                        <tr>
                            <th><i class="fas fa-barcode"></i> SKU</th>
                            <th><i class="fas fa-tag"></i> Product Name</th>
                            <th><i class="fas fa-folder"></i> Category</th>
                            <th><i class="fas fa-cube"></i> Quantity</th>
                            <th><i class="fas fa-dollar-sign"></i> Unit Price</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <code style="background: var(--light); padding: 4px 8px; border-radius: 4px; font-size: 12px;">
                                        {{ $product->sku ?? 'N/A' }}
                                    </code>
                                </td>
                                <td>
                                    <strong>{{ $product->name }}</strong>
                                </td>
                                <td>
                                    <span class="badge badge-primary">
                                        {{ $product->category ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td>
                                    @if($product->quantity < 10)
                                        <span class="badge badge-danger">
                                            <i class="fas fa-exclamation-triangle" style="margin-right: 4px;"></i>
                                            {{ $product->quantity }}
                                        </span>
                                    @elseif($product->quantity < 20)
                                        <span class="badge badge-warning">
                                            <i class="fas fa-warning" style="margin-right: 4px;"></i>
                                            {{ $product->quantity }}
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            <i class="fas fa-check-circle" style="margin-right: 4px;"></i>
                                            {{ $product->quantity }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <strong>${{ number_format($product->unit_price, 2) }}</strong>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <a 
                                            href="{{ route('products.show', $product) }}" 
                                            class="btn btn-info btn-sm" 
                                            title="View Details"
                                            style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; text-decoration: none; padding: 6px 10px;"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a 
                                            href="{{ route('products.edit', $product) }}" 
                                            class="btn btn-warning btn-sm" 
                                            title="Edit Product"
                                            style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; text-decoration: none; padding: 6px 10px;"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form 
                                            method="POST" 
                                            action="{{ route('products.destroy', $product) }}" 
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger btn-sm" 
                                                title="Delete Product"
                                                style="padding: 6px 10px;"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px;">
                                    <div>
                                        <i class="fas fa-inbox" style="font-size: 3rem; color: #ddd; margin-bottom: 15px;"></i>
                                        <p style="color: #999; font-size: 16px; margin: 0;">No products found</p>
                                        <p style="color: #bbb; font-size: 14px; margin-top: 8px;">
                                            @if(request('search'))
                                                Try adjusting your search criteria
                                            @else
                                                <a href="{{ route('products.create') }}" style="color: var(--primary); text-decoration: none; font-weight: 600;">Create your first product →</a>
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div style="padding: 20px; border-top: 1px solid var(--border); display: flex; justify-content: center;">
                {{ $products->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div style="padding: 60px 20px; text-align: center;">
                <i class="fas fa-box" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                <h3 style="color: var(--dark); margin-bottom: 10px;">No Products Yet</h3>
                <p style="color: #666; margin-bottom: 20px;">Start by creating your first product</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus-circle"></i>
                    Create Product
                </a>
            </div>
        @endif
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .actions {
            display: none;
        }

        table {
            font-size: 12px;
        }

        .btn-sm {
            padding: 4px 8px;
            font-size: 10px;
        }
    }
</style>
@endsection
