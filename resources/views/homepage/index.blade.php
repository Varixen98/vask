@extends('layout.layout')

@section('title', 'homepage')

@section('content')
    <main class="flex flex-col w-full h-auto mx-auto gap-28">

        {{-- hero section --}}
        @include("homepage.components.hero-section")
        

        {{-- nanti pake database pake foreach --}}
        {{-- catalog section --}}
        @include("homepage.components.popular-catalog-section")
        



        {{-- collage section --}}
        @include("homepage.components.collage-section")
        
    </main>
@endsection