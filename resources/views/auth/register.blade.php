<x-non-auth-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    
    {{-- <div>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" />
            <input type="email" name="email" placeholder="Enter your email" />
            <input type="password" name="password" id="password" placeholder="Enter Password" />
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
            <button type="submit">Register</button>
        </form>
    </div> --}}

    <div class="flex items-center justify-center h-screen">
        <div class="w-1/4 drop-shadow-lg">
            <form action="{{ route('register.store') }}" method="POST" class="w-full">
                @csrf
                <input type="hidden" value="2" name="user_type_id" id="user_type_id" />
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 text-xl font-semibold text-gray-900">Register</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                            <x-form-field>
                                <x-form-label for="name">Name</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="name" type="text" name="name" :value="old('name')" placeholder="John Doe" />
                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="email">Email</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="email" type="email" name="email" :value="old('email')" placeholder="johndoe@test.com" />
                                    <x-form-error name="email" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="password">Password</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="password" type="password" name="password" placeholder="Your password" />
                                    <x-form-error name="password" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                <div class="mt-2">
                                    <x-form-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" />
                                    <x-form-error name="password_confirmation" />
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-form-button>Save</x-form-button>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('login') }}" class="text-blue-500">Already have an account? Click here to sign in</a>
                </div>
            </form>
        </div>
    </div>
</x-non-auth-layout>