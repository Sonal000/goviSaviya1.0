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
                
              <div class="instructions">From: <?php echo $data['order']->seller_address; ?><br>
                                        To: <?php echo $data['order']->buyer_address;?> <br>
                                        Distance: 119Km<br>
                                        <div class="price_of_order">Delivery Fee: Rs. <?php echo $data['order']->deliver_fee; ?>/=  </div></div>
                
                <div class="image_product">
             

                <div class="delivery_details">
                    
             
               <div class="update_edit_btn">
                    <botton class="accept_order_btnn"><a href=""><i class="fa-solid fa-location-dot"></i></i>  Location</a></botton>
                    <botton class="ignore_order_btnn"><a href=""><i class="fa-solid fa-phone"></i> Contact Buyer</a></botton>
                
            </div>
            <div class="order_details_head">
                    Delivered the Product? </div>
                <botton class="addphoto_button"><a href="<?php echo URLROOT; ?>/Orders/delivered"> Arrived to the Destination</a></botton>
            </div>  
             
                </div>


                
            </div>

            <div class="right_side">
             
            
             <div class="progress_bar">
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                
             </div>
            </div>



        </div>
        


            
        </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>
