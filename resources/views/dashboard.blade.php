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
                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-red-100 w-12 h-12 rounded-full border border-red-500">
                        <i class="fas fa-chart-line text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Potential Monthly Profit</p>
                        <p class="text-xl font-bold text-gray-800">$24,042,000</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-blue-100 w-12 h-12 rounded-full border border-blue-500">
                        <i class="fas fa-user-friends text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Workers Wage This Month</p>
                        <p class="text-xl font-bold text-gray-800">$8,402,000</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-yellow-100 w-12 h-12 rounded-full border border-yellow-500">
                        <i class="fas fa-clock text-yellow-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Average Project Length</p>
                        <p class="text-xl font-bold text-gray-800">2 weeks</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow flex items-center space-x-4">
                    <div
                        class="flex-none flex items-center justify-center bg-green-100 w-12 h-12 rounded-full border border-green-500">
                        <i class="fas fa-dollar-sign text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Average Income per Project</p>
                        <p class="text-xl font-bold text-gray-800">$12,000</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Sidebar: Notifications --}}
        <div class="w-full lg:w-1/3 xl:w-1/4 space-y-4">
            <div class="bg-white p-5 rounded-xl shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
                    <a href="#" class="text-sm text-blue-500 hover:underline">See all</a>
                </div>

                <div class="space-y-4 text-sm">
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-yellow-100 w-10 h-10 flex items-center justify-center rounded-full text-yellow-500 text-lg">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="text-gray-700">You’ve added new project recently, with no deadline.</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-red-100 w-10 h-10 flex items-center justify-center rounded-full text-red-500 text-lg">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <p class="text-gray-700">Project owner Adam requested a refund.</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div
                            class="bg-blue-100 w-10 h-10 flex items-center justify-center rounded-full text-blue-500 text-lg">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <p class="text-gray-700">Today is Toto's anniversary! 🎂</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
