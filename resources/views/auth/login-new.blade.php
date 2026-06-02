<x-guest-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 95%;
            max-width: 1400px;
            margin: 20px auto;
        }

        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            align-items: stretch;
            min-height: 600px;
        }

        .login-branding {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-branding h1 {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .login-branding p {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .login-form-section {
            padding: 40px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            max-height: 90vh;
        }

        .form-title {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-title h2 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .form-title p {
            color: #999;
            font-size: 13px;
        }

        .role-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            margin-bottom: 25px;
        }

        .role-option {
            position: relative;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px 8px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f9f9f9;
            min-height: 90px;
        }

        .role-option input[type="radio"]:checked + .role-label {
            border-color: #667eea;
            background: #f0f4ff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .role-icon {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .role-label-text {
            font-weight: 600;
            color: #333;
            text-align: center;
            font-size: 12px;
        }

        .role-label-desc {
            font-size: 10px;
            color: #999;
            margin-top: 3px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 13px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 13px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .remember-me input[type="checkbox"] {
            cursor: pointer;
            width: 14px;
            height: 14px;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 13px;
        }

        .forgot-password:hover {
            color: #764ba2;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .register-link {
            margin-top: 16px;
            text-align: center;
            color: #666;
            font-size: 13px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        /* Tablet Portrait - 1024px */
        @media (max-width: 1024px) {
            .login-wrapper {
                grid-template-columns: 1fr 1.2fr;
                min-height: 550px;
            }

            .login-branding {
                padding: 30px 20px;
            }

            .login-branding h1 {
                font-size: 24px;
                margin-bottom: 12px;
            }

            .login-form-section {
                padding: 30px 25px;
            }

            .role-selector {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
                margin-bottom: 20px;
            }

            .role-label {
                min-height: 80px;
                padding: 10px 6px;
            }

            .role-icon {
                font-size: 20px;
            }

            .role-label-text {
                font-size: 11px;
            }
        }

        /* iPad Landscape - 768px */
        @media (max-width: 768px) and (orientation: landscape) {
            .login-wrapper {
                grid-template-columns: 1fr 1fr;
                min-height: auto;
                max-height: 95vh;
            }

            .login-branding {
                padding: 20px 15px;
            }

            .login-branding h1 {
                font-size: 18px;
                margin-bottom: 8px;
            }

            .login-form-section {
                padding: 20px 18px;
            }

            .form-title {
                margin-bottom: 12px;
            }

            .form-title h2 {
                font-size: 18px;
                margin-bottom: 4px;
            }

            .role-selector {
                grid-template-columns: repeat(6, 1fr);
                gap: 6px;
                margin-bottom: 12px;
            }

            .role-label {
                min-height: 60px;
                padding: 6px 4px;
            }

            .role-icon {
                font-size: 16px;
                margin-bottom: 2px;
            }

            .role-label-text {
                font-size: 9px;
            }

            .role-label-desc {
                font-size: 7px;
                margin-top: 1px;
            }

            .form-group {
                margin-bottom: 12px;
            }

            .form-group input {
                padding: 8px 10px;
                font-size: 12px;
            }

            .form-group label {
                margin-bottom: 4px;
                font-size: 12px;
            }

            .remember-forgot {
                margin-bottom: 12px;
                font-size: 11px;
            }

            .submit-btn {
                padding: 10px;
                font-size: 14px;
            }

            .register-link {
                margin-top: 10px;
                font-size: 11px;
            }
        }

        /* Mobile Landscape */
        @media (max-width: 667px) and (orientation: landscape) {
            .login-wrapper {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .login-branding {
                display: none;
            }

            .login-form-section {
                padding: 15px 12px;
                max-height: 95vh;
            }

            .form-title {
                margin-bottom: 10px;
            }

            .form-title h2 {
                font-size: 16px;
                margin-bottom: 3px;
            }

            .role-selector {
                grid-template-columns: repeat(6, 1fr);
                gap: 5px;
                margin-bottom: 10px;
            }

            .role-label {
                min-height: 55px;
                padding: 5px 3px;
            }

            .role-icon {
                font-size: 14px;
                margin-bottom: 1px;
            }

            .role-label-text {
                font-size: 8px;
            }

            .role-label-desc {
                font-size: 6px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group input {
                padding: 7px 10px;
                font-size: 11px;
            }

            .form-group label {
                margin-bottom: 3px;
                font-size: 11px;
            }

            .remember-forgot {
                margin-bottom: 10px;
                font-size: 10px;
            }

            .submit-btn {
                padding: 9px;
                font-size: 13px;
            }

            .register-link {
                margin-top: 8px;
                font-size: 10px;
            }
        }

        /* Tablet Portrait - 768px */
        @media (max-width: 768px) and (orientation: portrait) {
            .login-wrapper {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .login-branding {
                padding: 25px;
                min-height: 140px;
            }

            .login-form-section {
                padding: 25px 20px;
            }

            .role-selector {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }
        }

        /* Mobile - 480px and below */
        @media (max-width: 480px) {
            .login-container {
                border-radius: 10px;
                width: 98%;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .login-branding {
                padding: 20px;
                min-height: 120px;
            }

            .login-form-section {
                padding: 20px 15px;
            }

            .form-title h2 {
                font-size: 20px;
            }

            .role-selector {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .role-label {
                min-height: 70px;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-wrapper">
            <!-- Branding Section -->
            <div class="login-branding">
                <h1>📦 Inventory System</h1>
                <p>Manage your inventory efficiently with our modern system. Secure login for all roles.</p>
            </div>

            <!-- Login Form Section -->
            <div class="login-form-section">
                <div class="form-title">
                    <h2>Welcome</h2>
                    <p>Select your role and login</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Role Selection -->
                    <div class="role-selector">
                        <div class="role-option">
                            <input type="radio" id="admin_role" name="role" value="admin" {{ old('role') === 'admin' ? 'checked' : '' }}>
                            <label for="admin_role" class="role-label">
                                <div class="role-icon">👨‍💼</div>
                                <div class="role-label-text">Admin</div>
                                <div class="role-label-desc">Full control</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" id="store_manager_role" name="role" value="store_manager" {{ old('role') === 'store_manager' ? 'checked' : '' }}>
                            <label for="store_manager_role" class="role-label">
                                <div class="role-icon">📊</div>
                                <div class="role-label-text">Manager</div>
                                <div class="role-label-desc">Inventory</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" id="storekeeper_role" name="role" value="storekeeper" {{ old('role') === 'storekeeper' || old('role') === null ? 'checked' : '' }}>
                            <label for="storekeeper_role" class="role-label">
                                <div class="role-icon">📦</div>
                                <div class="role-label-text">Keeper</div>
                                <div class="role-label-desc">Stock</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" id="sales_officer_role" name="role" value="sales_officer" {{ old('role') === 'sales_officer' ? 'checked' : '' }}>
                            <label for="sales_officer_role" class="role-label">
                                <div class="role-icon">💰</div>
                                <div class="role-label-text">Sales</div>
                                <div class="role-label-desc">Officer</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" id="auditor_role" name="role" value="auditor" {{ old('role') === 'auditor' ? 'checked' : '' }}>
                            <label for="auditor_role" class="role-label">
                                <div class="role-icon">📋</div>
                                <div class="role-label-text">Auditor</div>
                                <div class="role-label-desc">Reports</div>
                            </label>
                        </div>
                        <div class="role-option">
                            <input type="radio" id="it_officer_role" name="role" value="it_officer" {{ old('role') === 'it_officer' ? 'checked' : '' }}>
                            <label for="it_officer_role" class="role-label">
                                <div class="role-icon">⚙️</div>
                                <div class="role-label-text">IT</div>
                                <div class="role-label-desc">System</div>
                            </label>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
                        @if ($errors->has('email'))
                            <span class="error-message">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        @if ($errors->has('password'))
                            <span class="error-message">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="remember-forgot">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" id="remember_me">
                            <span>Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">Login</button>

                    <!-- Register Link for New Users -->
                    <div class="register-link">
                        New user? <a href="{{ route('employee.register') }}">Create new account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>