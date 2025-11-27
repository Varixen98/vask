@extends('layout.dashboard-layout')

@section('title', "Edit Profile")

@section('content')
    <div class="w-full flex flex-col gap-2 p-2 mx-auto">
        <div>
            <h4 class="font-roboto font-bold text-xl">Add Payment Method</h4>
        </div>
        <hr class="border border-gray-300">
        <form action="{{route('store.payment.method')}}" method="POST" class="p-2 gap-4 w-full flex flex-col justify-center items-center">
            @csrf

            {{-- full name --}}
            <div class="flex gap-10 w-[85%]">
                <label class="w-1/2" for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-1/2 p-1 border border-gray-300 rounded-md" value="">
                @error('full_name') <p class="text-red-500 text-xs text-right">{{ $message }}</p> @enderror
            </div>

            {{-- card number --}}
            <div class="flex gap-10 w-[85%]">
                <label class="w-1/2" for="card_number">Card Number</label>
                <input type="text" name="card_number" id="card_number" maxlength="19" placeholder="0000 0000 0000 0000" class="w-1/2 p-1 border border-gray-300 rounded-md" value="">
                @error('card_number') <p class="text-red-500 text-xs text-right">{{ $message }}</p> @enderror
            </div>

            {{-- security number --}}
            <div class="flex gap-10 w-[85%]">
                <label class="w-1/2" for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" maxlength="3" placeholder="123" class="w-1/2 p-1 border border-gray-300 rounded-md" value="">
                @error('cvv') <p class="text-red-500 text-xs text-right">{{ $message }}</p> @enderror
            </div>

            {{-- expire date --}}
            <div class="flex gap-10 w-[85%]">
                <label class="w-1/2" for="expire_date">Expire Date</label>
                <input type="text" name="expire_date" id="expire_date" maxlength="7" placeholder="MM/YYYY" class="w-1/2 p-1 border border-gray-300 rounded-md" value="">
                @error('expire_date') <p class="text-red-500 text-xs text-right">{{ $message }}</p> @enderror
            </div>

            <div class='flex justify-center items-center w-[85%]'>
                <button type="submit" class="w-[35%] bg-black p-1 text-white rounded-md hover:bg-neutral-800">Save Card</button>
            </div>
        </form>
    </div>
@endsection