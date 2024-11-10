import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/index/app.css",
                "resources/js/index/app.js",
                "resources/js/index/translations.js",
                "resources/js/index/slideshow.js",
                "resources/js/index/bootstrap.js",
                "resources/css/explore/app.css",
                "resources/js/explore/app.js",
                "resources/js/explore/translations.js",
                "resources/js/explore/bootstrap.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        host: "0.0.0.0",
        hmr: {
            host: "localhost",
        },
        watch: {
            usePolling: true,
        },
    },
    build: {
        outDir: "public/build",
    },
});
