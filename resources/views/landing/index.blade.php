<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeIn {
      animation: fadeIn 1s ease-in-out;
    }
  </style>
</head>
<body class="bg-gradient-to-r from-purple-100 via-white to-purple-100">
    <header class="container mx-auto flex justify-between items-center py-6 px-4">
        <div class="flex items-center space-x-2">
            <span class="text-purple-500 text-2xl font-bold">🌊</span>
            <span class="font-semibold text-gray-700 text-lg">My Learning</span>
        </div>

        <a href="error" class="text-gray-600 hover:text-purple-600">About Us</a>
    </header>

    <main class="container mx-auto text-center py-16 px-4">
        <h1 class="text-5xl font-extrabold text-gray-800 animate-fadeIn">Selamat Datang</h1>
        <p class="mt-6 text-lg text-gray-600 animate-fadeIn" style="animation-delay: 0.2s;">
            Login jika sudah punya akun atau Daftar jika belum
        </p>
        <div class="mt-8 flex justify-center space-x-4 animate-fadeIn" style="animation-delay: 0.4s;">
            <a href="login"
                class="px-6 py-3 bg-purple-600 text-white rounded-lg font-semibold shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105">Login</a>
            <a href="register"
                class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold shadow-md hover:bg-gray-300 transition-transform transform hover:scale-105">Daftar</a>
        </div>

        <!-- Paket Kursus Section -->
        <h2 class="text-3xl font-bold text-gray-800 mt-12">Pilih Paket Kursus</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white p-6 rounded-lg shadow-md transform transition-transform hover:scale-105 hover:shadow-lg cursor-pointer animate-fadeIn">
                <div class="bg-purple-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 3a3 3 0 110 6 3 3 0 010-6zm0 14c-2.67 0-5-1.33-5-4v-1h10v1c0 2.67-2.33 4-5 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mt-4">Paket Dasar</h3>
                <p class="text-gray-600 mt-2">Cocok untuk pemula yang ingin belajar dari nol.</p>
                <p class="text-2xl font-bold text-gray-900 mt-4">Rp 150.000</p>
                <a href="#"
                    class="mt-4 inline-block bg-purple-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-purple-700 transition-transform transform hover:scale-105">Daftar</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md transform transition-transform hover:scale-105 hover:shadow-lg cursor-pointer animate-fadeIn"
                style="animation-delay: 0.2s;">
                <div class="bg-blue-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-3 10h6v2h-6v-2zm0-4h6v2h-6V8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mt-4">Paket Menengah</h3>
                <p class="text-gray-600 mt-2">Untuk yang sudah punya dasar dan ingin lebih mendalam.</p>
                <p class="text-2xl font-bold text-gray-900 mt-4">Rp 300.000</p>
                <a href="#"
                    class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-transform transform hover:scale-105">Daftar</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md transform transition-transform hover:scale-105 hover:shadow-lg cursor-pointer animate-fadeIn"
                style="animation-delay: 0.4s;">
                <div class="bg-red-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 15a5 5 0 01-5-5h2a3 3 0 006 0h2a5 5 0 01-5 5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mt-4">Paket Profesional</h3>
                <p class="text-gray-600 mt-2">Untuk yang ingin menguasai keahlian secara profesional.</p>
                <p class="text-2xl font-bold text-gray-900 mt-4">Rp 500.000</p>
                <a href="#"
                    class="mt-4 inline-block bg-red-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-700 transition-transform transform hover:scale-105">Daftar</a>
            </div>
        </div>
    </main>

    <footer class="container mx-auto py-6 px-4 text-center text-gray-500">
        &copy; 2025 My Learning. All Rights Reserved.
    </footer>
</body>


</html>
