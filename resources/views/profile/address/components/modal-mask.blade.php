<div id="modal-mask" class="hidden fixed inset-0 justify-center items-center w-screen h-screen bg-black/20 z-70">
            
    {{-- modal content --}}
    <form action="#" method="POST" class="w-[350px] bg-white rounded-xl flex flex-col gap-5 p-4 border border-black">
        @csrf
        @method('DELETE')

        <div class="w-full flex flex-col gap-1">
            <h4>Confirm Delete Address</h4>
            <hr>
            <p>Are you sure you want to delete this address?</p>
        </div>
        <div class="flex gap-4 justify-end">
            <button id="cancelBtn" type="button" class="bg-neutral-500/70 hover:bg-neutral-500/50 p-2 rounded-md font-roboto text-white">Cancel</button>
            <button id="modal-delBtn" type="submit" class="bg-red-700 hover:bg-red-500 p-2 rounded-md font-roboto font-bold text-white">Delete</button>
        </div>
                    
    </form>
</div>