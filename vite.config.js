import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

const port = 5173;
const origin = `${process.env.DDEV_PRIMARY_URL}:${port}`;

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        // respond to all network requests
        host: '0.0.0.0',
        port: port,
        strictPort: true,
        cors: {
            origin: process.env.DDEV_PRIMARY_URL,
            credentials: true,
        },
        // Defines the origin of the generated asset URLs during development,
        // this will also be used for the public/hot file (Vite devserver URL)
        origin: origin,
    },
    // resolve: {
    //     alias: {
    //         '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
    //     },
    // },
});
