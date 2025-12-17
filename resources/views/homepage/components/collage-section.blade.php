<div class="flex flex-col items-center justify-center p-5 w-full">

    {{-- collage title --}}
    <div class="flex flex-col items-center p-5 gap-2 mb-6">
        <h3 class="font-poppins font-bold text-3xl text-center">Our Customer Favorites</h3>
        <p class="text-gray-600 text-center">Join VÄSK by ordering your own totebag!</p>
    </div>

    {{-- Collage Grid Wrapper --}}
    <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4 w-full max-w-6xl h-[600px] md:h-[500px]">

        {{-- 1. Large Hero Image (Left) --}}
        <div class="col-span-2 row-span-2 relative group overflow-hidden rounded-2xl">
            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model1.jpg')}}" alt="Customer Favorite 1">
        </div>

        {{-- 2. Standard Image (Top Middle) --}}
        <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-2xl">
            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model2.jpg')}}" alt="Customer Favorite 2">
        </div>

        {{-- 3. Standard Image (Top Right) --}}
        <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-2xl">
            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model3.jpg')}}" alt="Customer Favorite 3">
        </div>

        {{-- 4. Wide Image (Bottom Right) --}}
        <div class="col-span-2 row-span-1 relative group overflow-hidden rounded-2xl">
            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model4.jpg')}}" alt="Customer Favorite 4">
        </div>

    </div>
</div>