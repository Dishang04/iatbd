<x-app-layout>
    <h1 class="myPetsHeader">Overzicht</h1>

    <form class="filterForm" action="{{ route('pets.filter') }}" method="GET">
        <label> Diersoort: </label> <br>
        <input type="checkbox" name="species[]" value="hond" {{ in_array('hond', request()->input('species', [])) ? 'checked' : '' }}>
        <label>Hond</label> <br>
        <input type="checkbox" name="species[]" value="Kat" {{ in_array('Kat', request()->input('species', [])) ? 'checked' : '' }}>
        <label>Kat</label> <br>
        <input type="checkbox" name="species[]" value="Konijn" {{ in_array('Konijn', request()->input('species', [])) ? 'checked' : '' }}>
        <label>Konijn</label> <br>
        <button class="filterButton bg-blue-600" type="submit">Filter</button>
    </form>

    {{-- nog toevoegen als er geen pets zijn dan een message neerzetten: van nu geen oppas nodig --}}
    <section class="petsList listOverview">
        @foreach ($pets as $pet)
            <a href="{{ route('pets.information', ['id' => $pet->id]) }}">
                <div class="petItem">
                    <h2> {{ $pet->name }}</h2>
                    <p>Eigennaar naam: {{ $pet->user->name }}</p>
                    <p class="">Soort dier: {{ $pet->species }}</p>
                    <p class="">Wanneer: {{ date('d-m-y', strtotime($pet->when)) }}</p> 
                    @if ($pet->image)
                        <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
                    @endif
                </div> 
            </a>
        @endforeach
    </section> 
</x-app-layout>