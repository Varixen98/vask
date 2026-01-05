<div class="w-full md:w-1/4 font-roboto">
    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 sticky top-10">
        <h2 class="font-bold font-roboto text-xl mb-4">Order Summary</h2>
                            
        <div class="flex justify-between mb-2 text-gray-600 font-roboto">
            <span>Subtotal</span>
            <span>Rp {{ number_format($cartItems->sum(fn($i) => $i->totebag->price * $i->quantity), 0, ',', '.') }}</span>
        </div>
                            
        <div class="flex justify-between mb-4 text-gray-600 font-roboto">
            <span>Shipping</span>
            <span>Free</span>
        </div>           
        <hr class="border-gray-300 mb-4">
                            
        <div class="flex flex-col justify-between text-xl font-bold font-roboto mb-4">
            <span>Total</span>
            <span>Rp {{ number_format($cartItems->sum(fn($i) => $i->totebag->price * $i->quantity), 0, ',', '.') }}</span>
        </div>
        <hr class="border-gray-300 mb-4">


        @if($address != null)
            <div class="flex flex-col justify-between text-md mb-6 font-roboto">
                <span class="font-bold">Shipment Address</span>
                <span class="text-black/50">{{$address->province->name}}</span>
                <span class="text-black/50">{{$address->city->name}}</span>
                <span class="text-black/50">{{$address->district->name}}</span>
                <span class="text-black/50">{{$address->postal_code}} {{$address->street_address}}</span>
            </div>
            <div class="flex flex-col justify-between text-md font-roboto mb-6">
                <span>Change shipment address</span>
                <a href="{{url('/dashboard/address')}}" class="hover:underline duration-300 text-black/50">click here</a>
            </div>
        @else
            <div class="flex flex-col justify-between text-md font-roboto mb-6">
                <span class="font-bold">Add shipment address</span>
                <a href="{{url('/dashboard/address')}}" class="hover:underline duration-300 text-black/50">click here</a>
            </div>
        @endif
        
        <hr class="border-gray-300 mb-4">

        @if($p_method != null)
            <div class="flex flex-col justify-between text-md mb-6 font-roboto">
                <span class="font-bold">Payment Method</span>
                <span class="text-black/50">Credit Card</span>
                <span class="text-black/50">{{$p_method->full_name}}</span>
                <span class="text-black/50">**** **** **** {{$p_method->last_four}}</span>
                <span class="text-black/50">Expire date {{$p_method->expire_date}}</span>
            </div>
            <div class="flex flex-col justify-between text-md font-roboto mb-6">
                <span>Change payment method</span>
                <a href="{{url('/dashboard/payment')}}" class="hover:underline duration-300 text-black/50">click here</a>
            </div>
        @else
            <div class="flex flex-col justify-between text-md font-roboto mb-6">
                <span class="font-bold">Add payment method</span>
                <a href="{{url('/dashboard/payment')}}" class="hover:underline duration-300 text-black/50">click here</a>
            </div>
        @endif
    

        <form action="{{route("store.checkout")}}" method="POST">
            @csrf
            @if($address && $p_method)
                <button type="submit" class="w-full text-xl bg-black text-white p-2 border border-transparent hover:bg-white hover:text-black hover:border-black transition-all duration-500">
                    Checkout
                </button>
            @else
                <button type="submit" disabled class="w-full text-xl bg-black text-white p-2 border border-transparent">
                    Checkout
                </button>
                {{-- HELPFUL MESSAGE --}}
                <p class="text-red-500 text-sm text-center mt-2">
                    @if(!$address)
                        * Please set a default address
                    @elseif(!$p_method)
                        * Please select a payment method
                    @endif
                </p>
            @endif
        </form>
       
    </div>
</div>