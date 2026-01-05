<footer class="flex items-center">
    <div class="w-full flex justify-end bg-black p-2">
        {{-- <div class="w-fit border-transparent border hover:border hover:border-white">
            <a class="w-fit" href="{{url('/catalog')}}"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                    stroke-width="1.5" stroke="currentColor" class="size-6 stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
        </div> --}}

        <form action="{{route("design.cart.add", $totebag->id)}}" method="POST" class="">
            @csrf
            <button id="addBtn" type="submit" class="w-44 gap-2 h-fit p-2 font-lato flex 
            items-center justify-center border border-black text-black bg-white hover:bg-black hover:border-white
            hover:text-white
            transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                Add to cart
            </button>
        </form>
    </div>
</footer>