<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Oops! |  <?php echo $data['message'] ?> </title>
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