


const form = document.getElementById('login_reg_form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');






form.addEventListener('submit',(e)=>{
 e.preventDefault();
 // nameInput.classList.add('invalid');
 inputValidation();
 if (
  !(emailInput.classList.contains('invalid') ||
  passwordInput.classList.contains('invalid'))
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
 const emailValue = emailInput.value.trim();
 const passwordValue = passwordInput.value.trim();



 const isValidEmail = email => {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}
if(!isValidEmail(emailValue)){
 setError(emailInput,"Email is not valid.");
}else{
 setValid(emailInput);
}

if(emailValue===''){
 setError(emailInput,"Email is required.");
}else{
setValid(emailInput);
;}


if(passwordValue===''){
 setError(passwordInput,"Password is required.");
}else{
     setValid(passwordInput);
  }
}







