<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_Details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrder.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrderDetails.css">
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
    <h4>Item Stock Images</h4>

    <div class="card image_card">
        <h4>Deliverer added Images</h4>
        <div class="deliver_img_cont">
        <div class="deliver_pickup_img_container">
           <h4 align="center">Picked up</h4> 
           <div class="pick_up_img_container">
                <img class="img_check_size"src="<?php echo URLROOT.'/assets/images/sell.jpg' ?>" alt="">
           </div>
        </div>
        <div class="deliver_handover_img_container">
         <h4 align="center">Drop-Off</h4> 
         <div class="drop_off_img_container">
            <img class="img_check_size" src="<?php echo URLROOT.'/assets/images/sell.jpg' ?>" alt="">
         </div>
        </div>
        </div>
    </div>

    <div class="card image_card">
        <h4>Seller and Buyer added Images</h4>
        <div class="deliver_img_cont">
        <div class="deliver_pickup_img_container">
           <h4 align="center">Seller Uploaded Images</h4> 
           <div class="pick_up_img_container">
                <img class="img_check_size"src="<?php echo URLROOT.'/assets/images/sell.jpg' ?>" alt="">
           </div>
        </div>
        <div class="deliver_handover_img_container">
         <h4 align="center">Buyer Uploaded Images at Drop-off</h4> 
         <div class="drop_off_img_container">
            <img class="img_check_size" src="<?php echo URLROOT.'/assets/images/sell.jpg' ?>" alt="">
         </div>
        </div>
        </div>
    </div>

    <div class="Quality_approve_btn_container">
        <button class="btn">Arrove Quality</button>
        <button class="btn btn_no">Complaint Quality</button>
    </div>

            
        </div>
        </div>
    </div>

 </div>
</body>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
</html>