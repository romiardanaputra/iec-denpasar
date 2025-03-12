import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
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
        modules: [Navigation, Pagination, Autoplay],
        effect: "fade",
        grabCursor: true,
        centeredSlides: true,
        pagination: {
          el: ".swiper-pagination-team",
          clickable: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
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
    }
  }

  function disableSwiper() {
    if (swiperTeam) {
      swiperTeam.destroy(true, true);
      swiperTeam = null;
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

  document.getElementById("whatsapp-link").href =
    "https://wa.me/6285792479249?text=" +
    encodeURIComponent(
      "Halo IEC Denpasar! Saya tertarik untuk bergabung. Kirimkan CV atau lamaran saya melalui link ini ya! 😊",
    );
});
