<x-layout>
    <x-slot:title>
        {{ $project->name }}
    </x-slot:title>

    <x-slot:header>
        <h1 class="text-2xl font-bold">{{ $project->name }} ({{ $project->code }})</h1>
    </x-slot:header>
    
    <div class="min-h-screen">
        <div>
            <p>{{ $project->description }}</p>
            <p class="mt-1 text-sm text-gray-500 mt-2">
                Created by {{ $project->user->name }} on {{ \Carbon\Carbon::parse($project->created_at)->format('F d, Y H:i:s A') }}
            </p>
        </div>
        
        <div class="mt-6 bottom-0">
            <p class="grid grid-cols-2 gap-2">
                <div>
                    <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST" id="frm-delete">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <div class="">
                    <button type="submit" form="frm-delete" class="bg-red-500 text-white rounded px-3 py-1">Delete</button>
                    <a href="{{ route('projects.edit', ['project' => $project]) }}" 
                        class="bg-green-600 text-white rounded px-3 py-1 border border-2 border-green-600"
                    >Update</a>
                </div>
            </p>
        </div>

        <div>
            <h1 class="text-2xl mt-8">Tickets</h1>
            <div class="mt-4">
                <a href="{{ route('tickets.create', ['project' => $project]) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Add New</a>
            </div>
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