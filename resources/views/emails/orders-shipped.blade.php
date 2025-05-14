@component('mail::message')
# Your order is on the way.
# ![delivery van]({{ asset('img/van.jpg') }})

## Hi {{ ucfirst($order->first_name) }},
We believe you’ll be happy to know that your order is on its way.  
[Click here]({{ route('user.orders.index') }}) to track your order(s).

@component('mail::panel')
## Your package will be shipped to:
{{ $order->address_line }}  
{{ $order->postal_code.", ".$order->city }}  
{{ $order->country }}
@endcomponent

Your items will be delivered by the Future Transport Company.  
Your electronic signature will be required to receive the order.

<br><br>
## **Order Summary**
___
Subtotal: ₹{{ $order->grand_total }}  
Shipping: ₹{{ $extra = $order->grand_total < 10 ? 5 : 0 }}

**Total Delivery Cost:** &nbsp;&nbsp;&nbsp;&nbsp; **₹{{ $order->grand_total + $extra }}**
___

Track your order at [Shopping of the Future]({{ route('home') }}),  
or click the button below.


@component('mail::button', ['url' => route('user.orders.index') ])
Track your order
@endcomponent

Thank you,  
**{{ config('app.name') }}.in**
@endcomponent
