const userBtns = document.querySelectorAll('.user_btn');
const buyerBtn = document.getElementById('buyer_btn');
const deliveryBtn = document.getElementById('delivery_btn');
const sellerBtn = document.getElementById('seller_btn');













sellerBtn.addEventListener('click',()=>{
 userBtns.forEach(el=>el.classList.remove('active_btn'));
 sellerBtn.classList.add('active_btn');

})


buyerBtn.addEventListener('click',()=>{
 userBtns.forEach(el=>el.classList.remove('active_btn'));
 buyerBtn.classList.add('active_btn');

})


deliveryBtn.addEventListener('click',()=>{
 userBtns.forEach(el=>el.classList.remove('active_btn'));
 deliveryBtn.classList.add('active_btn');

})