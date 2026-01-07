<div class="flex flex-col items-center justify-center gap-3.5">
    <p class="font-lato">Available Colors</p>
    <div class="flex items-center justify-center gap-3.5">
        @foreach ($totebag->colors as $color)
            <button class="w-8 h-8 rounded-full border-2 border-gray-500/30 focus:border-black transition-all duration-500" style="background-color: {{$color->hex_code}}">
            </button>
        @endforeach   
    </div>
</div>  