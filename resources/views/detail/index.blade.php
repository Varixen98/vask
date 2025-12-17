@extends('layout.layout')

@section('title', 'Totebag ' .$totebag->item_name)

@section('content')
    <main class="flex flex-col w-full items-center justify-center h-auto mx-auto gap-10">

        {{-- item detail card --}}
        @include('detail.components.card-item')
        
    </main>
@endsection