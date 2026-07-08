import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig(({ command }) => {
    const isBuild = command === 'build';

    return {

        base: isBuild ? '/wp-content/themes/tailpress/dist/' : '/',
        server: {
            host: "0.0.0.0",
            port: 3000,
            cors: true,

            strictPort: true,
            origin: 'http://tailpress.test',
            watch: {
                usePolling: true,
                interval: 100,
            },
            hmr: {
                host: 'localhost', // or your Docker host/domain
                port: 3000,
            },
        },
        build: {
            manifest: true,
            outDir: 'dist',
            rollupOptions: {
                input: [
                    'resources/js/app.js',
                    'resources/css/app.css',
                    'resources/css/editor-style.css'
                ],
            },
        },
        plugins: [
            tailwindcss(),
        ],
    }
});
