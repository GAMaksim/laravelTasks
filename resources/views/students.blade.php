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
    <div class="space-y-3">
        @foreach ($students as $student)
            <div class="flex items-center justify-between px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                <a href="/student/{{ $student->id }}" class="flex-1">
                    <div class="font-bold text-lg text-blue-600">
                        {{ $student->name }} {{ $student->lastname }}
                    </div>
                    <div class="text-sm text-gray-500">
                        ID: {{ $student->id }}
                    </div>
                </a>
                
                <div class="flex gap-2">
                    <!-- Edit Button -->
                    <a href="/student/{{ $student->id }}/edit" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">
                        ✏️ Edit
                    </a>
                    
                    <!-- Delete Button -->
                    <form method="POST" action="/student/{{ $student->id }}" 
                          onsubmit="return confirm('O\'chirmoqchimisiz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition">
                            🗑️ Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $students->links() }}
    </div>
</x-layout>