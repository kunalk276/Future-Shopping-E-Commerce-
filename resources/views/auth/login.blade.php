<x-auth-layout>
    {{-- Slot Content --}}
    
    {{-- Display session message (e.g., login error) --}}
    @if(session('status'))
        <p style="color:red">{{ session("status") }}</p>
    @endif

    {{-- Login Form --}}
    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        
        {{-- Email Field --}}
        <label for="email">Email</label><br>
        <input class="fill_data" type="email" name="email" id="email" required><br><br>

        {{-- Password Field --}}
        <label for="password">Password</label><br>
        <input class="fill_data" type="password" name="password" id="password" required><br><br>

        {{-- Remember Me Checkbox --}}
        <input type="checkbox" id="rem" name="remember">
        <label for="rem">Remember me</label><br><br>

        {{-- Form Actions --}}
        <div>
            <div class="submit">
                <a href="{{ route('register') }}">Create an account</a>
                <input type="submit" value="LOG IN">
            </div>
        </div>
    </form>

    {{-- Slot Content --}}
</x-auth-layout>
