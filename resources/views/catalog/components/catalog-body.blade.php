<div class="flex w-[85%] h-auto items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                
        @foreach ($totebags as $totebag)
            {{-- cards --}}
            <a href="#" class="group w-full flex flex-col items-center gap-1 group">
                <img src="{{$totebag->image_url}}" alt="product img" class="group-hover:scale-105">
                <div class="w-full flex flex-col items-start justify-center gap-1 mt-1">
                    <h3 class="font-lato text-2xl group-hover:text-red-300/80 transition-colors duration-200">{{$totebag->item_name}}</h3>
                    <p class="font-lato text-[16px]">Rp {{number_format($totebag->price, 0, ",", ".")}}</p>
                    <p class="font-lato text-[16px] text-black/50">Material {{$totebag->material}}</p>
                </div>
            </a>
        @endforeach                
    </div>
</div>