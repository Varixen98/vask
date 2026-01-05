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
                <button onclick="saveDesign()" class="group flex flex-col items-center gap-1 focus:outline-none">
                    <div class="p-3 rounded-xl bg-gray-800 text-white group-hover:bg-indigo-700 transition-all duration-500 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                    </div>
                    
                    <span class="text-xs font-medium text-gray-400 group-hover:text-white">Save</span>
                </button>
                
            </div>
        </aside>