@extends('layout.layout')

@section('title', 'catalog')

@section('content')
    <main class="flex flex-col w-full items-center justify-center h-auto mx-auto gap-10">
        
        <div class="w-[85%] flex flex-col items-center justify-center mx-auto mt-35 gap-2 py-2 z-10 shadow-md">
            <h1 class="font-roboto font-bold text-4xl">Catalog</h1>
            <p>Browse our totebag collection</p>
        </div>  

        {{-- slider section --}}
        @include("catalog.components.catalog-body")
        
        
    </main>
@endsection