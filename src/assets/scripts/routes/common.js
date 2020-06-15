import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import countdown from "./../part/countdown";
import carousel from "./../part/carousel";

export default {
  init() {
    // JavaScript to be fired on all pages

    // kick off the polyfill!
    smoothscroll.polyfill();

    // Hamburger event listener
    hamburger();

    // Countdown
    countdown();

    // Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
    const lazyObserver = lozad(".lozad", {
      load: function(el) {
        el.src = el.dataset.src;
      }
    }); // lazy loads elements with default selector as '.lozad'
    lazyObserver.observe();

    // Swiper
    const slider = document.getElementById("slider");
    if (typeof slider != "undefined" && slider != null) {
      carousel();
    }
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  }
};
