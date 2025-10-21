<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} - Laravel Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Header -->
            <x-dashboard-header />

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Page Heading -->
                @isset($heading)
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $heading }}</h1>
                    </div>
                @endisset

                <!-- Success Message -->
                @if(session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif

                <!-- Main Slot -->
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>