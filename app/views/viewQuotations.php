<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Requests</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/listproduct.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/buyerOrders.css">
 <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrderDetails.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminVehicleDetails.css">
</head>
<body >
    <button id="backdrop" class="backdrop hidden_backdrop"></button>


 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>
 <!-- navbar end ================== -->
 

 <!-- view Auction =================-->
<section class="view_auction_section section-center">

   <div class="viewAuction_cont">


   <div class="card">
    <h4>Request Info</h4>  
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
                <div class="form-group">
                        <div>Quotation Count:<div class="displayField"><?php echo $data['details']->quotation_count;?></div></div>      
                    
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
                <div class="form-group">
                        <div>Requested By:<div class="displayField"><?php echo $data['details']->buyer_name;?></div></div>      
                    
                </div>

                
            </div>
        </div>
</div>


<div class="second_card_set">
        
        <div class="history_container">
            <h4>Quoatations</h4>
        <?php if(!empty($data['Q2'])):?>
        <?php foreach($data['Q2'] as $items):?>
        
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
                Seller : <?php echo $items->seller_name?>
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




   </div>

</section>