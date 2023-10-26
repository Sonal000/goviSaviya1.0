

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $data['userid'] ?></title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">


 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/buyerProfile.css">
</head>
<body>



 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>

<!-- navbar end ================== -->

<section class="profile_section">
  <div class="profile_conts">
   <div class="cover_img_cont">
    <img src="<?php echo URLROOT ?>/assets/images/sell.jpg" alt="cover" class="cover_img">
    <a href="#" class="cover_icon"> edit Cover<i class="fas fa-pen"></i></a>
    <a href="<?php echo URLROOT ?>/profile/10" class="view_icon"> Profile View<i class="far fa-eye"></i></a>
   </div>


    <div class="profile_details">
      <div class="prof_img_cont">
          <!-- <img src="" alt="profile" class="profile_img"> -->
          <div class="profile_img_cont">
          <img src="<?php echo URLROOT ?>/assets/images/profile.jpg" alt="profile" class="profile_img">
          <a href="#" class="profile_icon"> edit profile picture<i class="fas fa-pen"></i></a>
                      <div class="name_cont">
                <p class="user_name">Sonal Induwara 
                  <span><i class="fas fa-check-circle check_icon"></i>
                  </span>
                </p>
            </div>
          </div>

 
          <a class="become_seller" href="<?php echo URLROOT ?>/sellerRegister"> Become a seller <span><i class="fas fa-user"></i></span></a>
      </div>

        <div class="text_cont">

          <div class="status_cont">

            <div class="stat_cont">
        <div class="stat">
          <p>Rating</p>
          <span>4.5</span>
          <i class="fas fa-star rating-icon"></i>
        </div>

        <div class="stat">
          <p>Buy</p>
          <span>300</span>
          <i class="far fa-check-square"></i>
        </div>

        <div class="stat">
          <p>Positive reviews </p>
          <span>90%</span>
        </div>
      </div>
          </div>
        </div>
        </div>

    </div>



</section>

<section class="details_section">
     <div class="details">

      <div class="about_title">
       <h3>About</h3>
       <button class="edit_about_btn" id="edit_about_btn"><i class="fas fa-pen"></i></button>

       
      </div>
      <p class="descp" id="about_desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea, magnam? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem vero saepe nesciunt.</p>
      <div class="edit_about_cont" id="edit_about_cont">
      <textarea class="edit_about" >
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea, magnam? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem vero saepe nesciunt.
</textarea>
           <div class="edit_about_btn_cont">
              <button class="btn cancel_btn">Cancel</button>
              <button class="btn update_btn">Save</button>
           </div>

      </div>




      <div class="profile_details_cont">
      <div class="about_title">
       <h3>Profile Details</h3>
       <button class="edit_details_btn" id="edit_details_btn"><i class="fas fa-pen"></i></button>
      </div>
      <div class="prof_details_cont" id="prof_details_cont">

        <div class="detail_cont">
            <p class="detail_name">Name</p>
            <p class="detail_desc">Sonal Induwara</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Address</p>
            <p class="detail_desc">No.73/A ,delthuduwa ,Induruwa</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Email</p>
            <p class="detail_desc">sonalinduwara@gmail.com</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Contact Number</p>
            <p class="detail_desc">+94717799121</p>
        </div>

      </div>
      <div class="prof_details_edit_cont" id="prof_details_edit_cont">

      <div class="detail_edit_cont">
            <p class="detail_name">Name</p>
            <input type="text" class="detail_desc" value="Sonal Induwara"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Address</p>
            <input type="text" class="detail_desc" value="No.73/A ,delthuduwa ,Induruwa"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Email</p>
            <input type="email" class="detail_desc" value="sonalinduwara@gmail.com"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Contact Number</p>
            <input type="text" class="detail_desc" value="+94717799121"></input>
        </div>

        <div class="edit_details_btn_cont">
              <button class="btn cancel_btn">Cancel</button>
              <button class="btn update_btn">Save</button>
        </div>
         
      </div>

      
     </div>
</section>


</section>


<!-- <section class="section_review">

<div class="reviews_title_cont">
      <h3>Reviews</h3>
      <div class="add_review_cont">
        <button class="add_review_btn" title="write a review" id="add_review_btn">
          <i class="fas fa-edit"></i>
        </button>
      </div>
  </div>
  <div class="review_write_cont">
    <input type="textarea" class="review_input" placeholder="Write a Review">
    <button class="btn_post btn">post</button>
  </div>
  

</section> -->










<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->











  <!-- js === -->
  <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/buyerProfile.js"></script>
</body>
</html>