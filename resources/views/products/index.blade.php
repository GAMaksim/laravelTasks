<x-dashboard-layout>
    <x-slot:title>Products</x-slot:title>
    <x-slot:heading>Products Management</x-slot:heading>

    <!-- Search Form -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <form method="GET" action="{{ route('products.index') }}" class="flex-1">
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search ?? '' }}"
                        placeholder="Search products by name, description, or category..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button 
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    Search
                </button>
                @if($search)
                    <a 
                        href="{{ route('products.index') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        <a href="{{ route('products.create') }}" 
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 transition">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Product
        </a>
    </div>

    <!-- Search Results Info -->
    @if($search)
        <div class="mb-4 flex items-center gap-2 text-sm text-gray-600">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>
                Found <strong>{{ $products->total() }}</strong> result(s) for "<strong>{{ $search }}</strong>"
            </span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <div class="rounded-lg bg-white shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
                <!-- Product Header -->
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-32 flex items-center justify-center">
                    <span class="text-6xl">📦</span>
                </div>

                <!-- Product Body -->
                <div class="p-6">
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-900">
                            {!! $search ? preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark class="bg-yellow-200">$1</mark>', e($product->name)) : e($product->name) !!}
                        </h3>
                        @if($product->is_active)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                        @endif
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                        {!! $search ? preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark class="bg-yellow-200">$1</mark>', e($product->description)) : e($product->description) !!}
                    </p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Price:</span>
                            <span class="text-lg font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Stock:</span>
                            <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock }}
                            </span>
                        </div>
                        @if($product->category)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Category:</span>
                                <span class="text-sm font-medium text-gray-700">
                                    {!! $search ? preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark class="bg-yellow-200">$1</mark>', e($product->category)) : e($product->category) !!}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="text-xs text-gray-400 mb-4">
                        Created by: {{ $product->user->name }}
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="{{ route('products.show', $product) }}" 
                           class="flex-1 text-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            View
                        </a>
                        @if($product->user_id === auth()->id())
                            <a href="{{ route('products.edit', $product) }}" 
                               class="flex-1 text-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('products.destroy', $product) }}" 
                                  onsubmit="return confirm('Delete this product?');" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3">
                @if($search)
                    <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
                        <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <p class="mt-4 text-lg font-medium text-gray-900">No products found for "{{ $search }}"</p>
                        <p class="mt-2 text-sm text-gray-500">Try different keywords or clear the search</p>
                        <a href="{{ route('products.index') }}" 
                           class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">
                            Clear search
                        </a>
                    </div>
                @else
                    <div class="text-center py-12">
                        <span class="text-6xl">📦</span>
                        <p class="mt-4 text-gray-500">No products yet.</p>
                    </div>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @endif
</x-dashboard-layout>