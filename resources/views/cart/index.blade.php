@extends('layout.layout')

@section("title", "Cart")

@section('content')
    <main class="mt-35 w-screen flex flex-col items-center justify-center mb-20">
        <div id="title" class="w-[85%] px-4">
            <h1 class="font-roboto font-bold text-3xl flex items-start mb-4">Your Shopping Cart</h1>
            <hr class=" border-black border mb-8">

            @if($cartItems->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-xl">Your cart is currently empty.</p>
                    <a href="{{ url('/catalog') }}" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition">
                        Browse Catalog
                    </a>
                </div>
            @else
                <div class="w-full flex flex-col md:flex-row gap-8">
                    
                    @include("cart.components.cart-item")

                    

                    <div class="w-full md:w-1/4">
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 sticky top-10">
                            <h2 class="font-bold text-xl mb-4">Order Summary</h2>
                            
                            <div class="flex justify-between mb-2 text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($cartItems->sum(fn($i) => $i->totebag->price * $i->quantity), 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="flex justify-between mb-4 text-gray-600">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            
                            <hr class="border-gray-300 mb-4">
                            
                            <div class="flex flex-col justify-between text-xl font-bold mb-6">
                                <span>Total</span>
                                <span>Rp {{ number_format($cartItems->sum(fn($i) => $i->totebag->price * $i->quantity), 0, ',', '.') }}</span>
                            </div>

                            <button class="w-full bg-black text-white py-3 rounded-lg font-bold hover:bg-neutral-800 transition">
                                Checkout
                            </button>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </main>
@endsection