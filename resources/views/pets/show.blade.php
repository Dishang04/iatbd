<x-app-layout>
    <h1 class="myPetsHeader">Overzicht</h1>
    {{-- nog toevoegen als er geen pets zijn dan een message neerzetten: van nu geen oppas nodig --}}
    <section class="petsList listOverview">
        @foreach ($pets as $pet)
            <a href="{{ route('pets.information', ['id' => $pet->id]) }}">
                <div class="petItem">
                    <h2> {{ $pet->name }}</h2>
                    <p>Eigennaar naam: {{ $pet->user->name }}</p>
                    <p class="">Soort dier: {{ $pet->species }}</p>
                    <p class="">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p> 
                </div> 
            </a>
        @endforeach
    </section>
</x-app-layout>