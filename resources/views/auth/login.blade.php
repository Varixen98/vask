@extends('layout.login-layout')


@section('title', 'sign in')

@section('content')
    <main class="w-full h-screen flex mx-auto p-0">
        <div class="w-1/2">
            <img class="w-full h-full object-cover" src="{{asset('images/model5.png')}}" alt="model img">
        </div>
        <div class="w-1/2 flex flex-col gap-4 items-center justify-center">
            <div class="w-full mx-auto p-2">
                <a class="flex items-center justify-center" href={{url('/')}}>
                    <img class="h-24" src="{{asset('images/lgBv4.jpg')}}" alt="">
                </a>
            </div>
            <form action="{{route('login.user')}}" method="POST" class="w-[80%] flex flex-col p-2 mx-auto gap-4 items-center justify-center">
                @csrf

                {{-- email input --}}
                <div class="w-[70%] flex flex-col gap-1">
                    <label for="email" class="font-roboto font-bold">Email</label>
                    <input type="email" name="email" id="email" class="p-1 border border-gray-300 rounded-md">   
                    
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- password input --}}
                <div class="w-[70%] flex flex-col gap-1">
                    <label for="password" class="font-roboto font-bold">Password</label>
                    <input type="password" name="password" id="password" class="p-1 border border-gray-300 rounded-md"> 
                    
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- forgot password --}}
                <div class="w-[70%] flex justify-end">
                    <a href="#" class="flex font-roboto underline">Forgot password?</a>
                </div>

                {{-- submit button --}}
                <div class="w-[70%] flex flex-col gap-2">
                    <button type="submit" class="border border-black font-roboto font-bold p-1 text-xs">Sign In</button>
                    <a class="border border-black font-roboto font-bold p-1 text-center text-xs" href="{{url('/register')}}">Register</a>
                </div>
            </form>

            {{-- login dengan google --}}
            <div class="w-[80%] flex flex-col justify-center items-center p-2 gap-4 mx-auto">
                {{-- title login google --}}
                <div class="w-[70%] flex flex-col items-start gap-1">
                    <h3 class="font-roboto text-md">LOG IN WITH</h3>
                    <p class="font-roboto text-xs">By logging in with my social login, I agree to link my account as per the Privacy Policy</p>
                </div>
                
                {{-- link auth lewat google --}}
                {{-- belum disetup --}}
                <a href="/auth/google/redirect" class="text-xs w-[70%] flex font-roboto font-bold justify-center items-center gap-2 border border-black p-1">
                    <img src="{{asset('images/Glogo.svg')}}" alt="Google G Logo">
                    CONTINUE WITH GOOGLE
                </a>
            </div>
        </div>
    </main>
@endsection