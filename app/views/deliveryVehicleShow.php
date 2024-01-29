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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryVehicleShow.css">
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
            Vehicle Info
        </div>

        <div class="main-container">
           
                <div class="card card-body">
                    <div class="card_img"><img src="<?php echo URLROOT ?>/assets/images/car.jpg"></div>
                    <div class="card_info">
                                <div class="card-title"><?php echo $data['vehicle']->vehicle_brand?><?php echo ' '. $data['vehicle']->vehicle_model?></div>
                                
                                    <div class="card-subtitle_1">Vehicle Type: <?php echo $data['vehicle']->vehicle_type?> </div>
                                    <div class="card-subtitle_2">Brand: <?php echo $data['vehicle']->vehicle_brand?> </div>
                                    <div class="card-subtitle_3">Model: <?php echo $data['vehicle']->vehicle_model?> </div>
                                    <div class="card-subtitle_4">Vehicle Number: <?php echo $data['vehicle']->vehicle_number?> </div>
                                    <div class="card-subtitle_5">Max Capacity: <?php echo $data['vehicle']->max_capacity?>Kg</div>
                                    <div class="card-subtitle_6">Manufactured Year: <?php echo $data['vehicle']->vehicle_year?> </div>
                    <div class="buttons">
                     <div class="more_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/edit/<?php echo $data['vehicle']->vehicle_id; ?>"><button class="more_details_btn edit_btn"><i class="fa-solid fa-pencil"></i> Edit</button></a></div>
                    <div class="more_details"><a href="#"><button class="more_details_btn dlt_btn"><i class="fa-solid fa-trash"></i> Delete</button></a></div>
                    </div>       

                    </div>
                   
                </div>
           
        </div>
        

        <!-- Content -->


        

        
        </div>
        </div>
    </div>
    
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>