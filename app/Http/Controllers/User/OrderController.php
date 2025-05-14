<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $status_array = [
        "N" => ['PENDING', 'blue'],
        "C" => ['CANCELLED', 'red'],
        "D" => ['DELIVERED', 'limegreen'],
        "P" => ['PAID', 'limegreen']
    ];
    
    private $transaction_mode = [
        "COD" => "Cash on Delivery"
    ];

    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        return view('user.orders', [
            'orders' => auth()->user()->orders,
            'status' => $this->status_array
        ]);
    }

    /**
     * Display the specified order details.
     */
    public function show(Order $order)
    {
        abort_if($this->checkOrder($order), 404);

        return view('user.view-order', [
            'order'  => $order,
            'status' => $this->status_array,
            'mode'   => $this->transaction_mode
        ]);
    }

    /**
     * Cancel the order if it's still pending.
     */
    public function update(Request $request, Order $order)
    {
        abort_if($this->checkOrder($order) || $order->status !== 'N', 404);

        $order->status = 'C'; // Mark as Cancelled
        $order->save();
        
        return back();
    }

    /**
     * Ensure the order belongs to the authenticated user.
     */
    private function checkOrder(Order $order)
    {
        /** @var \App\Models\User $user */ 
        $user = Auth::user();
        return !$user->is($order->user);
    }
}
