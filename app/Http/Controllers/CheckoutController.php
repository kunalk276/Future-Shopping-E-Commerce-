<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function showForm() 
    {
        /** @var \App\Models\User $user **/
        $user     = Auth::user();
        $userCart = $user->carts()->firstOrCreate(['status' => 'N']);

        if($userCart->products->isEmpty()) {
            return redirect('/');
        }

        $subTotal = $userCart->products->sum(function($product){
            return $product->price * $product->pivot->quantity;
        });

        // Random values
        $discount = rand(50, 150);
        $fees = rand(10, 50);
        $delivery = rand(20, 100);
        $total = $subTotal - $discount + $fees + $delivery;

        return view('checkout', [
            'user' => $user,
            'subTotal' => $subTotal,
            'discount' => $discount,
            'fees' => $fees,
            'delivery' => $delivery,
            'total' => $total
        ]);
    }

    public function createOrder(Request $request) 
    {
        $validated = $request->validate([
            'first_name'   => 'required|max:255',
            'last_name'    => 'required|max:255',
            'email'        => 'required|email|max:255',
            'address_line' => 'required|max:255',
            'city'         => 'required|max:255',
            'postal_code'  => 'required|numeric|digits:6',
            'country'      => 'required|max:255',
            'mobile'       => 'required|numeric|digits:10',
            'cod'          => 'required|boolean'
        ]);

        /** @var App\Models\User $user **/
        $user = Auth::user();
        $userCart = $user->carts()->firstWhere('status', 'N');

        if(!$userCart || $userCart->products->isEmpty()) {
            return redirect('/');
        }

        $subTotal = $userCart->products->sum(function($product) {
            return $product->price * $product->pivot->quantity;
        });

        // Use same logic for random fees, discount and delivery
        $discount = rand(50, 150);
        $fees = rand(10, 50);
        $delivery = rand(20, 100);
        $total = $subTotal - $discount + $fees + $delivery;

        $order = $user->orders()->create(array_merge(
            $request->except(['cod', '_token']), 
            [
                'status' => 'N', 
                'grand_total' => $total,
                'discount' => $discount,
                'fees' => $fees,
                'delivery' => $delivery
            ]
        ));

        foreach ($userCart->products as $product) {
            $order->products()->attach($product->id, [
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'discount' => 0
            ]);
        }

        $transaction = new Transaction();
        $transaction->mode = 'COD';
        $transaction->status = 'N';
        $order->transactions()->save($transaction);

        $userCart->status = 'C';
        $userCart->save();

        try {
            Mail::to($order->email)->send(new OrderShipped($order));
        } catch (\Exception $e) {
            
            dd($e);
        }

        return view('thanks');
    }
}
