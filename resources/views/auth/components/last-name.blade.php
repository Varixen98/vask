<div class="w-[70%] flex flex-col gap-1">
    <label for="last_name" class="font-roboto text-xs">Last Name</label>
    <input type="text" name="last_name" id="last_name" autocomplete="off"  class="p-1 z-1 border border-gray-300 rounded-md shadow-md">  
                    
    @error('last_name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>