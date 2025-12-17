@extends('layout.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    
    <div class="w-full flex flex-col p-2 mx-auto">
        <div>
            <h4 class="font-roboto font-bold text-xl">Profile Summary</h4>
        </div>
        <hr class="border border-gray-300">
        <div class="w-full flex p-2 gap-4">
            <div class="flex flex-col">
                <span class="font-roboto font-semibold">Email Address</span>
                {{$user->email}}
            </div>
        </div>
        <hr class="border border-gray-300">
        <div class="w-full grid grid-cols-2 p-2 gap-4">
            <div class="flex flex-col">
                <span class="font-roboto font-semibold">First Name</span>
                {{$user->first_name}}
            </div>
            <div class="flex flex-col">
                <span class="font-roboto font-semibold">Last Name</span>
                {{$user->last_name}}
            </div>
            <div class="flex flex-col">
                <span class="font-roboto font-semibold">Gender</span>
                {{$user->gender}}
            </div>
            <div class="flex flex-col">
                <span class="font-roboto font-semibold">Phone</span>
                {{$user->phone ? $user->phone : "Have not input"}}
            </div>

            <div class="flex flex-col">
                <span class="font-roboto font-semibold">Full Address</span>
                @if ($user->defaultAddress)
                    {{$user->defaultAddress->province->name}}
                    <br>
                    {{$user->defaultAddress->city->name}}
                    <br>
                    {{$user->defaultAddress->district->name}},
                    {{$user->defaultAddress->postal_code}}
                    <br>
                    {{$user->defaultAddress->street_address}}
                @else
                    Have not input
                @endif
            </div>
        </div>
    </div>

@endsection