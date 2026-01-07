@extends('layout.layout')


@section('title', 'how it works')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-20">
        {{-- hero section --}}
        <div class="flex w-full h-[700px] gap-0 p-2 bg-center justify-center bg-cover" style="background-image: url({{asset('images/bg3.webp')}})">
            <div class="w-[85%] grid grid-cols-2 items-center justify-center">

                {{-- hero description --}}
                <div class="w-[440px] h-[340px] flex flex-col border border-black p-2 text-center justify-center items-center gap-2 mx-auto">
                    <h2 class="font-roboto font-bold text-5xl">HOW IT WORKS?</h2>
                    <p class="font-roboto w-[400px]">Here is the flow for using this website.
                    </p>
                </div>
            </div>
        </div>

        {{-- content section --}}
        @include("how.components.content-section")
        
    </main>
@endsection