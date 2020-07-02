import Swiper from "swiper/js/swiper";

export default function carouselBanner() {
  const mySwiper = new Swiper(".swiper-container", {
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
}
