import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";

gsap.registerPlugin(CSSRulePlugin);

export default function search() {
  const searchIcon = document.querySelector("menu__search");

  tl.set(icons, {
    pointerEvents: "auto"
  });
  tl.to(icons, {
    opacity: 1,
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
