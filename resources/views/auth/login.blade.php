<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .online {
            color: #51c7ee;
        }

        .text-online {
            color: #0505ac;
        }

        .class {
            color: #00eeff;
        }

        .text-class {
            color: #08dce3;
        }

        .form-container {
            transition: transform 0.3s ease;
        }

        .form-container.clicked {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 h-screen flex items-center justify-center">
    <div id="form-container" class="form-container max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-200">
            <span class="text-online">Online</span> <span class="text-class">Class</span>
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">Please log in to your account</p>

        <!-- Alert -->
        <div id="alert-container" class="hidden p-4 mb-4 text-sm rounded-lg" role="alert"></div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-6" id="login-form">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                <button type="button" onclick="togglePassword()"
                    class="absolute right-3 top-9 text-gray-500 dark:text-gray-400">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Forgot Password Link -->
            <div class="flex items-center justify-between mt-4">
                <div class="ml-auto">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 dark:text-blue-400 hover:underline">Lupa kata sandi</a>
                    @endif
                </div>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Masuk
            </button>
        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Belum punya akun? <a href="{{ route('register') }}" class="online hover:underline">Daftar</a>
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('login-form');
            const alertContainer = document.getElementById('alert-container');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                alertContainer.classList.add('hidden'); // Reset alert visibility
                alertContainer.textContent = ''; // Clear alert message

                // Email validation
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email) {
                    showAlert('Email tidak boleh kosong.', 'red');
                    return;
                } else if (!emailPattern.test(email)) {
                    showAlert('Format email tidak valid.', 'red');
                    return;
                }

                // Password validation
                if (!password) {
                    showAlert('Password tidak boleh kosong.', 'red');
                    return;
                } else if (password.length < 8) {
                    showAlert('Kata sandi harus minimal 8 karakter.', 'red');
                    return;
                }

                alertContainer.classList.add('hidden');
                form.submit(); // Submit the form
            });

            function showAlert(message, color) {
                alertContainer.textContent = message;
                alertContainer.classList.remove('hidden');
                alertContainer.className = `p-4 mb-4 text-sm rounded-lg bg-${color}-50 text-${color}-800 border border-${color}-400`;
            }
        });

        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }

        // Zoom effect on form click
        const formContainer = document.getElementById('form-container');
        formContainer.addEventListener('click', function () {
            formContainer.classList.add('clicked');
            setTimeout(() => {
                formContainer.classList.remove('clicked');
            }, 300);
        });
    </script>
</body>

</html>
