// URL ROOT
const URLROOT = "http://localhost/goviSaviya1.0";

// navbar========
const navBtn = document.getElementById("bars_btn");
const overlay = document.getElementById("navSidebar_overlay");
const navSidebar = document.getElementById("navSidebar_cont");

navBtn.addEventListener("click", () => {
  navSidebar.classList.add("show_navSidebar");
  overlay.classList.add("show_overlay");
  navBtn.classList.toggle("rotate_btn");
});

overlay.addEventListener("click", () => {
  navSidebar.classList.remove("show_navSidebar");
  overlay.classList.remove("show_overlay");
  navBtn.classList.toggle("rotate_btn");
});

// const joinBtn = document.getElementById("join_btn");
// const signinBtn = document.getElementById("signin_btn");

// joinBtn.addEventListener("click", () => {
//     window.location.href = `${URLROOT}/register`;
//   });
//   signinBtn.addEventListener("click", () => {
//     window.location.href = `${URLROOT}/login`;
//   });

document.addEventListener("click", (event) => {
  const targetId = event.target.id;

  if (targetId === "join_btn") {
    window.location.href = `${URLROOT}/register`;
  } else if (targetId === "signin_btn") {
    window.location.href = `${URLROOT}/login`;
  }
});

// seller
