<x-dashboard-layout>
    <x-slot:title>Create Product</x-slot:title>
    <x-slot:heading>Create New Product</x-slot:heading>

    <div class="max-w-2xl">
        <div class="rounded-lg bg-white p-6 shadow-sm border border-gray-200">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 @error('name') border-red-500 @else border-gray-300 focus:ring-blue-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-bold mb-2">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <!-- Price & Stock -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="price" class="block text-sm font-bold mb-2">
                            Price ($) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price" 
                            value="{{ old('price') }}"
                            step="0.01"
                            min="0"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 @error('price') border-red-500 @else border-gray-300 focus:ring-blue-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-bold mb-2">
                            Stock <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="stock" 
                            name="stock" 
                            value="{{ old('stock', 0) }}"
                            min="0"
                            required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 @error('stock') border-red-500 @else border-gray-300 focus:ring-blue-500 @enderror">
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-bold mb-2">
                        Category
                    </label>
                    <select 
                        id="category" 
                        name="category"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500">
                        <option value="">Select category</option>
                        <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                        <option value="Books" {{ old('category') == 'Books' ? 'selected' : '' }}>Books</option>
                        <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                        <option value="Toys" {{ old('category') == 'Toys' ? 'selected' : '' }}>Toys</option>
                        <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                    </select>
                </div>

                <!-- Is Active -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1"
                            {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600">
                        <span class="ml-2 text-sm font-medium text-gray-700">Product is active</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button 
                        type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                        Create Product
                    </button>
                    <a href="{{ route('products.index') }}" 
                       class="px-6 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>