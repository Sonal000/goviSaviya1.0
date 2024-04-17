<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm_Quality-PickUp</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
  
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryConfirmQualityPickup.css">
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
            Confirming the quality of the product
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                    Order has been picked <i class="fa-solid fa-circle-check"></i>
                </div>
                
              <div class="instructions">Confirm whether this product does not have any issues or defects <br> reguarding to the quality</div>
                
                <div class="image_product">
             

                <div class="delivery_details">
                    
             
               <div class="update_edit_btn">
                    <botton class="accept_order_btnn"><a href=""><i class="fa-regular fa-circle-check"></i>  Verified</a></botton>
                    <botton class="ignore_order_btnn"><a href=""><i class="fa-solid fa-ban"></i> Can't Verify</a></botton>
                
            </div>
            <div class="order_details_head">
                    Confirm The Quality </div>

                <div class="instructions_two">Provide some of the photos of the product to confirm <br>the quality of the product. </div>
<form action="<?php echo URLROOT; ?>/Orders/delivering" method="post" enctype="multipart/form-data">
                    <label class="custom-file-upload" for="photo">Add Photos to Delivery</label>
                     <input type="file" id="photo" name="pickup_img">
            </div>  
             
                </div>


                
            </div>

            <div class="right_side">
             
            
             <div class="progress_bar">
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                
             </div>

             <div class=done_button> <button type = "submit" class="done_btnn"> Done</button></div>
            </div>

            </form>

        </div>
        


            
        </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
             

</body>
</html>
