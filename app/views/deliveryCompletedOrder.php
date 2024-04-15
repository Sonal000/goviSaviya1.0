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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryCompletedOrders.css">
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
            Completed Orders
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
               
                <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Mango - 45kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        Ella to Matara
                    </div>
                    <div class="addDate">
                        Date Delivered: 19 Sep 2023
                    </div>
                    <div class="details_view">
                    
                    </div>
                </div>
                
            </div>
            </div>
         
                  
                <div class="update_edit_bt">
                    <botton class="accept_order_btn"><a href="">View Details</a></botton>
                    
                
            </div>
            
        
        </div>
        
   <!-- 2nd Card------------------------------------------------------------------------------------- -->


  
   <div class="mycardd">

<div class="productimg">
    
    <div class="post_left">
    <div class="pro_detail">
        <div class="pro_name">
            Onion - 5kg
        </div>
        <div class="pro_location">
            <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
            Kandy to Colombo
        </div>
        <div class="addDate">
            Date Delivered: 15 Sep 2023
        </div>
        <div class="details_view">
       
        </div>
    </div>
    
</div>
</div>

      
    <div class="update_edit_bt">
        <botton class="accept_order_btn"><a href="">View Details</a></botton>
       
    
</div>


</div>

        <!-- 3rd Card------------------------------------------------------------------------------------- -->

        
        <div class="mycardd">

            <div class="productimg">
               
                <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Guava - 50kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        Rathnapura to Galle
                    </div>
                    <div class="addDate">
                        Date Delivered: 13 Sep 2023
                    </div>
                    <div class="details_view">
                   
                    </div>
                </div>
                
            </div>
            </div>
         
                  
                <div class="update_edit_bt">
                    <botton class="accept_order_btn"><a href="">View Details</a></botton>
                   
                
            </div>
            
        
        </div>

        <!-- 4th Card-------------------------------------------->

        
        <div class="mycardd">

            <div class="productimg">
                
                <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Coconut - 25kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        Kurunegala to Colombo
                    </div>
                    <div class="addDate">
                        Date Delivered: 11 Sep 2023
                    </div>
                    <div class="details_view">
                    
                    </div>
                </div>
                
            </div>
            </div>
         
                  
                <div class="update_edit_bt">
                    <botton class="accept_order_btn"><a href="">View Details</a></botton>
                  
                
            </div>
            
        
        </div>

         <!-- 5th Card------------------------------------------------------------------ -->

        
         <div class="mycardd">

<div class="productimg">
    
    <div class="post_left">
    <div class="pro_detail">
        <div class="pro_name">
            Tomatoes - 70kg
        </div>
        <div class="pro_location">
            <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
            Nuwara Eliya to Kalutara
        </div>
        <div class="addDate">
            Date Delivered: 09 Sep 2023
        </div>
        <div class="details_view">
       
        </div>
    </div>
    
</div>
</div>

      
    <div class="update_edit_bt">
        <botton class="accept_order_btn"><a href="">View Details</a></botton>
        
    
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