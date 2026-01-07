<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlishController extends Controller
{
    //
    public function viewWishlist(Request $request){

        $user = $request->user();

        $wishlists = $user->wishlists()->with("totebag")->paginate(6);

        return view("profile.wishlist.index", compact("wishlists"));
    }

    public function storeWishlist(Request $request, $totebag_id){

        $user = $request->user();

        // check if the totebag is already on wishlist or not
        $totebag = $user->wishlists()->where("totebag_id", $totebag_id)->exists();

        if($totebag){
            return back()->with("failed", "totebag is already on wishlist!");
        }

        $wishlist = Wishlist::create([
            "user_id" => $user->id,
            "totebag_id" => $totebag_id
        ]);

        $wishlist->save();

        return back()->with("success", "added totebag to wishlist");
    }
    
    public function destroyWishlist(Request $request, $totebag_id){
        $user = $request->user();

        $wishlist = $user->wishlists()->where("totebag_id", $totebag_id)->first();

        $wishlist->delete();

        return back()->with("success", "successfully delete a wishlist");
    }
}
