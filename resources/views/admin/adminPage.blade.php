<x-app-layout>
    <h1 class="myPetsHeader">Overzicht gebruikers</h1>
    
    <form class="searchbarWrapper" action="{{ route('admin.searchUsers') }}" method="GET">
        <input class="searchbar" type="text" name="search" placeholder="Zoek gebruiker">
        <button class="searchbarButton" type="submit">Zoek</button>
    </form>

    <h2 class="usersHeader">Actieve Gebruikers:</h2> 
    <ul>
        @foreach ($users as $user)
            <li class="userItem">
                <span class="userItemName">{{ $user->name }}</span>
                <form action="{{ route('admin.blockUser', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="userButton userBlockButton bg-red-600" type="submit">Blokkeren</button>
                </form>
            </li>
            <hr class="userItemSplit">
        @endforeach
    </ul>

    <h2 class="usersHeader">Geblokkeerde Gebruikers:</h2>
    <ul>
        @foreach ($blockedUsers as $blockedUser)
            <li class="userItem">
                <span class="userItemName">{{ $blockedUser->name }}</span>
                <form action="{{ route('admin.unblockUser', $blockedUser) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="userButton userUnblockButton bg-green-600" type="submit">Deblokkeren</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>