import "./bootstrap";
import "flowbite";
import "../css/pages/home.css";
import collapse from "@alpinejs/collapse";
import anchor from "@alpinejs/anchor";
import { initFlowbite } from "flowbite";

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

document.addEventListener("livewire:navigated", () => {
  // console.log('navigated');
  initFlowbite();
});

// // init Swiper:
// const swiper = new Swiper(".swiper", {
//   modules: [Navigation, Pagination],
//   pagination: {
//     el: ".swiper-pagination",
//   },
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
// });
