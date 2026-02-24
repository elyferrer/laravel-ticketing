<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>

    <x-slot:header>
        Home Page
    </x-slot:header>
    <h1>
        Welcome, {{ Auth::user()->name }}
    </h1>
</x-layout>