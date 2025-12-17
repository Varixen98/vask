import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/editForm.js',
                'resources/js/bootstrap.js',
                'resources/js/modal.js',
                'resources/js/paymentEditForm.js',
                'resources/js/studio.js',],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
