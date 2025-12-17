@extends('layout.dashboard-layout')

@section("title", "Address Form")

@section('content')
    
    <div class="w-full flex flex-col gap-4 p-2 mx-auto">

        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Address Form</h3>
            <hr class="border border-black">
        </div>
        
        @include('profile.address.form.components.address-form')
    </div>
    
    @vite("resources/js/editForm.js")
@endsection