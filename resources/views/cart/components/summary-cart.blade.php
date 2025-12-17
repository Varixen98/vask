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