<x-layout>
    <x-slot:heading>
        Student Ma'lumotlari
    </x-slot:heading>

    <div class="max-w-2xl">
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 mb-6">
            <div class="mb-4">
                <span class="text-gray-500 text-sm">ID:</span>
                <p class="text-lg font-bold">{{ $student->id }}</p>
            </div>
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">Ism:</span>
                <p class="text-lg font-bold">{{ $student->name }}</p>
            </div>
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">Familiya:</span>
                <p class="text-lg font-bold">{{ $student->lastname }}</p>
            </div>
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">Email:</span>
                <p class="text-lg">{{ $student->email ?? 'N/A' }}</p>
            </div>
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">Yosh:</span>
                <p class="text-lg">{{ $student->age ?? 'N/A' }}</p>
            </div>
            
            @if($student->user)
                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Yaratuvchi:</span>
                    <p class="text-lg font-bold">{{ $student->user->name }}</p>
                </div>
            @endif
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">Yaratilgan:</span>
                <p class="text-sm">{{ $student->created_at->format('d.m.Y H:i') }}</p>
            </div>
            
            <div>
                <span class="text-gray-500 text-sm">Yangilangan:</span>
                <p class="text-sm">{{ $student->updated_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <div class="flex gap-4">
            @can('edit-student', $student)
                <a href="{{ route('students.edit', $student->id) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition">
                    ✏️ Tahrirlash
                </a>
                
                <form method="POST" action="{{ route('students.destroy', $student->id) }}" 
                      onsubmit="return confirm('Haqiqatan ham bu studentni o\'chirmoqchimisiz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg transition">
                        🗑️ O'chirish
                    </button>
                </form>
            @else
                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
                    <p class="text-yellow-800">
                        ⚠️ Siz bu studentni tahrirlash yoki o'chirish huquqiga ega emassiz.
                    </p>
                </div>
            @endcan
            
            <a href="{{ route('students.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition">
                ← Ortga
            </a>
        </div>
    </div>
</x-layout>