<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerAdrequest.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerOrder.css">
</head>
<body>



<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

  <div class="container_content">

  <!-- =========content ============================== -->
  
  
  <div class="profile">
    <div class="hed">
        <h4>Orders</h4>
    </div>
    <!-- <div class="req_approve_btn">
        
        <div class="reqbt">
            <a href="" class="btn req">Current Orders</a>
        </div>
        <div class="approvebt">
            <a href="<?php echo URLROOT; ?>/SellerOrderComplete" class="btn approve">Complete Orders</a>
        </div>

    </div> -->
    <div class="order_card_cont">

    <?php 
        if($data['orders']){
            foreach($data['orders'] as $orders){
                if($orders){
                foreach($orders as $order){
                ?>


        <div class="order_card">
            <div class="order_id">
                <div class="idnum">
                    Order Id : <?php echo $order->order_item_id ."/".$order->order_id; ?>
                </div>
            </div>
            <div class="order_det2">
                <div class="ordim">
                    <img src="<?php echo URLROOT."/store/items/".$order->item_img; ?>" alt="" class="ord_img">
                </div>
                <div class="ordDes">
                    <div class="ord_topic">
                        Order Details
                    </div>
                    <div class="ord_item">
                        Order item - <?php echo $order->item_name ?>
                    </div>
                    <div class="ord_quan">
                        Order type - <?php echo $order->order_type ?>
                    </div>
                    <div class="ord_quan">
                        Quantity - <?php echo $order->quantity ?>
                    </div>
                    <div class="ord_loc">
                        Location - <?php echo $order->buyer_city ?>
                    </div>
                    <div class="ord_price">
                        Price - Rs <?php echo $order->total_price ?>
                    </div>
                    <div class="ord_status">
                        Order Status - <?php echo $order->order_status ?>
                    </div>
                    <div class="viewmore">
                    <div class="viewmorebt">
                        <a href="<?php echo URLROOT; ?>/SellerAdaccept" class="viewmore_btn">View more</a>
                     </div>

                </div>
                </div>
            </div>
            <div class="order_more">
                <div class="buy_pro">

                    <div class="cont_buy_img">
                        <?php if($order->buyer_img){   ?> 
                            <img src="<?php echo URLROOT."/store/profiles/".$order->buyer_img; ?>" alt="" class="another_one prof_pic">
                        <?php }else{ ?>
                            <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="another_one">
                        <?php 
                        }
                         ?>
                    </div>
                    <div class="cont_buy">
                        <p><?php echo $order->buyer_name ?></p>
                        <p class="cont_buy_mobile"><?php echo $order->buyer_mobile ?></p>
                        <p class="cont_buy_buyer">buyer<span><i class="fas fa-check-circle"></i></span></p>
                    </div>
                </div>


            </div>
        </div>

        <?php
                }}}
        }
    ?>


    </div>
</div>
  
  
  
  
  <!-- =========content end============================== -->
  </div>
 </div>






<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>



</body>

</html>