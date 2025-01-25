<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=PoPpins:wght@400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .online {
            color: #51c7ee; /* Light blue */
        }
        .text-online {
            color: #0505ac; /* Light blue for "Online" text */
        }
        .class {
            color: #00eeff; /* Light blue */
        }
        .text-class {
            color: #08dce3; /* Light blue for "Online" text */
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-screen flex items-center justify-center">
    <div class="max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-200">
            <span class="text-online">Online</span> <span class="text-class">Class</span>
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-400">Please log in to your account</p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none">
                @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500 outline-none pr-10">
                </button>

            </div>
 @error('password')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 dark:text-blue-400 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring focus:ring-blue-500">
                <label for="remember_me" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">Remember me</label>
            </div>

            <!-- Forgot Password Link -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 dark:text-blue-400 hover:underline">Forgot password?</a>
                @endif
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Log in
            </button>
        </form>

        <!-- Divider -->
        <div class="mt-6 flex items-center justify-center">
            <span class="block w-1/5 h-px bg-gray-300 dark:bg-gray-600"></span>
            <span class="text-sm text-gray-600 dark:text-gray-400 mx-2">OR</span>
            <span class="block w-1/5 h-px bg-gray-300 dark:bg-gray-600"></span>
        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Don't have an account? <a href="{{ route('register') }}" class="online hover:underline">Sign up</a>
        </p>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the icon
            this.classList.toggle('text-blue-600');
        });
    </script>
</body>
</html>
