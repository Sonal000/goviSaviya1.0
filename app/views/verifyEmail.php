
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Verify Email</title>
        <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
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

    <!-- <div class="login">
        <div class="loginimg_container">
            <img src="<?php echo URLROOT ?>/assets/images/pngegg.png" alt="" class="loginimg">
        </div>

        <div class="form_container">
            <div class="formimg">
                <img src="<?php echo URLROOT ?>/assets/images/govisaviya2.png" alt="">
            </div>
            <div class="formimgtext">
                <p>Together, We can cultivate a brighter<br>Future!</p>
            </div>
            <form>
            <div class="email">
                <p>Email</p>
                <input type="email" class="email_box" placeholder="Enter your Email">
            </div>
                </br>
            <div class="email">
                <p>Password</p>
                <input type="password" class="email_box" placeholder="Enter your Password">
            </div>
                </br>
            <p><a href=""class="forgot">Forgot password?</a></p>
            <div class="loginbt">
             <button class="btn lgbtn">Login</button>
            </div>
            </br>
            </form>
             <p class="forgot">Do not have an account?<a href="<?php echo URLROOT ?>/register">&nbspSign up</a></p> 

        </div>
    </div> -->

    
<section class="login_section ">


<div class="login_registration">
  <div class="image_cont">
    <!-- <img class="login_img" src="<?php echo URLROOT ?>/assets/images/login.jpg" alt=""> -->

    <div class="text_cont">
      <h3 class="title">
        Verify <span>now</span>
       </h3>
       <!-- <ul>
         <li class="list_item"><span><i class="fas fa-check"></i></span>Fresh Produce</li>
         <li class="list_item"><span><i class="fas fa-check"></i></span>Personalized Experience:</li>
         <li class="list_item"><span><i class="fas fa-check"></i></span>Exclusive Deals</li>
       </ul> -->
       <div class="img_cont">
                <img src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" class="form_img" alt="">
                
                <p class="form_text">Together, We can cultivate a brighter<br>Future!</p>
            </div>
    </div>

  </div>
  <div class="form_cont">
       <div class="form_title_cont verify_title">
           <!-- <h3 class="form_title">Verify <span>now</span></h3> -->
           <p>Check your emails , we have send you a verification code.</p>
       </div>

   <form class="login_register_form" id="code_reg_form" method="post" action="<?php echo URLROOT."/register/verifyEmail/". $data['user_id']; ?>">



    <div class="input_cont">
     <label for="code" class="input_label">Verification Code</label>
     <?php 
     if(isset($data['invalid_code'])){
       ?>
             <input type="text" name="code" id="code" class="input_item invalid" value="<?php echo $data['code'];?>">
             <p class="invalid_msg"><?php echo $data['invalid_code'] ?></p>
       <?php
     }else{
     ?>
     <input type="text" name="code" id="code" class="input_item" value="<?php echo $data['code'];?>" >
     <p class="invalid_msg"></p>
     <?php }?>

    </div>


    <!-- <div class="input_cont">

     <label for="name" class="input_label">Password</label>

     <?php 
     if(isset($data['incorrect_password'])){
       ?>
        <input type="password" name="password" id="password" class="input_item" value="<?php echo $data['password']; ?>">
        <p class="invalid_msg"><?php echo $data['incorrect_password'] ?></p>
    <?php
     }else{
     ?>
        <input type="password" name="password" id="password" class="input_item" value="<?php echo $data['password']; ?>">
        <p class="invalid_msg"></p>
     <?php }?>

    </div>  -->




    <!-- <div class="input_cont"> 
        <a href=""class="forgot_password">Forgot password?</a>
        </div> -->
    <div class="btn_cont">
     <button  class="signup_btn btn" id="signup_btn">Verify</button>
     <!-- <button class="signup_btn btn">Reset</button> -->
    </div>
    <div class="input_cont">
    <p class="create_acc">Didn't Recieve verification ? <a href="<?php echo URLROOT ?>/register/sendverification">&nbspSend Again</a></p> 
     </div>

   </form>
   <div class="loader_cont">
        <div class="loader"></div>
      </div>
   </div>
</div> 






</section>











<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->

    
<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/verifyEmail.js"></script>
</body>
    

