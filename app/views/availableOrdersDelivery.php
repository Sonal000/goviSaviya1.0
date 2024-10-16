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
        
  
 <?php if($data['hasVehicle']==0){ ?> 

<div class="outercard">

    <div class="cardNo">

    <div class="noVehicleCard">
             
             <div class="heading">
             Welcome to <span class="govi">Govisaviya</span> Delivering! 
             </div>
             <div class="details ">
             To view <span class="govi">Available Orders</span> and start delivering, please ensure you've added a vehicle to your account.
             </div><div class="details details_two">
             Let's begin!
             </div>
 
             <div class="addVehicleCard">
                 <div class="image">
                    <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
                 </div>
                 <div class="helo">
                     <button class="btn addVehicle"><a href="<?php echo URLROOT.'/deliveryVehicles'?>">Add Vehicle</a></button>
                 </div>
 
             </div>
 
         </div>
         </div>

 </div>





    <?php }else{ ?>
        <?php 
        if($data['orders']){
            foreach($data['orders'] as $order){
                // if($orders){
                // foreach($orders as $order){

                  

                    
                ?>
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">
            <div class="left_side">
                <div class="image_class">
                <img src="<?php echo URLROOT; ?>/store/items/<?php echo $order->item_img ?>" class="onion" alt="">
                </div>
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
                    <botton class="details_view_btn"><a href="<?php echo URLROOT ?>/orders/info/<?php echo $order->order_id ?>/<?php echo $order->order_item_id ?>/<?php echo $order->order_type ?>">View Order Details</a></botton>
                    </div>
                </div>
                
            </div>
            </div>
            
            <div class="right-side"> 
                    
            <div class="distance"> 
                
                <?php echo(getDistance($data['address'],$order->pickup_address));
                            ?>km away from you

                </div>
            
                    <?php if($data['available']){ ?>



                   

                    <div class="update_edit_bt">
                            <a class="btn" href="<?php
                            if($order->order_type == "AUCTION"){
                                echo URLROOT."/orders/acceptOrder_AC/".$order->order_item_id ;
                            }elseif($order->order_type == "REQUEST"){
                                echo URLROOT."/orders/acceptOrder_PR/".$order->order_item_id ;
                            }elseif($order->order_type == "PURCHASE"){
                                echo URLROOT."/orders/acceptOrder/".$order->order_item_id ;
                            }

                                ?>">Accept Order</a>
                                     
                    </div>

                    <?php }?>
            </div> 
            
        
        </div>
        
   <!-- 2nd Card------------------------------------------------------------------------------------- -->
   <?php
                //  }} }
                        }
        }else{ ?>
        
        <div class="cardNo">

<div class="noVehicleCard">
         
         <div class="heading">
         There are no <span class="govi">Available Orders</span>
         </div>
         <div class="details ">
             at the moment. Please check back later or contact support for assistance.
             </div>
        
         <div class="addVehicleCard">
             <div class="image">
                <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
             </div>
           

         </div>

     </div>
     </div>           
        <?php

        } ?>

<?php }?>
            
        </div>
        </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>