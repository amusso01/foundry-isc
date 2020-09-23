import Swiper from "swiper/js/swiper";

export default function carouselHome() {
  const mySwiper = new Swiper(".home-carousel_section", {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
      el: ".home-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".slider__left",
      prevEl: ".slider__right"
    }
  });
}
