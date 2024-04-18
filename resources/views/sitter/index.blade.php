<x-app-layout>
    <h1 class="myPetsHeader">Uw huisdieroppas verzoeken</h1>

    <section class="reactionContainer">
        @if ($sitterRequests->isEmpty())
            <p>Geen huisdier oppasverzoeken gevonden.</p>
        @else
            <ul class="reactionList">
                @foreach ($sitterRequests as $request)
                    <li class="reactionItem">
                        Verzoek voor huisdier: {{ $request->pet->name }} - Status: {{ ucfirst($request->status) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</x-app-layout>