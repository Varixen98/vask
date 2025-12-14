<div class="flex items-center justify-center gap-3.5">
    @foreach ($totebag->colors as $color)
        <button class="w-10 h-10 rounded-full border-2 border-transparent focus:border-black transition-all duration-500" style="background-color: {{$color->hex_code}}">
        </button>
    @endforeach    
</div>   