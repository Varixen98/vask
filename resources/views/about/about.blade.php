@extends('layout.layout')


@section('title', 'about us')

@section('content')
    <main class="flex items-center justify-center flex-col w-full h-auto mx-auto">

        {{-- hero section --}}
        <div class="flex items-center justify-center w-full h-[700px] gap-0 p-2 bg-center bg-cover" style="background-image: url({{asset('images/bg3.webp')}})">
            <div class="w-[85%] grid grid-cols-2 items-center justify-center">

                {{-- hero description --}}
                <div class=" w-[440px] h-[340px] flex flex-col border border-black p-2 justify-center items-center gap-2 mx-auto">
                    <h2 class="font-roboto font-bold text-7xl">WHY VÄSK?</h2>
                    <p class="font-roboto w-[400px]">With VÄSK customer can design their perfect tote bag with their
                    style combined with our top quality tote bag!
                    </p>
                </div>
            </div>
            
        </div>

        {{-- horizontal card 2 --}}
        @include("about.components.quality-card")
        
        @include("about.components.umwelt-card")

        @include("about.components.creator-card")
    </main>
@endsection