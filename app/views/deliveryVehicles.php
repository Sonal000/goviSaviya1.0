<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryVehicles.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">

<?php 
   require APPROOT. '/views/layouts/deliverySidebar.php';  ?>

<div class="container_content">

<div class="profile">
   
        <div class="hed">
            <h3>Delivery Vehicles</h3>
        </div>

        <div class="main-container">
            <?php foreach($data['vehicles'] as $vehicle):?>
                <div class="card card-body">
                    <div class="card-title"><?php echo $vehicle->vehicle_brand?></div>
                    <div class="card-title"><?php echo ' '. $vehicle->vehicle_model?></div>
                    <img class="vehicle_img" src="<?php echo URLROOT.'/store/vehicles/'.$vehicle->vehicle_img ;?>">
                    <!-- <div class="image"><img src="<?php echo URLROOT ?>/assets/images/car.jpg" class="img_vehicle"></div> -->
                    <div class="card-subtitle_1"><span class="info_heading">Vehicle Type:</span> <?php echo $vehicle->vehicle_type?> </div>
                    <div class="card-subtitle_2"><span class="info_heading">Brand: </span><?php echo $vehicle->vehicle_brand?> </div>
                    <div class="card-subtitle_3"><span class="info_heading">Model: </span><?php echo $vehicle->vehicle_model?> </div>
                    <div class="card-subtitle_4"><span class="info_heading">Vehicle Number:</span> <?php echo $vehicle->vehicle_number?> </div>
                    

                    <div class="more_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/show/<?php echo $vehicle->vehicle_id; ?>"><button class="more_details_btn">More</button></a></div>



                </div>
            <?php endforeach; ?>   
            <div class="card card-body subtitle_card">
            <div class="card-subtitle_plus">Add New Vehicle </div>
            <div class="add_logo"><a href="<?php echo URLROOT;?>/deliveryVehicles/add"><i class="fa-solid fa-circle-plus"></a></i></div>
            
            </div>
        </div>

        <!-- Content -->
    
        </div>
        </div>
    </div>
    
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>