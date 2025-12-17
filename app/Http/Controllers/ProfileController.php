<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //view dashboard
    public function viewDashboard(){

        $user = Auth::user()->load('defaultAddress');
        return view('profile.dashboard', ['user' => $user]);
    }


    // view edit profile page
    public function viewEditForm(){

        $user = Auth::user()->load('defaultAddress');
        $provinces = Province::all();

        $address = $user->defaultAddress;

        $cities = $address ? (City::where('province_id', $address->province_id)->get()) : [];
        $districts = $address ? (District::where('city_id', $address->city_id)->get()): [];

        return view('profile.edit-profile', compact(
            'user', 'address', 'provinces', 'cities', 'districts'
        ));
    }

    // menyoimpan data edit profile
    public function storeEdit(Request $request){
        
        $user = $request->user();

        $new_data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'min:9'],

            // location id
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'district_id' => ['required', 'exists:districts,id'],

            // street address
            'postal_code' => ['required', 'string', 'max:5'],
            'street_address' => ['required', 'string', 'max:255']
        ]);


        $user->update([
            'first_name' => $new_data['first_name'],
            'last_name' => $new_data['last_name'],
            'gender' => $new_data['gender'],
            'phone' => $new_data['phone']
        ]);

        Address::updateOrCreate(
            [
                'user_id' => $user->id,
                'is_default' => true
            ],

            [
                'street_address' => $new_data['street_address'],
                'province_id' => $new_data['province_id'],
                'city_id' => $new_data['city_id'],
                'postal_code' => $new_data['postal_code'],
                'district_id' => $new_data['district_id'],

            ]
        );
        
        return redirect('/dashboard')->with('success', 'successfully update your profile!');
    }


    // view address edit page
    public function viewAddressForm(Request $request){

        $user = $request->user();

        $addresses = $user->addresses()->get();

        return view('profile.address.index', ['addresses' => $addresses]);
    }

    

    /**
     * 
     * 
     * function for payment methods
     */

    public function viewPayment(Request $request){
        $user = $request->user();

        $payments = $user->payments()->get();
        return view('profile.payment-profile', [
            'user' => $user,
            'payments' => $payments
        ]);
    }

    public function viewPaymentForm(){
        return view('profile.payment-form-profile');
    }

    public function destroyPayment(Request $request, $id){

        $payment = $request->user()->payments()->findOrFail($id);

        $payment->delete();

        return redirect()->back()->with('success', 'delete a payment method');
    }


    // view delete acc page
    public function viewDeleteForm(){

        return view('profile.delete.index');
    }

    // delete user
    public function destroyUser(Request $request){

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Account delete!');
    }


    // menyimpan payment method
    public function storePayment(Request $request){

        $request->merge([
            'card_number' => str_replace(' ', '', $request->input('card_number'))
        ]);

        $payment = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'card_number' => ['required', 'numeric', 'digits:16'],
            'cvv' => ['required', 'numeric', 'digits:3'],
            'expire_date' => ['required', 'string', 'size:7']
        ]);

        $request->user()->payments()->create($payment);

        return redirect()->route('index.payment.method')->with('success', 'payment method created!');
    }



   
}
