<div x-data="{ expanded: false }" @mouseenter="expanded = true" @mouseleave="expanded = false"
    class="h-full bg-white shadow-md transition-all duration-300 ease-in-out" :class="expanded ? 'w-64' : 'w-20'">
    {{-- Logo --}}
    <div class="flex items-center justify-center h-16 border-b">
        <img src="/path-to-logo.png" alt="Logo" class="w-8 h-8">
    </div>

    {{-- Navigation --}}
    <nav class="mt-6 space-y-2 px-2">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="relative flex items-center p-2 rounded-md hover:bg-gray-100 transition-all duration-300"
            :class="{ 'justify-center': !expanded, 'justify-start space-x-3': expanded }">
            <i class="fas fa-tachometer-alt text-lg w-6 text-center transition-all duration-300"
                :class="{ 'text-blue-600': '{{ request()->routeIs('dashboard') }}' }"></i>
            <span x-show="expanded" x-transition
                class="font-medium {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-700' }}">
                Dashboard
            </span>

            @if (request()->routeIs('dashboard'))
                <span class="absolute bottom-0 h-[3px] bg-blue-500 rounded-full transition-all duration-300"
                    :class="expanded ? 'left-4 right-4' : 'left-1/2 -translate-x-1/2 w-4'"></span>
            @endif
        </a>

        {{-- chart --}}
        <a href="{{ route('analytic.index') }}"
            class="relative flex items-center p-2 rounded-md hover:bg-gray-100 transition-all duration-300"
            :class="{ 'justify-center': !expanded, 'justify-start space-x-3': expanded }">
            <i class="fas fa-folder-open text-lg w-6 text-center transition-all duration-300"
                :class="{ 'text-blue-600': '{{ request()->routeIs('analytic.*') }}' }"></i>
            <span x-show="expanded" x-transition
                class="font-medium {{ request()->routeIs('analytic.*') ? 'text-blue-600' : 'text-gray-700' }}">
                analytic
            </span>

            @if (request()->routeIs('analytic.*'))
                <span class="absolute bottom-0 h-[3px] bg-blue-500 rounded-full transition-all duration-300"
                    :class="expanded ? 'left-4 right-4' : 'left-1/2 -translate-x-1/2 w-4'"></span>
            @endif
        </a>

        {{-- Workers --}}
        <a href="{{ route('workers.index') }}"
            class="relative flex items-center p-2 rounded-md hover:bg-gray-100 transition-all duration-300"
            :class="{ 'justify-center': !expanded, 'justify-start space-x-3': expanded }">
            <i class="fas fa-users-cog text-lg w-6 text-center transition-all duration-300"
                :class="{ 'text-blue-600': '{{ request()->routeIs('workers.*') }}' }"></i>
            <span x-show="expanded" x-transition
                class="font-medium {{ request()->routeIs('workers.*') ? 'text-blue-600' : 'text-gray-700' }}">
                Workers
            </span>

            @if (request()->routeIs('workers.*'))
                <span class="absolute bottom-0 h-[3px] bg-blue-500 rounded-full transition-all duration-300"
                    :class="expanded ? 'left-4 right-4' : 'left-1/2 -translate-x-1/2 w-4'"></span>
            @endif
        </a>
    </nav>
</div>
