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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/availableOrdersDelivery.css">
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
            Available Orders
        </div>
        
   
        <?php 
        if($data['orders']){
            foreach($data['orders'] as $order){
                ?>
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <img src="<?php echo URLROOT; ?>/store/items/<?php echo $order->item_img ?>" class="onion" alt="">
                <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        
                        <?php echo $order->item_name."-".$order->quantity." ".$order->item_unit; ?>
                    </div>
                    <div class="pro_location" style="text-transform:capitalize" >
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                       <?php echo $order->seller_city." to ".$order->order_city ?>
                    </div>
                    <div class="addDate"  style="display:flex; flex-direction:column; color:var('--clr-primary-5')">
     <?php
                                // Extracting date
        $date = date("M-d", strtotime($order->order_date));
        echo "<p style='color:var(--clr-primary-5)'>Ordered Date : " . $date."</p>";
        $time = date("g:i A", strtotime($order->order_date));
        echo "<p style='color:var(--clr-primary-5)'>Ordered At : " . $time."</p>";
     ?>
                    </div>
                    <div class="details_view">
                    <botton class="details_view_btn"><a href="<?php echo URLROOT ?>/orders/<?php echo $order->order_item_id ?>">View Order Details</a></botton>
                    </div>
                </div>
                
            </div>
            </div>
         
                  
                <div class="update_edit_bt">
                    <botton class="accept_order_btn"><a href="">Accept Order</a></botton>
                    <botton class="ignore_order_btn"><a href="">Don't Show</a></botton>
                
            </div>
            
        
        </div>
        
   <!-- 2nd Card------------------------------------------------------------------------------------- -->
   <?php
            }
        }else{ ?>
        
        <div> <p> no available orders </p></div>        
        <?php

        } ?>


            
        </div>
        </div>
        </div>
    </div>


<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>