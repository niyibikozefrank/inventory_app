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

        <!-- User Dropdown Menu -->
        <div class="dropdown">
            <div class="user-info">
                @if(Auth::check())
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=667eea&color=fff" 
                         alt="User Avatar" title="{{ Auth::user()->name }}">
                    <span>{{ Auth::user()->name }}</span>
                @else
                    <img src="https://ui-avatars.com/api/?name=Guest&background=667eea&color=fff" 
                         alt="User Avatar" title="Guest">
                    <span>Guest</span>
                @endif
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Dropdown Menu Content -->
            <div class="dropdown-content">
                <a href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-circle"></i>
                    <span>My Profile</span>
                </a>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Manage Users</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
