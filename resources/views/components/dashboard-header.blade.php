<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex h-16 items-center justify-between px-6">
        <!-- Search (ixtiyoriy - Task 30 da qo'shamiz) -->
        <div class="flex-1">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ now()->format('l, F j, Y') }}
            </h2>
        </div>

        <!-- Right side -->
        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}" 
                   class="text-sm font-medium text-gray-700 hover:text-gray-900">
                    🔐 Login
                </a>
                <a href="{{ route('register') }}" 
                   class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">
                    📝 Register
                </a>
            @endguest

            @auth
                <!-- Notifications (ixtiyoriy) -->
                <button class="relative text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div 
                        x-show="open" 
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 rounded-lg bg-white shadow-lg border border-gray-200 py-1 z-50"
                    >
                        <a href="/students" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            👨‍🎓 Students
                        </a>
                        <div class="border-t border-gray-200"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                                👋 Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>