<div class="w-[85%] mt-35 p-4 gap-4 grid grid-cols-2 items-center justify-center">
    <img src="{{asset("$totebag->image_url")}}" alt="img product" class="rounded-l-2xl">
    <div class="w-full flex flex-col items-start justify-center">

        {{-- card description --}}
        <h3 class="font-lato text-6xl font-bold mb-5 px-8">{{$totebag->item_name}}</h3>
        <p class="font-lato font-bold text-2xl px-8 mb-5">
            Rp {{number_format($totebag->price, 0,  ",", ".")}}
        </p>
        <p class="font-lato text-[16px] px-8 mb-5 text-gray-500">{{$totebag->description}}</p>
        
        {{-- color swatches --}}
        <div class="px-8 flex flex-col items-start justify-center gap-2">
            <p class="font-lato font-bold">Available Colors</p>

            @include("detail.components.color-swatches")
             
        </div>
        
        {{-- button to add cart & to studio --}}
        @include("detail.components.button")
    </div>
</div>