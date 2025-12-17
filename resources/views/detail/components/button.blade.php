<div class="px-8 mt-5 gap-5 flex items-center justify-center">
    <form action="{{route("cart.add", $totebag->id)}}" method="POST" class="">
        @csrf
        <button type="submit" class="w-28 h-fit p-1 font-lato border border-black hover:bg-black hover:border-transparent hover:text-white transition-all duration-500">Add to cart</button>
    </form>

    <a href="{{route("view.studio", $totebag->id)}}" class="w-28 h-fit font-lato p-1 flex items-center 
        justify-center border border-transparent bg-black text-white
         hover:bg-white hover:text-black hover:border-black transition-all duration-500">Design</a>
</div>