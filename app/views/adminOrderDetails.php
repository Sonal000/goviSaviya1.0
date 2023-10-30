<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_Details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrder.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrderDetails.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
 <div class="profile">
    <h4>Order Details</h4>
    <div class="first_card_set">
    <div class="mycard_ad">
        <div class="productimg">
            <img src="<?php echo URLROOT; ?>/assets/images/mango.jpeg" class="mango" alt="">
        </div>
        <div class="productdes_ad">
            <div class="order_num">
                Order Number: 003
            </div>
            <div class="ord_date">
                Date : Sun,Oct 17,2023
            </div>
           <div class="productname_ad">
                Product : Mango
           </div>
           
           <div class="productprice_ad">
               Quantity 40kg | Rs 2000 /Kg
           </div>
           
           <!--<div class="prodes">
                Savor the taste of our freshly harvested, pesticide-free mangoes – pure, organic, and irresistibly sweet.
           </div>-->

        </div>
    </div>
        <div class="order_summary_card">
            <div class="head_card">
                <h4>Order summmary</h4>
                <div class="stat">
                    Completed
                </div>
            </div>
            <div class="body_card">
                
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Transaction Status
                    </div>
                    <div class="orderNumber_v">
                        Completed
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Item total
                    </div>
                    <div class="orderNumber_v">
                        Rs.2500
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Delivery fee
                    </div>
                    <div class="orderNumber_v">
                        Rs.500
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Sub Total
                    </div>
                    <div class="orderNumber_v">
                        Rs.3000
                    </div>
                </div>
                    
            </div>
        </div>
        
  
        
    </div>
    <div class="second_card_set">
    <div class="order_summary_card2">
            <div class="head_card2">
                <h4>Customer Details</h4>
            </div>
            <div class="upperbody_card">
                <div class="upperbody_img_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="customers-profile-img" class="upperbody_img">
                </div>
                <div class="upperbody_btn">
                    <button class="btn">View profile</button>
                </div>
            </div>
            <div class="body_card">
                
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Customer ID
                    </div>
                    <div class="orderNumber_v">
                        003
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Customer Name
                    </div>
                    <div class="orderNumber_v">
                        Yunal Mallawarachchi
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Location
                    </div>
                    <div class="orderNumber_v">
                        Piliyandala
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="order_summary_card2">
            <div class="head_card2">
                <h4>Seller Details</h4>
            </div>
            <div class="upperbody_card">
                <div class="upperbody_img_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="customers-profile-img" class="upperbody_img">
                </div>
                <div class="upperbody_btn">
                    <button class="btn">View profile</button>
                </div>
            </div>
            <div class="body_card">
                
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Seller ID
                    </div>
                    <div class="orderNumber_v">
                        003
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Seller Name
                    </div>
                    <div class="orderNumber_v">
                        Yunal Mallawarachchi
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Location
                    </div>
                    <div class="orderNumber_v">
                        Piliyandala
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Seller Rating
                    </div>
                    <div class="orderNumber_v">
                        <i class="fa-solid fa-star" style="color: #dfd811;"></i>
                        <i class="fa-solid fa-star" style="color: #dfd811;"></i>
                        <span>3.5</span>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <div class="third_card_set">
        <div class="delivery_stage">
            <div class="delivery_agent_det">
                <div class="head_card2">
                <h4>Delivery Details</h4>
                </div>
                <div class="upperbody_card">
                    <div class="upperbody_img_cont">
                        <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="customers-profile-img" class="upperbody_img">
                    </div>
                    <div class="upperbody_btn">
                        <button class="btn">View profile</button>
                    </div>
                </div>
                <div class="body_card">
                
                    <div class="orderNumber_cont">
                        <div class="orderNumber">
                        Customer ID
                        </div>
                        <div class="orderNumber_v">
                        003
                        </div>
                    </div>
                    <div class="orderNumber_cont">
                        <div class="orderNumber">
                        Customer Name
                        </div>
                        <div class="orderNumber_v">
                        Yunal Mallawarachchi
                        </div>
                    </div>
                    <div class="orderNumber_cont">
                        <div class="orderNumber">
                        Location
                        </div>
                        <div class="orderNumber_v">
                        Piliyandala
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="delivery_sta">
            <div class="track">
                <ul id="progress" class="txt-center">
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                </ul>
            </div>
            <div class="lists">
                <div class="list">
                    <div class="list_image">
                        <img src="<?php echo URLROOT; ?>/assets/images/orderplaced.png" alt="">
                    </div>
                    <div class="list_status">
                        <h5>Order<br>placed</h5>
                    </div>
                </div>
                <div class="list">
                    <div class="list_image">
                        <img src="<?php echo URLROOT; ?>/assets/images/pickedup.png" alt="" class="away1">
                    </div>
                    <div class="list_status away1">
                        <h5>Order<br>pickedup</h5>
                    </div>
                </div>
                <div class="list">
                    <div class="list_image">
                        <img src="<?php echo URLROOT; ?>/assets/images/onway.png" alt="" class="away2">
                    </div>
                    <div class="list_status away2">
                        <h5>Order<br>On-way</h5>
                    </div>
                </div>
                <div class="list">
                    <div class="list_image">
                        <img src="<?php echo URLROOT; ?>/assets/images/completeD.png" alt="">
                    </div>
                    <div class="list_status">
                        <h5>Order<br>HandOvered</h5>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
 </div>
</body>
</html>