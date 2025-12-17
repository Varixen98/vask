@extends('layout.studio-layout')

@section("title", "Studio")


@section('content')
    <meta name="bag-filename" content="{{asset('images/model1.png') }}">

    <div class="flex h-[calc(100vh-83px)] overflow-hidden relative"> 
        <aside class="w-20 bg-gray-900 text-white flex flex-col items-center py-6 gap-6 z-50 shadow-xl">
        
            <button onclick="toggleDrawer('text-panel')" class="tool-btn group flex flex-col items-center gap-1 focus:outline-none">
                <div class="p-3 rounded-xl bg-gray-800 group-hover:bg-indigo-600 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 group-hover:text-white">Text</span>
            </button>

            <button onclick="toggleDrawer('image-panel')" class="tool-btn group flex flex-col items-center gap-1 focus:outline-none">
                <div class="p-3 rounded-xl bg-gray-800 group-hover:bg-indigo-600 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 group-hover:text-white">Images</span>
            </button>

            <div class="mt-auto">
                <button onclick="saveDesign()" class="p-3 rounded-xl bg-green-600 hover:bg-green-500 transition shadow-lg text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                </button>
            </div>
        </aside>

        <div id="toolDrawer" class="absolute top-0 bottom-0 left-20 w-72 bg-white shadow-2xl border-r border-gray-200 transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
            
            <button onclick="closeDrawer()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div id="text-panel" class="tool-content hidden p-6 h-full flex flex-col">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Add Text</h3>
                
                <div class="space-y-4">
                    <textarea id="userText" rows="3" class="w-full border rounded-lg p-3 text-sm focus:ring-2 focus:ring-indigo-500 outline-none resize-none" placeholder="Type your text..."></textarea>
                    
                    <div class="grid grid-cols-2 gap-2">
                        <select id="fontFamily" class="border rounded p-2 text-sm">
                            <option value="Arial">Arial</option>
                            <option value="Times New Roman">Times</option>
                            <option value="Courier New">Courier</option>
                        </select>
                        <input type="number" id="fontSize" value="30" class="border rounded p-2 text-sm" placeholder="Size">
                    </div>

                    <button onclick="addText()" class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Add to Bag</button>
                </div>
            </div>

            <div id="image-panel" class="tool-content hidden p-6 h-full flex flex-col">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Upload Image</h3>
                
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer relative">
                    <input type="file" id="imgUpload" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="text-gray-500">
                        <span class="block font-medium text-indigo-600">Click to upload</span>
                        <span class="text-xs">or drag and drop</span>
                    </div>
                </div>
                
                <p class="text-xs text-gray-400 mt-4 text-center">Supported: JPG, PNG</p>
            </div>

        </div>

        <main class="flex-1 bg-gray-100 relative flex justify-center items-center overflow-auto">
            <div id="design-container" class="relative shadow-2xl rounded-lg overflow-hidden bg-white" style="width: 500px;">
        
                <img id="tote-background" src="" alt="Tote Bag" class="w-full h-auto block pointer-events-none select-none">

                <div id="canvas-wrapper" class="absolute border-2 border-dashed border-gray-400">
                    <canvas id="toteCanvas"></canvas>
                </div>

            </div>
        </main>

    </div>
@endsection