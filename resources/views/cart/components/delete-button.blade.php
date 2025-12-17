<form action="{{ route('cart.delete', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="
                            size-6 hover:border hover:border-neutral-700 hover:stroke-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>    
    </button>
</form>