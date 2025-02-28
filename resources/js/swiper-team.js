import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules"; // ✅ Import Autoplay
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

document.addEventListener("livewire:navigated", function () {
  let swiperTeam;
  const wrapper = document.querySelector(".swiper-wrapper");
  const slides = document.querySelectorAll(".swiper-slide");

  function enableSwiper() {
    if (!swiperTeam) {
      wrapper.classList.add("swiper-wrapper");
      slides.forEach((slide) => slide.classList.add("swiper-slide"));

      swiperTeam = new Swiper(".swiper-team", {
        modules: [Navigation, Pagination, Autoplay], // ✅ Add Autoplay module
        effect: "fade",
        grabCursor: true,
        centeredSlides: true,
        pagination: {
          el: ".swiper-pagination-team",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next-team",
          prevEl: ".swiper-button-prev-team",
        },
        slidesPerView: 1,
        spaceBetween: 5,
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
        },
      });

      console.log("Swiper enabled with autoplay");
    }
  }

  function disableSwiper() {
    if (swiperTeam) {
      swiperTeam.destroy(true, true);
      swiperTeam = null;
      console.log("Swiper disabled on desktop");
    }
    wrapper.classList.remove("swiper-wrapper");
    slides.forEach((slide) => slide.classList.remove("swiper-slide"));
  }

  function handleSwiper() {
    if (window.innerWidth >= 1024) {
      disableSwiper();
    } else {
      enableSwiper();
    }
  }

  handleSwiper();
  window.addEventListener("resize", handleSwiper);
});
