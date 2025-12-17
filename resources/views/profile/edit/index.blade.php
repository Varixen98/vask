@extends('layout.dashboard-layout')

@section('title', "Edit Profile")

@section('content')
    <div class="w-full flex flex-col gap-2 p-2 mx-auto">
        <div>
            <h4 class="font-roboto font-bold text-xl">Edit Profile</h4>
        </div>
        <hr class="border border-gray-300">
        <form action="{{route('update.user')}}" method="POST" class="p-2 gap-4 w-full flex flex-col justify-center items-center">
            @csrf
            @method('PUT')

            {{-- first name --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2" for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="w-1/2 p-1 border border-gray-300 rounded-md" value="{{old('first_name', $user->first_name)}}">
            </div>

            {{-- last name --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2" for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="w-1/2 p-1 border border-gray-300 rounded-md" value="{{old('last_name', $user->last_name)}}">
            </div>

            {{-- gender --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2"  for="gender">Gender</label>
                <div class="w-1/2 flex justify-evenly">
                    <div class="bg-black rounded-md text-white flex gap-2 items-center justify-center p-1">
                        <label for="gender_male" class="font-roboto font-bold">Male</label>
                        <input type="radio" name="gender" id="gender_male" value="Male" {{old('gender', $user->gender) == 'Male' ? 'checked' : ''}}>
                    </div>
                    <div class="bg-black rounded-md text-white flex gap-2 items-center justify-center p-1">
                        <label for="gender_female" class="font-roboto font-bold">Female</label>
                        <input type="radio" name="gender" id="gender_female" value="Female" {{old('gender', $user->gender) == 'Female' ? 'checked' : ''}}>
                    </div>
                </div>
            </div>

            {{-- phone number --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2" for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" class="w-1/2 p-1 border border-gray-300 rounded-md" value="{{old('phone', $user->phone)}}">
            </div>

            {{-- Province --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2" for="province_id">Province</label>
                <select name="province_id" id="province_id" class="w-1/2 p-1 border border-gray-300 rounded-md">
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
                <label class="w-1/2" for="city_id">City</label>
                <select name="city_id" id="city_id" disabled="disabled" class="w-1/2 p-1 border border-gray-300 rounded-md">
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
                <label class="w-1/2" for="district_id">District</label>
                <select name="district_id" id="district_id" disabled="disabled" class="w-1/2 p-1 border border-gray-300 rounded-md">
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
                <label class="w-1/2" for="postal_code">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="w-1/2 p-1 border border-gray-300 rounded-md" value="{{old('postal_code', $address->postal_code ?? NULL)}}">
            </div>


            {{-- street address --}}
            <div class="flex gap-20 w-[85%]">
                <label class="w-1/2" for="street_address">Street Address</label>
                <textarea name="street_address" id="street_address" cols="30" rows="5" class="w-1/2 p-1 border border-gray-300 rounded-md">{{ old('street_address', $address->street_address ?? '') }}</textarea>
            </div>
            
            <div class="flex justify-start items-center gap-20 w-[85%]">
                <button type="submit" class="w-[30%] p-1 bg-black text-white hover:bg-neutral-800/95 transition-all duration-500 font-roboto">Save</button>
            </div>
        </form>
    </div>

    @vite("resources/js/editForm.js")
@endsection