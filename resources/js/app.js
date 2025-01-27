import "./bootstrap";
import "flowbite";
import "../css/pages/home.css";
import collapse from "@alpinejs/collapse";
import anchor from "@alpinejs/anchor";

document.addEventListener(
  "alpine:init",
  () => {
    const modules = import.meta.glob("./plugins/**/*.js", { eager: true });

    for (const path in modules) {
      window.Alpine.plugin(modules[path].default);
    }
    window.Alpine.plugin(collapse);
    window.Alpine.plugin(anchor);
  },
  { once: true },
);

// core version + navigation, pagination modules:
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// init Swiper:
const swiper = new Swiper(".swiper", {
  // configure Swiper to use modules
  modules: [Navigation, Pagination],
  pagination: {
    el: ".swiper-pagination",
  },
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
