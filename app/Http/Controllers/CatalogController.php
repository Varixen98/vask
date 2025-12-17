<?php

namespace App\Http\Controllers;

use App\Models\Totebag;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //

    public function viewCatalog(){

        // viw semua totebag record gak optimize
        // $totebags = Totebag::all()->load('colors');

        // mau pake cara paginate
        $totebags = Totebag::with('colors')->paginate(15);

        // return view('catalog.catalog', ['totebags' => $totebags]);
        return view("catalog.index", compact("totebags"));
    }

    public function viewDetail(Request $request){
        $totebag = Totebag::find($request->id);

        return view('detail.index', compact('totebag'));
    }
}
