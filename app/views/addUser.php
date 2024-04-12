<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/addUser.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
  <div class="container_content">
 <div class="adminprofile">
    <div class="container">
        <div class="formimg">
            <img src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" alt="">
        </div>
        <div class="formimgtext">
            <p>Together, We can cultivate a brighter<br>Future!</p>
        </div>
        <div class="title">Add User</div>
        <form id="seller_reg_form" method="post" action="<?php echo URLROOT; ?>/AdminC/addUser">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="Enter your name" name="name"  id="name" value="<?php echo $data['name'];?>">
                    <p class="invalid_msg"></p>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <?php 
                    if(isset($data['invalid_email'])){
                    ?>
                <input type="text" placeholder="Enter your Email" name="email" id="email" class="input_item invalid" value="<?php echo $data['email'];?>">
                <p class="invalid_msg"><?php echo $data['invalid_email'] ?></p>
                <?php
                }else{
                ?>
                <input type="text" placeholder="Enter your Email" name="email" id="email" class="input_item " autocomplete="email">
                <p class="invalid_msg"></p>
                <?php }?>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter your address" name="address" id="address" value="<?php echo $data['address'];?>">
                    <p class="invalid_msg"></p>
                </div>
                <div class="input-box">
                    <span class="details">Contact Number</span>
                    <input type="text" placeholder="Enter your number" name="mobile" id="mobile"  value="<?php echo $data['mobile'];?>">
                    <p class="invalid_msg"></p>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="password" id="password"  value="<?php echo $data['password'];?>">
                    <p class="invalid_msg"></p>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="confirm your password" name="password_re" id="password_re"  value="<?php echo $data['password'];?>">
                    <p class="invalid_msg"></p>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="user_type" id="dot-1">
                <input type="radio" name="user_type" id="dot-2">
                <input type="radio" name="user_type" id="dot-3">
               <span class="gender-title">User Type</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="usertype">Buyer</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="usertype">Seller</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="usertype">Delivery Agent</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</div>

<script src="<?php echo URLROOT ?>/assets/js/addUser.js"></script>
</body>
</html>