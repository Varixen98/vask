<div class="flex flex-col w-full h-auto items-center justify-center">

    @if($wishlists->count() > 0)
        {{-- pagination button --}}
        <div class="w-full flex items-center justify-center z-10 shadow-md pb-5 px-4 rounded-xl">
            {{$wishlists->links()}}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20 mt-10 mb-10">
            @foreach ($wishlists as $item)

                @php
                    $totebag = $item->totebag
                @endphp
                {{-- cards --}}
                <div class="group w-full flex flex-col items-center gap-1 rounded-3xl border border-transparent hover:scale-105 hover:border-gray-300 hover:z-10 hover:shadow-xl transition-all duration-500">
                    <a href="{{url("/detail/totebag/".$totebag->id)}}">
                        <img src="{{asset("$totebag->image_url")}}" alt="product img" class="rounded-t-2xl object-cover transition-all duration-200">
                    </a>
                    
                    <div class="w-full flex flex-col items-start justify-center gap-1 mt-1 p-4">
                        <h3 class="font-lato text-2xl group-hover:text-red-300/80 transition-colors duration-200">{{$totebag->item_name}}</h3>
                        <p class="font-lato text-[16px]">Rp {{number_format($totebag->price, 0, ",", ".")}}</p>

                        <div class="w-full flex items-center justify-between">
                            <p class="font-lato text-[16px] text-black/50">Material {{$totebag->material}}</p>

                            <form action="{{route("destroy.wishlist", $totebag->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                                        size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>    
                                </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            @endforeach                
        </div>

        {{-- pagination button --}}
        <div class="w-full flex items-center justify-center z-10 shadow-md pb-5 px-4 rounded-xl">
            {{$wishlists->links()}}
        </div>
    @else
        <div class="font-roboto text-gray-500 mt-10">
           <p>You haven't had any wishlist yet!</p> 
        </div>
    @endif
</div>