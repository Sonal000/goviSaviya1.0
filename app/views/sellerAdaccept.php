<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertistements_accepted_Requests</title>
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
    <!-- <div class="req_approve_btn">
        
        <div class="reqbt">
            <a href="<?php echo URLROOT; ?>/SellerAdrequest" class="btn acreq">Requests</a>
        </div>
        <div class="approvebt">
            <a href="<?php echo URLROOT; ?>/SellerAdaccept" class="btn acapprove">Approved</a>
        </div>

    </div> -->

<?php if($data['requests']){
    foreach($data['requests'] as $requests){

        $post_date = date('Y-m-d', strtotime($requests->posted_date)); // use to get only the date from the column. column contains both time and date
        $req_date = date('Y-m-d', strtotime($requests->req_date));

        ?>
        <div class="adcard">
        <div class="reqbuyerdetails">
            <div class="buyproimg">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="buypro">
            </div>
            <div class="name_date">
                <div class="bna">
                    <?php echo $requests->buyer_name; ?>
                </div>
                <div class="reqdate">
                    <?php echo $post_date;?>
                </div>
            </div>
        </div>
        <div class="requestdet">
            <div class="stockdet">
                <div class="req_des">
                    <?php echo $requests->buyer_name; ?> requests <?php echo $requests->req_stock;?> <?php echo $requests->unit;?> of <?php echo $requests->name;?>
                </div>
                <div class="req_item">
                    Item : <?php echo $requests->name;?>
                </div>
                <div class="req_quantity">
                    Amount : <?php echo $requests->req_stock ;?> <?php echo $requests->unit;?>
                </div>
                <div class="req_deadline">
                    Request before : <?php echo $req_date;?>
                </div>
                <div class="req_location">
                    Location : <?php echo $requests->req_address;?>
                </div>

            </div>
            <div class="accept_discard_bt">
                <div class="acceptbt">
                    <button class="btn acapprove">Accepted</button>
                </div>
                <div class="discardbt">
                    <button class="discardbtn">Discard</button>
                </div>

            </div>
        </div>
    </div>
    <?php
    }
}
else{
    ?>
    <h3>No Accepted Order Requests</h3>
    <?php
}
?>






    
    
</div>
  
  <!-- =========content end============================== -->
  </div>
 </div>






<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>

</body>
</html>