const hamburger = document.querySelector(".hamburger");
const navGroup = document.querySelector(".nav__group");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navGroup.classList.toggle("active");
});
