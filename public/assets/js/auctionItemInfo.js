

// go back btn

const backBtn = document.querySelector('.back_btn');

backBtn.addEventListener('click',()=>{
  window.location.href =`${URLROOT}/auctionC`
})





// item-info image slider
const sliderButtons = document.querySelectorAll('.slider_btn');
const mainImage = document.querySelector('.main_img');


sliderButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    const clickedImageSrc = button.querySelector('.slider_img').getAttribute('src');
    mainImage.setAttribute('src', clickedImageSrc);
  });
});


// qunatity adjust
const btnAdd = document.querySelector(".btn_add");
const btnRemove = document.querySelector(".btn_remove");
const qty = document.getElementById("quantity");

let currentbid =qty.dataset.currentprice;

btnAdd.addEventListener("click", (e) => {
  e.preventDefault();
  qty.value = parseInt(qty.value) + 1;
});
btnRemove.addEventListener("click", (e) => {
  e.preventDefault();
  if (qty.value >currentbid) {
    qty.value = parseInt(qty.value) - 1;
  }
});
