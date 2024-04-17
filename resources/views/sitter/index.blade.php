<x-app-layout>
    <h1 class="myPetsHeader">Uw huisdieroppas verzoeken</h1>

    <div class="py-12">
        @if ($sitterRequests->isEmpty())
            <p>Geen huisdier oppasverzoeken gevonden.</p>
        @else
            <ul>
                @foreach ($sitterRequests as $request)
                    <li>
                        Verzoek voor huisdier: {{ $request->pet->name }} - Status: {{ ucfirst($request->status) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>