@extends('layout.dashboard-layout')

@section('title', 'Delete Profile')

@section('content')


    <div class="w-full flex flex-col gap-4 p-2 mx-auto">
        {{-- Header Section --}}
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Address</h3>
            <p class="font-roboto text-xs text-gray-500/80 mt-2">You can only save up to 5 addresses.</p>
        </div>
        
        <hr class="border border-gray-300">
        
        <div class="w-full flex flex-col gap-4">
            {{-- This sorts the list so Default (true) comes first, then False follows. All are shown. --}}
            @forelse ($addresses->sortByDesc('is_default') as $address)
                
                @if ($address->is_default)
                    {{-- === LAYOUT FOR DEFAULT ADDRESS === --}}
                    <div class="w-full flex p-2"> {{-- Optional: Added distinct background --}}
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full">
                                <p class="font-bold">{{$address->province->name}} <span class="text-xs font-normal text-green-700 bg-green-100 px-1 rounded ml-2">Default</span></p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                <p>{{$address->postal_code}}, {{$address->street_address}}</p>
                            </div>
                            <div class="flex gap-1 mt-2">
                                <div class="w-[18%]">
                                    <a href="{{route("update.address", $address->id)}}" class="font-roboto text-center text-sm text-gray-600 hover:text-black hover:underline">Edit Address</a>
                                </div>
                                <p class="text-gray-400">|</p>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 stroke-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <p class="font-roboto text-sm text-green-700">The current address</p>
                                </div>
                            </div>    
                        </div>
                        
                        {{-- Delete Button (Default) --}}
                        <form action="{{ route('destroy.address', $address->id) }}" method="POST" class="w-1/4 flex justify-end items-start">
                            @csrf
                            @method('DELETE')
                            <button id="delBtn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400 hover:text-red-500 transition-colors">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </form>

                        
                    </div>
                    <hr class="w-full border border-gray-300">
                @else
                    {{-- === LAYOUT FOR OTHER ADDRESSES === --}}
                    <div class="w-full flex p-2 border-b border-gray-100 last:border-0">
                        <div class="w-3/4 flex flex-col">
                            <div class="flex flex-col w-full text-gray-700">
                                <p class="font-bold">{{$address->province->name}}</p>
                                <p>{{$address->city->name}}</p>
                                <p>{{$address->district->name}}</p>
                                <p>{{$address->postal_code}}, {{$address->street_address}}</p>
                            </div>
                            <div class="flex gap-1 mt-2">
                                <div class="w-[18%]">
                                    <a href="{{route("update.address", $address->id)}}" class="font-roboto text-center text-sm text-gray-600 hover:text-black hover:underline">Edit Address</a>
                                </div>
                                <p class="text-gray-400">|</p>
                                
                                {{-- Set Default Button --}}
                                <form action="{{route("update.default.address", $address->id)}}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-roboto text-sm text-gray-500 hover:text-black hover:underline">Set as default address</button>
                                </form>
                            </div>   
                        </div>
                        
                        {{-- Delete Button Non-Default --}}
                        <form action="{{ route('destroy.address', $address->id) }}" method="POST" class="w-1/4 flex justify-end items-start">
                            @csrf
                            @method('DELETE')
                            <button id="delBtn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400 hover:text-red-500 transition-colors">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>    
                            </button>
                        </form>
                    </div>
                    <hr class="w-full border border-gray-300">
                @endif

            @empty
                {{-- Empty State --}}
                <div class="w-full flex flex-col items-center gap-2 py-8 bg-gray-50 rounded">
                    <p class="text-gray-500">There is no record yet!</p>
                    <a href="{{ url('/dashboard/address/addform') }}" class="flex font-roboto py-2 px-6 text-center justify-center p-1 bg-black text-white border border-transparent hover:bg-white hover:text-black hover:border-black transition-all duration-500">
                        Add Address
                    </a>
                </div>
            @endforelse
        </div>

        @if($addresses->isNotEmpty() && count($addresses) < 5)
            <div class="w-full flex justify-center items-center mt-4">
                <a href="{{ route('add.address') }}" class="font-roboto text-center p-1 bg-black text-white border border-transparent hover:bg-white hover:text-black hover:border-black transition-all duration-500 w-1/4 py-2">Add Another Address</a>
            </div>
        @endif

        @if($addresses->isNotEmpty() && count($addresses) >= 5)
            <div class="w-full flex justify-center items-center mt-4">
                <p class="text-white font-roboto text-center bg-red-500 w-1/2 py-2 rounded-md">Limit reached (5/5). Delete an address to add another one.</p>
            </div>
        @endif
    </div>

@endsection