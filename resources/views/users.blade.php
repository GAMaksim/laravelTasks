<x-layout>
    <x-slot:heading>
        Users Listing
    </x-slot:heading>

    @foreach ($users as $user)
    <a href="/user/{{$user['id']}}" class="text-blue-500 hover:underline">
        <li>
            {{$user['name']}}:{{ $user['mail']}}
        </li>
    </a>
    @endforeach
    
    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>
</x-layout>