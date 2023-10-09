// qunatity adjust
const btnAdd = document.querySelectorAll('.btn_add');
const btnRemove = document.querySelectorAll('.btn_remove');
const  qty = document.querySelector('.qty');
const item =document.querySelectorAll('.cart_item_cont')



btnAdd.forEach((btn,id)=>{
 btn.addEventListener('click',(e)=>{
  qty.value=parseInt(qty.value)+1;
});
})

btnRemove.forEach((btn,id)=>{
 btn.addEventListener('click',(e)=>{
   if(qty.value>0){
     qty.value=parseInt(qty.value)-1;
   }
 });

});