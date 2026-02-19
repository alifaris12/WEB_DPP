
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Economics and Business - Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Header with University Branding */
        .header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 40px;
            z-index: 100;
        }

        .university-logo {
            display: flex;
            align-items: center;
            color: #22529a;
            font-weight: bold;
        }

        .logo-image {
            height: 60px;
            width: auto;
            max-width: 250px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        /* Fallback text styling for when logo is loading or unavailable */
        .logo-fallback {
            display: flex;
            align-items: center;
        }

        .logo-icon-fallback {
            width: 50px;
            height: 50px;
            background: #22529a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 24px;
        }

        .university-name {
            font-size: 18px;
            line-height: 1.2;
        }

        .faculty-name {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 2px;
        }

        /* Main Container */
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Registration Form Box */
        .register-form {
            background: linear-gradient(145deg, #1a365d 0%, #22529a 50%, #2d5aa0 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .register-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 20px;
            pointer-events: none;
        }

        .form-title {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #e2e8f0;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.95);
            color: #2d3748;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-input:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(247, 200, 66, 0.4), inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        /* Buttons */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f7c842 0%, #e8941a 100%);
            color: #22529a;
            box-shadow: 0 4px 15px rgba(247, 200, 66, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(247, 200, 66, 0.4);
            background: linear-gradient(135deg, #f4c842 0%, #e6921a 100%);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        /* Error Messages */
        .error-message {
            background: rgba(248, 113, 113, 0.1);
            border: 1px solid rgba(248, 113, 113, 0.3);
            color: #fca5a5;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .field-error {
            color: #fca5a5;
            font-size: 12px;
            margin-top: 5px;
        }

          /* CSS untuk Maskot */
        .mascot {
            position: fixed;
            bottom: 30px;  /* Jarak dari bawah */
            right: -500px;   /* Jarak dari kanan */
            width: 150px;  /* Ukuran gambar maskot lebih besar (misalnya 200px) */
            height: auto;  /* Menjaga proporsi gambar */
            z-index: 10;   /* Pastikan maskot berada di atas elemen lainnya */
            opacity: 0.9;  /* Atur transparansi maskot jika diperlukan */
            transition: transform 0.3s ease-in-out;
        }

        .mascot:hover {
            transform: scale(1.1);  /* Efek hover, memperbesar maskot */
        }

        /* Success Messages */
        .success-message {
            background: rgba(72, 187, 120, 0.1);
            border: 1px solid rgba(72, 187, 120, 0.3);
            color: #68d391;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Back to Login Link */
        .back-to-login {
            text-align: center;
            margin-top: 20px;
        }

        .back-to-login a {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .back-to-login a:hover {
            color: #f7c842;
        }

        /* Password Strength Indicator */
        .password-strength {
            margin-top: 5px;
            font-size: 12px;
            color: #e2e8f0;
        }

        .strength-weak {
            color: #fca5a5;
        }

        .strength-medium {
            color: #f6ad55;
        }

        .strength-strong {
            color: #68d391;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
            }

            .logo-image {
                height: 50px;
                max-width: 200px;
            }

            .logo-fallback {
                flex-direction: column;
                align-items: flex-start;
            }

            .logo-icon-fallback {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .register-form {
                padding: 30px 25px;
                margin: 20px 10px;
                max-width: 100%;
            }

            .form-title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .logo-image {
                height: 40px;
                max-width: 180px;
            }

            .register-form {
                padding: 25px 20px;
            }

            .form-input {
                padding: 12px 15px;
                font-size: 14px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 18px;
            }
        }

        /* Logo loading states */
        .logo-image {
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .logo-image[src=""] {
            display: none;
        }

        /* Hide fallback when logo loads successfully */
        .logo-loaded .logo-fallback {
            display: none;
        }

        /* Form validation states */
        .form-input.is-invalid {
            border: 2px solid #fca5a5;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-input.is-valid {
            border: 2px solid #68d391;
            background: rgba(255, 255, 255, 0.95);
        }

        /* Loading state for form submission */
        .btn-loading {
            position: relative;
            color: transparent;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid #22529a;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- University Header -->
    <div class="header">
        <div class="university-logo" id="logoContainer">
            <!-- Actual University Logo Image -->
            <img 
                src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" 
                alt="Faculty of Economics and Business Logo" 
                class="logo-image"
                onerror="this.style.display='none'; document.getElementById('logoContainer').classList.remove('logo-loaded');"
                onload="document.getElementById('logoContainer').classList.add('logo-loaded');"
            >
            
            <!-- Fallback content when logo image is not available -->
            <div class="logo-fallback">
                <div class="logo-icon-fallback">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <div class="university-name">UNIVERSITY</div>
                    <div class="faculty-name">Faculty of Economics and Business</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Registration Container -->
    <div class="register-container">
        <form method="POST" action="{{ route('register') }}" class="register-form" id="registerForm">
            @csrf
            
            <h2 class="form-title">Create New Account</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin-top: 5px; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success Messages -->
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Full Name Field -->
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-input @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" 
                    placeholder="Enter your full name"
                    required 
                    autocomplete="name" 
                    autofocus
                >
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Maskot Image -->
    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">

            <!-- Email Field -->
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" 
                    placeholder="Enter your email address"
                    required 
                    autocomplete="email"
                >
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input @error('password') is-invalid @enderror"
                    placeholder="Enter your password"
                    required 
                    autocomplete="new-password"
                    minlength="8"
                >
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
                <div class="password-strength" id="passwordStrength">
                    Password must be at least 8 characters long
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="form-input"
                    placeholder="Confirm your password"
                    required 
                    autocomplete="new-password"
                    minlength="8"
                >
                <div class="field-error" id="passwordMismatch" style="display: none;">
                    Passwords do not match
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="form-group">
                <label style="display: flex; align-items: flex-start; color: #e2e8f0; font-size: 14px; line-height: 1.4;">
                    <input 
                        type="checkbox" 
                        name="terms" 
                        id="terms" 
                        required
                        style="margin-right: 8px; margin-top: 2px; flex-shrink: 0;"
                    >
                    I agree to the <a href="#" style="color: #f7c842; text-decoration: underline;">Terms and Conditions</a> and <a href="#" style="color: #f7c842; text-decoration: underline;">Privacy Policy</a>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-user-plus" style="margin-right: 8px;"></i>
                    Create Account
                </button>
                
                <a href="{{ route('login') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                    Back to Login
                </a>
            </div>

            <!-- Already have account link -->
            <div class="back-to-login">
                <span style="color: #e2e8f0; font-size: 14px;">Already have an account? </span>
                <a href="{{ route('login') }}">Sign in here</a>
            </div>
        </form>
    </div>

    <script>
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.getElementById('passwordStrength');
            
            let strength = 'weak';
            let message = 'Password is weak';
            
            if (password.length >= 8) {
                let score = 0;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;
                
                if (score >= 3) {
                    strength = 'strong';
                    message = 'Password is strong';
                } else if (score >= 2) {
                    strength = 'medium';
                    message = 'Password is medium';
                }
            }
            
            strengthDiv.className = 'password-strength strength-' + strength;
            strengthDiv.textContent = message;
        });

        // Password confirmation checker
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const mismatchDiv = document.getElementById('passwordMismatch');
            
            if (confirmPassword && password !== confirmPassword) {
                mismatchDiv.style.display = 'block';
                this.classList.add('is-invalid');
            } else {
                mismatchDiv.style.display = 'none';
                this.classList.remove('is-invalid');
                if (confirmPassword && password === confirmPassword) {
                    this.classList.add('is-valid');
                }
            }
        });

        // Form submission loading state
        document.getElementById('registerForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>

