<header class="absolute top-0 mx-auto right-0 left-0 w-[85%] p-4 z-50">
    <nav id="navbarContainer" class="w-full mx-auto flex items-center justify-between py-4 px-6 rounded-xl border border-gray-300 bg-white shadow-2xl sticky">

        {{-- logo --}}
        <div id="logoContainer" class="flex items-center justify-center">
            <a href={{url('/')}}><img class="h-14" src="{{asset('images/lgBv4.jpg')}}" alt="logo vask"></a>
        </div>

        {{-- nav menu --}}
        <div id="menuContainer" class="flex items-center justify-center gap-5">
            <div class="p-2 hover:bg-neutral-400/20 rounded-sm">
                <a class="font-roboto text-md" href="{{url('/about')}}">About Us</a>
            </div>
            <div class="p-2 hover:bg-neutral-400/20 rounded-sm">
                <a class="font-roboto text-md" href="{{url('/catalog')}}">Catalog</a>
            </div>
            <div class="p-2 hover:bg-neutral-400/20 rounded-sm">   
                <a class="font-roboto text-md" href="{{url('/how')}}">How it works</a>
            </div>
            <div>
                <a href="{{url('/cart')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- profile --}}

        @auth
            <div id="profileContainer" class="flex items-center justify-between gap-5">
                {{-- link ke dashboard --}}
                <div id="userName">
                    <a href="{{url('/dashboard')}}" class="font-roboto font-semibold hover:font-bold hover:underline 
                    transition-all duration-300">Hi, {{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </div>
                <form action="{{route('logout.user')}}" method="POST">
                    @csrf
                    <button type="submit" class="font-roboto p-2 rounded-md hover:bg-neutral-500/20">Sign Out</button>
                </form>
            </div>
        @endauth

        @guest
            <div id="profileContainer" class="flex items-center justify-between gap-5">
                <div class="p-2 rounded-md hover:bg-neutral-500/20">
                    <a class="font-roboto" href="{{url('/login')}}">Sign In</a>
                </div>
                <div  class="bg-black p-2 rounded-md hover:bg-neutral-700">
                    <a class="text-white font-roboto" href="{{url('/register')}}">Sign Up</a>
                </div>
            </div>    
        @endguest
        
    </nav>
</header>