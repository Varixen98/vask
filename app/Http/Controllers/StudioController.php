<?php

namespace App\Http\Controllers;

use App\Models\Totebag;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    //
    public function viewStudio(Request $request){

        $totebag = Totebag::find($request->id);

        return view('studio.studio', ['totebag' => $totebag]);
    }

}
