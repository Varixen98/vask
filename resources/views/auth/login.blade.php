@extends('layout.login-layout')


@section('title', 'sign in')

@section('content')
    <main class="w-full h-screen flex mx-auto p-0">
        <div class="w-1/2">
            <img class="w-full h-full object-cover" src="{{asset('images/model5.webp')}}" alt="model img">
        </div>
        <div class="w-1/2 flex flex-col gap-4 items-center justify-center">
            
            @include("auth.components.logo")

            {{-- form --}}
            @include("auth.components.form-login")

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