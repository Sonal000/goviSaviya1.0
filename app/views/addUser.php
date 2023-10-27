<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/addUser.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
 <div class="profile">
    <div class="container">
        <div class="formimg">
            <img src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" alt="">
        </div>
        <div class="formimgtext">
            <p>Together, We can cultivate a brighter<br>Future!</p>
        </div>
        <div class="title">Add User</div>
        <form action="#">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your Email" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter your address" required>
                </div>
                <div class="input-box">
                    <span class="details">Contact Number</span>
                    <input type="text" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="confirm your password" required>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="usertype" id="dot-1">
                <input type="radio" name="usertype" id="dot-2">
                <input type="radio" name="usertype" id="dot-3">
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
</body>
</html>