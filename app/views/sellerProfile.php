<?php


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviya_Seller_Profile</title>
        <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/sellerProfile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        
</head>


<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar.php'; 
 ?>

    <!-- <div class="profile">
    <div class="maincontent">
        <h4>Profile</h4>
    </div>
    <div class="profilecont">
        <img src="<?php echo URLROOT ?>/assets/images/profile.png" alt="" class="profile-logo-medium">
        <button class="newbt">change profile photo</button>
        <button class="newbt">Remove profile photo</button>
    </div></br>

   <div class="personaldetails">
        <div class="infor">
        <p>Name</p>
        <input type="text" class="det" placeholder="Santhush Fernando">
        </div></br>
        <div class="infor">
        <p>Email Adress</p>
        <input type="text" class="det" placeholder="santhushfernando2000@gmail.com">
        </div></br>
        <div class="infor">
        <p>Pick up address</p>
        <input type="text" class="det" placeholder="187,Koskanaththa Road,Mampe,Piliyandala">
        </div></br>
        <div class="infor">
        <p>Contact Number</p>
        <input type="text" class="det" placeholder="+94 776678909">
        </div>
</br>
        <div><button class="btn editprofile">Edit Details</button></div>
    </div>

    </div> -->



    <div class="profile">

 

    <!-- new ==================== -->

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
          <img src="<?php echo URLROOT ?>/assets/images/item-1.png"  class="profile_img">
          <a href="#" class="profile_icon"> edit profile picture<i class="fas fa-pen"></i></a>
                      <div class="name_cont">
                <p class="user_name">Santhush Fernando 
                  <span><i class="fas fa-check-circle check_icon"></i>
                  </span>
                </p>
            </div>
          </div>

 
          <a class="become_seller" href="<?php echo URLROOT ?>/buyerRegister"> Become a Buyer <span><i class="fas fa-user"></i></span></a>
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
          <p>Sold</p>
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
            <p class="detail_desc">Santhush Fernando</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Address</p>
            <p class="detail_desc">187,Koskanaththa Road,Mampe,Piliyandala</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Email</p>
            <p class="detail_desc">santhushfernando2000@gmail.com</p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Contact Number</p>
            <p class="detail_desc">+94776678909</p>
        </div>

      </div>
      <div class="prof_details_edit_cont" id="prof_details_edit_cont">

      <div class="detail_edit_cont">
            <p class="detail_name">Name</p>
            <input type="text" class="detail_desc" value="Santhush Fernando"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Address</p>
            <input type="text" class="detail_desc" value="187,Koskanaththa Road,Mampe,Piliyandala"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Email</p>
            <input type="email" class="detail_desc" value="santhushfernando2000@gmail.com"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Contact Number</p>
            <input type="text" class="detail_desc" value="+94776678909"></input>
        </div>

        <div class="edit_details_btn_cont">
              <button class="btn cancel_btn">Cancel</button>
              <button class="btn update_btn">Save</button>
           </div>
         
      </div>

      
     </div>
</section>


</section>





    <!-- new end ==================== -->



    </div>









  <!-- footer  ======================= -->
 
<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerProfile.js"></script>
</body>