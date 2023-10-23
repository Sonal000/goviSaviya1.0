

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviya_Seller_Registration</title>
        <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">

        
</head>


<body>
           <!-- navbar================== -->
 <?php
 require APPROOT. '/views/layouts/mainNavbar.php';  
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
                  <img src="<?php echo URLROOT; ?>/assets/images/sellerimg.png" alt="">
            </div>
            <form method="post" action="<?php echo URLROOT; ?>/SellerRegister">
                  <div class="cont1_cont2"> 
                        <div class="cont1">
                              <div class="email">
                                    <label for="name">Name</label><br>
                                    <input type="text" name="name" class="email_box" placeholder="Enter your Name" value="<?php echo $data['name']; ?>" required>
                              </div> </br>
                              <div class="email">
                                    <label for="Email">Email Address</label><br>
                                    <input type="text" name="Email" class="email_box" placeholder="Enter your Email address" value="<?php echo $data['Email']; ?>" required>
                              </div> </br>
                              <div class="email">
                                    <label for="addressline1">Address Line1</label><br>
                                    <input type="text" name="addressline1" class="email_box" placeholder="Address line 1" value="<?php echo $data['addressline1']; ?>" required>
                              </div> </br>
                              <div class="email">
                                    <label for="dropdown">Select your District</label><br>
                                    <select id="dropdown" name="district" class="districtbox" value="<?php echo $data['district']; ?>">
                                    <option value="Colombo">Colombo</option>
                                    <option value="Kaluthara">Kaluthara</option>
                                    <option value="Gampaha">Gampaha</option>
                                    </select>
                              </div></br>
                              <div class="email">
                                    <label for="password">Password</label><br>
                                    <input type="password" name="password" class="email_box" placeholder="Enter your Password" value="<?php echo $data['password']; ?>" required>
                                    </div>
                    
                
                        </div>
                        <div class="cont2">
                              <div class="email">
                                    <label for="tellNO">Mobile Number</label><br>
                                    <input type="text" name="telNo"class="email_box" placeholder="Enter mobile number"value="<?php echo $data['telNo']; ?>" required>
                              </div></br>
                              <div class="email">
                                    <label for="dropdown">Type you sell</label><br>
                                     <select id="dropdown" name="sellingtype" class="districtbox" value="<?php echo $data['sellingtype']; ?>">
                                    <option value="Vegetables">Vegetables</option>
                                     <option value="Fruits">Fruits</option>
                                    <option value="Spices">Spices</option>
                                    </select>
                              </div></br>
                
                              <div class="email">
                                    <label for="addressline2">Address line2</label><br>
                                    <input type="text" name="addressline2" class="email_box" placeholder="Address line 2" value="<?php echo $data['addressline2']; ?>" required>
                                    </div> </br>
                              <div class="email">
                                    <label for="postalcode">Postal Code</label><br>
                                    <input type="text" name="postalcode" class="email_box" placeholder="Enter postal code" value="<?php echo $data['postalcode']; ?>" required>
                              </div> </br>
                              <div class="email">
                                    <label for="confirm_password">Confirm Password</label><br>
                                    <input type="password" name="confirm_password" class="email_box" placeholder="Re-Enter your Password" value="<?php echo $data['confirm_password']; ?>" required>
                              </div>
                         </div>
                  </div>

    
    
                  <div class="regbt">
                        <button type="submit"class="btn">Register</button>
                  </div>
            </form> 
      </div>



          <!-- footer  ======================= -->
 /* <?php
 require APPROOT. '/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="/assets/js/main.js"></script>
</body>