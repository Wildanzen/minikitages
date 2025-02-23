<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div id="form-container" class="max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-200">
            <span class="text-online">Online</span> <span class="text-class">Class</span>
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">Please register to create your account</p>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                <input id="name" type="text" name="name" autofocus autocomplete="name"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                @error('name')
                    <div class="mt-1 text-sm text-red-500 bg-red-100 border border-red-500 rounded-lg px-3 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                @error('email')
                    <div class="mt-1 text-sm text-red-500 bg-red-100 border border-red-500 rounded-lg px-3 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password"autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                <button type="button" id="togglePassword"
                    class="absolute right-3 top-8 text-gray-500 dark:text-gray-400">
                    <!-- Eye Closed Icon -->
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405C18.287 14.63 18 13.329 18 12s.287-2.63.595-3.595L20 7h-5m-6 0H4l1.405 1.405C5.713 9.37 6 10.671 6 12s-.287 2.63-.595 3.595L4 17h5m-2 0h4m1.5-1.5L12 12" />
                    </svg>
                    <!-- Eye Open Icon -->
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3c4.41 0 8 3.59 8 8s-3.59 8-8 8-8-3.59-8-8 3.59-8 8-8zM12 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z" />
                    </svg>
                </button>
                @error('password')
                    <div class="mt-1 text-sm text-red-500 bg-red-100 border border-red-500 rounded-lg px-3 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                <button type="button" id="toggleConfirmPassword"
                    class="absolute right-3 top-8 text-gray-500 dark:text-gray-400">
                    <!-- Eye Closed Icon -->
                    <svg id="eyeClosedConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405C18.287 14.63 18 13.329 18 12s.287-2.63.595-3.595L20 7h-5m-6 0H4l1.405 1.405C5.713 9.37 6 10.671 6 12s-.287 2.63-.595 3.595L4 17h5m-2 0h4m1.5-1.5L12 12" />
                    </svg>
                    <!-- Eye Open Icon -->
                    <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3c4.41 0 8 3.59 8 8s-3.59 8-8 8-8-3.59-8-8 3.59-8 8-8zM12 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z" />
                    </svg>
                </button>
                @error('password_confirmation')
                    <div class="mt-1 text-sm text-red-500 bg-red-100 border border-red-500 rounded-lg px-3 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Register Button -->
            <button type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Daftar
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
            sudah punya akun? <a href="{{ route('login') }}" class="online hover:underline">Log in</a>
        </p>
    </div>

    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("password_confirmation").value.trim();

            if (!name || !email || !password || !confirmPassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Harap isi semua kolom!",
                });
                return;
            }

            if (password.length < 8) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Password minimal 8 karakter!",
                });
                return;
            }

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Password dan konfirmasi password tidak cocok!",
                });
                return;
            }

            event.target.submit();
        });
    </script>


</body>

</html>
