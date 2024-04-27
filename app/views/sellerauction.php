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
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<button id="backdrop" class="backdrop hidden_backdrop"></button>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

    <!-- items -->
  <div class="container_content">
<!-- content============================ -->

<div class="container_title_cont">
  <p class="container_title">Auction</p>
  </div>

<div class="profile_1">
    <div class="auction_page">
        <!-- <div class="hed">
            Auction
        </div> -->
        <!-- <div class="createbt">
            <a href="<?php echo URLROOT; ?>/CreateAuction"><button class="btn">Create Auction</button></a>
        </div> -->

        <?php 


        if($data['items']){
            foreach($data['items'] as $items){

                $exp_date = date('Y-m-d', strtotime($items->exp_date)); // use to get only the date from the column. column contains both time and date
                $start_date = date('Y-m-d', strtotime($items->start_date));
                $end_date = date('Y-m-d', strtotime($items->end_date));

           ?>
           <div class="auction_item_cont"> 
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
                      Expire Date : <?php echo $exp_date; ?>
                    </div>
                </div>
                <div class="bid_detail">
                    <div class="bidder_name">
                        <p><a href="" class="highest_bidder">Highest Bidder : <?php echo $items->current_buyer_name ?></a> </p>
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
                        Highest Bid - Rs <?php echo $items->current_bid ?>
                    </div>
                    <div class="remaining_time">
                    <?php echo $items->time_remain ;?> remaining
                    </div>
                </div>
                <div class="update_edit_bt">
                    <button class="btn auc_cards">
                     view biddings
                    </button>
                   <a href="<?php echo URLROOT;?>/auctionC/endAuction/<?php echo $items->auction_ID ?>"><button class="aucbt_post btn" type="submit" id="end_auc_btn">End Auction</button></a>
                </div>
            </div>
         </div>


        </div>
        
        <div class="bid_list overlay hidden_overlay">       
        <div class="container_info">
                   <div class="sec_title">Auction : <?php echo $items->auction_ID; ?></div>
                   <div class="info_cont">
                       
                       <div class="text_container">
                <div class="info">
                    <!-- <p class="infor_title">Item :</p> -->
                    <a href="<?php echo URLROOT."/marketplace/iteminfo/".$items->item_id; ?>" class="infor_title item_title"><?php echo $items->name; ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Base Price</p>
                    <p class="infor_title"><?php echo $items->price ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Quantity</p>
                    <p class="infor_title"><?php echo $items->stock ?>  <?php echo $items->unit ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Start Date</p>
                    <p class="infor_title"><?php echo $start_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">End Date</p>
                    <p class="infor_title"><?php echo $end_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Time remaining</p>
                    <p class="infor_title"><?php echo $items->time_remain ;?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Current Bid</p>
                    <p class="infor_title"><?php echo $items->current_bid ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Count</p>
                    <p class="infor_title"><?php echo $items->bid_Count ?></p>
                </div>

                
           
                
            </div>
            <div class="image_container">
                <img  src="<?php echo URLROOT."/store/items/".$items->item_img; ?>" alt="img"/>
            </div>

                </div>

                <div class="sec_title">Bidding List</div>

                <?php if($items->bidlist){

foreach($items->bidlist as $bid){
    ?>

                <div class="info_cont">  
                <div class="info_bidders ">       
                <div class="info">
                    <p class="infor_title">Bid ID :</p>
                    <p class="infor_title"><?php echo $bid->bid_id ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bidder :</p>
                
                    <a href="<?php echo URLROOT."/profile/".$bid->buyer_user_id; ?>" class="infor_title buyer_name"><?php echo $bid->buyer_name ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Price :</p>
                    <p class="infor_title"><?php echo $bid->bid_price?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Bid Date :</p>
                    <p class="infor_title"><?php echo $bid->bid_date ?></p>
                </div>
         
            </div>
            </div>
            <?php
                }}else{
                    echo "<p>No bidders for this auction .</p>";
                } ?>


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
    }else{
        ?>  
            <div class="no_items" style="margin:1.5rem;" >
                <p>No auction items to show</p>

        <?php
    }

    ?>

        <!-- Confirmation pop-up -->
       

        
    </div>
</div>





  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<!-- <script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script> -->
<script src="<?php echo URLROOT ?>/assets/js/sellerauction.js"></script>


</body>


</html>