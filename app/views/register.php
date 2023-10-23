
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
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>

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

        <div class="sign_in_cont">
        <a href="<?php echo URLROOT ?>/login" class="icon_cont">
            <!-- <i class="fas fa-sign-in-alt landing_icon signin_icon"></i> -->
            <p class="signin_icon landing_icon">Sign In</p>
          </a>
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