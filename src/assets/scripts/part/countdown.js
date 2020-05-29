export default function countdown() {
  const banner = document.getElementById("countdown");

  if (typeof banner != "undefined" && banner != null) {
    const dayLeft = banner.querySelector(".day");
    const hourLeft = banner.querySelector(".hr");
    const minuteLeft = banner.querySelector(".min");
    const secondLeft = banner.querySelector(".sec");
    const cta = banner.querySelector("#countdown-cta");
    const info = banner.querySelector("#info-countdown");
    const eventDate = banner.dataset.date;
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

    let countDown = new Date(eventDate).getTime(),
      x = setInterval(function() {
        let now = new Date().getTime(),
          distance = countDown - now;

        (dayLeft.innerText = Math.floor(distance / day)),
          (hourLeft.innerText = Math.floor((distance % day) / hour)),
          (minuteLeft.innerText = Math.floor((distance % hour) / minute)),
          (secondLeft.innerText = Math.floor((distance % minute) / second));

        //do something later when date is reached
        if (distance < 0) {
          clearInterval(x);
          if (!banner.classList.contains("countdown__expired")) {
            banner.classList.add("countdown__expired");
          }
          dayLeft.innerText = "0";
          hourLeft.innerText = "0";
          minuteLeft.innerText = "0";
          secondLeft.innerText = "0";
          info.innerText = "Event has been held";
          dayLeft.setAttribute("style", "color:#727272;");
          hourLeft.setAttribute("style", "color:#727272;");
          minuteLeft.setAttribute("style", "color:#727272;");
          secondLeft.setAttribute("style", "color:#727272;");
          info.setAttribute("style", "color:#727272;");

          cta.addEventListener("click", e => {
            e.preventDefault();
          });
        }
      }, second);

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
        banner.classList.add("countdown-up");
      } else {
        banner.classList.remove("countdown-up");
      }
    }
  }
}
