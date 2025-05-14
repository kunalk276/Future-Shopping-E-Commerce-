<x-user-layout>
    {{--------------------- 
        $slot 
    --------------------}}
    <h1>Profile</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input class="logout cta" type="submit" value="Logout">
    </form>
    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>
