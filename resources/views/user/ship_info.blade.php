<x-user-layout>
    {{--------------------- 
        $slot 
    --------------------}}
    
    <h3>Your Address</h3>
    @if ($address = auth()->user()->addresses()->first())
        <div class="details_card">
            <strong><b>Address</b>: </strong><span>{{ $address->address_line }}</span><br>
            <strong><b>City</b>: </strong><span>{{ $address->city }}</span><br>
            <strong><b>Postal Code</b>: </strong><span>{{ $address->postal_code }}</span><br>
            <strong><b>Country</b>: </strong><span>{{ $address->country }}</span><br>
        </div><br><br>
    @else
        <form action="{{ route('fake_addr') }}" method="post">
            @csrf
            <input type="submit" value="Generate Fake Address">
        </form>
    @endif

    <hr>    

    <h3>Payment Information</h3>
    @if ($payment = auth()->user()->payments()->first())
        <div class="details_card">
            <strong>Card Type: </strong><span>{{ $payment->card_type }}</span><br>
            <strong>Card Number: </strong><span>************{{ substr($payment->card_number, -4) }}</span><br>
        </div>
    @else
        <form action="{{ route('fake_pay') }}" method="post">
            @csrf
            <input type="submit" value="Generate Fake Payment Details">
        </form>
    @endif

    {{--------------------- 
        $slot 
    --------------------}}
</x-user-layout>
