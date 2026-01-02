{{-- horizontal card --}}
<div id="heroSection" class="w-full h-[900px] flex gap-0 p-36 bg-cover bg-center justify-end items-center" 
style="background-image: url({{asset('images/bg2.webp')}})">
    
    
    <div id="container" class="w-[400px] h-fit flex flex-col p-3 justify-center items-center bg-white border border-gray-300  rounded-2xl">
        <div id="heroTitle" class="flex items-center justify-center">
            <h1 class="font-roboto font-bold text-3xl text-center text-black">Start your creation</h1>
        </div>
        <div id="heroBody" class="flex flex-col gap-4 p-2 text-center w-[75%]">
            <p class="font-roboto text-[16px] text-black">Start design your own totebag!</p>
            <div class="h-fit flex mx-auto">
                <a href="{{url('/catalog')}}" class="font-roboto p-2 bg-black text-white text-[14px]
                    hover:bg-white hover:text-black border border-transparent hover:border-black transition-all duration-500">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</div>
