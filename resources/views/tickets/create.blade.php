<x-layout>
    <x-slot:title>
        Create New Ticket
    </x-slot:title>

    <x-slot:header>
        <h1 class="text-center text-2xl font-bold">Create New Ticket</h1>
    </x-slot:header>
    
    <div>
        <div class="grid place-items-center">
            <form action="{{ route('tickets.store', ['project' => $project]) }}" method="POST" class="w-2/4">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                            <x-form-field>
                                <x-form-label for="name">Name</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="name" type="text" name="name" :value="old('name')" placeholder="Enter ticket name" autocomplete="off" />
                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="description">Description</x-form-label>
                                <div class="mt-2">
                                    <x-form-text name="description" id="description" :value="old('description')" 
                                        placeholder="Tell us something about this ticket" autocomplete="off" />
                                    <x-form-error name="description" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="status">Status</x-form-label>
                                <div class="mt-2">
                                    <select name="status_id" id="status_id" class="w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="" disabled>Select status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-form-error name="status_id" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="status">Assignee</x-form-label>
                                <div class="mt-2">
                                    <select name="assignee_id" id="assignee_id" class="w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="" disabled>Select status</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-form-error name="assignee_id" />
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-form-button>Save</x-form-button>
                </div>
            </form>
        </div>
        
    </div>
</x-layout>