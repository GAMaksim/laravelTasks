<x-layout>
    <x-slot:heading>
        Welcome to Laravel Tasks
    </x-slot:heading>

    <div class="max-w-4xl mx-auto">
        @auth
            <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-lg mb-6">
                <h2 class="text-2xl font-bold text-green-900 mb-2">
                    👋 Xush kelibsiz, {{ Auth::user()->name }}!
                </h2>
                <p class="text-green-800">
                    Siz tizimga kirdingiz. Ilova bilan ishlashingiz mumkin!
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('students.index') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-6 px-8 rounded-lg text-center transition">
                    👨‍🎓 Students
                </a>
                <a href="/jobs" 
                   class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-6 px-8 rounded-lg text-center transition">
                    💼 Jobs
                </a>
            </div>
        @else
            <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg mb-6">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">
                    🚀 Laravel Tasks Project
                </h2>
                <p class="text-blue-800 mb-4">
                    Bu Laravel asoslarini o'rganish uchun loyiha:
                </p>
                <ul class="list-disc list-inside text-blue-800 space-y-1 mb-4">
                    <li>CRUD operatsiyalari</li>
                    <li>Authentication (qo'lda)</li>
                    <li>Eloquent Relationships</li>
                    <li>Validation & Forms</li>
                    <li>Va boshqalar...</li>
                </ul>
                <p class="text-blue-800 font-semibold">
                    Davom etish uchun ro'yxatdan o'ting yoki tizimga kiring.
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('register') }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-6 px-8 rounded-lg text-center transition">
                    📝 Ro'yxatdan o'tish
                </a>
                <a href="{{ route('login') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-6 px-8 rounded-lg text-center transition">
                    🔐 Kirish
                </a>
            </div>
        @endauth
    </div>
</x-layout>