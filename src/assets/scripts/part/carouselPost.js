import Swiper from "swiper/js/swiper";

export default function carouselPost() {
  const mySwiper = new Swiper(".swiper-container", {
    // Optional parameters

    breakpoints: {
      // when window width is <= 480px
      480: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      // when window width is <= 640px
      640: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      960: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    },

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });
}
