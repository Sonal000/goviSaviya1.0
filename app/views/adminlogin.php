<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminlogin.css">
</head>
<body>
<div class="adminlogpage">
    <!--<div class="admin_left">
        <img src="" alt="">
    </div> -->
   <!-- <<div class="admin_right">-->
        <div class="adminform_cont">
            <div class="form_box">
                <div class="form_container">
                    <div class="formimg">
                        <img src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" alt="">
                    </div>
                    <div class="formimgtext">
                        <p>Together, We can cultivate a brighter<br>Future!</p>
                    </div>

                    
                    <form method="post" id="login_reg_form" action="<?php echo URLROOT; ?>/AdminC">
                    <div class="email">
                        <p>Email</p>
                        <?php 
                            if(isset($data['invalid_email'])){
                        ?>
                        <input type="text" class="email_box invalid" name="email" id="email" value="<?php echo $data['email'];?>">
                        <p class="invalid_msg"><?php echo $data['invalid_email'] ?></p>
                        <?php
                        }else{
                        ?>
                        <input type="text" class="email_box" name="email" id="email" value="<?php echo $data['email'];?>">
                        <p class="invalid_msg"></p>
                         <?php }?>
                    </div>
                    </br>
                    <div class="email">
                        <p>Password</p>
                        <?php 
                        if(isset($data['incorrect_password'])){
                        ?>
                        <input type="password" class="email_box invalid" name="password" id="password" value="<?php echo $data['password']; ?>">
                        <p class="invalid_msg"><?php echo $data['incorrect_password'] ?></p>
                        <?php
                        }else{
                        ?>
                        <input type="password" class="email_box" name="password" id="password" value="<?php echo $data['password']; ?>">
                        <p class="invalid_msg"></p>
                        <?php }?>

                     </div>
                    </br>
                    <p><a href=""class="forgot">Forgot password?</a></p>
                    <div class="loginbt">
                        <button class="btn lgbtn">Login</button>
                    </div>
                    </br>
                    </form>
                    

                </div>
            </div>
        </div>
<!--</div>-->
        <!-- <img src="<?php echo URLROOT; ?>/assets/images/adminback.jpeg" alt="" class="adminpageimg"> -->
</div>   

<script src="<?php echo URLROOT ?>/assets/js/adminlogin.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
</body>
</html>