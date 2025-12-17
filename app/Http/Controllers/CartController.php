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

        return view('cart.index', ['cartItems' => $cartItems]);
    }

    public function store($id){
       

        // 1. Validation
        $totebag = Totebag::findOrFail($id);

        // check cart
        $cartItem = Cart::firstOrNew([
            "user_id" => Auth::id(),
            "totebag_id" => $totebag->id
        ]);

        $cartItem->quantity = ($cartItem->quantity ?? 0) + 1;
        
        $cartItem->save();

        return back()->with('success', 'Item added to cart!');
    }


    public function delete($id){

        $target =  Cart::where("id", $id)->where("user_id", Auth::id())->delete();

        if($target){
            return back()->with("success", "Item deleted from cart!");
        }
        
        return back()->with("error", "failed to delete data!");
    }
}