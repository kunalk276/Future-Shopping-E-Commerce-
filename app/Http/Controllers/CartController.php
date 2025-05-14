<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     */
    public function index(Request $req)
    {
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $cart = $user->carts()->firstOrCreate(['status' => 'N']); // N = New or Pending cart

            $products = $cart->products->map(function ($product) {
                $product->quantity = $product->pivot->quantity;
                return $product;
            });
        } else {
            // For guest users, retrieve cart from cookies
            $cartData = json_decode($req->cookie('products'), true);
            $products = Product::findMany(array_keys($cartData ?? []));

            $products = $products->map(function ($product) use ($cartData) {
                $product->quantity = $cartData[$product->id];
                return $product;
            });
        }

        return view('cart', [
            'products' => $products
        ]);
    }

    /**
     * Add a product to the cart.
     */
    public function store(Request $request, Product $product)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cart = $user->carts()->firstOrCreate(['status' => 'N']);

        if (!$cart->products->contains($product)) {
            $cart->products()->attach($product->id, ['quantity' => 1, 'discount' => 0]);
        }

        return back();
    }

    /**
     * Update the quantity of a product in the cart.
     */
    public function update(Request $request, Product $product, $quantity)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cart = $user->carts()->firstOrCreate(['status' => 'N']);

        if ($cart->products->contains($product)) {
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $quantity
            ]);
        }

        return back();
    }

    /**
     * Remove a product from the cart.
     */
    public function destroy(Product $product)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cart = $user->carts()->firstOrCreate(['status' => 'N']);

        if ($cart->products->contains($product)) {
            $cart->products()->detach($product->id);
        }

        return back();
    }
}
