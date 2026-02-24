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
    </div>
</x-layout>