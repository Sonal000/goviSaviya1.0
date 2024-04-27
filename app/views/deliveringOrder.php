<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Delivering</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveringOrder.css">
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
            Delivering Order
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                <i class="fa-solid fa-truck"></i>
                <br>
                    Order is being delivered 
                </div>

                <div class="heading">
                    <?php echo $data['order']->item_name;?> <?php echo $data['order']->quantity;?><?php echo $data['order']->item_unit?>
                </div>
                
                <div class="image">
                <img class="imgss"src="<?php echo URLROOT; ?>/store/items/<?php echo $data['order']->item_img ?>" alt="">
                </div>

             

                
            </div>


            <div class="middle">

            <div class="instructions"><div class="details"><i class="fa-solid fa-user"></i> Seller: <?php echo $data['order']->seller_name;?> </div>
                        <div class="details"><i class="fa-solid fa-truck"></i> Buyer: <?php echo $data['order']->buyer_name;?> </div>
                        <div class="details"><i class="fa-solid fa-location-dot"></i> Pickup Location: <?php echo $data['order']->pickup_address;?> </div>
                        <div class="details"><i class="fa-solid fa-thumbtack"></i> Drop off Location: <?php echo $data['order']->order_address;?> </div>
                                        <div class="price_of_order">Delivery Fee: Rs. <?php echo $data['order']->deliver_fee; ?>/=  </div></div>
                
                <div class="image_product">
             

                <div class="delivery_details">
                    
             
               <div class="update_edit_btn">
                   
               <button class="btn" id="showContactBtn"><i class="fa-solid fa-phone"></i>  Contact Seller</button>
                
            </div>
            
            </div>  
             
                </div>

                <div id="contactInfo" class="contact-info">
                    <div class="more_info"><?php echo $data['order']->buyer_mobile?></div>

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

            <div class="right_side">
<!--              
            <div class="order_details_head">
                    Delivered the Product? 
            </div> -->
            <div class="button_class">
                <button class="btn"><a href="<?php echo URLROOT; ?>/Orders/delivered"> Arrived to the Destination</a></button>
                </div>

             <div class="progress_bar">
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>


                
             </div>

             
            </div>



        </div>

    
        <?php
            if($data['order']){ 

            
                ?>
 
 <div class="hed maphead">
            <h3>Map</h3>
        </div>
 <div class="map">
 <div class="distance_details">
        Distance From <span class="bold"><?php echo $data['details']->deliver_address  ?></span> to  <span class="bold"><?php echo $data['details']->pickup_address ?></span> : <span class="bold"> <?php echo getDistance($data['details']->deliver_address,$data['details']->pickup_address);
                            ?>Km</span>
    </div>

          <div class="card" id="map_cont" data-start='gampaha' data-end='matara'> 
                <input id="start" type="hidden" value="<?php echo $data['order']->pickup_address  ?>" name="start">
                <input id="end" type="hidden" value="<?php echo $data['order']->order_address  ?>" name="end">
                <?php       
                require APPROOT. '/views/layouts/mapCurrentLoc.php'; 
             ?>
                </div> 
            <?php
            }
            ?>
        
        </div>

            
        </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>
