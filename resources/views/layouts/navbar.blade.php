<div class="navbar">
    <h2>
        <i class="fas fa-dashboard"></i>
        @yield('page-title', 'Dashboard')
    </h2>
    
    <div class="user-menu">
        <!-- Logout Button -->
        <div class="logout-btn">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
