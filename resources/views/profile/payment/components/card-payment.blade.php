<div class="w-full flex flex-col gap-4">
    @forelse($payments->sortByDesc("is_default") as $payment)
        @if($payment->is_default)
            <div class="w-full flex">
                <div class="w-3/4 flex flex-col">

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Cardholder</span>
                        <p>{{$payment->full_name}}</p>
                        <span class="text-xs font-normal text-green-700 bg-green-100 px-1 rounded ml-2">Default</span>
                    </div>

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Card Number</span>
                        <p>**** **** **** {{$payment->last_four}}</p>
                    </div>

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Expire Date</span>
                        <p>{{$payment->expire_date}}</p>
                    </div>

                    <div class="flex gap-1 mt-2">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 stroke-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <p class="font-roboto text-sm text-green-700">Default payment method</p>
                        </div>
                    </div>    
                </div>
                
                <form action="{{route('destroy.payment.method', $payment->id)}}" method="POST" class="w-1/4 flex justify-end items-start">
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
            <hr class="border border-gray-300"> 
        @else
            <div class="w-full flex">
                <div class="w-3/4 flex flex-col">

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Cardholder</span>
                        <p>{{$payment->full_name}}</p>
                    </div>

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Card Number</span>
                        <p>**** **** **** {{$payment->last_four}}</p>
                    </div>

                    <div class="flex gap-2">
                        <span class="font-roboto font-bold">Expire Date</span>
                        <p>{{$payment->expire_date}}</p>
                    </div>

                    <div class="flex gap-1 mt-2">
                        {{-- Set Default Button --}}
                        <form action="{{route("update.default.method", $payment->id)}}" method="POST" class="flex items-center">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="font-roboto text-sm text-gray-500 hover:text-black hover:underline">Set as default payment method</button>
                        </form>
                    </div>   
                </div>
                
                <form action="{{route('destroy.payment.method', $payment->id)}}" method="POST" class="w-1/4 flex justify-end items-start">
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
            <hr class="border border-gray-300"> 
        @endif
    @empty
        <div class="flex text-center align-middle mx-auto font-roboto text-black/50">
            No Payment Methods Recorded
        </div>
    @endforelse 
</div>