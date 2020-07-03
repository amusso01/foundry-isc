import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";

gsap.registerPlugin(CSSRulePlugin);

export default function search() {
  const searchIcon = document.querySelector(".menu__search");
  const search = document.getElementById("searchform");
  const close = document.querySelector(".search__close");
  const tl = gsap.timeline({ paused: true, reversed: true });

  tl.set(search, {
    pointerEvents: "auto"
  });
  tl.to(search, {
    opacity: 1,
    rotateX: 360,
    duration: 0.5
  });

  searchIcon.addEventListener("click", () => {
    searchIcon.classList.toggle("open");
    toggleTween(tl);
  });
  close.addEventListener("click", () => {
    searchIcon.classList.toggle("open");
    toggleTween(tl);
  });

  function toggleTween(tween) {
    tween.reversed() ? tween.play() : tween.reverse();
  }
}
