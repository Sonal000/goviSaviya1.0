// qunatity adjust
const btnAdd = document.querySelectorAll(".btn_add");
const btnRemove = document.querySelectorAll(".btn_remove");
const cartItem = document.querySelectorAll(".cart_item_cont");
const subvalue = document.querySelector('.subvalue');
const totvalue = document.querySelector('.totvalue');

btnAdd.forEach((btn, id) => {
  btn.addEventListener("click", (e) => {
    const qtyBtnsCont = e.target.closest(".qty_btn_cont");
    const qty = qtyBtnsCont.querySelector(".qty");
    qty.value = parseInt(qty.value) + 1;
  });
});

btnRemove.forEach((btn, id) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    const qtyBtnsCont = e.target.closest(".qty_btn_cont");
    const qty = qtyBtnsCont.querySelector(".qty");
    if (qty.value > 0) {
      qty.value = parseInt(qty.value) - 1;
    }
  });
});



// count total
let total=0;
cartItem.forEach((el)=>{
  const price =el.dataset.price;
  const qty =el.dataset.qty;
  total=total+(price*qty);
});

if(subvalue){
  subvalue.innerHTML=total;
}
if(totvalue){
  totvalue.innerHTML=total;
}