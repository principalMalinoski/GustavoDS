import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/style.css',
                'resources/css/index.css',
                'resources/css/login.css',
                'resources/css/layout.css',
                'resources/css/notas.css',
                'resources/css/json.css',
                'resources/css/idade.css',
                'resources/css/jogos.php',
                'resources/js/app.js'], 
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
