<div class="w-[70%] flex flex-col gap-1">
    <label for="password" class="font-roboto text-xs">Password</label>
    <input type="password" name="password" id="password" autocomplete="off" class="p-1 z-1 border border-gray-300 rounded-md shadow-md"> 
                    
    @error('password')
        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
    @enderror
</div>