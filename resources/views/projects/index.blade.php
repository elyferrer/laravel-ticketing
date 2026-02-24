<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <x-slot:header>
        Projects
    </x-slot:header>
    
    <div>
        <div>
            <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded">Add New</a>
        </div>
        <div>
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($projects as $project)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            {{-- <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-12 flex-none rounded-full bg-gray-50" /> --}}
                            <div class="min-w-0 flex-auto">
                                <p class="text-lg font-semibold text-gray-900">{{ $project->name }}</p>
                                <p class="mt-1 truncate text-md text-gray-500">{{ $project->description }}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p>
                                <a href="{{ route('projects.show', ['project' => $project]) }}" class="bg-gray-600 text-white rounded px-3 py-1">View</a>
                            </p>
                            {{-- <p class="text-sm/6 text-gray-900">Co-Founder / CEO</p> --}}
                            
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
        
    </div>
</x-layout>