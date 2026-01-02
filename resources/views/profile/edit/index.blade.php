@extends('layout.dashboard-layout')

@section('title', "Edit Profile")

@section('content')
    <div class="w-full flex flex-col gap-2 p-2 mx-auto">
        <div>
            <h4 class="font-roboto font-bold text-xl">Edit Profile</h4>
        </div>
        <hr class="border border-gray-300">
        <form action="{{route('update.user')}}" method="POST" class="p-2 gap-4 w-full flex flex-col justify-center items-center text-start">
            @csrf
            @method('PUT')

            {{-- first name --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('first_name', $user->first_name)}}">
            </div>

            {{-- last name --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('last_name', $user->last_name)}}">
            </div>

            {{-- gender --}}
            <div class="w-[85%] flex gap-20">
                <label for="gender" class="w-full font-roboto text-[16px]">Gender</label>
                <div class="w-full flex items-center justify-center">


                    <div class="w-full h-8 flex justify-center items-center rounded-md overflow-hidden">
                        
                    {{-- male radio button --}}
                        <div class="w-1/2 flex">
                            <input type="radio" name="gender" id="gender_male" value="Male" class="hidden peer" checked>
                            <label for="gender_male" class="w-full bg-black text-white
                            peer-checked:bg-gray-500/60  
                            text-center font-roboto py-2 px-3.5 cursor-pointer
                            transition-all duration-500">Male</label>
                        </div>
            
                    {{-- female radio button --}}
                        <div class="w-1/2 flex">
                            <input type="radio" name="gender" id="gender_female" value="Female" class="hidden peer" checked>
                            <label for="gender_female" class="w-full bg-black text-white outline-2
                            peer-checked:bg-gray-500/60
                            text-center font-roboto py-2 px-3.5 cursor-pointer 
                            transition-all duration-500">Female</label>
                        </div>
                        
                        
                    </div>

                </div>
                        
                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- phone number --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('phone', $user->phone)}}">
            </div>

            {{-- Province --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="province_id">Province</label>
                <select name="province_id" id="province_id" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md">
                    <option value="" hidden>-- Select Province --</option>

                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" 
                            {{ (old('province_id', $address->province_id ?? null) == $province->id) ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach

                    {{-- Populate disini --}}
                    @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
                
            </div>

            {{-- City --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="city_id">City</label>
                <select name="city_id" id="city_id" disabled="disabled" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md">
                    <option value="" hidden>-- Select City --</option>

                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" 
                            {{ (old('city_id', $address->city_id ?? NULL) == $city->id) ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                    {{-- Populate disini --}}
                </select>
            </div>

            {{-- District --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="district_id">District</label>
                <select name="district_id" id="district_id" disabled="disabled" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md">
                    <option value="" hidden>-- Select District --</option>

                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" 
                            {{ (old('district_id', $address->district_id ?? NULL) == $district->id) ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option> 
                    @endforeach
                    {{-- Populate disini --}}
                </select>
            </div>


            {{-- postal code --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="postal_code">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md" value="{{old('postal_code', $address->postal_code ?? NULL)}}">
            </div>


            {{-- street address --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2 font-roboto text-[16px]" for="street_address">Street Address</label>
                <textarea name="street_address" id="street_address" cols="30" rows="5" class="shadow-md w-1/2 p-1 border border-gray-300 rounded-md">{{ old('street_address', $address->street_address ?? '') }}</textarea>
            </div>
            
            <div class="flex justify-start items-center gap-20 w-[85%]">
                <button type="submit" class="w-[30%] p-1 bg-black text-white hover:bg-neutral-800/95 transition-all duration-500 font-roboto">Save</button>
            </div>
        </form>
    </div>

    @vite("resources/js/editForm.js")
@endsection