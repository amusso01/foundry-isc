export default function navDropdown() {
  const menuLi = document.querySelector(".menu-item-has-children");
  const loginMenu = document.querySelector(".site-header__login");

  let mql = window.matchMedia("(max-width: 1040px)");

  if (mql.matches) {
    menuLi.addEventListener("click", e => {
      e.preventDefault();
      menuLi.classList.toggle("open");
      loginMenu.classList.toggle("hide");
    });
  }
}
