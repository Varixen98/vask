@extends('layout.layout')


@section('title', 'how it works')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-20">
        {{-- hero section --}}
        <div class="flex w-full h-[700px] gap-0 p-2 bg-center bg-cover" style="background-image: url({{asset('images/bg3.png')}})">
            <div class="w-1/2 flex flex-col p-5 justify-center items-center gap-2">
                <h2 class="font-roboto font-bold text-7xl">How it works?</h2>
                <p class="font-roboto w-[400px]">Here is the flow for using this website
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 w-[85%] p-4 mx-auto gap-5">
            <div class="flex flex-col gap-2 p-2 shadow-md border border-gray-300 rounded-xl">
                <img class="rounded-t-md" src="{{asset('images/Select.png')}}" alt="select img">
                <h4 class="font-roboto text-2xl font-semibold text-center">1.Pick the desired tote bag!</h4>
            </div>
            <div class="flex flex-col gap-2 p-2 shadow-md border border-gray-300 rounded-xl">
                <img class="rounded-t-md" src="{{asset('images/step2.jpg')}}" alt="step2 img">
                <h4 class="font-roboto text-2xl font-semibold text-center">2.Design your tote bag!</h4>
            </div>
            <div class="flex flex-col gap-2 p-2 shadow-md border border-gray-300 rounded-xl">
                <img class="rounded-t-md" src="{{asset('images/pay.jpg')}}" alt="">
                <h4 class="font-roboto text-2xl font-semibold text-center">3.Confirm your design!</h4>
            </div>
            <div  class="flex flex-col gap-2 p-2 shadow-md border border-gray-300 rounded-xl">
                <img class="rounded-t-md" src="{{asset('images/pay.jpg')}}" alt="">
                <h4 class="font-roboto text-2xl font-semibold text-center">4.Make the order and pay!</h4>
            </div>
        </div>

    </main>
@endsection