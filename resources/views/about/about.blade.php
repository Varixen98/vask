@extends('layout.layout')


@section('title', 'about us')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto">

        {{-- hero section --}}
        <div class="flex w-full h-[700px] gap-0 p-2 bg-center bg-cover" style="background-image: url({{asset('images/bg3.png')}})">
            <div class="w-1/2 flex flex-col p-5 justify-center items-center gap-2">
                <h2 class="font-roboto font-bold text-7xl">Why VÄSK?</h2>
                <p class="font-roboto w-[400px]">With VÄSK customer can design their perfect tote bag with their
                style combined with our top quality tote bag!
                </p>
            </div>
        </div>

        {{-- horizontal card 2 --}}
        <div class="flex w-full gap-0 p-2">
            <div class="w-1/2 flex flex-col p-5 justify-center items-center gap-2">
                <h3 class="font-roboto text-4xl text-black font-bold">
                    Quality
                </h3>

                <p class="font-roboto text-black justify-center w-[500px]">
                    We just keep getting better and better.
                    We thoroughly vet all of our Print Providers to ensure the absolute best for our customers.
                    We check for:
                </p>
                <ul class="font-roboto list-disc pl-8 w-[500px]">
                    <li>Product defects</li>
                    <li>Cancellation rates</li>
                    <li>Print quality</li>
                </ul>
                <p class="font-roboto w-[500px]">
                    If you are even 1% unsatisfied, we will 100% make sure it gets resolved. Visit our Quality Page to learn more about our standards.
                </p>
            </div>
            <img class="w-1/2" src="{{asset('images/qa.png')}}" alt="">
        </div>
    </main>
@endsection