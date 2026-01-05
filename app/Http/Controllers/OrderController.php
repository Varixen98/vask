<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function viewOrderHistory(Request $request){
        // *** things to do
        $user = $request->user();

        // 1. Get orders belonging to this user
        // 2. 'with': Pre-load the items AND the product details (totebag) inside those items
        // 3. 'latest': Sort by newest first
        $orders = $user->orders()
                       ->with('items.totebag') 
                       ->latest()
                       ->get();

        return view('profile.order.index', compact('orders'));
    }
}
