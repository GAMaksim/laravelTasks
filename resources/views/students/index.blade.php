<x-dashboard-layout>
    <x-slot:title>Students</x-slot:title>
    <x-slot:heading>Students Management</x-slot:heading>

    <!-- Search Form -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <form method="GET" action="{{ route('students.index') }}" class="flex-1">
            <div class="flex gap-2">
                <div class="relative flex-1">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search ?? '' }}"
                        placeholder="Search by name, lastname, or email..."
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
                        href="{{ route('students.index') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        <a href="{{ route('students.create') }}" 
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 transition">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Student
        </a>
    </div>

    <!-- Search Results Info -->
    @if($search)
        <div class="mb-4 flex items-center gap-2 text-sm text-gray-600">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>
                Found <strong>{{ $students->total() }}</strong> result(s) for "<strong>{{ $search }}</strong>"
            </span>
        </div>
    @endif

    <div class="rounded-lg bg-white shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($students as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                #{{ $student->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                                        {{ substr($student->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">
                                            {!! $search ? preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark class="bg-yellow-200">$1</mark>', e($student->name . ' ' . $student->lastname)) : e($student->name . ' ' . $student->lastname) !!}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    {!! $search ? preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark class="bg-yellow-200">$1</mark>', e($student->email)) : e($student->email) !!}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $student->age ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $student->user->name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('students.show', $student) }}" 
                                       class="text-blue-600 hover:text-blue-800">
                                        View
                                    </a>
                                    @can('edit-student', $student)
                                        <a href="{{ route('students.edit', $student) }}" 
                                           class="text-yellow-600 hover:text-yellow-800">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('students.destroy', $student) }}" 
                                              onsubmit="return confirm('Are you sure?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                @if($search)
                                    <div class="flex flex-col items-center gap-3">
                                        <svg class="h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                        <p class="text-lg font-medium text-gray-900">No students found for "{{ $search }}"</p>
                                        <p class="text-sm text-gray-500">Try different keywords or clear the search</p>
                                        <a href="{{ route('students.index') }}" 
                                           class="mt-2 text-blue-600 hover:text-blue-800 font-medium">
                                            Clear search
                                        </a>
                                    </div>
                                @else
                                    <div class="flex flex-col items-center gap-3">
                                        <span class="text-6xl">👨‍🎓</span>
                                        <p class="text-lg font-medium text-gray-900">No students yet</p>
                                        <a href="{{ route('students.create') }}" 
                                           class="mt-2 text-blue-600 hover:text-blue-800 font-medium">
                                            Add your first student
                                        </a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($students->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</x-dashboard-layout>