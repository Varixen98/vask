@extends('layout.layout')

@section('title', 'catalog')

@section('content')
    <main class="flex flex-col w-full items-center justify-center h-auto mx-auto gap-10">
        
        {{-- slider section --}}
        <div id="catalog-section" class="flex flex-col gap-4 items-center justify-center w-full mx-auto mt-35 p-4">
            <div id="slides-container" class="flex flex-col w-[85%] gap-4 p-4 items-center justify-center">


                {{-- ide slider nanti dulu --}}
                {{-- <div id="slides-inner" class="flex w-full relative overflow-visible">
                    <div id="slide" class="bg-red-500 text-9xl font-bold font-roboto w-full">1</div>
                    <div id="slide" class="bg-sky-500 text-9xl font-bold font-robot w-full">2</div>
                    <div id="slide" class="bg-amber-500 text-9xl font-bold font-robot w-full">3</div>
                    <div id="slide" class="bg-emerald-500 text-9xl font-bold font-robot w-full">4</div>
                    <div id="slide" class="bg-neutral-500 text-9xl font-bold font-robot w-full">5</div>
                    <div id="slide" class="bg-pink-500 text-9xl font-bold font-robot w-full">6</div>
                    <div id="slide" class="bg-red-500 text-9xl font-bold font-robot w-full">7</div>
                    <div id="slide" class="bg-yellow-500 text-9xl font-bold font-robot w-full">8</div>
                    <div id="slide" class="bg-blue-500 text-9xl font-bold font-robot w-full">9</div>
                </div> --}}

                @foreach ($totebags as $totebag)
                    {{-- slider card --}}

                    <div id="card" class="border w-full h-fit grid grid-cols-2 rounded-4xl">
                        <img class="w-full rounded-l-4xl" src="{{$totebag->image_url}}" alt="tote img">

                        <div class="flex flex-col items-start justify-center gap-2 p-2 ">
                            <h3 class="font-roboto font-bold ">{{$totebag->item_name}}</h3>
                            <p class="font-roboto font-light">{{$totebag->description}}</p>
                            <div>
                                @foreach ($totebag->colors as $color)
                                    <button id="tote-{{$totebag->id}}-color-{{$color->id}}" class="w-8 h-8 rounded-4xl hover: focus:outline-2
                                        focus:outline-offset-2 focus:outline-black active:bg-black" 
                                        style="background-color: {{$color->hex_code}}">
                                    </button>
                                @endforeach
                            </div>
                            

                            {{-- button to design --}}
                            <div class="w-full h-fit flex gap-4">
                                <button class="font-roboto font-bold w-24 h-9 bg-neutral-500/80 hover:bg-neutral-500 text-white rounded-md">To Cart</button>
                                <a href="{{url("/studio")}}" class="flex items-center justify-center font-roboto font-bold w-24 h-9 bg-black hover:bg-neutral-800/80 text-white rounded-md">Design</a>
                            </div>
                        </div>
                    </div>    
                @endforeach
                

                
            </div>

        </div>
    </main>
@endsection