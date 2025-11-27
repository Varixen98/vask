<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;

class LocationController extends Controller
{
    //
    public function getCities(Request $request){

        $province_id = $request->validate([
            'province_id' => ['required', 'exists:provinces,id']
        ]);
        $cities = City::where('province_id', $province_id['province_id'])->get();

        return response()->json($cities);
    }

    public function getDistricts(Request $request){

        $city_id = $request->validate([
            'city_id' => ['required', 'exists:cities,id']
        ]);

        $districts = District::where('city_id', $city_id['city_id'])->get();

        return response()->json($districts);
    }

}
