<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

    <!-- items -->
  <div class="container_content">
<!-- content============================ -->

<div class="profile">
    <div class="auction_page">
        <div class="hed">
            Auction
        </div>
        <!-- <div class="createbt">
            <a href="<?php echo URLROOT; ?>/CreateAuction"><button class="btn">Create Auction</button></a>
        </div> -->

        <?php 
        if($data['items']){
            foreach($data['items'] as $items){

           ?>
        <div class="mycard" id="blur">

            <div class="productimg">
                <img src="<?php echo URLROOT."/store/items/".$items->item_img; ?>" class="mango" alt="">
            </div>
         <div class="left_right_container">
            <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        <?php echo $items->name; ?> -  <?php echo $items->stock; ?><?php echo $items->unit; ?>
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        <?php echo $items->district; ?>
                    </div>
                    <div class="pro_exp">
                        Exp : 12 sep 2023
                    </div>
                </div>
                <div class="bid_detail">
                    <div class="bidder_name">
                        <p><a href="" class="highest_bidder">Santhush Fernando</a> is leading</p>
                    </div>
                    <div class="bidcount">
                        Bid count : <?php echo $items->bid_Count ;?>
                    </div>
                    
                </div>
            </div>

            <div class="post_right">
                <div class="high_bid">
                    <div class="base_price">
                        Rs <?php echo $items->price ;?>
                    </div>
                    <div class="current_highest">
                        Highest Bid - Rs 2050
                    </div>
                    <div class="remaining_time">
                        24 hours remaining
                    </div>
                </div>
                <div class="update_edit_bt">
                   <a href="<?php echo URLROOT;?>/auctionC/endAuction/<?php echo $items->auction_ID ?>"><botton class="aucbt_post btn" type="submit" id="end_auc_btn">End Auction</botton></a>
                </div>
            </div>
         </div>

        </div>

        <!---
        <div class="pop_up" id="window_up">
                <div class="window">
                    <div class="sure">
                        <p>Are you Sure ?</p>
                    </div>
                    <div class="button_hold">
                        <button type="submit" class="yes_btn btn">Yes</button>
                        <button type="submit" class="no_btn btn">No</button>
                    </div>
                </div>
        </div>
            -->

        <?php
    }
    }

    ?>

        <!-- Confirmation pop-up -->
       

        
    </div>
</div>





  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerauction.js"></script>


</body>


</html>