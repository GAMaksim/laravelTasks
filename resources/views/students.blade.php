<x-layout>
    <x-slot:heading>
        Students
    </x-slot:heading>

    @foreach ($students as $student)
    <a href="/student/{{$student['id']}}" class="text-blue-500 hover:underline">
        <li>
            {{$student['name']}}:{{ $student['lastname']}}
        </li>
    </a>
    @endforeach
    
    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>
</x-layout>