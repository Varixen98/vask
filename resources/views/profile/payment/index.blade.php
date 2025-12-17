@extends('layout.dashboard-layout')

@section('title', 'Payment Profile')

@section('content')

    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Payment Methods</h3>
            <p class="font-roboto font-light text-xs">You can only store up to 5 payment methods.</p>
        </div>
        <hr class="border border-gray-300">
        
        {{-- card payment list --}}
        @include("profile.payment.components.card-payment")

        <div class='w-full flex items-center justify-center mx-auto'>
            <a href="{{url('/dashboard/payment/form')}}" class="font-roboto text-center text-white bg-black hover:bg-neutral-800/95 transition-all duration-500 w-1/4 p-1">Add payment method</a>
        </div>
        
    </div>

@endsection