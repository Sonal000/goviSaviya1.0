<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Home</title>

 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/home.css">
</head>
<body>

 <!-- navbar================== -->
 <div class="navbar_selector">
   <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>
 </div>

<!-- navbar end ================== -->
<!-- search bar ==========================-->

<!-- <div class="searchbar_cont">
 <div class="searchbar">
  <input class="search" placeholder="Search for Vegitables, Fruits, Etc">
  <i class="fas fa-search search_icon"></i>
 </div>
</div> -->

<!-- search bar end====================== -->

<!-- logo-image cont=============================-->

<!-- <div class="logo_cont section-center">

<div class="logo_text-cont">
 <div class="main_logo_cont">
  <img class="main_logo" src="<?php echo URLROOT ?>/assets/images/govisaviya2.png" alt="">
  <p class="main_logo_caption">
   Together , we can cultivate a brighter future !
  </p>

 </div>
 <div class="logo_btn_cont">
  <a class="btn logo_btn">Register</a>
  <a href="<?php echo URLROOT ?>/Login" class="btn logo_btn">Login</a>
 </div>
</div>
<div class="logo_img_cont">
<img class="img_farmer" src="<?php echo URLROOT ?>/assets/images/Farmer image.png" alt="">
</div>



</div> -->




<!-- logo-image cont  end=============================-->

<!-- Heros section -->

<section class="landing_section">

  <div class="landing_img_cont" id="landing_img_cont">
    <img src="<?php echo URLROOT; ?>/assets/images/landing-1.jpg" class="landing_img"  id="landing1" alt="">
    <img src="<?php echo URLROOT; ?>/assets/images/landing-2.jpg" class="landing_img" id="landing2" alt="">
    <img src="<?php echo URLROOT; ?>/assets/images/landing-3.jpg" class="landing_img"  id="landing3" alt="">
    <img src="<?php echo URLROOT; ?>/assets/images/landing-4.jpg" class="landing_img"  id="landing4" alt="">
    <img src="<?php echo URLROOT; ?>/assets/images/landing-5.jpg" class="landing_img landing_show"  id="landing5" alt="">
    <div class="landing_overlay">

      <div class="landing_container ">
        <div class="logo_text-cont">
            <div class="main_logo_cont">
              <h2 class="main_logo_caption cap_1">
                 " Where Tradition Meets Tomorrow "
              </h2>
              <h2 class="main_logo_caption cap_2">Together , we can cultivate a brighter future !
              </h2>
            </div>
 <!-- search bar ==========================-->

            <div class="searchbar_cont">
              <div class="searchbar">
                <input class="search" placeholder="Search for Vegitables, Fruits, Etc">
                <i class="fas fa-search search_icon"></i>
              </div>
            </div>

<!-- search bar end====================== -->

        </div>


        <!-- <?php if(isset($_SESSION['user_id'])){
  ?>
        <div class="landing_icon_cont">
          <div class="logged_icon_cont">
            <a href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" class="logged_icon">
              <span >Hello 
                <?php  
              $firstName = (count($parts = explode(' ', $data['username'])) > 0) ? $parts[0] : "";
              echo $firstName;
              ?>
            </span>
          </a>   
        </div>
        </div>

        <?php }else{?>

          <div class="landing_icon_cont">
          <div class="icon_cont">
          <a href="<?php echo URLROOT ?>/login" class="signin_icon landing_icon ">
            <span class="">Sign In</span>
          </a>
          </div>

          <div class="icon_cont">
          <a title="Sign Up" href="<?php echo URLROOT ?>/Register" class="signup_icon landing_icon">
            <i class="fas fa-user-plus"></i>
          </a>  
          </div>

 
        </div>


          <?php }?> -->

      </div>
    </div>

</section>
<!-- hero section -->




<!-- Registration cont ================================-->

<!-- <div class="registration_cont">

  <div class="reg_title">
    <h3>Registration</h3>
  </div>

  <div class="users_cont section-center">
      <div class="user">
          <div class="user_img_cont">
            <img class="user_img" src="<?php echo URLROOT ?>/assets/images/buyer_reg.png"  />
          </div>
          <div class="reg_btn_cont ">
            <a class="btn reg_btn">Register</a>
          </div>
      </div>
      <div class="user">
          <div class="user_img_cont">
            <img class="user_img" src="<?php echo URLROOT ?>/assets/images/seller_reg.png"  />
          </div>
          <div class="reg_btn_cont ">
            <a href="<?php echo URLROOT ?>/sellerRegister" class="btn reg_btn">Register</a>
          </div>
      </div>
      <div class="user">
          <div class="user_img_cont">
            <img class="user_img" src="<?php echo URLROOT ?>/assets/images/delivery_reg.png"  />
          </div>
          <div class="reg_btn_cont ">
            <a href="<?php echo URLROOT ?>/deliveryRegister" class="btn reg_btn">Register</a>
          </div>
      </div>
  </div>

</div>

 -->


<!-- Registration cont end ============================-->
<!-- Categgories cont ================================-->
<div class="categories_cont">

  <div class="cat_title">
    <h3>Categories</h3>
  </div>

  <div class="cat_cont section-center">
      <div class="cat">
          <div class="cat_img_cont">
            <img class="cat_img" src="<?php echo URLROOT ?>/assets/images/vegetables.png"  />
          </div>
          <p class="cat_text">Vegitables</p>
      </div>

  

      <div class="cat">
          <div class="cat_img_cont">
            <img class="cat_img" src="<?php echo URLROOT ?>/assets/images/fruits.png"  />
          </div>
          <p class="cat_text">Fruits</p>
      </div>

 
      <div class="cat">
          <div class="cat_img_cont">
            <img class="cat_img" src="<?php echo URLROOT ?>/assets/images/spices.png"  />
          </div>
          <p class="cat_text">Spices</p>
      </div>

      <div class="cat">
          <div class="cat_img_cont">
            <img class="cat_img" src="<?php echo URLROOT ?>/assets/images/rice.png"  />
          </div>
          <p class="cat_text">Rice
      </div>

  </div>

</div>
<!-- Categories cont end ============================-->
<!-- Cfeatures cont ================================-->

<div class="features_cont">

  <div class="features_title">
    <h3>Features</h3>
  </div>

  <div class="feature_cont section-center">
      <div class="feature">
          <div class="feature_img_cont">
            <img class="feature_img" src="<?php echo URLROOT ?>/assets/images/user1.png"  />
          </div>
          <p class="feature_text">Seller and Buyer profiles & Listings</p>
      </div>

      <div class="feature">
          <div class="feature_img_cont">
            <img class="feature_img" src="<?php echo URLROOT ?>/assets/images/logistic.png"  />
          </div>
          <p class="feature_text">Logistic Support</p>
      </div>

      <div class="feature">
          <div class="feature_img_cont">
            <img class="feature_img" src="<?php echo URLROOT ?>/assets/images/negotiation.png"  />
          </div>
          <p class="feature_text">Fair pricing & Negotiation</p>
      </div>
      
      <!-- <div class="feature">
          <div class="feature_img_cont">
            <img class="feature_img" src="<?php echo URLROOT ?>/assets/images/communication.png"  />
          </div>
          <p class="feature_text">Direct Communication</p>
      </div> -->


  

  </div>

</div>




<!-- features cont end ============================-->


<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->



  <!-- js === -->
  <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/home.js"></script>
</body>
</html>