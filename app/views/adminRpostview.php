<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css"> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrder.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrderDetails.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminVehicleDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    
<h4 class="goup">Request Order Details</h4>

                
<div class="order_summary_card2">
            <div class="head_card2">
                <h4>Requestor Details</h4>
            </div>
            <div class="upperbody_card">
                <div class="upperbody_img_cont">
                    <img src="<?php echo URLROOT.'/store/profiles/'.$data['details']->buyer_img ;?>" alt="customers-profile-img" class="upperbody_img">
                </div>
                <div class="upperbody_btn">
                    <button class="btn">View profile</button>
                </div>
            </div>
            <div class="body_card">
                
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Requestor ID
                    </div>
                    <div class="orderNumber_v">
                        <?php echo $data['details']->buyer_id ?>
                    </div>
                </div>
                <div class="orderNumber_cont">
                    <div class="orderNumber">
                        Requestor Name
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
                    <?php echo $data['details']->req_address ?>
                    </div>
                </div>
                
            </div>
            
        </div>
    

    <!--------------------------------------------This is Card 1------------------------------------------>
<div class="card">
    <h4>Order Info</h4>  
    <div class="container">
            <div class="column">

                <div class="form-group">
                        <div>Product:<div class="displayField"><?php echo $data['details']->name;?></div></div>     
                </div>  

                <div class="form-group">
                        <div>Required Date:<div class="displayField"><?php echo $data['details']->req_date;?></div></div>      
                    
                </div>
                
                <div class="form-group">
                        <div>Posted Date:<div class="displayField"><?php echo $data['details']->posted_date;?></div></div>      
                    
                </div>

               

            
                
            </div>
            <div class="column">

            <div class="form-group">
                        <div>Required Stock:<div class="displayField"><?php echo $data['details']->req_stock;?><?php echo $data['details']->unit;?></div></div>      
                    
                </div>


                <div class="form-group">
                        <div>Required Address :<div class="displayField"><?php echo $data['details']->req_address;?></div></div>      
                    
                </div>

                <div class="form-group">
                        <div>Request Status:<div class="displayField"><?php echo $data['details']->status;?></div></div>      
                    
                </div>

                
            </div>
        </div>
</div>


<div class="second_card_set">
        
        <div class="history_container">
            <h4>Quoatations</h4>
        <?php if(!empty($data['items'])):?>
        <?php foreach($data['items'] as $items):?>
        
        <div class="mycard_ad">
        <!-- <div class="productimg">
            <img src="<?php echo URLROOT.'/store/items/'.$items->item_img ;?>" class="mango" alt="">
        </div> -->
        <div class="productdes_ad">
            <div class="order_num">
                Quoatation Number: <?php echo $items->quotation_ID?>
            </div>
            <div class="ord_date">
                Quoatation Amount : <?php echo $items->amount?> 
            </div>
           <div class="productname_ad">
                Seller : <?php echo $items->name?>
           </div>
           
           <div class="productprice_ad">
                
           </div>
        </div>
        <!--  <div class="seller_det">
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
        </div> -->
    </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>No Quotations Yet</p>
        <?php endif; ?>
        </div>
    
        
    </div>

   


        <div class="buttons">
            
            <button class="btn btn_no">Delete</button>
        </div>

</div>
</div>
</div>

    
</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>
