@extends('layout.layout')

@section('title', 'catalog')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-10">
        {{-- hero section --}}
        <div class="flex w-full h-[700px] gap-0 p-2 bg-center bg-cover" style="background-image: url({{asset('images/bg3.png')}})">
            <div class="w-1/2 flex flex-col p-5 justify-center items-center gap-2">
                <h2 class="font-roboto font-bold text-7xl">Catalog</h2>
                <p class="font-roboto w-[400px] text-center">Feel free the browse our tote bag collection!
                </p>
            </div>
        </div>

        <div class="w-full flex p-2">
            <div class="grid grid-cols-3 gap-10 w-full justify-center items-center">
                @foreach ($totebags as $totebag)
                    <div id="card-{{$totebag->id}}" class="w-[70%] h-fit flex flex-col gap-2 mx-auto rounded-md border-2 border-gray-300 hover:border-blue-500 shadow-2xl">
                        <img src="{{$totebag->image_url}}" alt="" class="w-full h-[200px]">
                        <div class="w-full flex flex-col items-center justify-center p-2 gap-2">
                            <h4 class="text-center font-roboto font-bold">{{$totebag->item_name}}</h4>
                            {{-- <p class="font-roboto text-xs w-[85%]">{{$totebag->description}}</p> --}}

                            <div class="w-full flex gap-2 p-1 justify-center items-center">
                                @foreach ($totebag->colors as $color)
                                    @if ($color->hex_code == '#FFFFFF')
                                        <div style="background-color: {{$color->hex_code}}" class="w-[24px] h-[24px] rounded-full border hover:border-black">
                                            <div class="hidden">
                                                test
                                            </div>
                                        </div> 
                                    @else

                                        <div style="background-color: {{$color->hex_code}}" class="w-[24px] h-[24px] rounded-full border border-transparent hover:border-black">
                                            <div class="hidden">
                                                test
                                            </div>
                                        </div>
                                    @endif
                                    
                                @endforeach
                            </div>
                            
                            <div class="w-full flex justify-center mx-auto">
                                <a href="#" class="font-roboto bg-black text-white hover:bg-neutral-800 p-1 w-[100px] text-center rounded-2xl text-xs">Learn more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection