<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    @foreach ($jobs as $job)
    <a href="/job/{{$job['id']}}" class="text-blue-500 hover:underline">
        <li>
            {{$job['title']}}:{{ $job['salary']}}
        </li>
    </a>
    @endforeach
    
    <x-slot:footer>
        <p class="text-red-500">Footer</p>
    </x-slot:footer>
</x-layout>