<div class="px-8 mt-5 gap-5 flex items-center justify-center">
    <form action="{{route("store.wishlist", $totebag->id)}}" method="POST">
        @csrf
        <button class="gap-2 w-44 h-fit font-lato p-2 flex items-center 
        justify-center border border-black bg-white text-black
         hover:bg-pink-600 hover:text-white hover:border-transparent transition-all duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>

            Add to wishlist
        </button>
    </form>
</div>