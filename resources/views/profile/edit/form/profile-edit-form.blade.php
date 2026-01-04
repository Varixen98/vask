<form action="{{route('update.user')}}" method="POST" class="p-2 gap-4 w-full flex flex-col justify-center items-center text-start">
    @csrf
    @method('PUT')

    {{-- first name --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2 font-roboto text-[16px]" for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('first_name', $user->first_name)}}">
    </div>

    {{-- last name --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2 font-roboto text-[16px]" for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('last_name', $user->last_name)}}">
    </div>

    {{-- gender --}}
    <div class="w-[85%] flex gap-20">
        <label for="gender" class="w-full font-roboto text-[16px]">Gender</label>
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

    {{-- phone number --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2 font-roboto text-[16px]" for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('phone', $user->phone)}}">
    </div>
            
    <div class="flex justify-start items-center gap-20 w-[85%]">
        <button type="submit" class="w-[30%] p-1 bg-black text-white border border-transparent hover:bg-white hover:text-black hover:border-black transition-all duration-500 font-roboto">Save Profile</button>
    </div>
</form>