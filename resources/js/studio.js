document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. CONFIGURATION (CALIBRATION)
    // ==========================================
    // Adjust these 2 numbers to fit your specific bag image
    const BAG_CONFIG = {
        // How far down the image does the "Body" start? (0.35 = 35% down)
        topOffset: 0.50, 
        
        // How tall is the printable body area? (0.55 = 55% of image height)
        bodyHeight: 0.40, 

        // We want the canvas to be 80% of the bag's width
        widthRatio: 0.40 
    };

    // ==========================================
    // 2. INITIALIZATION
    // ==========================================
    const imgElement = document.getElementById('tote-background');
    const wrapper = document.getElementById('canvas-wrapper');
    const metaTag = document.querySelector('meta[name="bag-filename"]');

    if (!metaTag || !imgElement) return console.error("Missing Image or Meta Tag");

    // Set the image source
    imgElement.src = metaTag.content;

    // Initialize Fabric (Empty initially)
    const canvas = new fabric.Canvas('toteCanvas', {
        preserveObjectStacking: true
    });

    // ==========================================
    // 3. CALCULATION LOGIC
    // ==========================================
    // We must wait for the image to load to know its pixel dimensions
    imgElement.onload = function() {
        
        const imgW = imgElement.clientWidth;
        const imgH = imgElement.clientHeight;

        console.log(`Bag Loaded: ${imgW}px x ${imgH}px`);

        // --- A. Calculate Canvas Dimensions ---
        // Width: 80% of the image width
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
    // 4. ADD TEXT FUNCTION (Updated)
    // ==========================================
    window.addText = function() {
        const textVal = document.getElementById('userText').value;
        const fontVal = document.getElementById('fontFamily').value;
        const sizeVal = document.getElementById('fontSize').value;
        
        if(!textVal) { alert("Please enter text"); return; }

        // Add text to center of the NOW SMALLER canvas
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
    document.addEventListener('keydown', function(e) {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
        
        if (e.key === 'Escape' || e.key === 'Delete' || e.key === 'Backspace') {
            const activeObj = canvas.getActiveObject();
            if (activeObj && !activeObj.isEditing) {
                canvas.remove(activeObj);
                canvas.discardActiveObject();
                canvas.requestRenderAll();
            }
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
});