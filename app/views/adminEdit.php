<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminEdit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/deliverySidebarWithoutImg.php'; 
 ?>
 <div class="container_content">
<div class="adminprofile">
    <div class="auction_page">
        <div class="heading">
            Edit Details of the User
        </div>

        <div class="admin_form">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Enter name">

    <label for="email">E-mail</label>
    <input type="text" id="emailAdd" name="email" placeholder="Enter e-mail">

    <label for="email">Mobile number</label>
    <input type="text" id="mobileNo" name="mobileNum" placeholder="Enter mobile number">

    <label for="email">Address</label>
    <input type="text" id="add" name="address" placeholder="Enter address">

    <label for="email">City</label>
    <input type="text" id="city" name="cityName" placeholder="Enter city">

    <input type="submit" value="Submit">
  </form>
</div>
            
        </div>
        </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>
