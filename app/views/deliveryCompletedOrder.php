<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Order Details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryCompletedOrders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            Completed Orders
        </div>
        
        <div class="full_container">        
<!-- 1st Card------------------------------------------------------------------------------------- -->
<?php 
        if($data['orders']){
            foreach($data['orders'] as $order){
                // if($orders){
                // foreach($orders as $order){

                   
                ?>


        <div class="mycard">
    
                     <div class="pro_detail">
                                                 
                                <div class="image">
                                     <img src="<?php echo URLROOT; ?>/store/items/<?php echo $order->item_img ?>" class="picture" alt="">
                                </div>
                                <div class="item_name">
                                <?php echo $order->item_name?> -   <?php echo $order->quantity?>Kg   
                                <div class="price">Rs: <?php echo $order->deliver_fee?>/=</div>
                                
                                </div>
                                <div class="address_details">

                               
                            <div class="pro_location">
                                <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                                From:
                             

                                    <?php echo $order->pickup_address?>
                           
  
                            </div>
                            <div class="pro_location">
                                <i class="fa-solid fa-truck" style="color: #0f0f0f;"></i>
                                
                                To:  <?php echo  $order->order_address?>
                                </div> 

                                </div>
                            <div class="addDate">
                            <i class="fa-solid fa-calendar-days"></i>
                                Date Delivered:  <?php echo date('Y-m-d', strtotime($order->completed_date)); ?>
                            </div>
                            <div class="details_view">
                            
                            </div>
                     </div>
                
                
            
           
                <div class="update_edit_bt">
                    <button class="accept_order_btn"><a href="<?php echo URLROOT ?>/orders/completed/<?php echo $order->order_id ?>/<?php echo $order->order_item_id ?>/<?php echo $order->order_type ?>"">View Details</a></button>
                    
                
            </div>
            
        
        </div>
        

    
        <?php
                  }
        }else{ ?>
        
        <div class="cardNo">

<div class="noVehicleCard">
         
         <div class="heading">
         There are no <span class="govi">Completed Orders</span>
         </div>
        
         <div class="addVehicleCard">
             <div class="image">
                <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
             </div>
             <div class="helo">
                 <button class="buttonn addVehicle"><a href="<?php echo URLROOT.'/orders'?>">View Orders</a></button>
             </div>

         </div>

     </div>
     </div>       
        <?php

        } ?>
        
    </div>   
            
        </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>