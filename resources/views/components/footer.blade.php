<footer class="site-footer w-full h-auto">

    <div class="mx-auto p-5 w-full h-auto">

        
        {{-- bagian atas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-5 gap-8">

            {{-- brand name + Location --}}
            <div class="flex flex-col items-start gap-5">
                <h4 class="font-poppins font-bold text-2xl">VÄSK</h4>
                <p class="font-poppins text-gray-500 text-base">Jl.Kebon Jeruk No.25A, Kebon Jeruk<br>
                    Jakarta Barat, Indonesia</p>
            </div>

                
                    
            {{-- link navigation --}}
            <div class="flex flex-col gap-2">
                <h6 class="font-poppins text-gray-500 text-sm">Link</h6>
                <ul class="list-none">
                    <li><a href="/about" class="font-poppins text-xs">About Us</a></li>
                    <li><a href="/catalog" class="font-poppins text-xs">Catalog</a></li>
                    <li><a href="/how" class="font-poppins text-xs">How it works</a></li>
                </ul>
            </div>

            {{-- link help --}}
            <div class="flex flex-col gap-2">
                <h6 class="font-poppins text-gray-500 text-sm">Help</h6>
                <ul class="list-none">
                    <li><a href="#" class="font-poppins text-xs">Payment Options</a></li>
                    <li><a href="#" class="font-poppins text-xs">Returns</a></li>
                    <li><a href="#" class="font-poppins text-xs">Privacy Policies</a></li>
                </ul>
            </div>

            {{-- subscribe button --}}
            <div class="flex flex-col gap-2">
                <h6 class="font-poppins text-gray-500 text-sm">Newsletter</h6>
                <form action="/subscribe" method="POST" class="flex items-end gap-2">
                    <input id="newsletter-email" type="email" placeholder="Enter your email" class="border-b-2 
                                                                                                        border-gray-400 
                                                                                                        focus:border-black
                                                                                                        focus:outline-none
                                                                                                        bg-transparent p-2 w-full
                                                                                                        transition duration-300 ease-in-out">
                    <button type="submit" class="border-b-2 border-black text-xs font-poppins py-1">SUBSCRIBE</button>
                </form>
            </div>
        

            
        </div>
        {{-- bagian bawah --}}
        <div class="flex flex-col gap-5 p-5 mt-8">
            <hr class="border-gray-400">
            <p class="font-poppins text-xs">2025 VÄSK. All rights reserved</p>
        </div>
    </div>
</footer>