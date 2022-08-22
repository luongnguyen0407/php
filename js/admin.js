const showDrop = document.querySelector(".avatar-img");
const dropDow = document.querySelector(".dropdown-menu");
showDrop.addEventListener("click", () => {
  dropDow.style.height = `${dropDow.scrollHeight}px`;
  dropDow.classList.toggle("show");
  if (!dropDow.classList.contains("show")) {
    dropDow.style.height = "0px";
  }
});

window.addEventListener("click", (e) => {
  if (!dropDow.contains(e.target) && !e.target.matches(".avatar-img")) {
    dropDow.classList.remove("show");
    dropDow.style.height = "0px";
  }
});

const now = new Date();
const hrs = now.getHours();
const gd = document.querySelector(".go-mr");
let msg;
if (hrs > 0) msg = "Mornin' Sunshine!,"; // REALLY early
if (hrs > 6) msg = "Good Morning,"; // After 6am
if (hrs > 12) msg = "Good Afternoon,"; // After 12pm
if (hrs > 17) msg = "Good Evening,"; // After 5pm
if (hrs > 22) msg = "Go To Bed!,"; // After 10pm

gd.textContent = msg;
