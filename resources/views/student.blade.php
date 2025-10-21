<x-layout>

    <x-slot:heading>
        Student
    </x-slot:heading>

    <h1><strong>Name:</strong> {{$student['name']}}</h1>
    <h4><strong>Lastname:</strong> {{$student['lastname']}}</h4>

    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>

</x-layout>