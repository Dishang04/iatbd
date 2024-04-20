<x-app-layout>
    <a class="prevButton test" href="{{ route('pets.show') }}">&laquo; Terug</a>
    <h1 class="myPetsHeader">{{ $pet->name }} </h1>

    <section class="informationContainer">
        <p class="informationP">Eigennaar naam: {{ $pet->user->name }}</p>
        <p class="informationP">Soort dier: {{ $pet->species }}</p>
        <p class="informationP">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p>
        <p class="informationP">Uurtarief: €{{ $pet->hourlyRate }}</p>
        <p class="informationP">Duur: {{ $pet->durationHours }} uur</p>
        <p class="informationP">Belangrijke zaken: {{ $pet->details }}</p> 
        @if ($pet->image)
            <img class="petImage" src="{{ asset('storage/' . $pet->image) }}" alt="huisdier foto">
        @endif 
    </section>

    @if (auth()->user()->sitter)
        <section class="informationButtonsCnt">
            <a href="{{ route('messages.index', $pet) }}" class="informationButton toMessageButton">Stel hier al uw vragen</a>
            <form action="{{ route('pets.sitRequest', ['pet' => $pet->id]) }}" method="POST">
                @csrf
                <button type="submit" class="informationButton bg-cyan-600 mt-16">Ik wil oppassen</button>
            </form>
        </section>
    @else
        <section class="informationButtonsCnt">
            <a href="{{ route('messages.index', $pet) }}" class="informationButton toMessageButton">Bekijk hier alle vragen</a> 
        </section>
    @endif
</x-app-layout>
