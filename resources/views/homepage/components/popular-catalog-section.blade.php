<div class="flex flex-col items-center gap-5 p-5 w-full">

    {{-- sub heading --}}
    <div class="w-full flex flex-col items-center p-5 gap-2">
        <h3 class="font-roboto font-bold text-3xl">Browse Our Favorites</h3>
        <p class="font-roboto">Beautifully Functional. Purposefully Designed. Consciously Crafted.</p>
        <div class="w-[250px] flex items-center justify-center ">
            <a href="{{url("/catalog")}}" class="p-2 mt-2 bg-black text-white border border-transparent
             hover:bg-white hover:text-black hover:border-black transition-all duration-200 font-roboto">SHOP OUR PRODUCTS</a>
        </div>
    </div>

    {{-- container --}}
    <div class="flex w-full h-auto items-center justify-center">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
                
            @foreach ($totebags as $totebag)
                {{-- cards --}}
                <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                    <div class="h-96 w-72">
                        <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="{{$totebag->image_url}}" alt="img product" />
                    </div>
                    <div class="absolute inset-0 bg-linear-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                    <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                        <h1 class="font-dmserif text-3xl font-bold text-white">{{$totebag->item_name}}</h1>
                        <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">{{$totebag->description}}</p>
                        <a class="rounded-full bg-neutral-900 hover:bg-neutral-500/20 py-2 px-3.5 font-com text-sm 
                        capitalize text-white shadow shadow-black/60" href="{{url('/catalog')}}">See More</a>
                    </div>
                </div>    
            @endforeach
                    
        </div>
    </div>
</div>