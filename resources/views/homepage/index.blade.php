@extends('layout.layout')

@section('title', 'homepage')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-28">

        {{-- hero section --}}
        {{-- horizontal card --}}
        <div id="heroSection" class="w-full h-[900px] flex gap-0 p-28 bg-cover bg-center justify-end items-center" style="background-image: url({{asset('images/bg2.jpg')}})">
            <div id="container" class="w-[400px] h-fit flex flex-col p-3 justify-center items-center bg-black/50 rounded-2xl">
                <div id="heroTitle" class="flex items-center justify-center">
                    <h1 class="font-roboto font-bold text-3xl text-center text-white">START YOUR CREATION</h1>
                </div>
                <div id="heroBody" class="flex flex-col gap-4 p-2 text-center w-[75%]">
                    <p class="font-roboto text-[14px] text-white">Start design your own totebag!</p>
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
                
                    @foreach ($totebags as $totebag)
                        {{-- cards --}}
                        <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                            <div class="h-96 w-72">
                                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="{{$totebag->image_url}}" alt="img product" />
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                            <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                                <h1 class="font-dmserif text-3xl font-bold text-white">{{$totebag->item_name}}</h1>
                                <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">{{$totebag->description}}</p>
                                <a class="rounded-full bg-neutral-900 hover:bg-neutral-500/20 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60" href="{{'/catalog'}}#card-{{$totebag->id}}">See More</a>
                            </div>
                        </div>    
                    @endforeach
                    
                </div>
            </div>
        </div>



        {{-- collage section --}}
        <div class="flex flex-col items-center justify-center p-5 w-full">

            {{-- collage title --}}
            <div class="flex flex-col items-center p-5 gap-2 mb-6">
                <h3 class="font-poppins font-bold text-3xl text-center">Our Customer Favorites</h3>
                <p class="text-gray-600 text-center">Join VÄSK by ordering your own totebag!</p>
            </div>

            {{-- Collage Grid Wrapper --}}
            <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4 w-full max-w-6xl h-[600px] md:h-[500px]">

                {{-- 1. Large Hero Image (Left) --}}
                <div class="col-span-2 row-span-2 relative group overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model1.jpg')}}" alt="Customer Favorite 1">
                </div>

                {{-- 2. Standard Image (Top Middle) --}}
                <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model2.jpg')}}" alt="Customer Favorite 2">
                </div>

                {{-- 3. Standard Image (Top Right) --}}
                <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model3.jpg')}}" alt="Customer Favorite 3">
                </div>

                {{-- 4. Wide Image (Bottom Right) --}}
                <div class="col-span-2 row-span-1 relative group overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{asset('images/model4.jpg')}}" alt="Customer Favorite 4">
                </div>

            </div>
        </div>
    </main>



@endsection