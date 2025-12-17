<div class="flex flex-col w-[85%] h-auto items-center justify-center">

    {{-- pagination button --}}
    <div class="w-full flex items-center justify-center z-10 shadow-md pb-5 px-4 rounded-xl">
        {{$totebags->links()}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20 mt-10 mb-10">
        @foreach ($totebags as $totebag)
            {{-- cards --}}
            <a id="" href="{{url("/detail/totebag/".$totebag->id)}}" class="group w-full flex flex-col items-center gap-1 rounded-3xl border border-transparent hover:scale-105 hover:border-gray-300 hover:z-10 hover:shadow-xl transition-all duration-500">
                <img src="{{asset("$totebag->image_url")}}" alt="product img" class="rounded-t-2xl object-cover transition-all duration-200">
                <div class="w-full flex flex-col items-start justify-center gap-1 mt-1 p-4">
                    <h3 class="font-lato text-2xl group-hover:text-red-300/80 transition-colors duration-200">{{$totebag->item_name}}</h3>
                    <p class="font-lato text-[16px]">Rp {{number_format($totebag->price, 0, ",", ".")}}</p>
                    <p class="font-lato text-[16px] text-black/50">Material {{$totebag->material}}</p>
                </div>
            </a>
        @endforeach                
    </div>

    {{-- pagination button --}}
    <div class="w-full flex items-center justify-center z-10 shadow-md pb-5 px-4 rounded-xl">
        {{$totebags->links()}}
    </div>
</div>