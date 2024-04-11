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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/ongoingOrder.css">
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

    <!-- items -->
  <div class="container_content">
    

  <div class="profile">
    <div class="auction_page">
        <div class="hed">
            Order Details
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                    Fresh Mango 
                </div>
                

                <div class="order_weight">
                    20kg
                </div>

                <div class="order_details_sub">
                    Seller: <a href="#" class="link_to_seller">thevindu_r </a>
                </div>
                
                <div class="order_seller_rating">
                    Rating: 4.5
                </div>




                <div class="image_product">
                <img src="<?php echo URLROOT; ?>/assets/images/mango.jpeg" class="onion" alt="">

                <div class="delivery_details">
                    
               <div class="more_info"><i class="fa-solid fa-location-dot"></i></i> Pickup Location: Battaramulla</div>
               <div class="more_info"><i class="fa-solid fa-thumbtack"></i> End Location: Kandy</div>
               <div class="more_info"><i class="fa-solid fa-user"></i> Seller: Yunal Mallawarachchi</div>
               <div class="more_info"><i class="fa-solid fa-truck"></i> Required Vehicle: Mini Truck</div>
               <div class="update_edit_btn">
                    <botton class="accept_order_btnn"><a href=""><i class="fa-solid fa-phone"></i>  Contact Seller</a></botton>
                    <botton class="ignore_order_btnn"><a href=""><i class="fa-solid fa-map-pin"></i>  Get Location</a></botton>
                
            </div>
            </div>   
                </div>


            <!-- <?php var_dump( $data['postalcodes']); ?> -->
                
            </div>

            <div class="right_side">
             
            <div class="update_edit_btnn">
                    <botton class="accept_order_btnnn"><a href="<?php echo URLROOT; ?>/Orders/pickedup"><i class="fa-solid fa-circle-check"></i>  Picked-up</a></botton>
                    <!-- <botton class="ignore_order_btnnn"><a href="<?php echo URLROOT; ?>/DeliveryConfirmQualityPickup"><i class="fa-solid fa-ban"></i>  Confirm Quality</a></botton> -->
             
            </div>
             <div class="progress_bar">
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                
             </div>
            </div>



        </div>
        


            
        </div>
        </div>


  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>





















        </div>
    </div>
</div>
</body>
</html>
