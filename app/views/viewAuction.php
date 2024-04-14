<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Bidding</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/viewAuction.css">
</head>
<body>


 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>
 <!-- navbar end ================== -->
 

 <!-- view Auction =================-->
<section class="view_auction_section section-center">

   <div class="viewAuction_cont">
      
      <div class="current_biddings_cont">
         
         <div class="auc_title">
            <h3>Active biddings</h3>
         </div>
         
         <div class="bid_items_cont">
      
<?php if($data['items']){ foreach($data['items'] as $item){

   if($item->leading_bid){
      ?>


    <!-- bid item ===========-->
    
    <div class="bid_item_cont  ">
            <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT ?>/store/items/<?php echo $item->item_img ?>"/>
            </div>
            <div class="item_description">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $item->name ?></p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: <?php echo $item->seller_name ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <!-- <p class="item_address">Thalgahawawa</p> -->
                  </div>
                  <p class="item_time">  <?php echo $item->exp_date ?><span> left</span>  </p>
               </div>
               <div class="bid_action_cont">

                  <div class="item_bid_cont">
                     <p class="item_bids"><?php echo $item->bid_Count ?> <span>bids</span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid">Current highest Bid : <span> Rs :  <?php echo $item->current_bid ?></span></p>
                        <p class="your_bid">Your Bid : <span> Rs :  <?php echo $item->your_bid ?></span></p>
                     </div>
                  </div>
                  <div class="item_btns_cont">
                     <!-- <div class="qty_btn_cont">
                        <button class="btn_remove">-</button>
                        <input class="qty" type="number" value="0">
                        <button class="btn_add">+</button>
                     </div> -->
                     <a href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>" class="bid_btn btn">Place Higher Bid</a>
                     <a href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>" class="buy_btn btn">Buy this item</a>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->


      <?php
      }else{
         ?>


    <!-- bid item ===========-->
    
    <div class="bid_item_cont  inactive_bid">
            <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT ?>/store/items/<?php echo $item->item_img ?>"/>
            </div>
            <div class="item_description">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $item->name ?></p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: <?php echo $item->seller_name ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <!-- <p class="item_address">Thalgahawawa</p> -->
                  </div>
                  <p class="item_time"><?php echo $item->exp_date ?>  <span> left</span>  </p>
               </div>
               <div class="bid_action_cont">

                  <div class="item_bid_cont">
                     <p class="item_bids"><?php echo $item->bid_Count ?> <span>bids</span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid inactive">Current highest Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 25000</span></p>
                     </div>
                  </div>
                  <div class="item_btns_cont">
                     <!-- <div class="qty_btn_cont">
                        <button class="btn_remove">-</button>
                        <input class="qty" type="number" value="0">
                        <button class="btn_add">+</button>
                     </div> -->
                     <a href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>" class="bid_btn btn">Place Higher Bid</a>
                     <a href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>" class="buy_btn btn">Buy this item</a>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auctionC/itemInfo/<?php echo $item->auction_id ?>"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->



<?php
      }
   ?>

   <?php
}}else{
   echo '<p>No active biddings</p>';

} ?>

        



</div>
</div>




<div class="biddings_history__cont">
         
         <div class="auc_title">
            <h3>Bidding History</h3>
         </div>
         
         <div class="bid_history_container">
      


         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont lost_bid ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-3.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Carrots</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">20 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 40000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 20000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="lost_msg">You Lost the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="#" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont lost_bid ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-3.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Carrots</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">20 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 40000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 20000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="lost_msg">You Lost the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/assets/images/item-5.png"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name">Banana</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="history_bids">10 <span>bids</span></p>
                     <div class="history_info_cont">
                        <p class="wining_bid ">Winning Bid : <span> Rs : 30000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 30000</span></p>
                     </div>
                  </div>
                  <div class="history_btns_cont">
                     <p class="won_msg">You won the Bid</p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->
        



</div>
</div>


      
</div>

</section>
<!-- view Auction end=================-->




 
<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->





   <!-- js === -->
   <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>
</html>