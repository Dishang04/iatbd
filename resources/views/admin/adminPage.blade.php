{{-- <x-app-layout>
    <h1>Admin Pagina</h1> --}}
    {{-- <a href="{{ route('admin.deleteUser', ['user' => $userId]) }}">verwijder gebruiker account</a> --}}
{{-- </x-app-layout> --}}

<x-app-layout>
    <h1>All Users</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
            <form action="{{ route('admin.blockUser', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Block</button>
            </form>
        @endforeach
    </ul>
</x-app-layout>