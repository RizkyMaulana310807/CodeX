<div class="w-full bg-white shadow-sm flex flex-wrap md:flex-nowrap items-center justify-between px-3 py-2 md:px-4 md:py-0 md:h-14 border-b gap-2 text-sm">

    {{-- Left: Date & Time --}}
    <div x-data="clock()" x-init="startClock()" class="flex items-center gap-2 text-gray-600 w-full md:w-auto justify-between md:justify-start">
        <span class="font-medium text-xs">
            {{ \Carbon\Carbon::now()->format('j F, Y') }}
        </span>
        <span x-text="time" class="font-mono bg-gray-100 rounded px-2 py-1 text-xs"></span>
    </div>
    
    {{-- Right: Actions --}}
    <div class="flex items-center justify-end space-x-2 w-full md:w-auto">

        {{-- Search Box --}}
        <div class="relative w-full sm:w-auto max-w-[180px]">
            <input type="text" placeholder="Search..." 
                   class="w-full pl-8 pr-2 py-1 rounded bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-400 text-xs">
            <i class="fas fa-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500 text-xs"></i>
        </div>

        {{-- Notification Bell --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="relative h-6 w-6 flex items-center justify-center">
                <i class="fas fa-bell text-gray-600 text-base"></i>
                <span class="absolute top-0 right-0 block h-1.5 w-1.5 rounded-full ring-1 ring-white bg-red-500"></span>
            </button>
            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-md p-3 text-xs z-50">
                <p class="font-semibold text-gray-800 mb-1">Notifications</p>
                <ul class="space-y-1">
                    <li class="text-gray-600">✅ New project added.</li>
                    <li class="text-gray-600">❗ Refund requested.</li>
                    <li class="text-gray-600">🎉 Anniversary today!</li>
                </ul>
            </div>
        </div>

        {{-- User Profile --}}
        <div class="flex items-center space-x-1">
            <img src="https://i.pravatar.cc/32" alt="User" class="w-6 h-6 rounded-full">
            <div class="hidden sm:block leading-tight">
                <p class="text-gray-800 text-xs font-semibold">Sophie</p>
                <p class="text-gray-500 text-[10px]">Exec. Manager</p>
            </div>
        </div>
    </div>
</div>
