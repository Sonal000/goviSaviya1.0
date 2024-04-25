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
<button id="backdrop" class="backdrop hidden_backdrop"></button>

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
                    
               <div class="more_info"><i class="fa-solid fa-location-dot"></i></i> Pickup Location:  <?php echo $data['details']->seller_address?></div>
               <div class="more_info"><i class="fa-solid fa-thumbtack"></i> End Location: <?php echo $data['details']->buyer_address?></div>
               <div class="more_info"><i class="fa-solid fa-user"></i> Seller: <?php echo $data['details']->seller_name?></div>
               <div class="more_info"><i class="fa-solid fa-truck"></i> Buyer: <?php echo $data['details']->buyer_name?></div>
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
                    <button class="btn"><a href="<?php echo URLROOT; ?>/Orders/pickedup"><i class="fa-solid fa-circle-check"></i>  Picked-up</a></button>
                    <!-- <botton class="ignore_order_btnnn"><a href="<?php echo URLROOT; ?>/DeliveryConfirmQualityPickup"><i class="fa-solid fa-ban"></i>  Confirm Quality</a></botton> -->
             
            </div>
             <div class="progress_bar">
                <div class="p_title">Current Order Status</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                
             </div>
            </div>



        </div>



        <!-- =========================overlay -->
     
        <div class="location overlay hidden_overlay">       
        <div class="container_info">
                   <div class="sec_title">Auction : <?php echo $items->auction_ID; ?></div>
                   <div class="info_cont">
                       
                       <div class="text_container">
                <div class="info">
                    <!-- <p class="infor_title">Item :</p> -->
                    <a href="<?php echo URLROOT."/marketplace/iteminfo/".$items->item_id; ?>" class="infor_title item_title"><?php echo $items->name; ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Base Price</p>
                    <p class="infor_title"><?php echo $items->price ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Quantity</p>
                    <p class="infor_title"><?php echo $items->stock ?>  <?php echo $items->unit ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Start Date</p>
                    <p class="infor_title"><?php echo $items->start_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">End Date</p>
                    <p class="infor_title"><?php echo $items->Ended_date ?></p>
                </div>
               <div class="info">
                    <p class="infor_title">Highest Bid</p>
                    <p class="infor_title"><?php echo $items->highest_bid ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Count</p>
                    <p class="infor_title"><?php echo $items->bid_Count ?></p>
                </div>

                
           
                
            </div>
            <div class="image_container">
                <img  src="<?php echo URLROOT."/store/items/".$items->item_img; ?>" alt="img"/>
            </div>

                </div>

                <div class="sec_title">Bidding List</div>

                <?php if($items->bidlist){

foreach($items->bidlist as $bid){
    ?>

                <div class="info_cont">  
                <div class="info_bidders ">       
                <div class="info">
                    <p class="infor_title">Bid ID :</p>
                    <p class="infor_title"><?php echo $bid->bid_id ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bidder :</p>
                
                    <a href="<?php echo URLROOT."/profile/".$bid->buyer_user_id; ?>" class="infor_title buyer_name"><?php echo $bid->buyer_name ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Price :</p>
                    <p class="infor_title"><?php echo $bid->bid_price?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Date :</p>
                    <p class="infor_title"><?php echo $bid->bid_date ?></p>
                </div>
         
            </div>
            </div>
            <?php
                }}else{
                    echo "<p>No bidders for this auction .</p>";
                } ?>


            </div>

</div>


   <!-- =========================overlay -->


        
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
                <a class="btn" href="<?php echo URLROOT.'/orders'?>">View Available Orders</a>
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
