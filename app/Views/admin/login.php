<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Fulki Hasya</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #1e40af;
            --primary-hover: #1e3a8a;
            --bg-color: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --white: #ffffff;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px);
            background-size: 20px 20px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .brand-logo {
            margin-bottom: 2rem;
            text-align: center;
        }

        .brand-logo h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .brand-logo p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .card-login {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 1.25rem;
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: var(--text-muted);
            padding-left: 1.25rem;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1.25rem;
            font-size: 0.95rem;
            border-color: var(--border-color);
            transition: all 0.2s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.1);
            border-color: var(--primary-color);
        }

        .input-group .form-control {
            border-left: none;
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            border-radius: 0.75rem;
            padding: 0.875rem;
            font-weight: 700;
            font-size: 1rem;
            color: var(--white);
            transition: all 0.2s ease;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .validation-message {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            height: 1rem;
            transition: all 0.2s;
        }

        .is-invalid {
            border-color: #ef4444 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
        }

        .invalid-feedback-custom {
            color: #ef4444;
        }

        .is-valid {
            border-color: #22c55e !important;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body>

    <div class="login-container animate-fade-in">
        <div class="brand-logo">
            <h1>FULKI HASYA</h1>
            <p>Admin Management Panel</p>
        </div>

        <div class="card-login">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3 border-0 small"
                    role="alert" style="background-color:#fee2e2; color:#b91c1c;">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/login/process') ?>" method="POST" id="loginForm">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="admin@fulkihasya.com" required>
                    </div>
                    <div id="emailFeedback" class="validation-message"></div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••"
                            required>
                        <span class="input-group-text password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div id="passwordFeedback" class="validation-message"></div>
                </div>

                <button type="submit" class="btn btn-login w-100" id="submitBtn">
                    Sign In
                </button>
            </form>
        </div>

        <p class="text-center mt-4 small text-muted">
            &copy; <?= date('Y') ?> PT Fulki Hasya. All rights reserved.
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const loginForm = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');

            // Toggle Password Visibility
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // Real-time Validation Logic
            function validateEmail(email) {
                return String(email)
                    .toLowerCase()
                    .match(
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    );
            }

            function updateUI(input, feedback, isValid, message) {
                if (input.value.length === 0) {
                    input.classList.remove('is-invalid', 'is-valid');
                    feedback.textContent = '';
                    return;
                }

                if (isValid) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    feedback.textContent = '';
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                    feedback.textContent = message;
                    feedback.classList.add('invalid-feedback-custom');
                }
            }

            emailInput.addEventListener('input', function () {
                const isValid = validateEmail(this.value);
                updateUI(this, document.getElementById('emailFeedback'), isValid, 'Format email tidak valid');
            });

            passwordInput.addEventListener('input', function () {
                const isValid = this.value.length >= 6;
                updateUI(this, document.getElementById('passwordFeedback'), isValid, 'Password minimal 6 karakter');
            });

            // Prevent submission if invalid
            loginForm.addEventListener('submit', function (e) {
                const isEmailValid = validateEmail(emailInput.value);
                const isPasswordValid = passwordInput.value.length >= 6;

                if (!isEmailValid || !isPasswordValid) {
                    e.preventDefault();
                    // Re-trigger visual feedback
                    emailInput.dispatchEvent(new Event('input'));
                    passwordInput.dispatchEvent(new Event('input'));
                } else {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                    submitBtn.disabled = true;
                }
            });
        });
    </script>

</body>

</html>