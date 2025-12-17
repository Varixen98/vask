<?php

namespace App\Http\Controllers;

use App\Models\Totebag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function viewHomepage(){

        // ini untuk ngambil semua data
        // $totebags = Totebag::all();


        // ini untuk ngambil beberapa data
        // $totebags = Totebag::take(4)->get();
        $totebags = Totebag::inRandomOrder()->limit(4)->get();

        return view('homepage.index', ['totebags' => $totebags]);
    }
}
