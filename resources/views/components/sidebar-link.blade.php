@props(['active' => false])

<a 
    {{ $attributes }}
    class="{{ $active 
        ? 'bg-gray-800 text-white' 
        : 'text-gray-400 hover:bg-gray-800 hover:text-white' 
    }} group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition-colors"
>
    {{ $slot }}
</a>