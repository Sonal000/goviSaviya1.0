<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminPosts.css">
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
    <h4>Manage Posts</h4>
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
                <img src="<?php echo URLROOT; ?>/assets/images/store.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Marketplace Posts
                </div>
                <div class="signupcount">
                    23
                </div>
            </div>
        </div>
        <div class="admincard">
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
                <img src="<?php echo URLROOT; ?>/assets/images/ads.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Advertistment Posts
                </div>
                <div class="signupcount">
                    15
                </div>
            </div>
        </div>
       

    </div>
    <div class="table_box">
        <div class="table_row table_hed">
            <div class="table_cell column1">
                <p>Post ID</p>
            </div>
            <div class="table_cell column2">
                <p>Posted by</p>
            </div>
            <div class="table_cell column3">
                <p>Posted Date</p>
            </div>
            <div class="table_cell column4">
                <p></p>
            </div>
            <div class="table_cell column5">
                <p></p>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>santhush Fernando</p>
            </div>
            <div class="table_cell column3">
                <p>Sun,Oct 7, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Sonal Induwara</p>
            </div>
            <div class="table_cell column3">
                <p>Sat,Oct 12, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Yunal Mallawarachchi</p>
            </div>
            <div class="table_cell column3">
                <p>Tue,Oct 14, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Nipul Yansith</p>
            </div>
            <div class="table_cell column3">
                <p>Mon,Oct 24, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
       
        
        
       
        
    </div>
    
</div>

            </div>
            </div>


</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
</html>