import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    // resolve: {
    //     alias: {
    //         jquery: 'jquery/dist/jquery.js',
    //     },
    // },
    // define: {
    //     'window.jQuery': 'jquery',
    //     'window.$': 'jquery',
    // },
});
