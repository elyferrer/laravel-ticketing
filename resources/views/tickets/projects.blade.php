<x-layout>
    <x-slot:title>
        Tickets
    </x-slot:title>

    <x-slot:header>
        Tickets
    </x-slot:header>
    
    <div>
        <div>
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($projects as $project)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-lg font-semibold text-gray-900">{{ $project->name }}</p>
                                <p class="mt-1 truncate text-md text-gray-500">{{ $project->description }}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p>
                                <a href="{{ route('tickets.index', ['project' => $project]) }}" class="bg-gray-600 text-white rounded px-3 py-1">View Tickets</a>
                            </p>
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
        
    </div>
</x-layout>