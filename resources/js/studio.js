document.addEventListener('DOMContentLoaded', () => {
    
    const BAG_CONFIG = {
        
        topOffset: 0.50, 
        
        
        bodyHeight: 0.40, 

        
        widthRatio: 0.40 
    };

 
    const imgElement = document.getElementById('tote-background');
    const wrapper = document.getElementById('canvas-wrapper');
    const metaTag = document.querySelector('meta[name="bag-filename"]');

    if (!metaTag || !imgElement) return console.error("Missing Image or Meta Tag");


    imgElement.src = metaTag.content;

    const canvas = new fabric.Canvas('toteCanvas', {
        preserveObjectStacking: true
    });

    // ==========================================
    // 3. CALCULATION LOGIC
    // ==========================================
    imgElement.onload = function() {
        
        const imgW = imgElement.clientWidth;
        const imgH = imgElement.clientHeight;

        console.log(`Bag Loaded: ${imgW}px x ${imgH}px`);

        // --- A. Calculate Canvas Dimensions ---
        const canvasWidth = imgW * BAG_CONFIG.widthRatio;
        
        // Height: Based on the body height config
        const canvasHeight = imgH * BAG_CONFIG.bodyHeight;

        // --- B. Calculate Position (Center it) ---
        // Left: (ImageWidth - CanvasWidth) / 2
        const leftPos = (imgW - canvasWidth) / 2;
        
        // Top: ImageHeight * TopOffset
        const topPos = imgH * BAG_CONFIG.topOffset;

        // --- C. Apply to DOM (The Wrapper Div) ---
        wrapper.style.width = `${canvasWidth}px`;
        wrapper.style.height = `${canvasHeight}px`;
        wrapper.style.left = `${leftPos}px`;
        wrapper.style.top = `${topPos}px`;

        // --- D. Resize Fabric Canvas to match Wrapper ---
        canvas.setWidth(canvasWidth);
        canvas.setHeight(canvasHeight);
        canvas.renderAll();

        console.log("Canvas Aligned Successfully");
    };

    // ==========================================
    // 4. ADD TEXT FUNCTION (Load Font -> Then Render)
    // ==========================================
    window.addText = function() {
        const textVal = document.getElementById('userText').value;
        const fontVal = document.getElementById('fontFamily').value;
        const sizeVal = document.getElementById('fontSize').value;
        const btn = document.querySelector('button[onclick="addText()"]'); // Get the button to change text
        
        if(!textVal) { alert("Please enter text"); return; }

        // Helper: This actually creates the text object
        function createAndAddText() {
            const text = new fabric.Text(textVal, {
                left: canvas.width / 2, 
                top: canvas.height / 2, 
                originX: 'center',
                originY: 'center',
                fontFamily: fontVal,    
                fontSize: parseInt(sizeVal),
                fill: '#000000'
            });
            
            canvas.add(text);
            canvas.setActiveObject(text);
            canvas.renderAll();
        }

        // SCENARIO A: Font is already downloaded/cached
        if (loadedFonts.has(fontVal)) {
            createAndAddText();
        } 
        // SCENARIO B: Font is new (Download first)
        else {
            const originalBtnText = btn.innerText;
            btn.innerText = "Downloading Font..."; // 1. Give User Feedback
            btn.disabled = true; // Prevent double clicking

            WebFont.load({
                google: { families: [fontVal] },
                active: function() {
                    // 2. Success! Mark as loaded
                    loadedFonts.add(fontVal);
                    
                    // 3. NOW we add the text
                    createAndAddText();
                    
                    // 4. Reset Button
                    btn.innerText = originalBtnText;
                    btn.disabled = false;
                },
                inactive: function() {
                    // 5. Failed (Internet issue or invalid font)
                    alert(`Could not load font: ${fontVal}. Using default instead.`);
                    createAndAddText(); // Add it anyway (will look like Arial)
                    btn.innerText = originalBtnText;
                    btn.disabled = false;
                }
            });
        }
    };


    // ==========================================
    // 5. UPLOAD IMAGE FUNCTION (Updated)
    // ==========================================
    const imgInput = document.getElementById('imgUpload');
    if (imgInput) {
        imgInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(!file) return;

            const reader = new FileReader();
            reader.onload = function(f) {
                fabric.Image.fromURL(f.target.result, function(img) {
                    // Scale image to fit 50% of the canvas
                    const scale = (canvas.width * 0.5) / img.width;
                    
                    img.set({
                        scaleX: scale,
                        scaleY: scale,
                        left: canvas.width / 2,
                        top: canvas.height / 2,
                        originX: 'center',
                        originY: 'center'
                    });
                    canvas.add(img);
                    canvas.setActiveObject(img);
                });
            };
            reader.readAsDataURL(file);
            e.target.value = ''; 
        });
    }

    // ==========================================
    // 6. KEYBOARD SHORTCUTS
    // ==========================================
    
    // Internal clipboard
    let _clipboard;

    // Helper: Copy
    function copyObject() {
        const activeObj = canvas.getActiveObject();
        if (activeObj) {
            activeObj.clone(function(cloned) {
                _clipboard = cloned;
            });
        }
    }

    // Helper: Paste
    function pasteObject() {
        if (!_clipboard) return;
        
        _clipboard.clone(function(clonedObj) {
            canvas.discardActiveObject();
            
            clonedObj.set({
                left: clonedObj.left + 20, // Offset slightly so it's visible
                top: clonedObj.top + 20,
                evented: true,
            });

            if (clonedObj.type === 'activeSelection') {
                // If multiple items were copied
                clonedObj.canvas = canvas;
                clonedObj.forEachObject(function(obj) {
                    canvas.add(obj);
                });
                clonedObj.setCoords();
            } else {
                canvas.add(clonedObj);
            }
            
            _clipboard.top += 20; // Move clipboard position for next paste
            _clipboard.left += 20;
            
            canvas.setActiveObject(clonedObj);
            canvas.requestRenderAll();
        });
    }

    document.addEventListener('keydown', function(e) {
        // Ignore shortcuts if user is typing in an Input field
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

        const key = e.key;
        const ctrlOrCmd = e.ctrlKey || e.metaKey; // Windows Ctrl or Mac Cmd

        // 1. DELETE (Backspace / Delete)
        if (key === 'Escape' || key === 'Delete' || key === 'Backspace') {
            const activeObj = canvas.getActiveObject();
            if (activeObj && !activeObj.isEditing) {
                canvas.remove(activeObj);
                canvas.discardActiveObject();
                canvas.requestRenderAll();
                toolbar.classList.add('hidden');
            }
        }

        // 2. COPY (Ctrl + C)
        if (ctrlOrCmd && key === 'c') {
            copyObject();
            e.preventDefault(); // Prevent browser copy
        }

        // 3. PASTE (Ctrl + V)
        if (ctrlOrCmd && key === 'v') {
            pasteObject();
            e.preventDefault(); // Prevent browser paste
        }
    });

    // ==========================================
    // 7. FIXED TOOLBAR LOGIC (Updated)
    // ==========================================
    const toolbar = document.getElementById('fixed-toolbar');
    const widthInput = document.getElementById('toolbar-width'); // Changed ID to reflect pixel width
    const fontWrapper = document.getElementById('toolbar-font-wrapper');
    const fontSelect = document.getElementById('toolbar-font');
    const deleteBtn = document.getElementById('toolbar-delete');
    const btnFront = document.getElementById('toolbar-front');
    const btnBack = document.getElementById('toolbar-back');

    const colorWrapper = document.getElementById('toolbar-color-wrapper');
    const colorInput = document.getElementById('toolbar-color');

    // Helper: Show/Hide based on selection
    function toggleToolbar() {
        const activeObj = canvas.getActiveObject();
        if (!activeObj) {
            toolbar.classList.add('hidden');
            return;
        }

        // Show toolbar
        toolbar.classList.remove('hidden');

        // 1. Update Width Input (Display actual Pixel Width)
        // getScaledWidth() returns the real pixel width occupied on canvas
        const currentPixelWidth = Math.round(activeObj.getScaledWidth());
        widthInput.value = currentPixelWidth;

        // 2. Handle Text Options
        if (activeObj.type === 'text') {
            fontWrapper.classList.remove('hidden');
            fontWrapper.classList.add('flex'); // Ensure flex display
            fontSelect.value = activeObj.fontFamily;

            // Show Color Picker
            colorWrapper.classList.remove('hidden');
            colorWrapper.classList.add('flex');
            colorInput.value = activeObj.fill; // Set input to current text color
        } else {
            fontWrapper.classList.add('hidden');
            fontWrapper.classList.remove('flex');
        }
    }

    // --- Events ---

    // Show toolbar on selection
    canvas.on('selection:created', toggleToolbar);
    canvas.on('selection:updated', toggleToolbar);
    
    // Update pixel width while dragging handles
    canvas.on('object:scaling', function() {
        const activeObj = canvas.getActiveObject();
        if(activeObj) {
            widthInput.value = Math.round(activeObj.getScaledWidth());
        }
    });

    // Hide on deselect
    canvas.on('selection:cleared', function() {
        toolbar.classList.add('hidden');
    });


    // --- Inputs ---

    // 1. PIXEL WIDTH CHANGE
    widthInput.addEventListener('input', function(e) {
        const activeObj = canvas.getActiveObject();
        if (!activeObj) return;

        const val = parseInt(e.target.value);
        if(isNaN(val) || val <= 5) return; // Prevent items disappearing (min 5px)

        // This is the magic Fabric function that scales based on pixels
        activeObj.scaleToWidth(val);
        
        canvas.requestRenderAll();
    });

    // 2. COLOR CHANGE 
    if(colorInput) {
        colorInput.addEventListener('input', function(e) {
            const activeObj = canvas.getActiveObject();
            if (!activeObj || (activeObj.type !== 'text' && activeObj.type !== 'i-text')) return;

            activeObj.set('fill', e.target.value); // Set hex color
            canvas.requestRenderAll();
        });
    }

    // 2. FONT CHANGE
    fontSelect.addEventListener('change', function(e) {
        const activeObj = canvas.getActiveObject();
        if (!activeObj || activeObj.type !== 'text') return;

        activeObj.set('fontFamily', e.target.value);
        canvas.requestRenderAll();
        // Width might change slightly when font changes, update input
        widthInput.value = Math.round(activeObj.getScaledWidth());
    });
    

    // 3. LAYER: TO FRONT
    btnFront.addEventListener('click', function() {
        const activeObj = canvas.getActiveObject();
        if (activeObj) {
            activeObj.bringToFront();
            // canvas.discardActiveObject(); // Deselect to render layer change clearly
            canvas.requestRenderAll();
            // Optional: Reselect it immediately so toolbar stays
            canvas.setActiveObject(activeObj); 
            // toolbar.classList.add('hidden');
        }
    });

    // 4. LAYER: TO BACK
    btnBack.addEventListener('click', function() {
        const activeObj = canvas.getActiveObject();
        if (activeObj) {
            activeObj.sendToBack();
            // canvas.discardActiveObject();
            canvas.requestRenderAll();
            // toolbar.classList.add('hidden');
        }
    });

    // 5. DELETE
    deleteBtn.addEventListener('click', function() {
        const activeObj = canvas.getActiveObject();
        if (activeObj) {
            canvas.remove(activeObj);
            canvas.discardActiveObject();
            toolbar.classList.add('hidden');
            canvas.requestRenderAll();
        }
    });

    // ... Toggle Drawer Logic remains the same ...
    const drawer = document.getElementById('toolDrawer');
    const allPanels = document.querySelectorAll('.tool-content');

    window.toggleDrawer = function(panelId) {
        if (drawer.classList.contains('-translate-x-full')) {
            showPanel(panelId);
            drawer.classList.remove('-translate-x-full');
        } else {
            const activePanel = document.getElementById(panelId);
            if (!activePanel.classList.contains('hidden')) {
                window.closeDrawer();
            } else {
                showPanel(panelId);
            }
        }
    };

    window.closeDrawer = function() {
        drawer.classList.add('-translate-x-full');
    };

    function showPanel(id) {
        allPanels.forEach(el => el.classList.add('hidden'));
        document.getElementById(id).classList.remove('hidden');
    }
    


    // Track which fonts we have already downloaded to avoid re-downloading
    const loadedFonts = new Set(['Arial', 'Times New Roman', 'Courier New', 'Verdana', 'Georgia']);

    // 2. FONT CHANGE (Optimized with WebFontLoader)
    fontSelect.addEventListener('change', function(e) {
        const activeObj = canvas.getActiveObject();
        if (!activeObj || activeObj.type !== 'text') return;

        const fontName = e.target.value;

        // A. If font is already loaded, apply immediately
        if (loadedFonts.has(fontName)) {
            activeObj.set('fontFamily', fontName);
            canvas.requestRenderAll();
        } 
        // B. If not loaded, fetch it from Google first
        else {
            // Show a temporary loading state (optional UX improvement)
            const originalText = activeObj.text;
            activeObj.set('text', 'Loading...');
            canvas.requestRenderAll();

            WebFont.load({
                google: {
                    families: [fontName]
                },
                active: function() {
                    // This runs once the font is successfully downloaded
                    loadedFonts.add(fontName); // Mark as loaded
                    
                    activeObj.set('fontFamily', fontName);
                    activeObj.set('text', originalText); // Restore text
                    canvas.requestRenderAll();
                    
                    // Force width update in toolbar just in case font width changed
                    widthInput.value = Math.round(activeObj.getScaledWidth());
                },
                inactive: function() {
                    alert(`Failed to load font: ${fontName}`);
                    activeObj.set('text', originalText);
                    canvas.requestRenderAll();
                }
            });
        }
    });

    
});