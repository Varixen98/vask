<div class="w-[70%] flex flex-col gap-1">
    <label for="password_confirmation" class="font-roboto text-xs">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" class="p-1 z-1 border border-gray-300 rounded-md shadow-md">    
                
    @error('password_confirmation')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>