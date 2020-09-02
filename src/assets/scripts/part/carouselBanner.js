import Swiper from "swiper/js/swiper";

export default function carouselBanner() {
  const mySwiper = new Swiper(".swiper-container", {
    autoplay: {
      delay: 3500,
      speed: 4000,
      disableOnInteraction: false
    },
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
