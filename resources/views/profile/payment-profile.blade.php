@extends('layout.dashboard-layout')

@section('title', 'Payment Profile')

@section('content')

    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Payment Methods</h3>
            <p class="font-roboto font-light text-xs">You can only store up to 5 payment methods.</p>
        </div>
        <hr class="border border-gray-300">
        <div class="w-full flex flex-col gap-4">
           @foreach ($payments as $payment)
                <div class="w-full flex">
                    <div class="w-3/4 flex flex-col">
                        <div class="flex gap-2">
                            <span class="font-roboto font-bold">Cardholder</span>
                            <p>{{$payment->full_name}}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="font-roboto font-bold">Card Number</span>
                            <p>**** **** **** {{$payment->last_four}}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="font-roboto font-bold">Expire Date</span>
                            <p>{{$payment->expire_date}}</p>
                        </div>
                    </div>
                    <form action="{{route('destroy.payment.method', $payment->id)}}" method="POST" class="w-1/4 flex justify-end items-start">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                            size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>    
                        </button>
                    </form>
                </div>
                <hr class="border border-gray-300">
                
           @endforeach
        </div>
        <div class='w-full flex items-center justify-center mx-auto'>
            <a href="{{url('/dashboard/payment/form')}}" class="font-roboto text-center text-white bg-black hover:bg-neutral-800/95 transition-all duration-500 w-1/4 p-1">Add payment method</a>
        </div>
        
    </div>

@endsection