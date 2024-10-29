import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            //refresh: true,
            refresh: [
                'app/MoonShine/**/*.php',
                'resources/views/**/*.blade.php',
            ],
        }),
    ],
    /*server: {
        watch: {
            additionalPaths: ['app/MoonShine']
        },
    },*/
});
