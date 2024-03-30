<x-app-layout>
    <h1>Admin Pagina</h1>
    {{-- <a href="{{ route('admin.deleteUser', ['user' => $userId]) }}">verwijder gebruiker account</a> --}}
</x-app-layout>

{{-- <x-app-layout>
    <h1>Admin Pagina</h1>
    @foreach ($users as $user)
        <div>
            <p>{{ $user->name }}</p>
            <form method="POST" action="{{ route('admin.deleteUser', ['user' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder gebruiker account</button>
            </form>
        </div>
    @endforeach
</x-app-layout> --}}

{{-- <x-app-layout>
    <h1>Admin Pagina</h1>
    @foreach ($users as $user)
        <div>
            <p>{{ $user->name }}</p>
            <form method="POST" action="{{ route('admin.deleteUser', ['user' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder gebruiker account</button>
            </form>
        </div>
    @endforeach
</x-app-layout> --}}