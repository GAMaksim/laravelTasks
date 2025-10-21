<x-layout>
    <x-slot:heading>
        Students List
    </x-slot:heading>

    <!-- Stats -->
    <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
        <p class="text-blue-800">
            <strong>Total Students:</strong> {{ $students->total() }} | 
            <strong>Current Page:</strong> {{ $students->currentPage() }} | 
            <strong>Per Page:</strong> {{ $students->perPage() }}
        </p>
    </div>

    <!-- Students List -->
    <div class="space-y-3">
        @foreach ($students as $student)
            <a href="/student/{{ $student->id }}" 
               class="block px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md hover:border-blue-300 transition">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="font-bold text-lg text-blue-600">
                            {{ $student->name }} {{ $student->lastname }}
                        </div>
                        <div class="text-sm text-gray-500">
                            Student ID: #{{ $student->id }}
                        </div>
                    </div>
                    <div>
                        <span class="text-blue-500 text-2xl">→</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $students->links() }}
    </div>

    <x-slot:footer>
        <p class="text-gray-500 text-center">© 2025 Students Portal - Total: {{ $students->total() }} students</p>
    </x-slot:footer>
</x-layout>