<div class="w-full p-4 font-roboto">
    @foreach($orders as $order)
        <div class="border border-gray-300 rounded-lg p-4 mb-6 shadow-sm">
            
            {{-- Header: Order ID and Status --}}
            <div class="flex justify-between border-b pb-2 mb-4">
                <div>
                    <span class="font-bold text-lg">Order #{{ $order->id }}</span>
                    <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-bold">
                        {{ $order->status }}
                    </span>
                </div>
            </div>

            {{-- Body: The Items --}}
            <div class="flex flex-col gap-4">
                @foreach($order->items as $item)
                    <div class="flex items-center gap-4">
                        {{-- Image from Totebag Model --}}
                        <img src="{{ asset($item->totebag->image_url) }}" class="w-20 h-20 object-cover rounded-md">
                        
                        <div>
                            <h4 class="font-bold">{{ $item->totebag->item_name }}</h4>
                            <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                            <p class="text-gray-600">Price: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Footer: Total Price --}}
            <div class="mt-4 pt-4 border-t flex justify-end">
                <p class="text-xl font-bold">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>
            
        </div>
    @endforeach

    @if($orders->isEmpty())
        <p class="text-center text-gray-500 mt-10">You haven't placed any orders yet.</p>
    @endif
</div>