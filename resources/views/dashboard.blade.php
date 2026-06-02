@extends('layouts.app')

@section('title', 'Dashboard - Inventory Management System')
@section('page-title', 'Dashboard')

@section('content')
<div class="container">
    <!-- Dashboard Header -->
    <div class="flex-between mb-30">
        <div>
            <h1 style="color: var(--dark); margin-bottom: 5px;">Welcome, {{ Auth::user()->name }}! 👋</h1>
            <p style="color: #666; font-size: 14px;">
                <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                {{ date('l, F j, Y') }}
            </p>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <!-- Total Products -->
        <div class="stat-card">
            <div class="stat-card-value">{{ $totalProducts ?? 0 }}</div>
            <div class="stat-card-label">Total Products</div>
            <div style="margin-top: 15px; font-size: 12px; color: #999;">
                <i class="fas fa-arrow-up" style="color: var(--success); margin-right: 5px;"></i>
                Updated today
            </div>
        </div>

        <!-- Low Stock Alert -->
        <div class="stat-card warning">
            <div class="stat-card-value warning">{{ $lowStockProducts ?? 0 }}</div>
            <div class="stat-card-label">Low Stock Alert</div>
            <div style="margin-top: 15px; font-size: 12px; color: #999;">
                <i class="fas fa-exclamation-circle" style="color: var(--warning); margin-right: 5px;"></i>
                Need attention
            </div>
        </div>

        <!-- Total Suppliers -->
        <div class="stat-card">
            <div class="stat-card-value" style="color: var(--success);">{{ $totalSuppliers ?? 0 }}</div>
            <div class="stat-card-label">Total Suppliers</div>
            <div style="margin-top: 15px; font-size: 12px; color: #999;">
                <i class="fas fa-truck" style="color: var(--success); margin-right: 5px;"></i>
                Active partners
            </div>
        </div>

        <!-- Today's Transactions -->
        <div class="stat-card danger">
            <div class="stat-card-value danger">{{ $todayTransactions ?? 0 }}</div>
            <div class="stat-card-label">Today's Transactions</div>
            <div style="margin-top: 15px; font-size: 12px; color: #999;">
                <i class="fas fa-sync-alt" style="color: var(--danger); margin-right: 5px;"></i>
                In & Out movements
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="row">
        <!-- Recent Transactions -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="margin: 0;">
                        <i class="fas fa-history" style="margin-right: 10px; color: var(--primary);"></i>
                        Recent Transactions
                    </h3>
                    <a href="{{ route('stockins.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-right"></i> View All
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table-striped">
                        <thead>
                            <tr>
                                <th><i class="fas fa-box" style="margin-right: 8px;"></i>Product</th>
                                <th><i class="fas fa-arrow-right" style="margin-right: 8px;"></i>Type</th>
                                <th><i class="fas fa-cube" style="margin-right: 8px;"></i>Quantity</th>
                                <th><i class="fas fa-calendar" style="margin-right: 8px;"></i>Date</th>
                                <th><i class="fas fa-info-circle" style="margin-right: 8px;"></i>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align: center; color: #999; padding: 30px;">
                                    <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 10px;"></i>
                                    <p>No recent transactions</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mt-30">
        <div class="card-header">
            <h3 style="margin: 0;">
                <i class="fas fa-lightning-bolt" style="margin-right: 10px; color: var(--warning);"></i>
                Quick Actions
            </h3>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; padding: 0;">
            <a href="{{ route('products.create') }}" class="btn btn-primary" style="justify-content: center; margin: 0; border-radius: 8px; padding: 15px;">
                <i class="fas fa-plus" style="margin-right: 8px;"></i>Add Product
            </a>
            <a href="{{ route('suppliers.create') }}" class="btn btn-success" style="justify-content: center; margin: 0; border-radius: 8px; padding: 15px;">
                <i class="fas fa-plus" style="margin-right: 8px;"></i>Add Supplier
            </a>
            <a href="{{ route('stockins.create') }}" class="btn btn-info" style="justify-content: center; margin: 0; border-radius: 8px; padding: 15px; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white;">
                <i class="fas fa-arrow-down" style="margin-right: 8px;"></i>Stock In
            </a>
            <a href="{{ route('stockouts.create') }}" class="btn btn-warning" style="justify-content: center; margin: 0; border-radius: 8px; padding: 15px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;">
                <i class="fas fa-arrow-up" style="margin-right: 8px;"></i>Stock Out
            </a>
            <a href="{{ route('reports.inventory') }}" class="btn btn-secondary" style="justify-content: center; margin: 0; border-radius: 8px; padding: 15px;">
                <i class="fas fa-chart-bar" style="margin-right: 8px;"></i>View Reports
            </a>
        </div>
    </div>

    <!-- System Info -->
    <div style="margin-top: 30px; padding: 20px; background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 12px; border-left: 4px solid #3b82f6;">
        <h4 style="margin-top: 0; color: #0c4a6e;">
            <i class="fas fa-lightbulb" style="margin-right: 10px;"></i>
            Inventory Management Tip
        </h4>
        <p style="color: #0c4a6e; margin-bottom: 0;">
            Regularly check the <strong>Low Stock Report</strong> to ensure you never run out of important inventory items. 
            Set up reminder alerts for critical products!
        </p>
    </div>
</div>

<style>
    .table-striped tbody tr:nth-child(odd) {
        background-color: var(--light);
    }

    .table-striped tbody tr:hover {
        background-color: #e8ecf1;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
