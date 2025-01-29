<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=PoPpins:wght@400;600&display=swap');

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
    </style>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    
</head>

<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div id="form-container" class="max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-200">
            <span class="text-online">Online</span> <span class="text-class">Class</span>
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">Please register to create your account</p>

        <!-- Alert -->
        <div id="alert-container" class="hidden p-4 mb-4 text-sm rounded-lg" role="alert"></div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="mt-6" id="login-form">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                <input id="name" type="text" name="name" autofocus autocomplete="name"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <!-- Password -->
            <div>
                <label for="password"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <!-- Register Button -->
            <button type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Daftar
            </button>
        </form>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registerForm');
            const alertContainer = document.getElementById('alert-container');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const passwordConfirmation = document.getElementById('password_confirmation').value;

                alertContainer.classList.add('hidden'); // Reset alert visibility
                alertContainer.textContent = ''; // Clear alert message

                // Name validation
                if (!name) {
                    showAlert('Nama tidak boleh kosong.', 'red');
                    return;
                }

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
                if (password.length < 8) {
                    showAlert('Kata sandi harus minimal 8 karakter.', 'red');
                    return;
                }

                if (password !== passwordConfirmation) {
                    showAlert('Konfirmasi kata sandi tidak cocok.', 'red');
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
    </script>

    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function(e) {
        const passwordField = document.getElementById('password');
        const eyeClosed = document.getElementById('eyeClosed');
        const eyeOpen = document.getElementById('eyeOpen');
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        eyeClosed.classList.toggle('hidden');
        eyeOpen.classList.toggle('hidden');
    });

    // Toggle confirm password visibility
    document.getElementById('toggleConfirmPassword').addEventListener('click', function(e) {
        const confirmPasswordField = document.getElementById('password_confirmation');
        const eyeClosedConfirm = document.getElementById('eyeClosedConfirm');
        const eyeOpenConfirm = document.getElementById('eyeOpenConfirm');
        const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
        confirmPasswordField.type = type;
        eyeClosedConfirm.classList.toggle('hidden');
        eyeOpenConfirm.classList.toggle('hidden');
    });

    // Add zoom effect on form container click
    const formContainer = document.getElementById('form-container');
    formContainer.addEventListener('click', function() {
        formContainer.classList.add('clicked');
        setTimeout(() => {
            formContainer.classList.remove('clicked');
        }, 3000); // Remove zoom effect after 3 seconds
    });
</script>

</body>

</html>
