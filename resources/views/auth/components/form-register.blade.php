<form action="{{route("register.user.post")}}" method="POST" class="w-[80%] flex flex-col p-2 mx-auto gap-4 items-center justify-center">
    @csrf

    {{-- first name input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="first_name" class="font-roboto font-bold">First Name</label>
        <input type="text" name="first_name" id="first_name" autocomplete="off"  class="border border-gray-300 rounded-md"> 

        @error('first_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- last name input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="last_name" class="font-roboto font-bold">Last Name</label>
        <input type="text" name="last_name" id="last_name" autocomplete="off"  class="border border-gray-300 rounded-md">  
                    
        @error('last_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- gender input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="gender" class="w-full font-roboto font-bold">Gender</label>
        <div class="w-full flex gap-5 p-1 items-center justify-evenly">

            {{-- male radio input --}}
            <div class="w-fit h-8 flex gap-2 p-1 rounded-md justify-center items-center bg-black text-white hover:bg-neutral-800">
                <label for="gender_male" class="font-roboto font-bold">Male</label>
                <input type="radio" name="gender" id="gender_male" value="Male">
            </div>

            {{-- Female radio input --}}
            <div class="w-fit h-8 flex gap-2 p-1 rounded-md justify-center items-center bg-black text-white hover:bg-neutral-800">
                <label for="gender_female" class="font-roboto font-bold">Female</label>
                <input type="radio" name="gender" id="gender_female" value="Female">
            </div>
        </div>
            
        @error('gender')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- email input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="email" class="font-roboto font-bold">Email</label>
        <input type="email" name="email" id="email" autocomplete="off" class="border border-gray-300 rounded-md">   
                    
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
                
    {{-- password input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="password" class="font-roboto font-bold">Password</label>
        <input type="password" name="password" id="password" autocomplete="off"  class="border border-gray-300 rounded-md">
                    
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- confirm password input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="password_confirmation" class="font-roboto font-bold">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off"  class="border border-gray-300 rounded-md">    
                
        @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
                
    
    {{-- submit button --}}
    <div class="w-[70%] flex flex-col">
        <button type="submit" class="font-roboto font-bold p-1 text-white bg-black hover:bg-neutral-800">Register</button>
    </div>
</form>