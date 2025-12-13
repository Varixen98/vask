<form action="{{route('login.user.post')}}" method="POST" class="w-[80%] flex flex-col p-2 mx-auto gap-4 items-center justify-center">
    @csrf

    {{-- email input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="email" class="font-roboto font-bold">Email</label>
        <input type="email" name="email" id="email" autocomplete="off" class="p-1 border border-gray-300 rounded-md">   
                    
        @error('email')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>
                
    {{-- password input --}}
    <div class="w-[70%] flex flex-col gap-1">
        <label for="password" class="font-roboto font-bold">Password</label>
        <input type="password" name="password" id="password" autocomplete="off"  class="p-1 border border-gray-300 rounded-md"> 
                    
        @error('password')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
    </div>
                
    {{-- forgot password --}}
    <div class="w-[70%] flex justify-end">
        <a href="#" class="flex font-roboto underline">Forgot password?</a>
    </div>

    {{-- submit button --}}
    <div class="w-[70%] flex flex-col gap-2">
        <button type="submit" class="border border-black bg-black text-white hover:bg-neutral-800 font-roboto font-bold p-1 text-xs">Sign In</button>
        <a class="border border-black font-roboto font-bold p-1 text-center text-xs" href="{{url('/register')}}">Register</a>
    </div>
</form>