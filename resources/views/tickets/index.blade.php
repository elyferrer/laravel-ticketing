<x-layout>
    <x-slot:title>
        Tickets
    </x-slot:title>

    <x-slot:header>
        Tickets
    </x-slot:header>
    
    <div>
        <div>
            <a href="{{ route('tickets.create', ['project' => $project]) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Add New</a>
        </div>
        <div>
            <ul role="list" class="divide-y divide-gray-100 grid grid-cols-4 gap-4 mt-4">
                @foreach ($tickets as $ticket)
                    <li class=" gap-x-6 py-5 bg-white p-4 rounded">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">{{ $project->code.'-'.$ticket->id }}</h1>
                                <p class="mt-1 text-md font-semibold text-gray-900">{{ $ticket->name }}</p>
                                <p class="mt-1 truncate text-md text-gray-500">{{ $ticket->description }}</p>
                            </div>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <p>
                                <a href="{{ route('tickets.show', ['project' => $project, 'ticket' => $ticket]) }}" class="bg-gray-600 text-white rounded px-3 py-1">View</a>
                            </p>
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
        
    </div>
</x-layout>