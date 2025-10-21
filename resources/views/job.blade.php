<x-layout>

    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <h1><strong>Title:</strong> {{$job['title']}}</h1>
    <h4><strong>Salary:</strong> {{$job['salary']}}</h4>

    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>

</x-layout>