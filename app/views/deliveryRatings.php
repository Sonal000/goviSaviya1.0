<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
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
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->
<?php if (!empty($data['reviews'])) { ?>
    <?php foreach ($data['reviews'] as $review) { ?>
        <div class="mycardd">
            <div class="productimg">
                <div class="post_left">
                    <div class="pro_detail">
                        <!-- <div class="stars">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>     -->
                        <div class="reviewer_name">
                            <?php echo $review->buyer_name; ?>
                        </div>
                        <div class="review_content">
                            <?php echo $review->review; ?>
                        </div>
                        <div class="addDate">
                            Posted On: <?php echo $review->p_date; ?>
                        </div>
                        <div class="details_view">
                        
                        </div>
                    </div>
                </div>
            </div>
                <div class="update_edit_bt">
                    <button class="button"><a href="#">View More</a></button>
                </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <p>No reviews found.</p>
<?php } ?>

            
        
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
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>