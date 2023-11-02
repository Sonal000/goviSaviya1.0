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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar_withoutimg.php'; 
 ?>
<div class="profile">
    <div class="auction_page">
        <div class="hed">
            Auction
        </div>
        <div class="createbt">
            <a href="<?php echo URLROOT; ?>/CreateAuction"><button class="btn">Create Auction</button></a>
        </div>
        <div class="mycard" id="blur">

            <div class="productimg">
                <img src="<?php echo URLROOT; ?>/assets/images/mango.jpeg" class="mango" alt="">
            </div>
         <div class="left_right_container">
            <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Mango - 5Kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        Walimada
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
                        Bid count : 4
                    </div>
                    
                </div>
            </div>

            <div class="post_right">
                <div class="high_bid">
                    <div class="base_price">
                        Rs 2000
                    </div>
                    <div class="current_highest">
                        Highest Bid - Rs 2050
                    </div>
                    <div class="remaining_time">
                        24 hours remaining
                    </div>
                </div>
                <div class="update_edit_bt">
                    <botton class="aucbt_post btn"><a href="">Update Post</a></botton>
                    <botton class="aucbt_post btn"><a href="" onclick="toggle()">End Auction </a></botton>
                </div>
            </div>
         </div>
        </div>
        <div class="mycard">
            <div class="productimg">
                <img src="<?php echo URLROOT; ?>/assets/images/guava.png" class="mango" alt="">
            </div>
            
            <div class="left_right_container">
            <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Guava - 10Kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        NuwaraEliya
                    </div>
                    <div class="pro_exp">
                        Exp : 12 sep 2023
                    </div>
                </div>
                <div class="bid_detail">
                    <div class="bidder_name">
                        <p><a href="" class="highest_bidder">Sonal Induwara</a> is leading</p>
                    </div>
                    <div class="bidcount">
                        Bid count : 7
                    </div>
                    
                </div>
            </div>

            <div class="post_right">
                <div class="high_bid">
                    <div class="base_price">
                        Rs 1500
                    </div>
                    <div class="current_highest">
                        Highest Bid - Rs 3000
                    </div>
                    <div class="remaining_time">
                        15 hours remaining
                    </div>
                </div>
                <div class="update_edit_bt">
                    <botton class="aucbt_post btn"><a href="">Update Post</a></botton>
                    <botton class="aucbt_post btn"><a href="" onclick="toggle()">End Auction</a></botton>
                </div>
            </div>
        </div>
        </div>
        <div class="mycard">
            <div class="productimg">
                <img src="<?php echo URLROOT; ?>/assets/images/banana.webp" class="mango" alt="">
            </div>
           
            <div class="left_right_container">
            <div class="post_left">
                <div class="pro_detail">
                    <div class="pro_name">
                        Banana - 15Kg
                    </div>
                    <div class="pro_location">
                        <i class="fa-solid fa-location-dot" style="color: #0f0f0f;"></i>
                        Colombo
                    </div>
                    <div class="pro_exp">
                        Exp : 12 sep 2023
                    </div>
                </div>
                <div class="bid_detail">
                    <div class="bidder_name">
                        <p><a href="" class="highest_bidder">Nipul Yansith</a> is leading</p>
                    </div>
                    <div class="bidcount">
                        Bid count : 5
                    </div>
                    
                </div>
            </div>

            <div class="post_right">
                <div class="high_bid">
                    <div class="base_price">
                        Rs 2400
                    </div>
                    <div class="current_highest">
                        Highest Bid - Rs 3500
                    </div>
                    <div class="remaining_time">
                        12 hours remaining
                    </div>
                </div>
                <div class="update_edit_bt">
                    <botton class="aucbt_post btn"><a href="">Update Post</a></botton>
                    <botton class="aucbt_post btn"><a href="" onclick="toggle()">End Auction</a></botton>
                </div>
            </div>
        </div>
        </div>
        <div id="popup">
            <p>Are you Sure?</p>
            <div class="yes_or_no">
                <botton class="aucbt_post btn"><a href="" onclick="toggle()">Yes</a></botton>
                <botton class="aucbt_post btn"><a href="" onclick="toggle()">No</a></botton>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function toggle(){
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');
        var popup = document.getElementById('popup');
        popup.classList.toggle('active');
    }

</script>
</body>


</html>