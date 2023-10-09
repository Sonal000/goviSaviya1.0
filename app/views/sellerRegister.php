

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviya_Seller_Registration</title>
        <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">

        
</head>


<body>
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

    <div class="formcontent">
        <div class="regimg">
            <p>Register as a Seller</p>
            <img src="<?php echo URLROOT ?>/assets/images/sellerimg.png" alt="">
        </div>
        <div class="cont1">
                <div class="email">
                      <p>Name*</p>
                      <input type="text" class="email_box" placeholder="Enter your Name">
                </div> </br>
                <div class="email">
                      <p>Email Address*</p>
                      <input type="text" class="email_box" placeholder="Enter your Email address">
                </div> </br>
                <div class="email">
                      <p>Address*</p>
                      <input type="text" class="email_box" placeholder="Address line 1">
                </div> </br>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Select your District*</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Colombo">Colombo</option>
                      <option value="Kaluthara">Kaluthara</option>
                      <option value="Gampaha">Gampaha</option>
                      </select>
                </div></br>
                <div class="email">
                      <p>Password*</p>
                      <input type="password" class="email_box" placeholder="Enter your Password">
                </div>
                    
                
                
        </div>
        <div class="cont2">
                <div class="email">
                      <p>Mobile number*</p>
                      <input type="text" class="email_box" placeholder="Enter your Email">
                </div></br>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Type you sell*</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Vegetables">Vegetables</option>
                      <option value="Fruits">Fruits</option>
                      <option value="Spices">Spices</option>
                      </select>
                </div></br>
                <div class="email">
</br></br>
                      <input type="text" class="email_box" placeholder="Address line 2">
                </div> </br>
                <div class="email">
                      <p>Postal code*</p>
                      <input type="text" class="email_box" placeholder="Enter postal code">
                </div> </br>
                <div class="email">
                      <p>Password*</p>
                      <input type="password" class="email_box" placeholder="Re-Enter your Password">
                </div>
        </div>
    </div>
        <button class="btn regbt">Register</button>
   



          <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>