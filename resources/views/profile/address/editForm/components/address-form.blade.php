<form action="{{route("store.address")}}" method="POST" class="w-full flex flex-col items-center gap-5">
    @csrf
    {{-- Province --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2" for="province_id">Province</label>
        <select name="province_id" id="province_id" class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md">
            <option value="" hidden>-- Select Province --</option>

            @foreach ($provinces as $province)
                <option value="{{ $province->id }}" 
                    {{ (old('province_id', $address->province_id ?? null) == $province->id) ? 'selected' : '' }}>
                    {{ $province->name }}
                </option>
            @endforeach
        </select>
                
    </div>

    {{-- City --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2" for="city_id">City</label>
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
        <label class="w-1/2" for="district_id">District</label>
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
        <label class="w-1/2" for="postal_code">Postal Code</label>
        <input type="text" name="postal_code" id="postal_code" autocomplete="off" 
        class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md"
        value="{{old("postal_code", $address->postal_code)}}">
    </div>


    {{-- street address --}}
    <div class="flex gap-20 w-[85%]">
        <label class="w-1/2" for="street_address">Street Address</label>
        <textarea name="street_address" id="street_address" cols="30" rows="5" 
        class="w-1/2 p-1 border border-gray-300 rounded-md shadow-md"
        >{{old("street_address", $address->street_address)}}</textarea>
    </div>
            
    <div class="flex justify-start items-center gap-20 w-[85%]">
        <button type="submit" class="w-[25%] p-1 bg-black text-white hover:bg-neutral-800/95 transition-all duration-500 font-roboto">Save</button>
    </div>
</form>