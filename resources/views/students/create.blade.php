<x-layout>
    <x-slot:heading>
        Yangi Student Qo'shish
    </x-slot:heading>

    <!-- Umumiy xatoliklar -->
    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
            <h3 class="font-bold text-red-800 mb-2">⚠️ Xatoliklar topildi:</h3>
            <ul class="list-disc list-inside text-red-700">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/students" class="max-w-2xl">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">
                Ism: <span class="text-red-500">*</span>
                <span class="text-gray-500 text-xs">(kamida 3 ta belgi)</span>
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                       @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                placeholder="Ismingizni kiriting">
            @error('name')
                <p class="text-red-500 text-sm mt-1 font-semibold">❌ {{ $message }}</p>
            @enderror
        </div>

        <!-- Lastname -->
        <div class="mb-4">
            <label for="lastname" class="block text-sm font-bold mb-2">
                Familiya: <span class="text-red-500">*</span>
                <span class="text-gray-500 text-xs">(kamida 5 ta belgi)</span>
            </label>
            <input 
                type="text" 
                id="lastname" 
                name="lastname" 
                value="{{ old('lastname') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                       @error('lastname') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                placeholder="Familiyangizni kiriting">
            @error('lastname')
                <p class="text-red-500 text-sm mt-1 font-semibold">❌ {{ $message }}</p>
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
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                       @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                placeholder="email@example.com">
            @error('email')
                <p class="text-red-500 text-sm mt-1 font-semibold">❌ {{ $message }}</p>
            @enderror
        </div>

        <!-- Age -->
        <div class="mb-4">
            <label for="age" class="block text-sm font-bold mb-2">
                Yosh: <span class="text-gray-500 text-xs">(ixtiyoriy)</span>
            </label>
            <input 
                type="number" 
                id="age" 
                name="age" 
                value="{{ old('age') }}"
                min="1" 
                max="120"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2
                       @error('age') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                placeholder="Yoshingizni kiriting">
            @error('age')
                <p class="text-red-500 text-sm mt-1 font-semibold">❌ {{ $message }}</p>
            @enderror
        </div>

        <!-- Qoidalar -->
        <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
            <h4 class="font-bold text-blue-900 mb-2">📋 Qoidalar:</h4>
            <ul class="text-blue-800 text-sm space-y-1">
                <li>✅ <strong>Ism:</strong> Majburiy, kamida 3 ta belgi</li>
                <li>✅ <strong>Familiya:</strong> Majburiy, kamida 5 ta belgi</li>
                <li>✅ <strong>Email:</strong> Majburiy, to'g'ri format, takrorlanmasin</li>
                <li>✅ <strong>Yosh:</strong> Ixtiyoriy, 1-120 oralig'ida</li>
            </ul>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
            <button 
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg transition">
                💾 Saqlash
            </button>
            <a 
                href="/students"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded-lg transition">
                ❌ Bekor qilish
            </a>
        </div>
    </form>
</x-layout>