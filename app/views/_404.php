<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Oops!   <?php echo isset($data['message'])? "| ".$data['message']:null ?> </title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/_404.css">
</head>
<body>
 <!-- navbar========================== -->
 <div class="navbar_cont">
  <div class="navbar">
   <div class="nav_img_cont">
    <a href="<?php echo URLROOT ?>/home">
    <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya_green.png" alt=""/>
    </a>

    <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button>
   </div>
   <div class="navlinks_cont">
    <ul class="navlinks" id="navlinks" >
     <li class="navlink">
      <a href="<?php echo URLROOT ?>/Home">Home</a>
     </li>
     <!-- <li class="navlink">
     <a href="<?php echo URLROOT ?>/categories">Categories</a>
     </li>
     <li class="navlink">
      <a href="<?php echo URLROOT ?>/auction">Auction</a>
     </li> -->
     <li class="navlink">
     <a href="<?php echo URLROOT ?>/marketplace">Marketplace</a>
     </li>
     <li class="navlink">
     <a href="<?php echo URLROOT ?>/help">Help</a>
     </li>
     <!-- <button class="btn nav_btn">
      Log in
     </button> -->
    </ul>
  </div>

 </div>
</div>



<!-- nav sidebar -->

<div class="navSidebar_cont" id="navSidebar_cont">
  <div class="navSidebar">

  <!-- <div class="navSidebar_image_container">
        <img src="<?php echo URLROOT ?>/assets/images/profile.jpg" alt="profile" class="profile_image">
        <p class="navSidebar_name">sonalinduwara</p>

</div> -->

  <div class="sidelinks_cont">
  <ul class="sidelinks" id="sidelinks" >

    <li class="sidelink">
    <i class="fas fa-home"></i>
      <a href="<?php echo URLROOT ?>/home">
        Home
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-store nav_icon"></i>
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
      </a>
    </li>
    <li class="sidelink">
    <i class="fas fa-hands-helping"></i>
        <a href="<?php echo URLROOT ?>/help">
        Help
        </a>
    </li>
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>


<!-- navbar end========================= -->



  <div class="err_cont">
   
   <div class="img_cont">

    <img class="searching_img" src="<?php echo URLROOT ?>/assets/images/searching.png" alt='error'>
   </div>
   <div class="message_cont">
     <h2>
     We’re sorry. We can’t find the page you’re looking for.
     </h2>
     <h3>Please try again..!</h3>
     <h5><?php echo isset($data['description'])?$data['description']:null ?></h5>
    
    </div>
   </div>









   <!-- footer  ======================= -->
   <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>
</html>