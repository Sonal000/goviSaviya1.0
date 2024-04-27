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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
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
    <p class="container_title">Quality Check Images</p>
       
    <div class="card image_card">
    <div class="qc_title_container">
        <p class="qc_title">Delivery Quality Check</p>
        <div class="pan-btn_cont">
        <a href="<?php echo URLROOT; ?>/Orders/PenaltyDeliver/<?php echo $data['order']->order_item_id?>/<?php echo $data['order']->order_id?>/<?php echo $data['order']->order_type?>" class="btn btn_no">Deliver Panalty</a>
        </div>
    </div>
        <div class="deliver_img_cont">
        <div class="qc_img_container">
           <p  class="img_title">Images at Pick up</p> 
           <div class="pick_up_img_container">
                <img class="img_check_size"src="<?php echo URLROOT.'/store/items/'.$data['order']->deliver_pickup_img ;?>" alt="">
           </div>
        </div>
        <div class="qc_img_container">
         <p class="img_title">Images at Drop-Off</p> 
         <div class="drop_off_img_container">
            <img class="img_check_size" src="<?php echo URLROOT.'/store/items/'.$data['order']->deliver_dropoff_img ;?>" alt="">
         </div>
        </div>
        </div>
    </div>

    <div class="card image_card">
        <div class="qc_title_container">
        <p class="qc_title">Seller Quality Check</p>
        <div class="pan-btn_cont">
        <a href="<?php echo URLROOT; ?>/Orders/PenaltySeller/<?php echo $data['order']->order_item_id?>/<?php echo $data['order']->order_id?>/<?php echo $data['order']->order_type?>"class="btn btn_no">Seller panalty</a>  
        </div>
        </div>
       
        <div class="deliver_img_cont">
        <div class="qc_img_container">
           <p class="img_title" >Seller Item Images</p> 
           <div class="pick_up_img_container">
                <img class="img_check_size"src="<?php echo URLROOT.'/store/items/'.$data['order']->seller_img ;?>" alt="">
           </div>
        </div>
        <div class="qc_img_container">
         <p class="img_title" >Buyer Complain Images</p> 
         <div class="drop_off_img_container">
            <img class="img_check_size" src="<?php echo URLROOT.'/store/items/'.$data['order']->buyer_img ;?>" alt="">
         </div>
        </div>
        </div>
    </div>

    <div class="Quality_approve_btn_container">
        <a href="<?php echo URLROOT; ?>/Orders/ApproveQuality/<?php echo $data['order']->order_item_id?>/<?php echo $data['order']->order_id?>/<?php echo $data['order']->order_type?>"><button class="btn">Approve Quality</button></a>
    </div>


            
        </div>
        </div>
    </div>

 </div>
</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>