@extends('layout.dashboard-layout')

@section('title', 'Delete Profile')

@section('content')

    <div class="w-full flex flex-col gap-2 p-2 mx-auto">
        <div class="w-full">
            <h3 class="font-roboto font-bold text-xl">Delete Account</h3>
        </div>
        <hr class="border border-gray-300">
        <div class="w-full flex flex-col gap-4">
            <div class="w-full flex flex-col gap-2">
                <h4 class="font-roboto text-md">Deleting your account</h4>
                <p class="font-roboto text-xs">If you delete your account you will lose your membership <br>
                    and access to our service and membership connection.</p>
            </div>
            <div class="w-full flex flex-col border border-gray-300 p-4 gap-4">
                <div class="w-full flex gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p class="font-roboto">After deleting your account, you cannot</p>
                </div>
                <ul class="w-full flex flex-col gap-2 text-md">
                    <li>Melihat riwayat pesanan Anda.</li>
                    <li>Melihat riwayat pesanan Anda.</li>
                    <li>Melihat riwayat pesanan Anda.</li>
                    <li>Melihat riwayat pesanan Anda.</li>
                    <li>Melihat riwayat pesanan Anda.</li>
                </ul>
            </div>

            <div class="w-full flex justify-center items-center">
                <button id="delBtn" class="w-[250px] h-10 font-roboto bg-black text-white hover:bg-neutral-800 rounded-md p-1">DELETE</button>
            </div>
        </div>
        
    </div>

@endsection