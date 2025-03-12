import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/luvi-ui.css",
        "resources/js/partials/testimonial-section.js",
        "resources/js/partials/team-section.js",
      ],
      refresh: true,
    }),
  ],
});
