<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>@yield('title', 'Inventory Management System')</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <div class="app-container">
        <!-- Sidebar Navigation -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Top Navigation Bar -->
            @include('layouts.navbar')

            <!-- Page Content -->
            <div class="content">
                <!-- Success Alert -->
                @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <span><i class="fas fa-check-circle"></i> {{ $message }}</span>
                        <button class="alert-close" type="button" onclick="this.parentElement.remove();">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <!-- Error Alert -->
                @if($errors->any())
                    <div class="alert alert-error" role="alert">
                        <div>
                            <strong><i class="fas fa-exclamation-circle"></i> Errors found:</strong>
                            <ul style="margin-top: 8px; margin-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button class="alert-close" type="button" onclick="this.parentElement.remove();">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <!-- Page Content Section -->
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Modal Backdrop -->
    <div class="modal-backdrop"></div>

    <!-- Additional Scripts -->
    <script>
        // Prevent back button navigation after logout
        window.addEventListener('load', function() {
            window.history.pushState(null, null, window.location.href);
            
            window.addEventListener('popstate', function() {
                window.history.pushState(null, null, window.location.href);
            });
        });

        // Disable back/forward keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if ((e.altKey && e.key === 'ArrowRight') || (e.altKey && e.key === 'ArrowLeft')) {
                e.preventDefault();
            }
        });

        // Initialize tooltips and popovers
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.animation = 'slideIn 0.3s ease reverse';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
