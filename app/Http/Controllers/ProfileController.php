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
        return view('profile.index', ['user' => $user]);
    }

    /**
     * 
     * 
     * function for edit profile
     */

    // view edit profile page
    public function viewEditProfileForm(Request $request){

        $user = $request->user();
    
        return view('profile.edit.index', compact('user'));
    }

    // menyimpan data edit profile
    public function storeEditProfile(Request $request){
        
        $user = $request->user();

        $new_data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'min:9'],
        ]);


        $user->update([
            'first_name' => $new_data['first_name'],
            'last_name' => $new_data['last_name'],
            'gender' => $new_data['gender'],
            'phone' => $new_data['phone']
        ]);
        
        return redirect('/dashboard')->with('success', 'successfully update your profile!');
    }

    /**
     * 
     * 
     * function for address
     */

    // view address edit page
    public function viewAddressForm(Request $request){

        $user = $request->user();

        $addresses = $user->addresses()->get();

        return view('profile.address.index', ['addresses' => $addresses]);
    }

    // view address addform
    public function viewAddressAddForm(){
        $provinces = Province::all();
        return view("profile.address.form.index", compact("provinces"));
    }

    // view address editform
    public function viewAddressEditForm(Request $request, $address_id){

        // populate provinces options
        $provinces = Province::all();

        $user = $request->user();

        $address = $user->addresses()->findOrFail($address_id);
        $cities = City::where('province_id', $address->province_id)->get();
        $districts = District::where('city_id', $address->city_id)->get();

        return view("profile.address.editForm.index", compact("address", "provinces", "cities", "districts"));
    }

    public function storeNewAddress(Request $request){

        $user = $request->user();
        
        if($user->addresses()->count() >= 5){
            return redirect("/dashboard/address")->with("Error", "maximum total address reached");
        }

        $newAddress = $request->validate([
            "province_id" => ["required", "exists:provinces,id"],
            "city_id" => ["required", "exists:cities,id"],
            'district_id' => ['required', 'exists:districts,id'],

            // street address
            'postal_code' => ['required', 'string', 'max:5'],
            'street_address' => ['required', 'string', 'max:255'],
        ]);

        $newAddress["is_default"] = false;
        
        $user->addresses()->create($newAddress);

        return redirect("/dashboard/address")->with("success", "successfully add new address!");
    }


    // delete user address
    public function destroyAddress(Request $request, $address_id){

        $address = $request->user()->addresses()->findOrFail($address_id);

        $address->delete();

        return redirect()->back()->with("success", "successfully delete an address");
    }


    // set default address
    public function setDefaultAddress(Request $request, $address_id){

        $user = $request->user();
    
        $address = $user->addresses()->findOrFail($address_id);

        $user->addresses()->where("is_default", 1)->update(['is_default' => 0]);    

        $address->is_default = 1;
        $address->save();

        return redirect()->back()->with("success", "updated default address");
    }
    

    /**
     * 
     * 
     * function for payment methods
     */

    public function viewPayment(Request $request){
        $user = $request->user();

        $payments = $user->payments()->get();
        return view('profile.payment/index', [
            'user' => $user,
            'payments' => $payments
        ]);
    }

    public function viewPaymentForm(){
        return view('profile.payment/form/index');
    }

    public function destroyPayment(Request $request, $id){

        $payment = $request->user()->payments()->findOrFail($id);

        $payment->delete();

        return redirect()->back()->with('success', 'delete a payment method');
    }

    public function setDefaultPayment(Request $request, $p_methodId){
        $user = $request->user();
    
        $p_method = $user->payments()->findOrFail($p_methodId);

        $user->payments()->where("is_default", 1)->update(['is_default' => 0]);    

        $p_method->is_default = 1;
        $p_method->save();

        return redirect()->back()->with("success", "updated default payment method");
    }

    // menyimpan payment method
    public function storePayment(Request $request){

        $user = $request->user();

        // jika user sudah punya 5 payment method
        if($user->payments()->count() >=5){
            return redirect()->route("index.payment.method")->with("Error", "maximum total payment method reached");
        }

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

    /**
     * 
     * 
     * function for delete acc
     */

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


    



   
}
