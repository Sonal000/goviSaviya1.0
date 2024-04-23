<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> order details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryCompletedOrderDetails.css">
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
         
        <div class="left">     

                <div class="order_details_head">
                    <?php echo $data['order']->item_name ?>  <?php echo $data['order']->quantity,$data['order']->item_unit;  ?>
                </div>



                <div class="order_details_sub">
                    Seller: <a href="#" style="color:var(--clr-grey-4)" class="link_to_seller">  <?php echo $data['order']->seller_name ?> </a>
                </div>
                            

            
                    <div class="image_p">
                            <img src="<?php echo URLROOT; ?>/store/items/<?php echo $data['order']->item_img  ?> " class="picture" alt="">
                    </div>

        </div>   

        <div class="right">

        <div class="order_details_price">
                    Revenue: <?php echo $data['order']->deliver_fee ?>/=
                </div>

                    <div class="delivery_details">
                                                
                        <div class="more_info" style="display:flex; align-items:center; " ><i class="fa-solid fa-location-dot"></i>  Pickup Location: <?php echo $data['order']->seller_address ?> </p> </div>

                        <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-thumbtack"></i> End Location:  <?php echo $data['order']->order_address ?> </p> </div>

                        <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-user"></i> Seller:  <?php echo $data['order']->seller_name ?> </p></div>

                        <div style="display:flex; align-items:center; " class="more_info"><i class="fa-solid fa-truck"></i> Buyer:   <?php echo $data['order']->buyer_name ?> </p></div>                         

                    
                     </div>    
        </div>  
         <div class="my_button"> 
<button class="btn"><a href="<?php echo URLROOT.'/invoice/' . $data['order']->order_item_id .'/'.  $data['order']->order_id .'/'.  $data['type'] ?>">View Invoice</a></button>
    
</div> </div>

    
    <div class="hed"> Delivery Review Given by <?php echo $data['order']->buyer_name ?></div>

    <div class="mycardd">

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
