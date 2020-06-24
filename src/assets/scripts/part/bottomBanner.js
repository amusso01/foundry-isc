export default function bottomBanner() {
  const banner = document.getElementById("signUp-banner");

  if (typeof banner != "undefined" && banner != null) {
    let didScroll = false;
    window.addEventListener("scroll", function(e) {
      didScroll = true;
    });
    setInterval(function() {
      if (didScroll) {
        scrolled();
        didScroll = false;
      }
    }, 250);

    // function to run on scrolling
    function scrolled() {
      let sy = window.scrollY;
      // only trigger if scrolled more than delta
      if (sy > 400) {
        banner.classList.add("signUp-banner-up");
      } else {
        banner.classList.remove("signUp-banner-up");
      }
    }
  }
}
