
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviyaLogin</title>
        <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">

        
</head>


<body>
    <div class="login">

     <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>

<!-- navbar end ================== -->
    
        <!-- <div class="navbar2">
            
            <div class="navimg">
            <img src="assets/images/govisaviya_green.png" alt="">
            </div>

            <div class="navbuttons">
            <ul>
            <li>Home</li>
            <li>Categories</li>
            <li>Marketplace</li>
            <li>Auction</li>
           <li>Help</li>
            </ul>
            </div>
        </div> -->

            <div class="loginimg_container">
                <div class="loginimg">
            <img src="<?php echo URLROOT ?>/assets/images/pngegg.png" alt="">
                </div>
            </div>

            <div class="form_container">
              <div class="formimg">
                <img src="<?php echo URLROOT ?>/assets/images/govisaviya2.png" alt="">
                </div>
                <div class="formimgtext">
                    <p>Together, We can cultivate a brighter<br>Future!</p>
                </div>

                <div class="email">
                      <p  >Email</p>
                      <input type="email" class="email_box" placeholder="Enter your Email">
                    </div>
                    </br>
                <div class="email">
                      <p>Password</p>
                      <input type="text" class="email_box" placeholder="Enter your Password">
                    </div>
                    </br>
                <p><a href=""class="forgot">Forgot password?</a></p>

             <button class="btn lgbtn">Login</button>
            </br>

             <p class="forgot">Do not have an account?<a href="SellerRegister.php">&nbspSign up</a></p> 

            </div>

        
            
            

    </div>



<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->

    
<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>
    

