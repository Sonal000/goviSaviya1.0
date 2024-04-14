<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminRposts.css">
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
    <h4>Manage Vehicles</h4>
    <div class="searchbarplace">
        <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Posts">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
    </div>
    <div class="admincard_cont">
    <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/onway.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Registered Pick-up Trucks
                </div>
                <div class="signupcount">
                    15
                </div>
            </div>
        </div>
        <!-- <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/auction.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Auction Posts
                </div>
                <div class="signupcount">
                    11
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT;?>/assets/images/ads.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Advertistment Posts
                </div>
                <div class="signupcount">
                    15
                </div>
            </div>
        </div> -->
       

    </div>
    <div class="table_box">
        <div class="table_row table_hed">
            <div class="table_cell column1">
                <p>Vehicle number</p>
            </div>
            <div class="table_cell column2">
                <p>Owner</p>
            </div>
            <div class="table_cell column3">
                <p>Type</p>
            </div>
            <div class="table_cell column4">
                <p>Capacity</p>
            </div>
            <div class="table_cell column5">
                <p></p>
            </div>
            <div class="table_cell column6">
                <p></p>
            </div>
        </div>
        
        <?php if(!empty($data['Vdetails'])):?>
        <?php foreach($data['Vdetails'] as $Det): ?>
        <div class="table_row">
            <div class="table_cell column1">
                <p><?php echo $Det->vehicle_number?></p>
            </div>
            <div class="table_cell column2">
                <p><?php echo $Det->owner_name?></p>
            </div>
            <div class="table_cell column3">
                <p><?php echo $Det->vehicle_type?></p>
            </div>
            <div class="table_cell column4">
                <p><?php echo $Det->max_capacity?><?php echo 'KG'?></p>
            </div>
            <div class="table_cell column5">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column6">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No data available</p>
        <?php endif; ?>
        
       
        
        
       
        
    </div>
    
</div>

            </div>
            </div>


</body>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
</html>