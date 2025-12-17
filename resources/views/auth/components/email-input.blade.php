<div class="w-[70%] flex flex-col gap-1">
    <label for="email" class="font-roboto text-xs">Email</label>
    <input type="email" name="email" id="email" autocomplete="off" class="p-1 z-1 border border-gray-300 rounded-md shadow-md">   
                    
    @error('email')
        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>