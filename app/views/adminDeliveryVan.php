<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Vans</title>
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
        <!-- <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Posts">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div> -->
    </div>
    <div class="admincard_cont">
    <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/onway.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Registered Delivery Vans
                </div>
                <div class="signupcount">
                    <?php echo $data['count']->vehicle_count ;?>
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
   
    <div class="table_cont">
    <table id="" class="tables">
  <tr>
    <th>Vehicle number</th>
    <th>Owner</th>
    <th>Type</th>
    <th>Capacity</th>
    <th></th>
    <th></th>
  </tr>
  <?php if(!empty($data['Vdetails'])){ ?>
        <?php foreach($data['Vdetails'] as $Det){?>
    <tr>
    <td><?php echo $Det->vehicle_number?></td>
    <td><?php echo $Det->owner_name?></td>
    <td><?php echo $Det->vehicle_type?></td>
    <!-- <td><?php echo $Det->max_capacity; ?></td> -->
    <td> <a href="<?php echo URLROOT ?>/Vehicle/details/<?php echo $Det->vehicle_id ?>">view</a></td>
    <td><a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a></td>
  </tr>
  <?php
    }
}else{
    echo "<tr><td colspan='6'>No Delivery Trucks Found</td></tr>";
}
  ?>
        </table>
         
        </div>
</div>

            </div>
            </div>


</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
</html>