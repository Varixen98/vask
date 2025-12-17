@extends('layout.layout')

@section("title", "Cart")

@section('content')
    <main class="mt-35 w-screen flex flex-col items-center justify-center mb-20">
        <div id="title" class="w-[85%] flex flex-col items-center justify-center px-4">
            <div class="w-[85%] flex flex-col items-center justify-center">
                <h1 class="w-full font-roboto font-bold text-3xl flex items-start mb-4">Your Shopping Cart</h1>
                <hr class="w-full border-black border mb-8">
            </div>
            

            @if($cartItems->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-xl">Your cart is currently empty.</p>
                    <a href="{{ url('/catalog') }}" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition">
                        Browse Catalog
                    </a>
                </div>
            @else
                <div class="w-full flex flex-col md:flex-row gap-8">
                    {{-- view all items --}}
                    @include("cart.components.cart-item")



                    {{-- view the summary of the cart --}}
                    @include("cart.components.summary-cart")
                    

                </div>
            @endif
        </div>
    </main>
@endsection