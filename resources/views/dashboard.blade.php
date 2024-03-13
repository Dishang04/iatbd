<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hier komt een overzicht met alle openstaande huisdieren die een oppas zoeken") }}
                </div>
            </div>
        </div>
        {{-- @foreach ($pets as $pet)
            <div class="petsList">
                <div class="petItem">
                    <h2>{{ $pet->name }}</h2>
                    <p>{{ $pet->user->name }}</p>
                    <p class="mt-4 text-lg text-gray-900">{{ $pet->species }}</p>
                    <p class="mt-4 text-lg text-gray-900">{{ $pet->when }}</p>
                    <p class="mt-4 text-lg text-gray-900">{{ $pet->hourlyRate }}</p>
                    <p class="mt-4 text-lg text-gray-900">{{ $pet->durationHours }}</p>
                    <p class="mt-4 text-lg text-gray-900">{{ $pet->details }}</p>
                </div>
            </div>  
        @endforeach --}}
    </div>
</x-app-layout>

