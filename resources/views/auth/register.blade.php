@extends('layout.login-layout')

@section('title', 'register')

@section('content')
    <main class="w-full min-h-screen flex mx-auto p-0">
        <div class="w-1/2">
            <img class="w-full h-full object-cover" src="{{asset('images/gen1.png')}}" alt="model img">
        </div>
        <div class="w-1/2 flex flex-col gap-4 items-center justify-center">
            @include("auth.components.logo")

            {{-- form --}}
            @include("auth.components.form-register")
           
        </div>
    </main>
@endsection