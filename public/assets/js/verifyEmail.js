


const form = document.getElementById('code_reg_form');
const codeInput = document.getElementById('code');
const signUpBtn=document.getElementById('signup_btn');
const loader=document.querySelector('.loader_cont');

let isLoggingIn=false;
const toggleLogingState=(state)=>{
  if(state){
    signUpBtn.disable =true;
    signUpBtn.innerHTML="Verifying...";
    console.log(isLoggingIn);
    loader.classList.toggle('loader_show');
  }else{
    signUpBtn.disable =false;
    signUpBtn.innerHTML="Verify";
  }
};







form.addEventListener('submit',(e)=>{
 e.preventDefault();
 // nameInput.classList.add('invalid');
 if(isLoggingIn){
  return;
 }
 inputValidation();
 if (
  !(codeInput.classList.contains('invalid'))
) {
  isLoggingIn=true;
  toggleLogingState(isLoggingIn);
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
 const codeValue = codeInput.value.trim();


if(codeValue==''){
 setError(codeInput,"Invalid Code.");
}else{
setValid(codeInput);
;}


}





