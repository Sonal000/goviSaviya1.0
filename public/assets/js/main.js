// URL ROOT
const URLROOT = 'http://localhost/web-project';



// navbar========
const navBtn = document.getElementById('bars_btn');
const links = document.getElementById('navlinks');

navBtn.addEventListener('click',()=>{
 links.classList.toggle('show_links');
 navBtn.classList.toggle('rotate_btn');
 
});





