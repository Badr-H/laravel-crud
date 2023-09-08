import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import postcss from "rollup-plugin-postcss";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig({
    plugins: [
        postcss({ plugins: [tailwindcss, autoprefixer] }),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
