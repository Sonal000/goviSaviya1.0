


const form = document.getElementById('placeOrderForm');
// const nameInput = document.getElementById('name');
// const emailInput = document.getElementById('email');
const mobileInput = document.getElementById('mobile');
const addressInput = document.getElementById('address');
const cityInput = document.getElementById('city');
const postalInput = document.getElementById('postalCode');
const cardHolderInput = document.getElementById('cardHolder');
const cardNoInput = document.getElementById('cardNo');
const cardExpDateInput = document.getElementById('cardExpDate');
const cvvInput = document.getElementById('cvv');
const orderReq = document.querySelector('.order_req');
const cartItem = document.querySelectorAll(".item");
const subvalue = document.querySelector('.subvalue');
const totvalue = document.querySelector('.totvalue');



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




form.addEventListener('submit',(e)=>{
 e.preventDefault();
 inputValidation();


 if (
  !(mobileInput.classList.contains('invalid') ||
  addressInput.classList.contains('invalid') ||
  cityInput.classList.contains('invalid') ||
  postalInput.classList.contains('invalid') ||
  cardHolderInput.classList.contains('invalid')||
  cardNoInput.classList.contains('invalid')||
  cardExpDateInput.classList.contains('invalid')||
  cvvInput.classList.contains('invalid')
  )
) {
  form.submit();
 }

});










const setError=(element,message)=>{
 element.classList.add('invalid')
   messageCont = element.nextElementSibling;
   messageCont.innerHTML=message;
   orderReq.innerHTML="Fill out all the required feilds !";
}
const setValid=(element)=>{
 element.classList.remove('invalid')
   messageCont = element.nextElementSibling;
   messageCont.innerHTML=null;
}


const inputValidation =()=>{
 const addressValue = addressInput.value.trim();
 const cityValue = cityInput.value.trim();
 const mobileValue = mobileInput.value.trim();
 const postalValue = postalInput.value.trim();
 const cardHolderValue = cardHolderInput.value.trim();
 const cardNoValue = cardNoInput.value.trim();
 const cardExpDateValue = cardExpDateInput.value.trim();
 const cvvValue = cvvInput.value.trim();

 if(addressValue===''){
  setError(addressInput,"Address is required.");
 }else{
 setValid(addressInput);
 ;}
 if(cityValue===''){
  setError(cityInput,"City is required.");
 }else{
 setValid(cityInput);
 ;}



const isValidMobileNumber = /^\d{10}$/;

if(mobileValue===''){
 setError(mobileInput,"Mobile number is required.");
}else if (mobileValue.length !== 10) {
  setError(mobileInput, "Mobile number must be exactly 10 digits.");
}else if(!isValidMobileNumber.test(mobileValue)){
  setError(mobileInput, "Mobile number is not valid.");
}else{
 setValid(mobileInput);
}

const isValidPostalCode = /^\d+$/;

if(postalValue===''){
 setError(postalInput,"Postal Code is required.");
}else if (postalValue.length < 4) {
  setError(postalInput, "Valid Postal Code is required.");
}else if(!isValidPostalCode.test(postalValue)){
  setError(postalInput, "Postal Code is not valid.");
}else{
 setValid(postalInput);
}
const isValidCardNumber = /^\d+$/;

if(cardNoValue===''){
 setError(cardNoInput,"Card Number is required.");
}else if (cardNoValue.length < 4) {
  setError(cardNoInput, "Valid Card Number is required.");
}else if(!isValidCardNumber.test(cardNoValue)){
  setError(cardNoInput, "Card Number is not valid.");
}else{
 setValid(cardNoInput);
}

const isValidCardExpDate = /^\d+$/;

if(cardExpDateValue===''){
 setError(cardExpDateInput,"Card Expiration Date is required.");
}else if (cardExpDateValue.length < 4) {
  setError(cardExpDateInput, "Valid Card Expiration Date is required.");
}else if(!isValidCardExpDate.test(cardExpDateValue)){
  setError(cardExpDateInput, "Card Expiration Date is not valid.");
}else{
 setValid(cardExpDateInput);
}

const isValidCVV = /^\d+$/;

if(cvvValue===''){
 setError(cvvInput,"CVV Number is required.");
}else if (cvvValue.length < 3) {
  setError(cvvInput, "Valid CVV Number is required.");
}else if(!isValidCVV.test(cvvValue)){
  setError(cvvInput, "CVV Number is not valid.");
}else{
 setValid(cvvInput);
}


if(cardHolderValue===''){
  setError(cardHolderInput,"Card Holder's Name is required.");
 }else{
 setValid(cardHolderInput);
 ;}

}