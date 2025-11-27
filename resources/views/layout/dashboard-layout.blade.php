<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    
    @include('components.navbar')

    <main class="flex flex-col w-full h-auto mx-auto">

        <div id="modal-mask" class="hidden fixed inset-0 flex justify-center items-center w-screen h-screen bg-black/20 z-70">
        
            {{-- modal content --}}
            <form action="{{route('delete.user')}}" method="POST" class="w-[350px] bg-white rounded-xl flex flex-col gap-5 p-4 border border-black">
                @csrf
                @method('DELETE')

                <div class="w-full flex flex-col gap-1">
                    <h4>Confirm Delete</h4>
                    <hr>
                    <p>You will lose everything!</p>
                </div>
                <div class="flex gap-4 justify-end">
                    <button id="cancelBtn" type="button" class="bg-neutral-500/70 hover:bg-neutral-500/50 p-2 rounded-md font-roboto text-white">Cancel</button>
                    <button id="modal-delBtn" type="submit" class="bg-red-700 hover:bg-red-500 p-2 rounded-md font-roboto font-bold text-white">Delete</button>
                </div>
                
            </form>
        </div>

        <div class="mt-28 p-2 flex justify-center w-full h-auto mx-auto">
            <div class="w-[85%] flex gap-10 mx-auto">
                <div class="flex flex-col w-1/4 p-2 gap-2">
                    <div class="w-full flex flex-col gap-2 p-2">
                        <div class="w-full flex justify-start">
                            <h4 class="font-roboto font-bold text-2xl">Dashboard</h4>
                        </div>
                        <div class="w-full flex flex-col p-1 gap-2">
                            <div>
                                <a href="{{url('/dashboard')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Profile</a>
                            </div>
                            <div>
                                <a href="#" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Order history</a>
                            </div>
                            <div>
                                <a href="#" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Wishlist</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col gap-2 p-2">
                        <div class="w-full flex justify-start">
                            <h4 class="font-roboto font-bold text-2xl">Profile Setting</h4>
                        </div>
                        <div class="w-full flex flex-col p-1 gap-2">
                            <div>
                                <a href="{{url('/dashboard/edit')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Edit Profile</a>
                            </div>
                            <div>
                                <a href="{{url('/dashboard/address')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Address</a>
                            </div>
                            <div>
                                <a href="{{url('/dashboard/payment')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Payment Method</a>
                            </div>
                            <div>
                                <a href="{{url('/dashboard/delete')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Delete Account</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="w-3/4 p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
    @vite(['resources/js/app.js', 'resources/js/editForm.js', 'resources/js/modal.js' , 'resources/js/paymentEditForm.js'])
</body>
</html>