    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield("title")</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        
        @include('components.navbar')

        <main class="flex flex-col w-full h-auto mx-auto mt-10">

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
                                    <a href="{{url('/dashboard/profile/edit')}}" class="font-roboto hover:font-bold hover:underline transition-all duration-300">Edit Profile</a>
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
        @vite('resources/js/app.js')
    </body>
    </html>