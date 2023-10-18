


const reviewBtn = document.getElementById('add_review_btn');
const reviewInput = document.querySelector(".review_write_cont");


reviewBtn.addEventListener('click',()=>{
 reviewInput.classList.toggle('show');
});