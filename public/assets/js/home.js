'use strict';


const landing1 = document.getElementById("landing1");
const landing2 = document.getElementById('landing2');
const landing3 = document.getElementById('landing3');
const landing4 = document.getElementById('landing4');
const landing5 = document.getElementById('landing5');


let index = 1;

setInterval(()=>{
 if(index>5){
  index=1;
 }
  const currentElement = document.getElementById(`landing${index}`);
  const previousElement = document.getElementById(`landing${((index + 3) % 5) + 1}`);
  if (currentElement && previousElement) {
    currentElement.classList.toggle('landing_show');
    previousElement.classList.toggle('landing_show');
  }
 
 index++;

},8000);



const navbar = document.querySelector('.navbar_cont');

window.addEventListener("scroll",()=>{
 if(window.pageYOffset>20 && window.pageYOffset<665){
  navbar.classList.add('navbar_hide');
 }
 if(window.pageYOffset<20 || window.pageYOffset>665 ){
  navbar.classList.remove('navbar_hide');
 }
 if(window.pageYOffset>665){
  navbar.classList.remove('navbar_hide');
  navbar.classList.add('navbar_background');
 }
 if(window.pageYOffset<665 ){
  navbar.classList.remove('navbar_background');
 }

 console.log(pageYOffset);
})
