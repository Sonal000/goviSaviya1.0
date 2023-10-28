


// const reviewBtn = document.getElementById('add_review_btn');
// const reviewInput = document.querySelector(".review_write_cont");


// reviewBtn.addEventListener('click',()=>{
//  reviewInput.classList.toggle('show');
// });


const editAboutBtn = document.getElementById('edit_about_btn');
const editDetailsBtn = document.getElementById('edit_details_btn');
const updateBtn = document.getElementById('update_btn');
const cancelBtn = document.getElementById('cancel_btn');
const aboutDesc =document.getElementById('about_desc');
const aboutCont =document.getElementById('edit_about_cont');
const editProfImgBtn =document.getElementById('edit_prof_img_btn');
const profImgInput =document.getElementById('prof_img_input');
const profImgSubmit =document.getElementById('prof_img_submit');
const profForm =document.getElementById('profile_form');

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

profImgInput.addEventListener('change',()=>{
  profForm.submit();
  console.log("submit");
})

editProfImgBtn.addEventListener('click', () => {
  profImgInput.click();
});
