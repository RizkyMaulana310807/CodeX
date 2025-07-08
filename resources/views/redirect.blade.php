<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-100 via-white to-purple-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-md w-full text-center animate-fade-in">
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="bg-blue-100 h-12 w-12 flex justify-center items-center rounded-full">
                <svg class="w-10 h-10 text-blue-500 animate-spin-slow" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4v1m0 14v1m8-9h-1M5 12H4m15.36 6.36l-.71-.71M6.34 6.34l-.71-.71m12.02 0l-.71.71M6.34 17.66l-.71.71" />
                </svg>
            </div>
        </div>

        <!-- Text -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Mengalihkan Anda...</h1>
        <p class="text-gray-600 mb-4">Sebentar ya, kami sedang memproses permintaan Anda.</p>

        <!-- Progress bar -->
        <div class="relative w-full h-2 bg-gray-200 rounded-full overflow-hidden">
            <div class="absolute top-0 left-0 h-full w-1/3 bg-blue-500 rounded-full animate-ping-pong"></div>
        </div>

        <!-- Manual link -->
        <p class="text-sm text-gray-400 mt-6">Tidak terjadi apa-apa? <a href="#"
                class="text-blue-600 hover:underline">Klik di sini</a>.</p>
    </div>

    <style>
        @keyframes ping-pong {
            0% {
                left: 0;
            }

            50% {
                left: calc(100% - 33.33%);
            }

            100% {
                left: 0;
            }
        }

        .animate-ping-pong {
            animation: ping-pong 2s ease-in-out infinite;
        }

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
            animation: fade-in 0.6s ease-out both;
        }

        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }
    </style>
</body>

</html>
