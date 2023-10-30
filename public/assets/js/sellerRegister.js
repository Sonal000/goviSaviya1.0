


const form = document.getElementById('seller_reg_form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const mobileInput = document.getElementById('mobile');
const addressInput = document.getElementById('address');
const cityInput = document.getElementById('city');
const passwordInput = document.getElementById('password');
const password_reInput = document.getElementById('password_re');






form.addEventListener('submit',(e)=>{
 e.preventDefault();
 // nameInput.classList.add('invalid');
 inputValidation();


 if (
  !(nameInput.classList.contains('invalid') ||
  emailInput.classList.contains('invalid') ||
  mobileInput.classList.contains('invalid') ||
  addressInput.classList.contains('invalid') ||
  cityInput.classList.contains('invalid') ||
  passwordInput.classList.contains('invalid') ||
  password_reInput.classList.contains('invalid'))
) {
  
  form.submit();
 }

});










const setError=(element,message)=>{
 element.classList.add('invalid')
   messageCont = element.nextElementSibling;
   messageCont.innerHTML=message;
}
const setValid=(element)=>{
 element.classList.remove('invalid')
   messageCont = element.nextElementSibling;
   messageCont.innerHTML=null;
}


const inputValidation =()=>{

 const nameValue = nameInput.value.trim();
 const addressValue = addressInput.value.trim();
 const cityValue = cityInput.value.trim();
 const emailValue = emailInput.value.trim();
 const mobileValue = mobileInput.value.trim();
 const passwordValue = passwordInput.value.trim();
 const password_reValue = password_reInput.value.trim();

 if(nameValue===''){
  setError(nameInput,"Name is required.");
 }else{
 setValid(nameInput);
 ;}
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
 if(emailValue===''){
  setError(emailInput,"Email is required.");
 }else{
 setValid(emailInput);
 ;}

 const isValidEmail = email => {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
if(!isValidEmail(emailValue)){
 setError(emailInput,"Email is not valid.");
}else{
 setValid(emailInput);
}

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

if(passwordValue===''){
 setError(passwordInput,"Password is required.");
}else{
  if(password_reValue!==passwordValue){
    setError(passwordInput,"Passwords not matching.");
   }else{
     setValid(passwordInput);
  }
}
if(password_reValue===''){
 setError(password_reInput,"Re-enter your password.");
}else{
   if(password_reValue!==passwordValue){
      setError(password_reInput,"Passwords not matching.");
    }else{
       setValid(password_reInput);
    }
}






}