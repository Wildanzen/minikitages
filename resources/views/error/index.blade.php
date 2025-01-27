<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi fade-in untuk seluruh halaman */
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Animasi fade-in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Animasi gambar dengan efek zoom */
        .zoom-in {
            animation: zoomIn 1.5s ease-in-out;
        }

        /* Animasi zoom-in */
        @keyframes zoomIn {
            0% {
                transform: scale(0.8);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Animasi slide-in untuk teks */
        .slide-in {
            animation: slideIn 1s ease-out;
        }

        /* Animasi slide-in */
        @keyframes slideIn {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen fade-in">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg flex flex-col md:flex-row items-center">

        <div class="text-center md:text-left md:w-1/2 p-6 slide-in">
            <h1 class="text-6xl font-bold text-gray-800">404</h1>
            <h2 class="text-2xl font-semibold mt-4 text-gray-700">HALO</h2>
            <p class="text-gray-600 mt-2">
                DONNTOL
            </p>
            <a href="dashboard" class="mt-4 inline-block text-indigo-600 hover:underline font-medium">
                ← Balik Dasar
            </a>
        </div>

        <div class="md:w-1/2 mt-6 md:mt-0 zoom-in">
            <img src="https://pbs.twimg.com/media/Et88JXNUcAI_wTN.jpg:large" alt="Desert" class="rounded-lg shadow">
        </div>
    </div>
</body>

</html>
