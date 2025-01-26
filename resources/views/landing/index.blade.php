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
      <span class="font-semibold text-gray-700 text-lg">TailwindUI</span>
    </div>
    <nav class="flex space-x-6">
      <a href="#" class="text-gray-600 hover:text-purple-600">Product</a>
      <a href="#" class="text-gray-600 hover:text-purple-600">Features</a>
      <a href="#" class="text-gray-600 hover:text-purple-600">Marketplace</a>
      <a href="#" class="text-gray-600 hover:text-purple-600">Company</a>
    </nav>
    <a href="login" class="text-gray-600 hover:text-purple-600">Log in</a>
  </header>

  <main class="container mx-auto text-center py-16 px-4">
    <h1 class="text-5xl font-extrabold text-gray-800 animate-fadeIn">Deploy to the cloud with confidence</h1>
    <p class="mt-6 text-lg text-gray-600 animate-fadeIn" style="animation-delay: 0.2s;">
      Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat.
    </p>
    <div class="mt-8 flex justify-center space-x-4 animate-fadeIn" style="animation-delay: 0.4s;">
      <a href="#" class="px-6 py-3 bg-purple-600 text-white rounded-lg font-semibold shadow-md hover:bg-purple-700">Get started</a>
      <a href="#" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold shadow-md hover:bg-gray-300">Learn more</a>
    </div>
  </main>

  <footer class="container mx-auto py-6 px-4">
    <div class="text-center text-gray-500">© 2025 TailwindUI. All rights reserved.</div>
  </footer>
</body>
</html>
