import { gsap } from "gsap";

export default function hamburger() {
  const burger = document.getElementById("hamburger");
  const mainMenu = document.querySelector(".site-header__menu");
  const htmlElement = document.querySelector("html");
  const loginMenu = document.querySelector(".site-header__login");
  burger.addEventListener("click", function(e) {
    mainMenu.classList.toggle("hidden_mobile");
    mainMenu.classList.toggle("is-active");
    burger.classList.toggle("is-active");
    if (loginMenu.classList.contains("hidden_mobile-login")) {
      setTimeout(function() {
        loginMenu.classList.toggle("hidden_mobile-login");
      }, 550);
    } else {
      loginMenu.classList.toggle("hidden_mobile-login");
    }

    // prevent content scrolling
    htmlElement.classList.toggle("noscroll");
  });
}
