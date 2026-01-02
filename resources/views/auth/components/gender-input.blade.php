<div class="w-[70%] flex flex-col gap-1">
    <label for="gender" class="w-full font-roboto text-xs">Gender</label>
    <div class="w-full flex items-center justify-center">


        <div class="w-full h-8 flex justify-center items-center rounded-md overflow-hidden">
            
            {{-- male radio button --}}
            <div class="w-1/2 flex">
                <input type="radio" name="gender" id="gender_male" value="Male" class="hidden peer" checked>
                <label for="gender_male" class="w-full bg-black text-white
                peer-checked:bg-gray-500/60  
                text-center font-roboto py-2 px-3.5 cursor-pointer 
                transition-all duration-500">Male</label>
            </div>
            
            {{-- female radio button --}}
            <div class="w-1/2 flex">
                <input type="radio" name="gender" id="gender_female" value="Female" class="hidden peer" checked>
                <label for="gender_female" class="w-full bg-black text-white outline-2
                peer-checked:bg-gray-500/60
                text-center font-roboto py-2 px-3.5 cursor-pointer 
                transition-all duration-500">Female</label>
            </div>
            
            
        </div>

    </div>
            
    @error('gender')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>