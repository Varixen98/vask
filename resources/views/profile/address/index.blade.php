@extends('layout.dashboard-layout')

@section('title', 'Delete Profile')

@section('content')
    @include("profile.address.components.modal-mask")

    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        {{-- Header Section --}}
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Address</h3>
            <p class="font-roboto text-xs font-light">You can only save up to 5 addresses.</p>
        </div>
        
        <hr class="border border-gray-300">
        
        {{-- Address List --}}
        <div class="w-full flex flex-col gap-4">
            {{-- SORTING FIX: sortByDesc ensures 'is_default' (true) appears first --}}
            @forelse ($addresses->sortByDesc('is_default') as $address)
                
                @if ($address->is_default)
                    {{-- DEFAULT ADDRESS LAYOUT --}}
                    <div class="w-full flex">
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full">
                                <p>{{$address->province->name}}</p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                <p>{{$address->postal_code}} , {{$address->street_address}}</p>
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
                        
                        {{-- Delete Button --}}
                        <div class="w-1/4 flex justify-end items-start">
                            <button id="delBtn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                                size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </div>
                    </div>

                @else
                    {{-- NON-DEFAULT ADDRESS LAYOUT --}}
                    <div class="w-full flex">
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full">
                                <p>{{$address->province->name}}</p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                {{-- BUG FIX: Added postal_code here to match the default layout --}}
                                <p>{{$address->postal_code}} , {{$address->street_address}}</p>
                            </div>
                            <div class="flex gap-1">
                                <div class="w-[18%]">
                                    <a href="#" class="font-roboto text-center hover:font-bold hover:underline">Edit Address</a>
                                </div>
                                <p>|</p>
                                {{-- Set Default Button --}}
                                <form action="" method="POST" class="flex items-center ">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-roboto text-center hover:underline">Set as default address</button>
                                </form>
                            </div>   
                        </div>
                        
                        {{-- Delete Button --}}
                        <div class="w-1/4 flex justify-end items-start">
                            <button id="delBtn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                                size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </div>
                    </div>  
                @endif

            @empty
                {{-- Empty State --}}
                <div class="w-full flex flex-col items-center gap-2 py-4">
                    <p class="text-gray-500">There is no record yet!</p>
                    <button class="flex bg-black font-bold font-roboto p-2 w-[200px] text-white text-center justify-center rounded hover:bg-neutral-800 transition-colors">
                        Add Address
                    </button>
                </div>
            @endforelse
        </div>

        {{-- UX FIX: Only show this bottom button if there ARE addresses (prevents double buttons) --}}
        @if($addresses->isNotEmpty())
            <div class="w-full flex justify-center items-center mt-4">
                <a href="#" class="font-roboto text-center text-white bg-black hover:bg-neutral-800/95 transition-all duration-500 w-1/4 p-1">Add Another Address</a>
            </div>
        @endif
    </div>


     @vite('resources/js/modal.js')
@endsection