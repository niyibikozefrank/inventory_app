<x-guest-layout>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 650px;
        }

        .login-branding {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-branding h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .login-branding p {
            font-size: 15px;
            line-height: 1.7;
            opacity: 0.9;
        }

        .login-form-section {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-title h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 8px;
        }

        .form-title p {
            color: #777;
            font-size: 14px;
        }

        .role-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 25px;
        }

        .role-option input {
            display: none;
        }

        .role-label {
            border: 2px solid #ddd;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s ease;
            display: block;
        }

        .role-option input:checked + .role-label {
            border-color: #667eea;
            background: #eef2ff;
            transform: scale(1.03);
        }

        .role-icon {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .role-label-text {
            font-weight: bold;
            color: #333;
            font-size: 13px;
        }

        .role-label-desc {
            color: #777;
            font-size: 11px;
            margin-top: 3px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 13px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #444;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .login-branding {
                padding: 30px;
            }

            .login-form-section {
                padding: 30px;
            }
        }

        /* Mobile */
        @media (max-width: 600px) {

            body {
                padding: 10px;
            }

            .login-container {
                border-radius: 12px;
            }

            .login-branding {
                padding: 25px 20px;
            }

            .login-branding h1 {
                font-size: 26px;
            }

            .login-form-section {
                padding: 20px;
            }

            .form-title h2 {
                font-size: 24px;
            }

            .role-selector {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-form-section" style="max-width:400px;margin:0 auto;">
            <div class="form-title">
                <h2>Admin Login</h2>
                <p>Sign in to your admin account</p>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <span class="error-message">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <span class="error-message">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <!-- Remember -->
                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Forgot Password?
                        </a>
                    @endif
                </div>
                <!-- Login Button -->
                <button type="submit" class="submit-btn">
                    Login
                </button>
            </form>
        </div>
    </div>

</x-guest-layout>
