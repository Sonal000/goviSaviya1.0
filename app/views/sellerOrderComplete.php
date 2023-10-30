<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertistements_requests</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerAdrequest.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerOrder.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar_withoutimg.php'; 
 ?>
<div class="profile">
    <div class="hed">
        Orders
    </div>
    <div class="req_approve_btn">
        
        <div class="reqbt">
            <a href="<?php echo URLROOT; ?>/SellerOrder" class="btn req">Current Orders</a>
        </div>
        <div class="approvebt">
            <a href="<?php echo URLROOT; ?>/SellerOrderComplete" class="btn approve">Complete Orders</a>
        </div>

    </div>
    <div class="order_card_cont">
        <div class="order_card">
            <div class="order_id">
                <div class="idnum">
                    Order Id : 1012
                </div>
            </div>
            <div class="order_det2">
                <div class="ordim">
                    <img src="<?php echo URLROOT; ?>/assets/images/carrot.jpg" alt="" class="ord_img">
                </div>
                <div class="ordDes">
                    <div class="ord_topic">
                        Order Details
                    </div>
                    <div class="ord_item">
                        Order item - Carrot
                    </div>
                    <div class="ord_quan">
                        Quantity - 10Kg
                    </div>
                    <div class="ord_loc">
                        Location - Colombo
                    </div>
                    <div class="ord_price">
                        Price - Rs 2000
                    </div>
                    <div class="ord_status">
                        Order Status - Placed
                    </div>
                </div>
            </div>
            <div class="order_comp">
                <div class="comp_logo_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/complete.png" alt="" class="comp_logo">
                </div>
                <div class="comp_word_cont">
                    <div class="comp_word">
                        Completed
                    </div>
                </div>
            </div>
        </div>

        <div class="order_card">
            <div class="order_id">
                <div class="idnum">
                    Order Id : 1012
                </div>
            </div>
            <div class="order_det2">
                <div class="ordim">
                    <img src="<?php echo URLROOT; ?>/assets/images/Tomatoes.jpg" alt="" class="ord_img">
                </div>
                <div class="ordDes">
                    <div class="ord_topic">
                        Order Details
                    </div>
                    <div class="ord_item">
                        Order item - Tomatoes
                    </div>
                    <div class="ord_quan">
                        Quantity - 10Kg
                    </div>
                    <div class="ord_loc">
                        Location - Colombo
                    </div>
                    <div class="ord_price">
                        Price - Rs 2000
                    </div>
                    <div class="ord_status">
                        Order Status - Placed
                    </div>
                </div>
            </div>
            <div class="order_comp">
                <div class="comp_logo_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/complete.png" alt="" class="comp_logo">
                </div>
                <div class="comp_word_cont">
                    <div class="comp_word">
                        Completed
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order_card_cont">
        <div class="order_card">
            <div class="order_id">
                <div class="idnum">
                    Order Id : 1012
                </div>
            </div>
            <div class="order_det2">
                <div class="ordim">
                    <img src="<?php echo URLROOT; ?>/assets/images/carrot.jpg" alt="" class="ord_img">
                </div>
                <div class="ordDes">
                    <div class="ord_topic">
                        Order Details
                    </div>
                    <div class="ord_item">
                        Order item - Carrot
                    </div>
                    <div class="ord_quan">
                        Quantity - 10Kg
                    </div>
                    <div class="ord_loc">
                        Location - Colombo
                    </div>
                    <div class="ord_price">
                        Price - Rs 2000
                    </div>
                    <div class="ord_status">
                        Order Status - Placed
                    </div>
                </div>
            </div>
            <div class="order_comp">
                <div class="comp_logo_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/complete.png" alt="" class="comp_logo">
                </div>
                <div class="comp_word_cont">
                    <div class="comp_word">
                        Completed
                    </div>
                </div>
            </div>
        </div>

        <div class="order_card">
            <div class="order_id">
                <div class="idnum">
                    Order Id : 1012
                </div>
            </div>
            <div class="order_det2">
                <div class="ordim">
                    <img src="<?php echo URLROOT; ?>/assets/images/Tomatoes.jpg" alt="" class="ord_img">
                </div>
                <div class="ordDes">
                    <div class="ord_topic">
                        Order Details
                    </div>
                    <div class="ord_item">
                        Order item - Tomatoes
                    </div>
                    <div class="ord_quan">
                        Quantity - 10Kg
                    </div>
                    <div class="ord_loc">
                        Location - Colombo
                    </div>
                    <div class="ord_price">
                        Price - Rs 2000
                    </div>
                    <div class="ord_status">
                        Order Status - Placed
                    </div>
                </div>
            </div>
            <div class="order_comp">
                <div class="comp_logo_cont">
                    <img src="<?php echo URLROOT; ?>/assets/images/complete.png" alt="" class="comp_logo">
                </div>
                <div class="comp_word_cont">
                    <div class="comp_word">
                        Completed
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>