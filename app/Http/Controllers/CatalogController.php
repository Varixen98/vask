<?php

namespace App\Http\Controllers;

use App\Models\Totebag;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //

    public function viewCatalog(){

        $totebags = Totebag::all()->load('colors');

        return view('catalog.catalog', ['totebags' => $totebags]);
    }

    public function viewDetail(Request $request){
        $totebag = Totebag::find($request->id)->first();

        return view('catalog.index', ['totebag' => $totebag]);
    }
}
