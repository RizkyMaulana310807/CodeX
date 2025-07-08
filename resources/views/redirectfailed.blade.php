<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-red-100 via-white to-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-md w-full text-center animate-fade-in">
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="bg-red-100 w-12 h-12 rounded-full flex justify-center items-center border-2 border-red-500 fa-bounce">
                <i class="fa-solid fa-exclamation fa-bounce fa-2xl text-red-500 "></i>
            </div>
        </div>

        <!-- Text -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Gagal Mengalihkan</h1>
        <p class="text-gray-600 mb-4">Kode yang Anda gunakan salah atau sudah tidak berlaku.</p>

        <!-- Action -->
        <a href="/"
            class="inline-block mt-4 bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition duration-200">
            Kembali ke Beranda
        </a>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-out both;
        }
    </style>
</body>

</html>
