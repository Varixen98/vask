<?php

namespace App\Http\Controllers;
use App\Models\Totebag;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //

    public function viewCart(Request $request){
        $user = $request->user();

        $cartItems = Cart::where('user_id', $user->id)->with('totebag')->get();
        // $p_method = Payment::where("user_id", $user->id)->get();
        $p_method = $user->defaultPayment;

        $address = $user->defaultAddress;

        return view('cart.index', compact("cartItems", "p_method", "address"));
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


    public function storeDesign($id){
       

        // 1. Validation
        $totebag = Totebag::findOrFail($id);

        // check cart
        $cartItem = Cart::firstOrNew([
            "user_id" => Auth::id(),
            "totebag_id" => $totebag->id
        ]);

        $cartItem->quantity = ($cartItem->quantity ?? 0) + 1;
        
        $cartItem->save();

        return redirect()->route("index.cart")->with('success', 'Item added to cart!');
    }


    public function delete($id){

        $target =  Cart::where("id", $id)->where("user_id", Auth::id())->delete();

        if($target){
            return back()->with("success", "Item deleted from cart!");
        }
        
        return back()->with("error", "failed to delete data!");
    }

    public function checkout(Request $request){
        $user = $request->user();

        // 1. Get Cart Items
        $cartItems = Cart::where('user_id', $user->id)->with('totebag')->get();

        if($cartItems->isEmpty()){
            return back()->with('error', 'Your cart is empty!');
        }

        // 2. Get Defaults (Address & Payment)
        $address = $user->defaultAddress;
        $payment = $user->defaultPayment;

        if(!$address || !$payment){
            return back()->with('error', 'Please ensure you have a default address and payment method selected.');
        }

        // 3. Calculate Total
        $totalPrice = 0;
        foreach($cartItems as $item){
            $totalPrice += $item->totebag->price * $item->quantity;
        }

        // 4. Create the Order (The Receipt Header)
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'status' => 'Paid', 
            'payment_method' => $payment->card_number, // Or however you identify the card
            'shipping_address' => $address->street_address . ", " . $address->city->name,
        ]);

        // 5. Move Items to Order History
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'totebag_id' => $item->totebag_id,
                'quantity' => $item->quantity,
                'price' => $item->totebag->price, // Snapshot the price
            ]);
        }

        // 6. Empty the Cart
        Cart::where('user_id', $user->id)->delete();

        // 7. Redirect
        return redirect()->route('index.order.history')->with('success', 'Checkout successful!');
    }
}