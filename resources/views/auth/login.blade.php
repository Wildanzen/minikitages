<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 h-screen flex items-center justify-center">
    <div id="form-container" class="form-container max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-200">
            <span class="text-online">Online</span> <span class="text-class">Class</span>
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">Please log in to your account</p>

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
                <label for="password"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
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
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Forgot Password Link -->
            <div class="flex items-center justify-between mt-4">
                <div class="ml-auto">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-blue-500 dark:text-blue-400 hover:underline">Lupa kata sandi</a>
                    @endif
                </div>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div class="mt-6 flex items-center justify-center">
            <span class="block w-1/5 h-px bg-gray-300 dark:bg-gray-600"></span>
            <span class="text-sm text-gray-600 dark:text-gray-400 mx-2">atau</span>
            <span class="block w-1/5 h-px bg-gray-300 dark:bg-gray-600"></span>
        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Belum punya akun? <a href="{{ route('register') }}" class="online hover:underline">Daftar</a>
        </p>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.542-7a10.05 10.05 0 012.967-4.763m12.045 0A10.05 10.05 0 0119.542 12c-1.273 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7-1.076 0-2.137-.156-3.166-.456m10.833-11.57A9.97 9.97 0 0112 5c-4.477 0-8.268 2.943-9.542 7a9.97 9.97 0 002.968 4.763m12.045 0L3.343 3.343" />';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }

        // Zoom effect on form click
        const formContainer = document.getElementById('form-container');
        formContainer.addEventListener('click', function () {
            formContainer.classList.add('clicked');
            setTimeout(() => {
                formContainer.classList.remove('clicked');
            }, 1000); // Remove zoom effect after 0.3 seconds
        });

        // Cek jika login gagal atau berhasil
        @if(session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil',
                text: 'Selamat datang di kelas online!',
                confirmButtonText: 'Ok'
            });
        @elseif($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Periksa email dan password Anda!',
                confirmButtonText: 'Coba Lagi'
            });
        @endif
    </script>
</body>

</html>
