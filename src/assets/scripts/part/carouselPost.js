import Swiper from "swiper/js/swiper";

export default function carouselPost() {
  const mySwiper = new Swiper(".swiper-container", {
    // Optional parameters
    slidesPerView: 3,
    spaceBetween: 20,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });
}
