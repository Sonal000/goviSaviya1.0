<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryRatings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">

<?php 
   require APPROOT. '/views/layouts/deliverySidebar.php';  ?>

<div class="container_content">

<div class="profile">
    <div class="auction_page">
        <div class="hed">
            Delivery Reviews & Ratings
        </div>
        
        <div class="out_card">
<!-- 1st Card------------------------------------------------------------------------------------- -->
<?php if (!empty($data['reviews'])) { ?>
    <?php foreach ($data['reviews'] as $reviews) { 
       
                ?>
       
        
        <div class="mycardd">
           
                <div class="post_left">
                    <div class="pro_detail">
                        <!-- <div class="stars">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>     -->

<div class="name_img">

                        <div class="spanimg">
                            <img src="<?php echo URLROOT . '/store/profiles/'.$reviews->buyer_img ?>" class="proimg" alt="">

                        </div>
                        <div class="reviewer_name">
                            <?php echo $reviews->buyer_name; ?>
                            <div class="order_name">
                            Review for <span class="item"><?php echo $reviews->item_name; ?> <?php echo $reviews->quantity; ?><?php echo $reviews->item_unit; ?></span>
                        </div>
                        <div class="compDate">
                            Completed Date: <?php echo date('Y-m-d', strtotime($reviews->completed_date));?> <span class="black">at</span>  <?php echo date('H:i:s', strtotime($reviews->completed_date)); ?>
                        </div>
                        </div>
                        </div>


                        <div class="outerbox">
                            <div class="review_content">
                                <?php echo $reviews->review; ?>
                            </div>
                        </div>
                        <div class="addDate">
                            Posted On: <?php echo date('Y-m-d', strtotime($reviews->p_date));?> <span class="black">at</span>  <?php echo date('H:i:s', strtotime($reviews->p_date)); ?>

                        </div>
                        <div class="details_view">
                        
                        </div>
                    </div>
                </div>
           
               
        </div>
        
    <?php } ?>

<?php } else { ?>
    <p>No reviews found.</p>
<?php } ?>

</div> 
        
        </div>
        
   <!-- 2nd Card------------------------------------------------------------------------------------- -->

   
 
        <!-- 3rd Card------------------------------------------------------------------------------------- -->

        

        <!-- last Card-------------------------------------------->

    

         <!-- 5th Card------------------------------------------------------------------ -->

         
            
        </div>
        </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>