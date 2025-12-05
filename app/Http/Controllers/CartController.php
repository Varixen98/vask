<?php

namespace App\Http\Controllers;
use App\Models\Totebag;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //

    public function viewCart(){
        $cartItems = Cart::where('user_id', Auth::id())
                         ->with('totebag')
                         ->get();

        return view('cart.cart', ['cartItems' => $cartItems]);
    }

    public function store(Request $request){
       

        // 1. Validation
        $request->validate([
            'totebag_id' => 'required|exists:totebags,id',
        ]);

        // 2. Logic: Check for duplicate to update quantity instead of creating new row
        $existingItem = Cart::where('user_id', Auth::id())
                            ->where('totebag_id', $request->totebag_id)
                            ->first();

        if ($existingItem) {
            // Item exists? Add +1 to quantity
            $existingItem->increment('quantity');
        } else {
            // New item? Create it
            Cart::create([
                'user_id' => Auth::id(),
                'totebag_id' => $request->totebag_id,
                'quantity' => 1
            ]);
        }

        // 3. Redirect back to the Catalog (or to the Cart if you prefer)
        // Using 'back()' allows them to keep shopping.
        return back()->with('success', 'Item added to cart!');
    }
}