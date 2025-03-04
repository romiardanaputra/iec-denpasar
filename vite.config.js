import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/luvi-ui.css",
        "resources/js/swiper-testimonial.js",
        "resources/js/swiper-team.js",
      ],
      refresh: true,
    }),
  ],
});
