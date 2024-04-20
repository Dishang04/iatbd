<x-app-layout>
    <h1 class="myPetsHeader">Uw huisdieroppas verzoeken</h1>

    <section class="reactionContainer">
        @if ($sitterRequests->isEmpty())
            <p>Geen huisdier oppasverzoeken gevonden.</p>
        @else
            <ul class="reactionList">
                @foreach ($sitterRequests as $request)
                    <li class="reactionItem">
                        <p>Verzoek voor huisdier: {{ $request->pet->name }}</p>
                        <p>Datum: {{ date('d-m-y',strtotime($request->pet->when)) }}</p>
                        <p>Status: {{ ucfirst($request->status) }}</p>  
                        <img class="reactionPetImg" src="{{ asset('storage/' . $request->pet->image) }}" alt="">        
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</x-app-layout>