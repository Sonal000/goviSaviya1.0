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
 require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
 <div class="container_content">
 <div class="adminprofile">
    <h4>Order Details</h4>
    <div class="first_card_set">
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
                        <?php echo $data['details']->buyer_id ?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Customer Name
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $data['details']->buyer_name; ?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Location
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $data['details']->order_address ?>
                    </div>
                </div>
                
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
                    <?php echo $data['details']->total_price ?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Delivery fee
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $data['details']->total_delivery_fee ?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Sub Total
                    </div>
                    <?php 
                        $sub_total = ($data['details']->total_price + $data['details']->total_delivery_fee );
                    ?>
                    <div class="orderNumber_v">
                    <?php echo $sub_total ?>
                    </div>
                </div>
                    
            </div>
        </div>
        
  
        
    </div>
   
     <div class="second_card_set">
        
        <div class="history_container">
            <h4>Ordered Items</h4>
        <?php if($data['items']):?>
           <!-- <?php echo var_dump($data['items']); ?> -->
        <?php foreach($data['items'] as $items):?>
            
        <div class="mycard_ad">
        <div class="productimg">
            <img src="<?php echo URLROOT.'/store/items/'.$items->item_img ;?>" class="mango" alt="">
        </div>
        <div class="productdes_ad">
            <div class="order_num">
                Order Number: <?php echo $items->order_id;?>
            </div>
            <div class="ord_date">
                Date : Sun,Oct 17,2023
            </div>
           <div class="productname_ad">
                Product : <?php echo $items->name;?>
           </div>
           
           <div class="productprice_ad">
               Quantity <?php echo $items->quantity;?><?php echo $items->unit ;?> | Rs <?php echo $items->total_price ;?> /Kg
           </div>
        </div>
        <div class="seller_det">
            <div class="img_and_Plink">
                <div class="seller_img">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="customers-profile-img" class="upperbody_img leftee">
                </div>
                <div class="profile_link">
                    <button class="btn">Seller profile</button>
                </div>
            </div>
            <div class="ord_info">
            <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Seller ID :
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $items->seller_id?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Name :
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $items->seller_name?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Location :
                    </div>
                    <div class="orderNumber_v">
                    <?php echo $items->seller_address?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Seller Rating :
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
    <?php endforeach; ?>
    <?php else: ?>
        <p>No data available</p>
        <?php endif; ?>
    
        </div>
    <!--<div class="mycard_ad">
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
            
        </div>-->
        
    </div>
    <div class="third_card_set">
    <div class="history_container">
            <?php if($data['deliverdet']):?>
                <!-- <?php var_dump($data['deliverdet']) ?> -->
        <?php foreach($data['deliverdet'] as $deliveryDet):?>
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
                        Deliver ID
                        </div>
                        <div class="orderNumber_v">
                        <?php echo $deliveryDet->deliver_id?>
                        </div>
                    </div>
                    <div class="orderNumber_cont">
                        <div class="orderNumber">
                        Deliverer Name
                        </div>
                        <div class="orderNumber_v">
                        <?php echo $deliveryDet->name?>
                        </div>
                    </div>
                    <div class="orderNumber_cont">
                        <div class="orderNumber">
                        Deliverer Address
                        </div>
                        <div class="orderNumber_v">
                        <?php echo $deliveryDet->address?>
                        </div>
                    </div>
                
                </div>
            </div>

            <div class="delivery_sta">
            <div class="stages_show_content">
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
            <div class="check_btn">
                <a href="<?php echo URLROOT; ?>/Orders/CheckItemsImages/<?php echo $deliveryDet->order_item_id?>/<?php echo $deliveryDet->order_id?>"><button class="btn placement">Check Order Images</button></a>
            </div>
            </div>

           <?php endforeach; ?>
           <?php else: ?>
        <p>NO Deliver Assigned Yet</p>
        <?php endif; ?>
            
        </div>
        </div>
    </div>

 </div>
</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>