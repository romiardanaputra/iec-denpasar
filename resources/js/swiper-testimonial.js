// resources/js/swiper-testimonial.js

import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
document.addEventListener("livewire:navigated", function () {
  new Swiper(".swiper-testimonial", {
    modules: [Navigation, Pagination],
    pagination: {
      el: ".swiper-pagination-testimonial",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next-testimonial",
      prevEl: ".swiper-button-prev-testimonial",
    },
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next-testimonial",
          prevEl: ".swiper-button-prev-testimonial",
        },
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next-testimonial",
          prevEl: ".swiper-button-prev-testimonial",
        },
      },
      1024: {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next-testimonial",
          prevEl: ".swiper-button-prev-testimonial",
        },
      },
    },
  });
});
