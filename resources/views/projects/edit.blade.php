<x-layout>
    <x-slot:title>
        Edit Project
    </x-slot:title>

    <x-slot:header>
        <h1 class="text-center text-2xl font-bold">Edit Project</h1>
    </x-slot:header>
    
    <div>
        <div class="grid place-items-center">
            <form action="{{ route('projects.update', ['project' => $project]) }}" method="POST" class="w-2/4">
                @csrf
                @method('PATCH')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                            <x-form-field>
                                <x-form-label for="email">Name</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="name" type="text" name="name" :value="old('name') ?? $project->name" placeholder="Enter project name" autocomplete="off" />
                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="code">Code</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="code" type="text" name="code" :value="old('code') ?? $project->code" placeholder="Eg. FFA, APPR" autocomplete="off" />
                                    <x-form-error name="code" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="description">Description</x-form-label>
                                <div class="mt-2">
                                    <x-form-text id="description" name="description" rows="3" :value="old('description') ?? trim($project->description)" placeholder="Hello" />
                                    <x-form-error name="description" />
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('projects.show', ['project' => $project]) }}">Cancel</a>
                    <x-form-button>Save</x-form-button>
                </div>
            </form>
        </div>
        
    </div>
</x-layout>