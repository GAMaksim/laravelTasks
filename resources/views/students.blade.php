<x-layout>
    <x-slot:heading>
        Students
    </x-slot:heading>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Create Button -->
    <div class="mb-6">
        <a href="/students/create" 
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition">
            ➕ Yangi Student Qo'shish
        </a>
    </div>

    <!-- Students List -->
    <div class="space-y-4">
        @foreach ($students as $student)
            <a href="/student/{{ $student->id }}" 
               class="block px-4 py-6 border border-gray-200 rounded-lg hover:bg-gray-50">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $student->name }} {{ $student->lastname }}
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $students->links() }}
    </div>
</x-layout>