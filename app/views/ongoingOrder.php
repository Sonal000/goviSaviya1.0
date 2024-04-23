<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted Order details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    
    
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

    <?php if($data['hasVehicle']==0){ ?>

        <div class="cardNo">

    <div class="noVehicleCard">
             
             <div class="heading">
             Welcome to <span class="govi">Govisaviya</span> Delivering! 
             </div>
             <div class="details ">
             To continue with <span class="govi">Ongoing Orders,</span> and start delivering, please ensure you've added a vehicle to your account.
             </div><div class="details details_two">
             Let's begin!
             </div>
 
             <div class="addVehicleCard">
                 <div class="image">
                    <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
                 </div>
                 <div class="helo">
                     <button class="buttonn addVehicle"><a href="<?php echo URLROOT.'/deliveryVehicles'?>">Add Vehicle</a></button>
                 </div>
 
             </div>
 
         </div>
         </div>





        <?php }else{ ?>

    <?php if($data['details']) {?>


        <div class="hed">
            Order Details
        </div>
        
          
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                    <?php echo $data['details']->item_name;?>
                </div>
                

                <div class="order_weight">
                     <?php echo $data['details']->quantity;?>kg
                   
                </div>

                <div class="order_details_sub">
                    Seller: <a href="#" class="link_to_seller"><?php echo $data['details']->seller_name?></a>
                </div>
                
                <div class="order_seller_rating">
                    Rating: 4.5
                </div>



                <div class="image_product">
                <img src="<?php echo URLROOT . '/store/items/'.$data['details']->item_img ?>" class="onion" alt="">

                <div class="delivery_details">
                    
               <div class="more_info"><i class="fa-solid fa-location-dot"></i></i> Pickup Location:  <?php echo $data['details']->seller_address?></div>
               <div class="more_info"><i class="fa-solid fa-thumbtack"></i> End Location: <?php echo $data['details']->buyer_address?></div>
               <div class="more_info"><i class="fa-solid fa-user"></i> Seller: <?php echo $data['details']->seller_name?></div>
               <div class="more_info"><i class="fa-solid fa-truck"></i> Buyer: <?php echo $data['details']->buyer_name?></div>
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
        
        <?php }else{?>

            <div class="cardNo">

<div class="noVehicleCard">
         
         <div class="heading">
         No orders Selected
         </div>
         <div class="details ">
         Please click below to choose an order and proceed with your delivery.
         </div><div class="details details_two">
         Let's begin!
         </div>

         <div class="addVehicleCard">
             <div class="image">
                <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
             </div>
             <div class="helo">
                 <button class="button addVehicle"><a href="<?php echo URLROOT.'/deliveryVehicles'?>">Add Vehicle</a></button>
             </div>

         </div>

     </div>
     </div>



              

            <?php }?>
            <?php }?>

            
        </div>


        </div>


  </div>

</div>


<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>





















        </div>
    </div>
</div>
</body>
</html>
