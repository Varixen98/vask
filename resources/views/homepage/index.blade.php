@extends('layout.layout')

@section('title', 'homepage')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-28">

        {{-- hero section --}}
        {{-- horizontal card --}}
        <div id="heroSection" class="w-full h-[900px] flex gap-0 p-2 bg-cover bg-center justify-end" style="background-image: url({{asset('images/bg2.jpg')}})">
            <div id="container" class="w-1/2 h-auto flex flex-col p-2 justify-center items-center">
                <div id="heroTitle" class="flex">
                    <h1 class="font-roboto font-bold text-5xl">START YOUR CREATION</h1>
                </div>
                <div id="heroBody" class="flex flex-col gap-4 p-2 text-center w-[75%]">
                    <p class="font-roboto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                        Eveniet eaque molestiae, possimus libero praesentium reprehenderit blanditiis 
                        porro dolores nemo sit dolore minus totam laboriosam! 
                        Quam quos ipsum repudiandae labore debitis.</p>
                    <div class="h-fit flex mx-auto">
                        <a href="{{url('/catalog')}}" class="font-roboto font-semibold border-2 border-transparent p-3 bg-black rounded-full text-white text-xl
                        hover:bg-white hover:text-black hover:border-black">
                            GET STARTED
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- nanti pake database pake foreach --}}
        {{-- catalog section --}}
        <div class="flex flex-col items-center gap-5 p-5 w-full">

            <div class="flex flex-col items-center p-5 gap-2">
                <h3 class="font-roboto font-bold text-3xl">Browse Our Variation</h3>
                <p class="font-roboto">Beautifully Functional. Purposefully Designed. Consciously Crafted.</p>
            </div>

            {{-- section2 container --}}
            <div class="flex w-full h-auto items-center justify-center">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

                    {{-- cards --}}
                    <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                        <div class="h-96 w-72">
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                        <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="font-dmserif text-3xl font-bold text-white">Beauty</h1>
                            <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore adipisci placeat.</p>
                            <button class="rounded-full bg-neutral-900 hover:bg-neutral-900/20 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60">See More</button>
                        </div>
                    </div>

                    {{-- cards --}}
                    <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                        <div class="h-96 w-72">
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                        <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="font-dmserif text-3xl font-bold text-white">Beauty</h1>
                            <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore adipisci placeat.</p>
                            <button class="rounded-full bg-neutral-900 hover:bg-neutral-900/20 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60">See More</button>
                        </div>
                    </div>

                    {{-- cards --}}
                    <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                        <div class="h-96 w-72">
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                        <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="font-dmserif text-3xl font-bold text-white">Beauty</h1>
                            <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore adipisci placeat.</p>
                            <button class="rounded-full bg-neutral-900 hover:bg-neutral-900/20 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60">See More</button>
                        </div>
                    </div>

                    {{-- cards --}}
                    <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                        <div class="h-96 w-72">
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                        <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="font-dmserif text-3xl font-bold text-white">Beauty</h1>
                            <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore adipisci placeat.</p>
                            <button class="rounded-full bg-neutral-900 hover:bg-neutral-900/20 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60">See More</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>



        {{-- collage section --}}
        <div class="flex flex-col items-center justify-center p-5 w-full">

            {{-- collage title --}}
            <div class="flex flex-col items-center p-5 gap-2">
                <h3 class="font-poppins font-bold text-3xl">Our Customer favorite</h3>
                <p>Join VASK by ordering your own totebag!</p>
            </div>
            <div>
                ini nanti dulu
            </div>
        </div>
    </main>



@endsection