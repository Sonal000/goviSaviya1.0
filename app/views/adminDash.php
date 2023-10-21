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
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
<div class="profile">
    <h4>Manage Users</h4>
    <div class="searchbarplace">
        <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search users">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
    </div>
    <div class="admincard_cont">
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/users.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    New Registrations
                </div>
                <div class="signupcount">
                    100
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/users.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Buyers
                </div>
                <div class="signupcount">
                    70
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/users.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Sellers
                </div>
                <div class="signupcount">
                    15
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/users.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Delivery Agents
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
                <p>User ID</p>
            </div>
            <div class="table_cell column2">
                <p>Username</p>
            </div>
            <div class="table_cell column3">
                <p>Email</p>
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
                <p>santhushfernando@gmail.com</p>
            </div>
            <div class="table_cell column4">
                <a href="">view</a>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>02</p>
            </div>
            <div class="table_cell column2">
                <p>sonal Induwara</p>
            </div>
            <div class="table_cell column3">
                <p>sonalinduwara@gmail.com</p>
            </div>
            <div class="table_cell column4">
                <a href="">view</a>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>03</p>
            </div>
            <div class="table_cell column2">
                <p>Nipul Yansith</p>
            </div>
            <div class="table_cell column3">
                <p>nipulyansith@gmail.com</p>
            </div>
            <div class="table_cell column4">
                <a href="">view</a>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>04</p>
            </div>
            <div class="table_cell column2">
                <p>Yunal mallawarachchi</p>
            </div>
            <div class="table_cell column3">
                <p>yunalmallawarachchi@gmail.com</p>
            </div>
            <div class="table_cell column4">
                <a href="">view</a>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
       
        
    </div>
    
</div>


</body>
</html>