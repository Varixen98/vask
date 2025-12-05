@extends('layout.layout')

@section("title", "Cart")

@section('content')
    <main class="mt-35 w-screen flex flex-col items-center justify-center mb-20">
        <div id="title" class="w-[85%] px-4">
            <h1 class="font-roboto font-bold text-3xl flex items-start mb-4">Your Shopping Cart</h1>
            <hr class="outline-1 border-gray-300 mb-8">

            @if($cartItems->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-xl">Your cart is currently empty.</p>
                    <a href="{{ url('/catalog') }}" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition">
                        Browse Catalog
                    </a>
                </div>
            @else
                <div class="w-full flex flex-col md:flex-row gap-8">
                    
                    <div class="w-full md:w-3/4 flex flex-col gap-6">
                        @foreach($cartItems as $item)
                            <div class="flex border rounded-xl overflow-hidden shadow-sm p-4 gap-6 items-center">
                                
                                {{-- 1. Totebag Image --}}
                                <div class="w-32 h-32 flex-shrink-0 bg-gray-100 rounded-lg p-2">
                                    <img src="{{ $item->totebag->image_url ?? asset('images/tote_model/' . $item->totebag->image) }}" 
                                         alt="{{ $item->totebag->item_name }}" 
                                         class="w-full h-full object-contain mix-blend-multiply">
                                </div>

                                {{-- 2. Totebag Detail --}}
                                <div class="flex-1">
                                    <h3 class="font-roboto font-bold text-xl mb-1">{{ $item->totebag->item_name }}</h3>
                                    <p class="text-sm text-gray-500 mb-4">{{ $item->totebag->description }}</p>

                                    <div class="flex items-center gap-6">
                                        {{-- Quantity --}}
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <span class="font-bold">Qty:</span> {{ $item->quantity }}
                                        </div>

                                        {{-- Price Calculation (IDR) --}}
                                        <div class="text-indigo-600 font-bold">
                                            Rp {{ number_format($item->totebag->price * $item->quantity, 0, ',', '.') }}
                                            <span class="text-xs text-gray-400 font-normal">
                                                (Rp {{ number_format($item->totebag->price, 0, ',', '.') }} each)
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. Remove Button --}}
                                {{-- <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 p-2 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form> --}}
                            </div>
                        @endforeach
                    </div>

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