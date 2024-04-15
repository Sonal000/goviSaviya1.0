<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> order details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryOrderDetails.css">
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
            Order Details
        </div>
        
     
        <?php if($data['order']){ ?> 

<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                    <?php echo $data['order']->item_name ?>
                </div>
                

                <div class="order_weight">
                <?php echo $data['order']->quantity,$data['order']->item_unit;  ?>
                </div>

                <div class="order_details_sub">
                    Seller: <a href="#" style="color:var(--clr-grey-4)" class="link_to_seller">  <?php echo $data['order']->seller_name ?> </a>
                </div>
                
                <div class="order_seller_rating">
                    Rating: 4.5
                </div>




                <div class="image_product">
                <img src="<?php echo URLROOT; ?>/store/items/<?php echo $data['order']->item_img  ?> " class="onion" alt="">

                <div class="delivery_details">
                    
               <div class="more_info" style="display:flex; align-items:center; " ><i class="fa-solid fa-location-dot"></i> Pickup Location: <p style="text-transform:capitalize">  <?php echo $data['order']->seller_address ?> </p> </div>

               <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-thumbtack"></i> End Location: <p style="text-transform:capitalize">  <?php echo $data['order']->order_address ?> </p> </div>

               <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-user"></i> Seller: <p style="text-transform:capitalize"> <?php echo $data['order']->seller_name ?> </p></div>

               <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-truck"></i> Required Vehicle: <p style="text-transform:capitalize"> Mini Truck </p></div>

               <div class="update_edit_btn">
                    <botton class="accept_order_btnn"><a href=""><i class="fa-solid fa-phone"></i>  Contact Seller</a></botton>
                    <botton class="ignore_order_btnn"><a href=""><i class="fa-solid fa-map-pin"></i>  Get Location</a></botton>
                
            </div>
            </div>   
                </div>


                
            </div>

            <div class="right_side">

            <?php if(!$data['available']){?>
            <p style="color:red;"> You cannot accept more than one orders at a time </p>
           <?php  } ?>
           
            <div class="update_edit_btnn">
            <?php if(!$data['available']){?>
              <a class="accept_order_btnnn"  href="#"><i class="fa-solid fa-circle-check"></i>  Accept Order</a>

                    <a class="ignore_order_btnnn" href=""><i class="fa-solid fa-ban"></i>  Ignore Order</a>
                    <?php  }else{ ?>

                        <a class="accept_order_btnnn"  href="<?php echo URLROOT ?>/orders/acceptOrder/<?php echo $data['order']->order_item_id  ?>"><i class="fa-solid fa-circle-check"></i>  Accept Order</a>

<a class="ignore_order_btnnn" href=""><i class="fa-solid fa-ban"></i>  Ignore Order</a>


                  <?php  } ?>
            </div>

            </div>



        </div>
        
<!-- 1st Card------------------------------------------------------------------------------------- -->
<?php
        }else{
            ?>
            <div> <p> No details to show </p></div>
            <?php
        } ?>
            
        </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
</body>
</html>
