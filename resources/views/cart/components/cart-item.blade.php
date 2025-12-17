<div class="w-full md:w-3/4 flex flex-col gap-6">
    @foreach($cartItems as $item)
        <div class="flex border rounded-xl overflow-hidden shadow-sm p-4 gap-6 items-center">

            {{-- 1. Totebag Image --}}
            <div class="w-32 h-32 shrink-0 bg-gray-100 rounded-lg p-2">
                <img src="{{asset($item->totebag->image_url)}}" 
                    alt="{{ $item->totebag->item_name }}" class="w-full h-full object-contain mix-blend-multiply">
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
                    <div class="text-black font-bold">
                        Rp {{ number_format($item->totebag->price * $item->quantity, 0, ',', '.') }}
                        <span class="text-xs text-gray-400 font-normal">
                            (Rp {{ number_format($item->totebag->price, 0, ',', '.') }} each)
                        </span>
                    </div>
                </div>
            </div>

            {{-- 3. Remove Button --}}
            @include("cart.components.delete-button")
            
        </div>
    @endforeach
</div>