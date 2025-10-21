@props(['type' => 'success'])

@php
    $classes = [
        'success' => 'bg-green-50 border-green-500 text-green-800',
        'error' => 'bg-red-50 border-red-500 text-red-800',
        'warning' => 'bg-yellow-50 border-yellow-500 text-yellow-800',
        'info' => 'bg-blue-50 border-blue-500 text-blue-800',
    ][$type];

    $icons = [
        'success' => '✅',
        'error' => '❌',
        'warning' => '⚠️',
        'info' => 'ℹ️',
    ][$type];
@endphp

<div class="mb-6 rounded-lg border-l-4 p-4 {{ $classes }}" role="alert">
    <div class="flex items-center gap-3">
        <span class="text-2xl">{{ $icons }}</span>
        <div class="flex-1 font-semibold">
            {{ $slot }}
        </div>
    </div>
</div>