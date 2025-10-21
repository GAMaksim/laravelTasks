<x-layout>
    <x-slot:heading>
        Ro'yxatdan o'tish
    </x-slot:heading>

    <div class="max-w-md mx-auto">
        <!-- Xatoliklar -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <h3 class="font-bold text-red-800 mb-2">⚠️ Xatoliklar:</h3>
                <ul class="list-disc list-inside text-red-700">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-8 rounded-lg shadow-md">
            <form method="POST" action="/register">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold mb-2">
                        Ism: <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                               @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                        placeholder="Ismingizni kiriting">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">
                        Email: <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                               @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                        placeholder="email@example.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">
                        Parol: <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                               @error('password') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                        placeholder="Kamida 8 ta belgi">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-bold mb-2">
                        Parolni tasdiqlang: <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500"
                        placeholder="Parolni qayta kiriting">
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition">
                    📝 Ro'yxatdan o'tish
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-4 text-center">
                <p class="text-gray-600">
                    Allaqachon ro'yxatdan o'tganmisiz? 
                    <a href="/login" class="text-blue-500 hover:underline font-semibold">Kirish</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>