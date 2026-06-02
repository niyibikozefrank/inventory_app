<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
            margin: 20px;
            padding: 50px 40px;
        }

        .form-title {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-title h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .form-title p {
            color: #999;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        @media (max-width: 600px) {
            .register-container {
                padding: 30px 25px;
            }

            .form-title h2 {
                font-size: 24px;
            }
        }
    </style>

    <div class="register-container">
        <div class="form-title">
            <h2>Register as Employee</h2>
            <p>Create your account to access the inventory system</p>
        </div>

        <form method="POST" action="{{ route('employee.store') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your full name">
                @if ($errors->has('name'))
                    <span class="error-message">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <!-- Role Selection -->
            <div class="form-group">
                <label for="role">Select Your Role</label>
                <select id="role" name="role" required style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; transition: border-color 0.3s ease;">
                    <option value="">-- Choose a role --</option>
                    <option value="store_manager" {{ old('role') === 'store_manager' ? 'selected' : '' }}>Store Manager - Manage inventory</option>
                    <option value="storekeeper" {{ old('role') === 'storekeeper' ? 'selected' : '' }}>Storekeeper - Handle stock</option>
                    <option value="sales_officer" {{ old('role') === 'sales_officer' ? 'selected' : '' }}>Sales Officer - Handle sales</option>
                    <option value="auditor" {{ old('role') === 'auditor' ? 'selected' : '' }}>Auditor - Check reports</option>
                    <option value="it_officer" {{ old('role') === 'it_officer' ? 'selected' : '' }}>IT Officer - Maintain system</option>
                </select>
                @if ($errors->has('role'))
                    <span class="error-message">{{ $errors->first('role') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                @if ($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Enter a strong password (min 8 characters)">
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm your password">
                @if ($errors->has('password_confirmation'))
                    <span class="error-message">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Register</button>

            <!-- Login Link -->
            <div class="login-link">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
</x-guest-layout>
