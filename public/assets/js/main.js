// URL ROOT
const URLROOT = 'http://localhost/goviSaviya1.0';



// navbar========
const navBtn = document.getElementById('bars_btn');
const overlay = document.getElementById('navSidebar_overlay');
const navSidebar = document.getElementById('navSidebar_cont');

navBtn.addEventListener('click',()=>{
 navSidebar.classList.add('show_navSidebar');
 overlay.classList.add('show_overlay');
 navBtn.classList.toggle('rotate_btn');
});

overlay.addEventListener('click',()=>{
 navSidebar.classList.remove('show_navSidebar');
 overlay.classList.remove('show_overlay');
 navBtn.classList.toggle('rotate_btn');

})





