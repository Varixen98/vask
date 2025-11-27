<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    //
    // view login form
    public function viewLoginForm(){
        return view('auth.login');
    }


    // view register form
    public function viewRegisterForm(){
        return view('auth.register');
    }


    public function storeRegisterUser(Request $request){

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed'] //confirmed buat ngecheck langsung
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']) // jangan lupa hashing
        ]);

        Auth::login($user);

        return redirect()->route('homepage')->with('success', 'Successfully registered!');
    }

    public function login(Request $request){

        $credential = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'] //confirmed buat ngecheck langsung
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->route('homepage')->with('success', 'Successfully login!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }


    public function logout(Request $request){
        // 1. Log the user out
        Auth::logout();

        // 2. Invalidate the session to prevent session hijacking
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token for security
        $request->session()->regenerateToken();

        // 4. Redirect to the homepage
        return redirect()->route('homepage');
    }
}
