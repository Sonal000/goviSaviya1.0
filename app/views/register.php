
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Registration</title>

 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/register.css">
</head>
<body>



 <!-- navbar================== -->

      <!-- navbar================== -->
 <!-- navbar========================== -->
 <div class="navbar_cont">
  <div class="navbar">
   <div class="nav_img_cont">
   <a href="<?php echo URLROOT ?>/Home">
    <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
        </a>
    <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button>
   </div>
   <div class="navlinks_cont">
    <ul class="navlinks" id="navlinks" >
     <!-- <li class="navlink">
      <a href="<?php echo URLROOT ?>/Home">Home</a>
     </li> -->
     <button class="navlink signin_link " id="signin_btn">
     Sign in
    </button>

    </ul>
  </div>

 </div>
</div>



<!-- nav sidebar -->

<div class="navSidebar_cont" id="navSidebar_cont">
  <div class="navSidebar">

  <!-- <div class="navSidebar_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
        <p class="navSidebar_name">sonalinduwara</p>
    </div> -->

  <div class="sidelinks_cont">
  <ul class="sidelinks" id="sidelinks" >
  <button class="join_link" id="join_btn">
    Join
    </button>
  <button class="navlink signin_link " id="signin_btn">
     Sign in
    </button>

    <li class="sidelink">
    <i class="fas fa-carrot"></i>
      <a href="<?php echo URLROOT ?>/Categories">
        Categories
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-store nav_icon"></i>
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-coins nav_icon"></i>
      <a href="<?php echo URLROOT ?>/auction">
      Auction
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
<!-- navbar end ================== -->

<!-- navbar end ================== -->



<section class="registerations_section">

        <div class="registrations_cont section-center">
           <div class="img_cont">

             <div class="users_cont">

               <button class="user_btn seller_btn" id="seller_btn">
                
               <div class="desc_cont">
                  <div class="title">
                   Become a Seller
                  </div>
                  <div class="information">
                   <p class="desc">
                  " Grow Your Business with Us "
                    </p>
                    <div class="reg_btn_cont">
                     <a href="<?php echo URLROOT ?>/sellerregister" class="btn">Register as a Seller</a>
                    </div>
                  </div>

                </div>
                <div class="click">
                    <p>click</p>
                  </div>
               </button>

               <button class=" active_btn user_btn buyer_btn" id="buyer_btn">
                <div class="desc_cont">
                  <div class="title">
                   Become a Buyer
                  </div>
                  <div class="information">
                   <p class="desc">
                   " Browse, Click, Buy "
                    </p>
                    <div class="reg_btn_cont">
                     <a href="<?php echo URLROOT ?>/buyerregister" class="btn">Register as a Buyer</a>
                    </div>
                  </div>
                </div>
                <div class="click">
                    <p>click</p>
                  </div>
               </button>


               <button class=" user_btn delivery_btn" id="delivery_btn">
               <div class="desc_cont">
                  <div class="title">
                   Become a Delivery Agent
                  </div>
                  <div class="information">
                   <p class="desc">
                   " On-the-Go Earnings Await "
                    </p>
                    <div class="reg_btn_cont">
                     <a href="<?php echo URLROOT ?>/deliveryregister" class="btn">Register as a Delivery Agent</a>
                    </div>
                  </div>
                </div>
                <div class="click">
                    <p>click</p>
                  </div>
               </button>
             </div>


           </div>


        </div>


      
    </section>







<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->

  <!-- js === -->
  <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/register.js"></script>
</body>
</html>