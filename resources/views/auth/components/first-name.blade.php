<div class="w-[70%] flex flex-col gap-1">
    <label for="first_name" class="font-roboto text-xs">First Name</label>
    <input type="text" name="first_name" id="first_name" autocomplete="off"  class="z-1 p-1 border border-gray-300 rounded-md shadow-md"> 

    @error('first_name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>