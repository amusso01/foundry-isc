import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";

gsap.registerPlugin(CSSRulePlugin);

export default function sharing() {
  const shareIcon = document.querySelector(".social-share__main-icon > svg ");
  const iconsContainer = document.querySelector(".social-share__icons");
  const icons = iconsContainer.querySelectorAll("svg");
  const tl = gsap.timeline({ paused: true, reversed: true });

  tl.set(icons, {
    pointerEvents: "auto"
  });
  tl.to(icons, {
    opacity: 1,
    stagger: 0.1,
    duration: 0.5
  });

  shareIcon.addEventListener("click", () => {
    shareIcon.classList.toggle("open");
    toggleTween(tl);
  });

  function toggleTween(tween) {
    tween.reversed() ? tween.play() : tween.reverse();
  }
}
