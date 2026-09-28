import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // Daftarkan entry point aset: SCSS (Bootstrap) dan JS (Bootstrap bundle + Popper).
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true, // Auto-reload browser saat file Blade/aset berubah.
        }),
    ],
    server: {
        watch: {
            // Hindari watching file hasil kompilasi Blade agar tidak looping.
            ignored: ['**/storage/framework/views/**'],
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                // Bootstrap 5.3 masih memakai @import; redam peringatan deprecasi Sass
                // agar output build tetap bersih (tidak memengaruhi hasil kompilasi).
                silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'mixed-decls'],
            },
        },
    },
});
