import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";

gsap.registerPlugin(CSSRulePlugin);

export default function navDropdown() {
  const menuLi = document.querySelector(".menu-item-has-children");
  const subMenu = menuLi.querySelector(".sub-menu");
  const loginMenu = document.querySelector(".site-header__login");
  const tl = gsap.timeline({ paused: true, reversed: true });

  tl.set(subMenu, {
    pointerEvents: "auto"
  });
  tl.to(subMenu, {
    opacity: 1,
    duration: 0.5
  });

  let mql = window.matchMedia("(max-width: 1040px)");

  if (mql.matches) {
    menuLi.addEventListener("click", e => {
      e.preventDefault();
      menuLi.classList.toggle("open");
      loginMenu.classList.toggle("hide");
    });
  } else {
    menuLi.addEventListener("click", e => {
      e.preventDefault();
      toggleTween(tl);
    });
  }

  function toggleTween(tween) {
    tween.reversed() ? tween.play() : tween.reverse();
  }
}
