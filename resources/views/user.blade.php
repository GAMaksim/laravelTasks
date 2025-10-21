<x-layout>

    <x-slot:heading>
        Users
    </x-slot:heading>

    <h1><strong>Name:</strong> {{$user['name']}}</h1>
    <h4><strong>Mail:</strong> {{$user['mail']}}</h4>

    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>

</x-layout>