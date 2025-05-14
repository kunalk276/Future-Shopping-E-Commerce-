<x-auth-layout>
    {{-- Slot Content --}}
    
    @if(session('status'))
    <h2 style="color:rgb(32, 221, 32)">{{session("status")}}</h2>
    @endif
     
    <p class="m-0">
        Before getting started, please verify your email address by clicking on the link we just sent you. If you didn’t receive the email, we will send another one.
    </p>
    <p>Check your inbox <strong>{{ auth()->user()->email }}</strong></p>
        
    <div class="flex_align_center">
        {{-- Resend verification email --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <input type="submit" value="RESEND">
        </form>
        
        {{-- Logout --}}
        <form method="POST" id="logout" action="{{ route('logout') }}">
            @csrf
            <a href="#" onclick="logout.submit()">Log Out</a>
        </form>
    </div>

    {{-- Slot Content --}}
</x-auth-layout>
