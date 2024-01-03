"use strict";

const landing1 = document.getElementById("landing1");
const landing2 = document.getElementById("landing2");
const landing3 = document.getElementById("landing3");
const landing4 = document.getElementById("landing4");
const landing5 = document.getElementById("landing5");

let index = 1;

setInterval(() => {
  if (index > 5) {
    index = 1;
  }
  const currentElement = document.getElementById(`landing${index}`);
  const previousElement = document.getElementById(
    `landing${((index + 3) % 5) + 1}`
  );
  const nextElement = document.getElementById(`landing${(index % 5) + 1}`);
  if (currentElement && previousElement) {
    currentElement.classList.toggle("landing_show");
  }
  // console.log(((index % 5) +1));
  setTimeout(() => {
    previousElement.classList.toggle("landing_show");
  }, 2000);

  index++;
}, 7000);

// ================

// let index = 5;

// setInterval(()=>{
//  if(index<0){
//   index=5;
//  }
//   const currentElement = document.getElementById(`landing${index}`);
//   const previousElement = document.getElementById(`landing${((index + 3) % 5) + 1}`);
//   const nextElement = document.getElementById(`landing${((index % 5) +1)}`);
//   if (currentElement && previousElement && nextElement) {
//     previousElement.classList.toggle('landing_show');
//   }
//   console.log(((index % 5) +1));
//   setTimeout(()=>{
//     currentElement.classList.toggle('landing_show');
//     console.log("in timeout",index);
//   },2000)

//  index--;
// },7000);

// navbar

const navbar = document.querySelector(".navbar_cont");
const navlink = document.querySelectorAll(".navlink");
const signBtn = document.getElementById("signin_btn");

if (signBtn) {
  signBtn.classList.add("signin_link_d");
}

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 20 && window.pageYOffset < 665) {
    navbar.classList.add("navbar_hide");
  }
  if (window.pageYOffset < 20 || window.pageYOffset > 665) {
    navbar.classList.remove("navbar_hide");
  }
  if (window.pageYOffset > 665) {
    navbar.classList.remove("navbar_hide");
    navbar.classList.add("navbar_background");
    navlink.forEach((link) => {
      link.classList.add("navlink_d");
    });
    if (signBtn) {
      signBtn.classList.remove("signin_link_d");
  }
  }
  if (window.pageYOffset < 665) {
    navbar.classList.remove("navbar_background");
    navlink.forEach((link) => {
      link.classList.remove("navlink_d");
    });
    if (signBtn) {
      signBtn.classList.add("signin_link_d");
    }
  }
});
