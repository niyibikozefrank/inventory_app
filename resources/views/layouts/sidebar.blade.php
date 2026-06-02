<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-boxes"></i> Inventory System
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-title">Main</div>
        <div class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
        </div>

        <div class="nav-section-title">Management</div>
        <div class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}">
                <i class="fas fa-box"></i> Products
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
            <a href="{{ route('suppliers.index') }}">
                <i class="fas fa-truck"></i> Suppliers
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('stockins.*') ? 'active' : '' }}">
            <a href="{{ route('stockins.index') }}">
                <i class="fas fa-arrow-down"></i> Stock In
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('stockouts.*') ? 'active' : '' }}">
            <a href="{{ route('stockouts.index') }}">
                <i class="fas fa-arrow-up"></i> Stock Out
            </a>
        </div>

        <div class="nav-section-title">Reports</div>
        <div class="nav-item {{ request()->routeIs('reports.inventory') ? 'active' : '' }}">
            <a href="{{ route('reports.inventory') }}">
                <i class="fas fa-chart-bar"></i> Inventory Report
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('reports.stockin') ? 'active' : '' }}">
            <a href="{{ route('reports.stockin') }}">
                <i class="fas fa-chart-line"></i> Stock In Report
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('reports.stockout') ? 'active' : '' }}">
            <a href="{{ route('reports.stockout') }}">
                <i class="fas fa-chart-pie"></i> Stock Out Report
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('reports.lowstock') ? 'active' : '' }}">
            <a href="{{ route('reports.lowstock') }}">
                <i class="fas fa-exclamation-triangle"></i> Low Stock
            </a>
        </div>

        <div class="nav-item {{ request()->routeIs('reports.fastmoving') ? 'active' : '' }}">
            <a href="{{ route('reports.fastmoving') }}">
                <i class="fas fa-fire"></i> Fast Moving
            </a>
        </div>

        <div class="nav-section-title">Settings</div>
        <div class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="fas fa-users"></i> Users
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('profile.edit') }}">
                <i class="fas fa-user-circle"></i> Profile
            </a>
        </div>
    </nav>
</div>
