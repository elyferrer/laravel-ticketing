<x-non-auth-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    
    <div class="flex items-center justify-center h-screen">
        <div class="w-1/4 drop-shadow-lg">
            <form action="{{ route('login.store') }}" method="POST" class="w-full">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 text-xl font-semibold text-gray-900">Login</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
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
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-form-button>Save</x-form-button>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('register') }}" class="text-blue-500">No account? Click here to register</a>
                </div>
            </form>
        </div>
    </div>
</x-non-auth-layout>