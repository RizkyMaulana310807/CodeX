<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="w-full h-screen flex">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main content --}}
        <div class="flex-1 flex flex-col bg-gray-50 overflow-auto">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Page Content --}}
            <div class="p-6 flex-1 overflow-auto">
                @yield('content')
            </div>

        </div>

    </main>
    <script>
        function clock() {
            return {
                time: '',
                startClock() {
                    this.updateTime();
                    setInterval(() => {
                        this.updateTime();
                    }, 1000);
                },
                updateTime() {
                    const now = new Date();
                    this.time = now.toLocaleTimeString('en-GB'); // format: 23:59:59
                }
            }
        }
    </script>

</body>

</html>
