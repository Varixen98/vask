@extends('layout.dashboard-layout')

@section('title', 'Order History')

@section('content')

    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Order History</h3>
        </div>
        <hr class="border border-gray-300">
        
        @include('profile.order.components.body')
        
    </div>

@endsection