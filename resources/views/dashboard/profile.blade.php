
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Body and Font Styles */
        body {
            background-color: #f0f2f5;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        /* Main Container */
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Profile Header */
        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Main Content Area */
        .profile-content {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        /* Profile Picture Section */
        .profile-picture-container {
            flex: 1;
            min-width: 250px;
            padding-right: 20px;
            text-align: center;
        }

        .profile-picture-container h3 {
            font-size: 18px;
            color: #495057;
            margin-bottom: 15px;
        }
        
        .profile-picture-wrapper {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 15px auto;
            overflow: hidden;
            border: 4px solid #dee2e6;
            background-color: #f8f9fa;
        }

        #image-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Profile Details Section */
        .profile-details {
            flex: 2;
            min-width: 300px;
        }

        .profile-section {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .profile-section:last-child {
            margin-bottom: 0;
        }

        .profile-section h3 {
            font-size: 18px;
            color: #495057;
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
            width: 120px;
        }
        
        .form-group .input-wrapper {
            flex-grow: 1;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
        
        .form-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #6c757d;
            cursor: pointer;
        }

        /* Password Strength Indicator */
        #password-strength-text {
            font-size: 12px;
            margin-top: 5px;
            font-weight: bold;
            height: 15px; /* Reserve space to prevent layout shift */
        }
        
        .strength-weak { color: #dc3545; }
        .strength-medium { color: #ffc107; }
        .strength-strong { color: #28a745; }
        
        /* Button Styles */
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        
        .btn-primary:disabled {
            background-color: #007bff;
            border-color: #007bff;
            opacity: 0.65;
        }
        
        .file-upload-btn {
            width: 100%;
        }
        
        .update-btn-container {
            text-align: right;
        }

        /* Spinner for Loading State */
        .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            vertical-align: text-bottom;
            border: 0.2em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }

        @keyframes spinner-border {
            to { transform: rotate(360deg); }
        }
        
        /* Responsive Media Queries */
        @media (max-width: 768px) {
            .profile-content {
                flex-direction: column;
            }
            .profile-picture-container {
                padding-right: 0;
                margin-bottom: 20px;
            }
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }
            .form-group label {
                width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="profile-header">
            <h1>User Profile</h1>
        </div>
        <div class="profile-content">
            <!-- Profile Picture Section -->
            <div class="profile-picture-container">
                <h3>Profile Picture</h3>
                <div class="profile-picture-wrapper">
                    <img id="image-preview" src="https://placehold.co/150x150" alt="Profile image preview">
                </div>
                <form id="profile-picture-form">
                    <input type="file" id="image-upload" accept="image/*" class="form-control" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary file-upload-btn">
                        <span class="btn-text">Upload New Picture</span>
                        <span class="spinner-border" style="display: none;" role="status"></span>
                    </button>
                </form>
            </div>

            <!-- Profile Details Section -->
            <div class="profile-details">
                <!-- Account Information -->
                <div class="profile-section">
                    <h3>Account Information</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-wrapper">
                            <input type="text" id="username" class="form-control" value="johndoe" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                         <div class="input-wrapper">
                            <input type="email" id="email" class="form-control" value="john.doe@example.com" readonly>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <form id="personal-info-form" class="profile-section">
                    <h3>Personal Information</h3>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" id="name" class="form-control" value="John Doe" required>
                        </div>
                    </div>
                    <div class="update-btn-container">
                        <button type="submit" class="btn btn-primary">
                             <span class="btn-text">Update Profile</span>
                             <span class="spinner-border" style="display: none;" role="status"></span>
                        </button>
                    </div>
                </form>

                <!-- Password Change -->
                <form id="password-change-form" class="profile-section">
                    <h3>Change Password</h3>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="new_password" class="form-control" required>
                            <i id="toggle-new-password" class="fas fa-eye form-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div id="password-strength-text"></div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm Password</label>
                         <div class="input-wrapper">
                            <input type="password" id="new_password_confirmation" class="form-control" required>
                            <i id="toggle-confirm-password" class="fas fa-eye form-icon" aria-hidden="true"></i>
                        </div>
                    </div>
                     <div class="update-btn-container">
                        <button type="submit" class="btn btn-primary">
                             <span class="btn-text">Change Password</span>
                             <span class="spinner-border" style="display: none;" role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                
                // --- Element Selectors ---
                const imageUpload = document.getElementById('image-upload');
                const imagePreview = document.getElementById('image-preview');
                const newPasswordInput = document.getElementById('new_password');
                const confirmPasswordInput = document.getElementById('new_password_confirmation');
                const passwordStrengthText = document.getElementById('password-strength-text');
                const toggleNewPassword = document.getElementById('toggle-new-password');
                const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
                const personalInfoForm = document.getElementById('personal-info-form');
                const passwordChangeForm = document.getElementById('password-change-form');

                // --- Event Listeners ---
                if (imageUpload) {
                    imageUpload.addEventListener('change', handleImagePreview);
                }
                if (newPasswordInput) {
                    newPasswordInput.addEventListener('input', handlePasswordStrengthCheck);
                }
                if (confirmPasswordInput) {
                    confirmPasswordInput.addEventListener('input', handlePasswordMatchCheck);
                }
                if (toggleNewPassword) {
                    toggleNewPassword.addEventListener('click', () => togglePasswordVisibility(newPasswordInput, toggleNewPassword));
                }
                if (toggleConfirmPassword) {
                    toggleConfirmPassword.addEventListener('click', () => togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword));
                }
                if (personalInfoForm) {
                    personalInfoForm.addEventListener('submit', (e) => handleFormSubmit(e, 'Updating profile...'));
                }
                if (passwordChangeForm) {
                     passwordChangeForm.addEventListener('submit', (e) => handleFormSubmit(e, 'Changing password...'));
                }

                // --- Functions ---
                
                /**
                 * Displays a preview of the selected image file.
                 */
                function handleImagePreview() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                }

                /**
                 * Toggles the visibility of a password field.
                 * @param {HTMLInputElement} input - The password input element.
                 * @param {HTMLElement} icon - The icon element for toggling.
                 */
                function togglePasswordVisibility(input, icon) {
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                }

                /**
                 * Checks the strength of the entered password and updates the UI.
                 */
                function handlePasswordStrengthCheck() {
                    const password = this.value;
                    let strength = 0;
                    if (password.length >= 8) strength++;
                    if (password.match(/[a-z]/)) strength++;
                    if (password.match(/[A-Z]/)) strength++;
                    if (password.match(/[0-9]/)) strength++;
                    if (password.match(/[^a-zA-Z0-9]/)) strength++;

                    let text = '';
                    let className = '';
                    switch (strength) {
                        case 0:
                        case 1:
                        case 2:
                            text = 'Weak';
                            className = 'strength-weak';
                            break;
                        case 3:
                        case 4:
                            text = 'Medium';
                            className = 'strength-medium';
                            break;
                        case 5:
                            text = 'Strong';
                            className = 'strength-strong';
                            break;
                    }
                    passwordStrengthText.textContent = password.length > 0 ? text : '';
                    passwordStrengthText.className = className;
                }

                /**
                 * Checks if the password and confirmation password fields match.
                 */
                function handlePasswordMatchCheck() {
                    if (newPasswordInput.value !== confirmPasswordInput.value) {
                        confirmPasswordInput.setCustomValidity("Passwords do not match.");
                    } else {
                        confirmPasswordInput.setCustomValidity("");
                    }
                }
                
                /**
                 * Handles form submission, showing a loading state on the button.
                 * @param {Event} event - The form submission event.
                 * @param {string} loadingMessage - A message to log while "processing".
                 */
                function handleFormSubmit(event, loadingMessage) {
                    event.preventDefault(); // Prevent actual form submission for this demo
                    const form = event.target;
                    
                    // Basic check for form validity
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }
                    
                    const button = form.querySelector('button[type="submit"]');
                    const buttonText = button.querySelector('.btn-text');
                    const spinner = button.querySelector('.spinner-border');
                    
                    // Simulate API call
                    console.log(loadingMessage);
                    button.disabled = true;
                    buttonText.style.display = 'none';
                    spinner.style.display = 'inline-block';

                    setTimeout(() => {
                        console.log('Update complete!');
                        button.disabled = false;
                        buttonText.style.display = 'inline-block';
                        spinner.style.display = 'none';
                        alert('Information updated successfully! (Simulation)');
                    }, 2000);
                }
            });
        })();
    </script>
</body>
</html>

