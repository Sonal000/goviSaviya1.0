
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviyaLogin</title>
        <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
        <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">

        
</head>



<body>
   

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
     <button class="join_link" id="join_btn">
     Join
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
        login <span>now</span>
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
       <div class="form_title_cont">
           <h3 class="form_title">login <span>now</span></h3>
       </div>

   <form class="login_register_form" id="login_reg_form" method="post" action="<?php echo URLROOT; ?>/login">



    <div class="input_cont">
     <label for="name" class="input_label">Email</label>
     <?php 
     if(isset($data['invalid_email'])){
       ?>
             <input type="text" name="email" id="email" class="input_item invalid" value="<?php echo $data['email'];?>">
             <p class="invalid_msg"><?php echo $data['invalid_email'] ?></p>
       <?php
     }else{
     ?>
     <input type="text" name="email" id="email" class="input_item" value="<?php echo $data['email'];?>" >
     <p class="invalid_msg"></p>
     <?php }?>

    </div>


    <div class="input_cont">

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

    </div> 




    <div class="input_cont"> 
        <a href=""class="forgot_password">Forgot password?</a>
        </div>
    <div class="btn_cont">
     <button class="signup_btn btn" id="signin_btn">Sign In</button>
     <!-- <button class="signup_btn btn">Reset</button> -->
    </div>
    <div class="input_cont">
    <p class="create_acc">Do not have an account ? <a href="<?php echo URLROOT ?>/register">&nbspSign up</a></p> 
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
<script src="<?php echo URLROOT ?>/assets/js/login.js"></script>
</body>
    

