import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import navDropdown from "./../part/navDropdown";
import countdown from "./../part/countdown";
import bottomBanner from "./../part/bottomBanner";
import carousel from "./../part/carousel";
import carouselFull from "./../part/carouselFull";
import carouselPost from "./../part/carouselPost";
import carouselBanner from "./../part/carouselBanner";
import sharing from "./../part/share";
import search from "./../part/search";

export default {
  init() {
    // JavaScript to be fired on all pages

    // kick off the polyfill!
    smoothscroll.polyfill();

    // Hamburger event listener
    hamburger();

    // Dropdown menu
    navDropdown();

    // Search
    search();

    // Countdown
    countdown();

    // Bottom banner
    bottomBanner();

    // Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
    const lazyObserver = lozad(".lozad", {
      load: function(el) {
        el.src = el.dataset.src;
      }
    }); // lazy loads elements with default selector as '.lozad'
    lazyObserver.observe();

    // SWIPER
    // testimonial
    const slider = document.getElementById("slider");
    if (typeof slider != "undefined" && slider != null) {
      carousel();
    }
    // event carousel
    const fullCarousel = document.getElementById("swiperFull");
    if (typeof fullCarousel != "undefined" && fullCarousel != null) {
      carouselFull();
    }
    // post carousel
    const postCarousel = document.getElementById("swiperPost");
    if (typeof postCarousel != "undefined" && postCarousel != null) {
      carouselPost();
    }
    // Banner carousel
    const bannerCarousel = document.getElementById("swiperBanner");
    if (typeof bannerCarousel != "undefined" && bannerCarousel != null) {
      carouselBanner();
    }

    // Share
    const share = document.getElementById("share");
    if (typeof share != "undefined" && share != null) {
      sharing();
    }
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  }
};
