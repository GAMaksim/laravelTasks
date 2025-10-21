<x-dashboard-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:heading>Dashboard</x-slot:heading>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-6">
        <x-stat-card 
            title="Total Students" 
            :value="App\Models\Student::count()"
            icon="👨‍🎓"
            color="blue"
        />
        
        <x-stat-card 
            title="My Students" 
            :value="auth()->check() ? auth()->user()->students()->count() : 0"
            icon="📚"
            color="green"
        />
        
        <x-stat-card 
            title="Total Users" 
            :value="App\Models\User::count()"
            icon="👥"
            color="purple"
        />
        
        <x-stat-card 
            title="Jobs in Queue" 
            :value="DB::table('jobs')->count()"
            icon="⚙️"
            color="yellow"
        />
    </div>

    <!-- Recent Students -->
    <div class="rounded-lg bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Students</h3>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse(App\Models\Student::latest()->take(5)->get() as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $student->name }} {{ $student->lastname }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $student->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $student->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('students.show', $student) }}" class="text-blue-600 hover:text-blue-800">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No students yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>