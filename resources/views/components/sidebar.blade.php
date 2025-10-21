<aside class="w-64 bg-gray-900 text-white" x-data="{ open: true }">
    <div class="flex h-full flex-col">
        <!-- Logo -->
        <div class="flex h-16 items-center justify-between px-6 border-b border-gray-800">
            <a href="/" class="flex items-center gap-2">
                <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="text-xl font-bold">Laravel Tasks</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-4 py-6">
            <div class="space-y-1">
                <x-sidebar-link href="/" :active="request()->is('/')">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Home</span>
                </x-sidebar-link>

                @auth
                    <x-sidebar-link href="/students" :active="request()->is('students*')">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span>Students</span>
                    </x-sidebar-link>

                    <x-sidebar-link href="/products" :active="request()->is('products*')">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span>Products</span>
                     </x-sidebar-link>

                @endauth

                <x-sidebar-link href="/jobs" :active="request()->is('jobs*')">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Jobs</span>
                </x-sidebar-link>

                <x-sidebar-link href="/contact" :active="request()->is('contact')">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Contact</span>
                </x-sidebar-link>
            </div>
        </nav>

        <!-- User Section -->
        @auth
            <div class="border-t border-gray-800 p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</aside>