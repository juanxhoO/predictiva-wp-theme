import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig(({ command }) => {
    const isBuild = command === 'build';

    return {
        // En "serve", apuntamos directo al servidor de Vite expuesto
        base: isBuild ? '/wp-content/themes/predictiva-wp-theme/dist/' : 'http://localhost:3000/',

        server: {
            host: "0.0.0.0",
            port: 3000,
            cors: true,
            strictPort: true,
            // Cambiado a la URL completa para evitar bloqueos de CORS en assets de fuentes/imágenes
            origin: 'http://localhost:3000',
            watch: {
                usePolling: true,
                interval: 100,
            },
            hmr: {
                host: 'localhost',
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
            tailwindcss()
        ],
    }
});