@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-chart-line"></i> Dashboard Overview</h2>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>{{ $totalProducts }}</h3>
            <p><i class="fas fa-box"></i> Total Products</p>
        </div>
        <div class="stat-card">
            <h3>{{ $lowStockProducts }}</h3>
            <p><i class="fas fa-exclamation-triangle"></i> Low Stock Products</p>
        </div>
        <div class="stat-card">
            <h3>{{ $totalStockIn }}</h3>
            <p><i class="fas fa-arrow-down"></i> Total Stock In</p>
        </div>
        <div class="stat-card">
            <h3>{{ $totalStockOut }}</h3>
            <p><i class="fas fa-arrow-up"></i> Total Stock Out</p>
        </div>
        <div class="stat-card">
            <h3>{{ $totalUsers }}</h3>
            <p><i class="fas fa-users"></i> Total Users</p>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(45%, 1fr)); gap: 20px;">
    <!-- Recent Stock Ins -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-arrow-down"></i> Recent Stock In</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Qty</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentStockIns as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->supplier->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Recent Stock Outs -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-arrow-up"></i> Recent Stock Out</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Reason</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentStockOuts as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->reason }}</td>
                    <td>{{ $stock->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
