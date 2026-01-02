@extends('layout.layout')


@section('title', 'how it works')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-20">
        {{-- hero section --}}
        <div class="flex w-full h-[700px] gap-0 p-2 bg-center bg-cover" style="background-image: url({{asset('images/bg3.webp')}})">
            <div class="w-1/2 flex flex-col p-5 justify-center items-center gap-2">
                <h2 class="font-roboto font-bold text-7xl">How it works?</h2>
                <p class="font-roboto w-[400px]">Here is the flow for using this website
                </p>
            </div>
        </div>

        {{-- content section --}}
        @include("how.components.content-section")
        
    </main>
@endsection