const bar = document.querySelector(".bar");
const menu = document.querySelector(".menu-main");
const showDrop = document.querySelector(".dropdown-btn");
const dropDow = document.querySelector(".dropdown-menu");
showDrop.addEventListener("click", () => {
  dropDow.style.height = `${dropDow.scrollHeight + 20}px`;
  dropDow.classList.toggle("show-child");
  if (!dropDow.classList.contains("show-child")) {
    dropDow.style.height = "0px";
  }
});

bar.addEventListener("click", () => {
  menu.classList.toggle("active");
});
window.addEventListener("click", (e) => {
  if (!menu.contains(e.target) && !e.target.matches(".bar")) {
    menu.classList.remove("active");
  }
  if (!dropDow.contains(e.target) && !e.target.matches(".dropdown-btn")) {
    dropDow.classList.remove("show-child");
    dropDow.style.height = "0px";
  }
});
function debounceFn(func, wait, immediate) {
  let timeout;
  return function () {
    let context = this,
      args = arguments;
    let later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    let callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}
const header = document.querySelector(".header");
let heightHeader = header.offsetHeight;
window.addEventListener(
  "scroll",
  debounceFn(() => {
    if (pageYOffset > heightHeader) {
      header.classList.add("fixed");
      document.body.style.paddingTop = `${heightHeader}px`;
    } else {
      if (header.matches(".fixed")) {
        header.classList.remove("fixed");
        document.body.style.paddingTop = 0;
      }
    }
  }, 50)
);
