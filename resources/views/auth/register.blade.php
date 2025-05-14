<x-auth-layout>
    {{-- Slot Content --}}
    
    {{-- Display Validation Errors --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    {{-- Registration Form --}}
    <form action="{{ route('register') }}" method="POST" autocomplete="off">
        @csrf

        {{-- First Name Field --}}
        <label for="first_name">First Name</label><br>
        <input class="fill_data" type="text" name="first_name" id="first_name" required><br><br>

        {{-- Last Name Field --}}
        <label for="last_name">Last Name</label><br>
        <input class="fill_data" type="text" name="last_name" id="last_name" required><br><br>

        {{-- Email Field --}}
        <label for="email">Email</label><br>
        <input class="fill_data" type="email" name="email" id="email" required><br><br>

        {{-- Password Field --}}
        <label for="password">Password</label><br>
        <input class="fill_data" type="password" name="password" id="password" required><br><br>

        {{-- Confirm Password Field --}}
        <label for="password_confirmation">Confirm Password</label><br>
        <input class="fill_data" type="password" name="password_confirmation" id="password_confirmation" required><br><br>

        {{-- Form Actions --}}
        <div>
            <div class="submit">
                <a href="{{ route('login') }}">Already registered?</a>
                <input type="submit" value="REGISTER">
            </div>
        </div>
    </form>

    {{-- Slot Content --}}
</x-auth-layout>
