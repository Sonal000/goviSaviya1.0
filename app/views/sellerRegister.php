
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Registration || Seller</title>

 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/sellerRegister.css">
</head>
<body>



 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>

<!-- navbar end ================== -->

<section class="seller_section ">


   <div class="seller_registration">
     <div class="image_cont">
       <!-- <img class="seller_img" src="<?php echo URLROOT ?>/assets/images/seller.jpg" alt=""> -->

       <div class="text_cont">
         <h3 class="title">
           seller <span>Register</span>
          </h3>
          <ul>
            <li class="list_item"><span><i class="fas fa-check"></i></span>Fair Price</li>
            <li class="list_item"><span><i class="fas fa-check"></i></span>Personalized Experience:</li>
            <li class="list_item"><span><i class="fas fa-check"></i></span>Exclusive Deals</li>
          </ul>
       </div>

     </div>
     <div class="form_cont">
          <div class="form_title_cont">
              <h3 class="form_title">seller <span>Register</span></h3>
          </div>

      <form class="seller_register_form" id="seller_reg_form" method="post" action="<?php echo URLROOT; ?>/sellerRegister">

       <div class="input_cont">
        <label for="name" class="input_label">Name</label>
        <input type="text" name="name" class="input_item" id="name" value="<?php echo $data['name'];?>" autocomplete="name">
        <p class="invalid_msg"></p>
       </div>

       <div class="input_cont">
        <label for="name" class="input_label">Email</label>
        <?php 
        if(isset($data['invalid_email'])){
          ?>
                <input type="text" name="email" id="email" class="input_item invalid" value="<?php echo $data['email'];?>" autocomplete="email">
                <p class="invalid_msg"><?php echo $data['invalid_email'] ?></p>
          <?php
        }else{
        ?>
        <input type="text" name="email" id="email" class="input_item " autocomplete="email">
        <p class="invalid_msg"></p>
        <?php }?>

       </div>

       <div class="input_cont address_cont">
        <label for="name" class="input_label">Address</label>
        <input type="text" name="address" id="address" class="input_item" value="<?php echo $data['address'];?>" autocomplete="address-line1">
        <p class="invalid_msg"></p>
       </div>

       <div class="input_cont">
        <label for="name" class="input_label">Mobile No</label>
        <input type="text" name="mobile" id="mobile" class="input_item" value="<?php echo $data['mobile'];?>">
        <p class="invalid_msg"></p>
       </div>


        <div class="input_cont">
          <label for="name" class="input_label">Based City</label>
          <input type="text" name="city" id="city" class="input_item" value="<?php echo $data['city'];?>">
          <p class="invalid_msg"></p>
        </div>
        <div class="input_cont">
          <!-- <label for="name" class="input_label"></label> -->
          <!-- <input type="text"  class="input_item" > -->
          <!-- <p class="invalid_msg"></p> -->
        </div>
     
       <div class="password_cont">

         <div class="input_cont">
           <label for="name" class="input_label">Password</label>
           <input type="password" name="password" id="password" class="input_item" value="<?php echo $data['password'];?>">
           <p class="invalid_msg"></p>
          </div>
          <div class="input_cont">
            <label for="name"  class="input_label">Re-Enter Password</label>
            <input type="password" name="password_re" id="password_re" class="input_item" value="<?php echo $data['password'];?>">
            <p class="invalid_msg"></p>
          </div>
        </div>
       <div class="btn_cont">
        <button class="signup_btn btn" id="signup_btn">Sign Up</button>
        <!-- <button class="signup_btn btn">Reset</button> -->
       </div>
       <div class="input_cont">
    <p class="login_acc">Already have an account ? <a href="<?php echo URLROOT ?>/login">&nbspSign in</a></p> 
     </div>



      </form>

      </div>
   </div> 






</section>





<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->

  <!-- js === -->
  <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/sellerRegister.js"></script>
</body>
</html>

















