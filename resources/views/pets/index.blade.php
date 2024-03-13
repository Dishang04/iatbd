<x-app-layout>
    <h1 class="myPetsHeader">Mijn huisdieren</h1>
    <a class="addPetButton" href="{{ route('pets.create') }}">
        {{ __('+ Huisdier toevoegen') }}
    </a>

    <section class="petsList">
        @foreach ($pets as $pet)
            @if ($pet->user->is(auth()->user()))
                <div class="myItem">
                    <h2> {{ $pet->name }}</h2>
                    <p>Eigennaar naam: {{ $pet->user->name }}</p>
                    <p class="">Soort dier: {{ $pet->species }}</p>
                    <p class="">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p>
                    <p class="">Uurtarief: €{{ $pet->hourlyRate }}</p>
                    <p class="">Duur: {{ $pet->durationHours }} uur</p>
                    <p class="">Belangrijke zaken: {{ $pet->details }}</p>   
                </div> 
            @endif
        @endforeach
    </section>
</x-app-layout>