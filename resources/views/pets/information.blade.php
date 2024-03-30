<x-app-layout>
    <a class="" href="{{ route('pets.show') }}">Terug</a>
    <h1 class="myPetsHeader">{{ $pet->name }} </h1>

    <section class="informationContainer">
        <p class="informationP">Eigennaar naam: {{ $pet->user->name }}</p>
        <p class="informationP">Soort dier: {{ $pet->species }}</p>
        <p class="informationP">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p>
        <p class="informationP">Uurtarief: €{{ $pet->hourlyRate }}</p>
        <p class="informationP">Duur: {{ $pet->durationHours }} uur</p>
        <p class="informationP">Belangrijke zaken: {{ $pet->details }}</p> 
        @if ($pet->image)
            <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
        @endif 
    </section>

    <section class="informationButtonsCnt">
        <a href="{{ route('messages.index') }}" class="informationButton toMessageButton">Stel hier al uw vragen</a>
        <a href="" class="informationButton reactionButton">Ik wil oppassen</a>
    </section>
</x-app-layout>