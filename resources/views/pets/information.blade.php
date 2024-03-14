<x-app-layout>
    <h1 class="myPetsHeader">{{ $pet->name }} </h1>

    <section class="informationContainer">
        <p>Eigennaar naam: {{ $pet->user->name }}</p>
        <p class="">Soort dier: {{ $pet->species }}</p>
        <p class="">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p>
        <p class="">Uurtarief: €{{ $pet->hourlyRate }}</p>
        <p class="">Duur: {{ $pet->durationHours }} uur</p>
        <p class="">Belangrijke zaken: {{ $pet->details }}</p> 
    </section>

    <a href="{{ route('messages.index') }}">Stel hier al uw vragen</a>

    {{-- <section class="informationContainer">
        <h2> Chat </h2>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('messages.store') }}">
                @csrf
                <textarea
                    name="message"
                    placeholder="{{ __('What\'s on your mind?') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('message') }}</textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
            </form>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                @foreach ($messages as $message)
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800">{{ $message->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600">{{ $message->created_at->format('j M Y, g:i a') }}</small>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $message->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section> --}}

    {{-- <section class="petsList">
        <div class="petItem">
            <h2>{{ $pet->name }}</h2>
            <p>Eigennaar naam: {{ $pet->user->name }}</p>
            <p class="">Soort dier: {{ $pet->species }}</p>
            <p class="">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p>
            <p class="">Uurtarief: €{{ $pet->hourlyRate }}</p>
            <p class="">Duur: {{ $pet->durationHours }} uur</p>
            <p class="">Belangrijke zaken: {{ $pet->details }}</p>   
        </div>
    </section> --}}
</x-app-layout>