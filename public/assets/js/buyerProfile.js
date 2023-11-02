
const editAboutBtn = document.getElementById('edit_about_btn');
const editDetailsBtn = document.getElementById('edit_details_btn');
const updateBtn = document.getElementById('update_btn');
const cancelBtn = document.getElementById('cancel_btn');
const aboutDesc =document.getElementById('about_desc');
const aboutCont =document.getElementById('edit_about_cont');



const profCont =document.getElementById('prof_details_cont');
const profEditCont =document.getElementById('prof_details_edit_cont');

editAboutBtn.addEventListener('click',(e)=>{
  aboutDesc.classList.toggle('hide');
  aboutCont.classList.toggle('show');
});
editDetailsBtn.addEventListener('click',(e)=>{
  profCont.classList.toggle('hide');
  profEditCont.classList.toggle('show');  
});





// const uploadImgBtn =document.getElementById('upload_img_btn');
const profImgInput =document.getElementById('prof_img_input');
const profForm =document.getElementById('profile_form');
const editProfileImgBtn =document.getElementById('edit_prof_img_btn');

const coverImgInput =document.getElementById('cover_img_input');
const coverForm =document.getElementById('cover_form');
const editCoverImgBtn =document.getElementById('edit_cover_img_btn');


// profile picture

profImgInput.addEventListener('change',()=>{
  const selectedFile = profImgInput.files[0];
  if (selectedFile) {
     profForm.submit();
     profImgInput.value = "";
  }
});


editProfileImgBtn.addEventListener('click',()=>{
  profImgInput.click();
})

profForm.addEventListener('submit',(e)=>{
e.preventDefault();
profImgInput.value = "";
profForm.submit();
});


//cover picture
coverImgInput.addEventListener('change',()=>{
  const selectedFile = coverImgInput.files[0];
  if (selectedFile) {
    console.log('Selected file name: ' + selectedFile.name); 
     coverForm.submit();
  }
});


editCoverImgBtn.addEventListener('click',()=>{
  coverImgInput.click();
})

coverForm.addEventListener('submit',(e)=>{
e.preventDefault();
coverForm.submit();
});




///settings

const psBtn = document.getElementById('ps_btn');
const psCont = document.getElementById('ps_cont');
const changeBtn = document.getElementById('change_btn');
const changeCont = document.getElementById('change_cont');
const asBtn = document.getElementById('as_btn');
const asCont = document.getElementById('as_cont');
const deleteBtn = document.getElementById('delete_btn');
const deleteCont = document.getElementById('delete_cont');
const settingBtn = document.getElementById('settings_btn');
const settingSec = document.getElementById('settings_section');
const overlayBtn= document.getElementById('overlayBtn');

settingBtn.addEventListener('click',()=>{
  settingSec.classList.toggle('settings_show');
  overlayBtn.classList.toggle('overlay_show');
});
overlayBtn.addEventListener('click',()=>{
  console.log('setting');
  settingSec.classList.toggle('settings_show');
  overlayBtn.classList.toggle('overlay_show');
});

psBtn.addEventListener('click',()=>{
  psCont.classList.toggle('show_info')
});
changeBtn.addEventListener('click',()=>{
  changeCont.classList.toggle('show_form')
});

asBtn.addEventListener('click',()=>{
  asCont.classList.toggle('show_info')
});
deleteBtn.addEventListener('click',()=>{
  deleteCont.classList.toggle('show_form')
});




// delete form
// const deleteForm = document.getElementById('delete_account_form');
// const reasonInput = document.getElementById('reason');
// const passwordInput = document.getElementById('current_password');
// const deleteUserBtn = document.getElementById('delete_submit_btn');
// const loader=document.querySelector('.loader_cont');



// deleteForm.addEventListener('submit',(e)=>{
//  e.preventDefault();



//  // nameInput.classList.add('invalid');
//  inputValidation();
//  if (
//   !(passwordInput.classList.contains('invalid'))
// ){
//   deleteForm.submit();
//  }

// });


// const setError=(element,message)=>{
//  element.classList.add('invalid')
//    messageCont = element.nextElementSibling;
//    messageCont.innerHTML=message;
// }
// const setValid=(element)=>{
//  element.classList.remove('invalid')
//    messageCont = element.nextElementSibling;
//    messageCont.innerHTML=null;
// }


// const inputValidation =()=>{
//  const passwordValue = passwordInput.value.trim();
// if(passwordValue===''){
//  setError(passwordInput,"Password is required.");
// }else{
//      setValid(passwordInput);
//   }
// }



