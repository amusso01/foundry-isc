import Swiper from "swiper/js/swiper";

export default function carousel() {
  const mySwiper = new Swiper(".swiper-container", {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });
}
