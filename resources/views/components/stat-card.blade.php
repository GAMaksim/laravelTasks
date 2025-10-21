@props(['title', 'value', 'icon' => '📊', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'bg-blue-500',
        'green' => 'bg-green-500',
        'purple' => 'bg-purple-500',
        'yellow' => 'bg-yellow-500',
        'red' => 'bg-red-500',
    ];
@endphp

<div class="rounded-lg bg-white p-6 shadow-sm border border-gray-200">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-600">{{ $title }}</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $value }}</p>
        </div>
        <div class="flex h-12 w-12 items-center justify-center rounded-lg {{ $colors[$color] ?? $colors['blue'] }} text-white text-2xl">
            {{ $icon }}
        </div>
    </div>
</div>