<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>

    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerAdrequest.css">
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
        Advertistements
    </div>
    <div class="req_approve_btn">
        
        <div class="reqbt">
            <a href="" class="btn req">Requests</a>
        </div>
        <div class="approvebt">
            <a href="<?php echo URLROOT; ?>/SellerAdaccept" class="btn approve">Approved</a>
        </div>

    </div>
    <div class="adcard">
        <div class="reqbuyerdetails">
            <div class="buyproimg">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="buypro">
            </div>
            <div class="name_date">
                <div class="bna">
                    Santhush Fernando
                </div>
                <div class="reqdate">
                    9th September 2023
                </div>
            </div>
        </div>
        <div class="requestdet">
            <div class="stockdet">
                <div class="req_des">
                    Santhush Fernando requests 5Kg of Mango
                </div>
                <div class="req_item">
                    Item : Mango
                </div>
                <div class="req_quantity">
                    Amount : 5Kg
                </div>
                <div class="req_deadline">
                    Request before : 12th September 2023
                </div>
                <div class="req_location">
                    Location : Colombo
                </div>

            </div>
            <div class="accept_discard_bt">
                <div class="acceptbt">
                    <button class="btn">Accept</button>
                </div>
                <div class="discardbt">
                    <button class="btn">Discard</button>
                </div>

            </div>
        </div>
    </div>
    <div class="adcard">
        <div class="reqbuyerdetails">
            <div class="buyproimg">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="buypro">
            </div>
            <div class="name_date">
                <div class="bna">
                    Santhush Fernando
                </div>
                <div class="reqdate">
                    9th September 2023
                </div>
            </div>
        </div>
        <div class="requestdet">
            <div class="stockdet">
                <div class="req_des">
                    Santhush Fernando requests 5Kg of Mango
                </div>
                <div class="req_item">
                    Item : Mango
                </div>
                <div class="req_quantity">
                    Amount : 5Kg
                </div>
                <div class="req_deadline">
                    Request before : 12th September 2023
                </div>
                <div class="req_location">
                    Location : Colombo
                </div>

            </div>
            <div class="accept_discard_bt">
                <div class="acceptbt">
                    <button class="btn">Accept</button>
                </div>
                <div class="discardbt">
                    <button class="btn">Discard</button>
                </div>

            </div>
        </div>
    </div>
    <div class="adcard">
        <div class="reqbuyerdetails">
            <div class="buyproimg">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="buypro">
            </div>
            <div class="name_date">
                <div class="bna">
                    Santhush Fernando
                </div>
                <div class="reqdate">
                    9th September 2023
                </div>
            </div>
        </div>
        <div class="requestdet">
            <div class="stockdet">
                <div class="req_des">
                    Santhush Fernando requests 5Kg of Mango
                </div>
                <div class="req_item">
                    Item : Mango
                </div>
                <div class="req_quantity">
                    Amount : 5Kg
                </div>
                <div class="req_deadline">
                    Request before : 12th September 2023
                </div>
                <div class="req_location">
                    Location : Colombo
                </div>

            </div>
            <div class="accept_discard_bt">
                <div class="acceptbt">
                    <button class="btn">Accept</button>
                </div>
                <div class="discardbt">
                    <button class="btn">Discard</button>
                </div>

            </div>
        </div>       
    </div>
</div>
  
  
  <!-- =========content end============================== -->
  </div>
 </div>






<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>



</body>
</html>