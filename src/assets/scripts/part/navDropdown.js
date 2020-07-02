import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";

gsap.registerPlugin(CSSRulePlugin);

export default function navDropdown() {
  const menuLi = document.querySelector(".menu-item-has-children");
  const menuLiChildren = document.querySelector(".menu-item-has-children > a");
  const subMenu = menuLi.querySelector(".sub-menu");
  const body = document.querySelector("body");
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
    menuLiChildren.addEventListener("click", e => {
      e.preventDefault();
      menuLi.classList.toggle("open");
      loginMenu.classList.toggle("hide");
    });
  } else {
    menuLiChildren.addEventListener("click", e => {
      e.preventDefault();
      menuLi.classList.toggle("active");
      toggleTween(tl);
    });
    body.addEventListener("mouseup", e => {
      if (
        !e.target.classList.contains("menu-item-has-children") &&
        !e.target.parentElement.classList.contains("menu-item-has-children")
      ) {
        if (menuLi.classList.contains("active")) {
          menuLi.classList.toggle("active");
          toggleTween(tl);
        }
      }
    });
  }

  function toggleTween(tween) {
    tween.reversed() ? tween.play() : tween.reverse();
  }
}
