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
            <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
        @endif 
    </section>

    @if (auth()->user()->sitter)
        <section class="informationButtonsCnt">
            <a href="{{ route('messages.index') }}" class="informationButton toMessageButton">Stel hier al uw vragen</a>
            {{-- <a href="" class="informationButton reactionButton">Ik wil oppassen</a> --}}
            <form action="{{ route('pets.interest', ['pet' => $pet->id]) }}" method="POST">
                @csrf
                <button type="submit" class="informationButton bg-cyan-600 mt-16">Ik wil oppassen</button>
            </form>
        </section>
    @else
        <a href="{{ route('messages.index') }}" class="informationButton toMessageButton">Bekijk hier alle vragen</a>
    @endif
</x-app-layout>
