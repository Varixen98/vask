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