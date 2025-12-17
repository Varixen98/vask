<form action="{{route("register.user.post")}}" method="POST" class="w-[80%] flex flex-col p-2 mx-auto gap-4 items-center justify-center">
    @csrf

    {{-- first name input --}}
    @include("auth.components.first-name")
    

    {{-- last name input --}}
    @include("auth.components.last-name")

    {{-- gender input --}}
    @include("auth.components.gender-input")
    

    {{-- email input --}}
    @include("auth.components.email-input")
  
                
    {{-- password input --}}
    @include("auth.components.password-input")


    {{-- confirm password input --}}
    @include("auth.components.confirm-password")
                
    
    {{-- submit button --}}
    <div class="w-[70%] flex flex-col mt-2">
        <button type="submit" class="font-roboto p-1 text-white bg-black hover:bg-neutral-800 cursor-pointer">Register</button>
    </div>
</form>