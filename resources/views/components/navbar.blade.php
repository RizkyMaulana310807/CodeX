<div class="w-full bg-white h-16 shadow-sm flex items-center justify-between px-6 border-b">

    {{-- Left: Date --}}
    <div x-data="clock()" x-init="startClock()" class="flex text-gray-600 text-sm gap-6 text-center items-center">
        <span class="font-medium">
            {{ \Carbon\Carbon::now()->format('j F, Y') }}
        </span>
        <span x-text="time" class="font-mono bg-gray-100 rounded-md p-2"></span>
    </div>
    
    {{-- Right: Actions --}}
    <div class="flex items-center space-x-4">

        {{-- Search Box --}}
        <div class="relative">
            <input type="text" placeholder="Search..." 
                   class="pl-10 pr-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm"></i>
        </div>

        {{-- Notification Bell --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="relative">
                <i class="fas fa-bell text-gray-600 text-lg"></i>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-500"></span>
            </button>
            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-md p-4 text-sm z-50">
                <p class="font-semibold text-gray-800 mb-2">Notifications</p>
                <ul class="space-y-2">
                    <li class="text-gray-600">✅ You've added a new project.</li>
                    <li class="text-gray-600">❗ Project owner Adam requested a refund.</li>
                    <li class="text-gray-600">🎉 Today is Tata's anniversary!</li>
                </ul>
            </div>
        </div>

        {{-- User Profile --}}
        <div class="flex items-center space-x-2">
            <img src="https://i.pravatar.cc/32" alt="User" class="w-8 h-8 rounded-full">
            <div class="hidden md:block">
                <p class="text-gray-800 text-sm font-semibold">Sophie</p>
                <p class="text-gray-500 text-xs">Executive Manager</p>
            </div>
        </div>
    </div>
</div>


