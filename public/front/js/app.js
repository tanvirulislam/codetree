const hamburger = document.querySelector(".header .nav-list .hamburger");
const mobile_menu = document.querySelector(".header .nav-list ul");
const menu_item = document.querySelectorAll(".header .nav-list ul li a");
const header = document.querySelector(".header.container");
const blur = document.querySelector(".blur");
const popup = document.querySelector(".popup");
const drop1 = document.getElementById("drop1");
const drop2 = document.getElementById("drop2");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  mobile_menu.classList.toggle("active");
});

// document.addEventListener("scroll", () => {
//   var scroll_position = window.scrollY;
//   if (scroll_position > 250) {
//     header.style.backgroundColor = "#29323c";
//   } else {
//     header.style.backgroundColor = "transparent";
//   }
// });

menu_item.forEach((item) => {
  item.addEventListener("click", () => {
    if (item.classList.contains("skip")) {
      return;
    }
    hamburger.classList.toggle("active");
    mobile_menu.classList.toggle("active");
    console.log("kaj kortese");
  });
});

var d = new Date();
document.getElementById("year").innerHTML = d.getFullYear();

AOS.init();

function toggleNav1() {
  drop1.classList.toggle("active");
}
function toggleNav2() {
  drop2.classList.toggle("active");
}
function togglePop() {
  blur.classList.toggle("active");
  popup.classList.toggle("active");
  console.log("hoise");
}
function togglePopForm() {
  // blur.classList.toggle("active");
  popup.classList.toggle("active");
  console.log("hoise");
}
