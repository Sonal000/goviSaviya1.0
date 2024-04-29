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
                    <img src="<?php echo URLROOT ?>/assets/images/hehe.png" alt="img" class="del_img">
                 </div>
                 <div class="helo">
                     <button class="btn btn_vehi"><a href="<?php echo URLROOT.'/deliveryVehicles'?>">Add Vehicle</a></button>
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
                    <?php echo $data['details']->item_name;?> <?php echo $data['details']->quantity;?>kg
                </div>
                

                <div class="order_weight">
                     
                   
                </div>

                <div class="order_details_sub">
                    Seller: <a href="#" class="link_to_seller"><?php echo $data['details']->seller_name?></a>
                </div>
<!--                 
                <div class="order_seller_rating">
                    Rating: 4.5
                </div> -->



                <div class="image_product">

                <img src="<?php echo URLROOT . '/store/items/'.$data['details']->item_img ?>" class="onion" alt="">

                <div class="delivery_details">
                    
               <div class="more_info in"><i class="fa-solid fa-location-dot"></i></i> Pickup Location:  <?php echo $data['details']->pickup_address?></div>
               <div class="more_info in"><i class="fa-solid fa-thumbtack"></i> End Location: <?php echo $data['details']->order_address?></div>
               <div class="more_info in"><i class="fa-solid fa-user"></i> Seller: <?php echo $data['details']->seller_name?></div>
               <div class="more_info in"><i class="fa-solid fa-truck"></i> Buyer: <?php echo $data['details']->buyer_name?></div>
               <div class="button_section">

                    <button class="btn" id="showContactBtn"><i class="fa-solid fa-phone"></i>  Contact Seller</button>
                    </div>

                    <div id="contactInfo" class="contact-info">
                    <div class="more_info"><?php echo $data['details']->seller_mobile?></div>
    </div>

    <script>
        // Get the button element
        const showContactBtn = document.getElementById('showContactBtn');
        // Get the contact info div
        const contactInfo = document.getElementById('contactInfo');

        // Add click event listener to the button
        showContactBtn.addEventListener('click', function() {
            // Toggle the visibility of the contact info div
            contactInfo.style.display = contactInfo.style.display === 'none' ? 'block' : 'none';
        });
    </script>
                   
                
            
            </div>   
                </div>


            <!-- <?php var_dump( $data['postalcodes']); ?> -->
                
            </div>

            <div class="right_side">
             
            <div class="update_edit_btnn">
                <div class="price">Revenue: Rs. <?php echo $data['details']->deliver_fee?>/=</div>
                    <button class="btn a_btn"><a href="<?php echo URLROOT; ?>/Orders/pickedup"><i class="fa-solid fa-circle-check"></i>  Picked-up</a></button>
                    <!-- <botton class="ignore_order_btnnn"><a href="<?php echo URLROOT; ?>/DeliveryConfirmQualityPickup"><i class="fa-solid fa-ban"></i>  Confirm Quality</a></botton> -->
             
            </div>
             <div class="progress_bar">
                <div class="p_title">Current Order Status</div>
                <div class="details_all">
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
             </div>
             </div>
            </div>



        </div>

        <?php
            if($data['details']){ 
                ?>
 

 <div class="hed maphead">
            <h3>Map</h3>
        </div>
<div class="map">
    <div class="distance_details">
        Distance From <span class="bold"><?php echo $data['details']->deliver_address  ?></span> to  <span class="bold"><?php echo $data['details']->pickup_address ?></span> : <span class="bold"> <?php echo getDistance($data['details']->deliver_address,$data['details']->pickup_address);
                            ?>Km</span>
    </div>
          <div class="card" id="map_cont"> 
                <input id="start" type="hidden" value="<?php echo $data['details']->deliver_address  ?>" name="start">
                <input id="end" type="hidden" value="<?php echo $data['details']->pickup_address  ?>" name="end">
                <?php       
                require APPROOT. '/views/layouts/mapCurrentLoc.php'; 
             ?>
                </div> 
            <?php
            }
            ?>

</div>


      


        
        <?php }else{?>

            <div class="cardNo">

<div class="noVehicleCard noVehicleTwo">
         
         <div class="heading ">
         No orders Selected
         </div>
         <div class="details ">
         Please click below to choose an order and proceed with your delivery.
         </div>

         <div class="addVehicleCard">
             <div class="image image_two">
                <img src="<?php echo URLROOT ?>/assets/images/hehe.png" alt="img" class="del_img del_img_2">
             </div>
             <div class="helo">
                <a class="btn btn_two" href="<?php echo URLROOT.'/orders'?>">View Available Orders</a>
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
<script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>





















        </div>
    </div>
</div>
</body>
</html>
