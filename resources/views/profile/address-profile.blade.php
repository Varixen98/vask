@extends('layout.dashboard-layout')

@section('title', 'Delete Profile')

@section('content')

    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Address</h3>
            <p class="font-roboto text-xs font-light">You can only save up to 5 addresses.</p>
        </div>
        <hr class="border border-gray-300">
        <div class="w-full flex flex-col gap-4">
           @forelse ($addresses as $address)
                @if ($address->is_default)
                    <div class="w-full flex">
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full">
                                <p>{{$address->province->name}}</p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                <p>{{$address->street_address}}</p>
                            </div>
                            <div class="flex gap-1">
                                <div class="w-[18%]">
                                    <a href="#" class="font-roboto text-center hover:font-bold hover:underline">Edit Address</a>
                                </div>
                                <p>|</p>
                                <div class="flex items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                    class="size-6 stroke-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <p class="font-roboto text-center">The current address</p>
                                </div>
                            </div>    
                        </div>
                        <form action="#" method="POST" class="w-1/4 flex justify-end items-start">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                                size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </form>
                    </div>

                @else
                    <div class="w-full flex">
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full">
                                <p>{{$address->province->name}}</p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                <p>{{$address->street_address}}</p>
                            </div>
                            <div class="flex gap-1">
                                <div class="w-[18%]">
                                    <a href="#" class="font-roboto text-center hover:font-bold hover:underline">Edit Address</a>
                                </div>
                                <p>|</p>
                                <form action="" method="POST" class="flex items-center ">
                                    @csrf
                                    @method('PUT')
                                    
                                    <button type="submit" class="font-roboto text-center hover:underline">Set as default address</button>
                                </form>
                            </div>   
                        </div>
                        <form action="#" method="POST" class="w-1/4 flex justify-end items-start">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                                size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </form>
                    </div>    
                @endif

           @empty
                <div class="w-full flex flex-col">
                    <p>There is no record yet!</p>
                    <button class="flex bg-black font-bold font-roboto p-1 w-[200px] text-white text-center justify-center">Add Address</button>
                </div>
               
           @endforelse
        </div>
        <div class="w-full flex justify-center items-center">
            <a href="#" class="font-roboto font-bold text-center text-white bg-black hover:bg-neutral-800 rounded-md w-1/4 p-1">Add another address</a>
        </div>
        
    </div>

@endsection