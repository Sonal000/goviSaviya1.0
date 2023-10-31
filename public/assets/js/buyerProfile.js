
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


