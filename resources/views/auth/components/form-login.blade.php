<form action="{{route('login.user.post')}}" method="POST" class="w-[80%] flex flex-col p-2 mx-auto gap-4 items-center justify-center">
    @csrf

    {{-- email input --}}
    @include("auth.components.email-input")
                
    {{-- password input --}}
    @include("auth.components.password-input")

    {{-- forgot password --}}
    <div class="w-[70%] flex justify-end">
        <a href="#" class="flex text-gray-500/60 hover:text-black transition-all duration-500 font-roboto text-xs underline">Forgot password?</a>
    </div>

    {{-- submit button --}}
    <div class="w-[70%] flex flex-col gap-2">
        <button type="submit" class="border border-black bg-black text-white hover:bg-neutral-800 font-roboto font-bold p-1 text-xs">Sign In</button>
        <a class="border border-black font-roboto font-bold p-1 text-center text-xs" href="{{url('/register')}}">Register</a>
    </div>
</form>