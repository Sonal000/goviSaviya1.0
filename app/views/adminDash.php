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
    
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    
</head>
<body>
<?php
require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; ?>
 <div class="container_content">

<div class="adminprofile">
    <h4 class="getdown">Manage Users</h4>
    
    <div class="searchbarplace">
        <!-- <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search users">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div> -->
    </div>
    <div class="admincard_cont">
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/users.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Total Users
                </div>
                <div class="signupcount">
                    <?php echo $data['usercount'] ?> 
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
                    <?php echo $data['buyercount'] ?> 
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
                    <?php echo $data['sellercount'] ?>
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
                    <?php echo $data['deliverycount'] ?>
                </div>
            </div>
        </div>

    </div>
    <div class="adduserbtn">
        <a href="<?php echo URLROOT; ?>/AdminC/addUser"><button class="btn">Add new user</button></a>
    </div>
    <div class="table_box">
        <div class="table_row table_hed">
            <div class="table_cell column1">
                <p>ID</p>
            </div>
            <div class="table_cell column2">
                <p>Username</p>
            </div>
            <div class="table_cell column3">
                <p>User Type</p>
            </div>
            <div class="table_cell column4">
                <p>Email</p>
            </div>
            <div class="table_cell column5">
                <p></p>
            </div>
            <div class="table_cell column6">
                <p></p>
            </div>
        </div>
        
        <?php if (!empty($data['details'])): ?>
        <?php foreach ($data['details'] as $user_det):?>
        <div class="table_row">
            <div class="table_cell column1">
                <p><?php echo $user_det->user_id?></p>
            </div>
            <div class="table_cell column2">
                <p><?php echo $user_det->name?></p>
            </div>
            <div class="table_cell column3">
                <p><?php echo $user_det->user_type?></p>
            </div>
            <div class="table_cell column4">
                <p><?php echo $user_det->email?></p>
            </div>
            <div class="table_cell column5">
                <a href="<?php echo URLROOT; ?>/AdminC/editUser/<?php echo $user_det->user_id?>">view</a>
            </div>
            <div class="table_cell column6">
                <a href="<?php echo URLROOT; ?>/AdminC/delUser/<?php echo $user_det->user_id?>"><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
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
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
</html>