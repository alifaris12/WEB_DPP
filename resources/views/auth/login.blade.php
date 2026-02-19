
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Economics and Business - Login</title>
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
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Login Form Box */
        .login-form {
            background: linear-gradient(145deg, #1a365d 0%, #22529a 50%, #2d5aa0 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .login-form::before {
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
            margin-bottom: 25px;
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
     /* CSS untuk Maskot */
        .mascot {
            position: fixed;
            bottom: 30px;  /* Jarak dari bawah */
            right: 30px;   /* Jarak dari kanan */
            width: 150px;  /* Ukuran gambar maskot lebih besar (misalnya 200px) */
            height: auto;  /* Menjaga proporsi gambar */
            z-index: 10;   /* Pastikan maskot berada di atas elemen lainnya */
            opacity: 0.9;  /* Atur transparansi maskot jika diperlukan */
            transition: transform 0.3s ease-in-out;
        }

        .mascot:hover {
            transform: scale(1.1);  /* Efek hover, memperbesar maskot */
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

        /* Forgot Password Link */
        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #f7c842;
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

            .login-form {
                padding: 30px 25px;
                margin: 20px 10px;
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

            .login-form {
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
 </style>
</head>
<body>
    <!-- University Header -->
    <div class="header">
        <div class="university-logo" id="logoContainer">
            <!-- Actual University Logo Image -->
            <img 
                src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" 
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

    <!-- Maskot Image -->
    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">

    <!-- Main Login Container -->
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            
            <h2 class="form-title">LOG IN</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

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
                    autofocus
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
                    autocomplete="current-password"
                >
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me Checkbox -->
            <div class="form-group">
                <label style="display: flex; align-items: center; color: #e2e8f0; font-size: 14px;">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                        style="margin-right: 8px;"
                    >
                    Remember me
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>
                    Log In
                </button>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        <i class="fas fa-user-plus" style="margin-right: 8px;"></i>
                        Register
                    </a>
                @endif
            </div>
        </form>
    </div>
</body>
</html>

