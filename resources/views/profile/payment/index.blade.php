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
        
        @if($payments->isNotEmpty() && count($payments) < 5)
            <div class='w-full flex items-center justify-center mx-auto'>
                <a href="{{url('/dashboard/payment/form')}}" class="w-1/4 font-roboto text-center p-1 bg-black text-white border border-transparent hover:bg-white hover:text-black hover:border-black transition-all duration-500">Add payment method</a>
            </div>
        @endif

        @if($payments->isNotEmpty() && count($payments) >= 5)
            <div class='w-full flex items-center justify-center mx-auto'>
                <p class=" w-fit font-roboto text-center p-1 bg-red-500 text-white">Limit reached (5/5). Delete a card to add another.</a>
            </div>
        @endif
        
    </div>

@endsection