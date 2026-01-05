@extends('layout.studio-layout')

@section("title", "Studio")


@section('content')
    <meta name="bag-filename" content="{{asset('images/model1.png') }}">

    <div class="flex h-[calc(100vh-100px)] overflow-hidden relative"> 
        @include("studio.components.aside")
        
        @include("studio.components.drawer")
        
        <main class="flex-1 bg-gray-100 relative flex justify-center items-center overflow-auto p-10">

            <div class="relative flex flex-col items-center">

                <div id="fixed-toolbar" class="hidden absolute -top-16 left-0 w-full h-12 bg-black text-white rounded-xl shadow-xl border border-gray-700 z-50 flex items-center justify-between px-4 transition-all duration-300">
                    
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Width</span>
                        <div class="relative group">
                            <input type="number" id="toolbar-width" class="w-16 bg-gray-800 border border-gray-600 rounded-lg px-2 py-1 text-xs text-white focus:ring-2 focus:ring-indigo-500 outline-none text-center" placeholder="px">
                            <span class="absolute right-1 top-1 text-[10px] text-gray-500 pointer-events-none">px</span>
                        </div>
                    </div>

                
                    <div id="toolbar-font-wrapper" class="hidden flex items-center gap-2 border-l border-gray-700 pl-3">
                        <select id="toolbar-font" class="w-32 text-xs bg-gray-800 text-white border border-gray-600 rounded-lg py-1 px-2 focus:ring-2 focus:ring-indigo-500 outline-none">
                            <optgroup label="Standard">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                            </optgroup>
                            
                            <optgroup label="Google Fonts">
                                <option value="Pacifico">Pacifico</option>
                                <option value="Roboto">Roboto</option>
                                <option value="Lobster">Lobster</option>
                                <option value="Oswald">Oswald</option>
                                <option value="Dancing Script">Dancing Script</option>
                                <option value="Bangers">Bangers</option>
                                <option value="Montserrat">Montserrat</option>
                            </optgroup>

                        </select>
                    </div>


                    <div id="toolbar-color-wrapper" class="hidden flex items-center gap-2 border-l border-gray-700 pl-3 ml-2">
                        <div class="relative group cursor-pointer">
                            <input type="color" id="toolbar-color" class="w-8 h-8 rounded cursor-pointer border-none p-0 bg-transparent" value="#000000">
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        
                        <div class="flex items-center bg-gray-800 rounded-lg p-0.5 border border-gray-600">
                            <button id="toolbar-front" title="Bring to Front" class="p-1.5 hover:bg-gray-700 text-gray-300 hover:text-white rounded transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            </button>
                            <div class="w-px h-4 bg-gray-600 mx-0.5"></div>
                            <button id="toolbar-back" title="Send to Back" class="p-1.5 hover:bg-gray-700 text-gray-300 hover:text-white rounded transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>

                        <button id="toolbar-delete" title="Remove Element" class="ml-2 p-1.5 bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white rounded-lg transition border border-transparent hover:border-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-t-8 border-l-transparent border-r-transparent border-t-black"></div>
                </div>

                <div id="design-container" class="relative shadow-2xl rounded-lg overflow-hidden bg-white" style="width: 500px;">
                    
                    <img id="tote-background" src="" alt="Tote Bag" class="w-full h-auto block pointer-events-none select-none">

                    <div id="canvas-wrapper" class="absolute border-2 border-dashed border-gray-400">
                        <canvas id="toteCanvas"></canvas>
                    </div>

                </div>

            </div>
        </main>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
@endsection