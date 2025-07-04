@extends('layouts.app')
@section('title', 'CodeX Manager')

@section('content')

    <div class="flex flex-col lg:flex-row gap-6">

        {{-- Left Section --}}
        <div class="w-full lg:flex-1 space-y-6">

            {{-- Greeting Card --}}
            <div class="bg-white p-6 rounded-xl shadow flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-center sm:text-left">
                    <h2 class="text-2xl font-semibold text-gray-800">Hi, George!</h2>
                    <p class="text-gray-500 mt-1">What are we doing today?</p>
                    <div class="mt-4 flex flex-wrap justify-center sm:justify-start gap-4 text-sm">
                        <a href="#" class="text-blue-600 font-medium hover:underline">
                            <i class="fas fa-calendar-alt mr-1"></i>Check Calendar
                        </a>
                        <a href="{{ route('wallet.index') }}" class="text-gray-800 hover:underline">
                            <i class="fas fa-wallet mr-1"></i>Manage Wallet
                        </a>
                        <a href="#" class="text-red-500 font-medium hover:underline">
                            <i class="fas fa-users-cog mr-1"></i>Manage Workers
                        </a>
                        <a href="#" class="text-gray-800 hover:underline">
                            <i class="fas fa-folder-open mr-1"></i>Manage Projects
                        </a>
                    </div>
                </div>
                <div class="flex justify-center sm:justify-end">
                    <img src="/images/bear.png" alt="Mascot" class="w-24 h-24 sm:w-32 sm:h-32">
                </div>
            </div>

            {{-- Statistics Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                <!-- Repeat Cards -->

                {{-- \/\/\/ PEMASUKAN CARD \/\/\/ --}}
                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-green-100 w-12 h-12 rounded-full border border-green-500">
                        <i class="fas fa-chart-line text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Pemasukan</p>
                        <p class="text-sm font-bold text-gray-800">
                            <strong>RP.{{ number_format($totalPemasukan, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                </div>

                {{-- \/\/\/ PENGELUARAN CARD \/\/\/ --}}

                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-red-100 w-12 h-12 rounded-full border border-red-500">
                        <i class="fas fa-user-friends text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Pengeluaran</p>
                        <p class="text-sm font-bold text-gray-800">
                            <strong>RP.{{ number_format($totalPengeluaran, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                </div>

                {{-- \/\/\/ TOTAL UANG CARD \/\/\/ --}}

                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-yellow-100 w-12 h-12 rounded-full border border-yellow-500">
                        <i class="fas fa-clock text-yellow-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Uang</p>
                        <p class="text-sm font-bold text-gray-800">
                            <strong>RP.{{ number_format($totalUang, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                </div>

                {{-- \/\/\/ RATA RATA PEMASUKAN CARD \/\/\/ --}}


                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-green-100 w-12 h-12 rounded-full border border-green-500">
                        <i class="fas fa-dollar-sign text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Rata Rata Pemasukan</p>
                        <p class="text-sm font-bold text-gray-800">
                            <strong>RP.{{ number_format($rataRataPemasukan, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Sidebar --}}
        <div class="w-full lg:w-1/3 xl:w-1/4 space-y-4">
            {{-- \/\/\/ NOTIFICATION \/\/\/ --}}

            <div class="bg-white p-5 rounded-xl shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
                    <a href="#" class="text-sm text-blue-500 hover:underline">See all</a>
                </div>

                <div class="space-y-4 text-sm">
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-yellow-100 w-10 h-10 flex-none flex items-center justify-center rounded-full text-yellow-500 text-lg">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="text-gray-700">
                            You’ve added new project recently, with no deadline. </p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-red-100 w-10 h-10 flex-none flex items-center justify-center rounded-full text-red-500 text-lg">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <p class="text-gray-700">Project owner Adam requested a refund.</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-blue-100 w-10 h-10 flex-none flex items-center justify-center rounded-full text-blue-500 text-lg">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <p class="text-gray-700">Today is Toto's anniversary! 🎂</p>
                    </div>
                </div>
            </div>


            {{-- \/\/\/ SUMBER UANG \/\/\/ --}}
            <div class="bg-white p-5 rounded-xl shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">SUMBER UANG</h3>
                    <a href="#" class="text-sm text-blue-500 hover:underline">See all</a>
                </div>

                <div class="space-y-4 text-sm">

                    @php
                        $walletTypes = [
                            'dana' => 'dana-e-wallet-logo.png',
                            'gopay' => 'gopay-e-wallet.png',
                            'ovo' => 'ovo-e-wallet.png',
                            'paypal' => 'paypal-e-wallet.png',
                            'spay' => 's-pay-e-wallet.png',
                            'seabank' => 'sea-bank-e-wallet.png',
                        ];
                    @endphp

                    @foreach ($walletTypes as $key => $img)
                        <div class="flex items-start space-x-3">
                            <div
                                class="bg-white-100 w-10 h-10 flex-none flex items-center justify-center rounded-full text-blue-500 text-lg">
                                <img src="/images/{{ $img }}" alt="{{ $key }}">
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-700">
                                    RP.{{ number_format($walletBalances[$key] ?? 0, 0, ',', '.') }}
                                </p>
                                <p class="text-gray-700">
                                    In total from {{ ucfirst($key) }}.
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>



        </div>
    </div>

@endsection
