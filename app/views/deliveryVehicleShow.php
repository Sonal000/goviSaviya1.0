<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
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
                <div class="img"><img class="card_img" src="<?php echo URLROOT.'/store/vehicles/'.$data['vehicle']->vehicle_img ;?>"></div>
                    <div class="card_info">
                        <div class="info_col_1">
                                <div class="card-title"><?php echo $data['vehicle']->vehicle_brand?><?php echo ' '. $data['vehicle']->vehicle_model?></div>
                                
                                    <div class="card-subtitle_1"><span class="info_heading">Vehicle Type:</span> <?php echo $data['vehicle']->vehicle_type?> </div>
                                    <div class="card-subtitle_2"><span class="info_heading">Brand:</span> <?php echo $data['vehicle']->vehicle_brand?> </div>
                                    <div class="card-subtitle_3"><span class="info_heading">Model:</span> <?php echo $data['vehicle']->vehicle_model?> </div>
                                    <div class="card-subtitle_4"><span class="info_heading">Vehicle Number:</span> <?php echo $data['vehicle']->vehicle_number?> </div>
                                    
                                    <div class="card-subtitle_2"><span class="info_heading">Fuel Type:</span> <?php echo $data['vehicle']->fuel_type?> </div>
                                    <div class="card-subtitle_1"><span class="info_heading">Mileage:</span> <?php echo $data['vehicle']->milage?>Km </div>
                                    <div class="card-subtitle_6"><span class="info_heading">Manufactured Year:</span> <?php echo $data['vehicle']->vehicle_year?> </div>
                                    
                        </div>
                        <div class="info_col_2">
                                    
                                    <div class="card-subtitle_5"><span class="info_heading">Max Capacity:</span> <?php echo $data['vehicle']->max_capacity?>Kg</div>
                                    <div class="card-subtitle_5"><span class="info_heading">Max Volume:</span> <?php echo $data['vehicle']->max_vol?> Liters</div>
                                    <div class="card-subtitle_6"><span class="info_heading">Refregiration Capability:</span> <?php echo $data['vehicle']->ref_cap?> </div>
                                    <div class="card-subtitle_3"><span class="info_heading">Revenue License Expiry date:</span> <?php echo $data['vehicle']->rev_expiry?> </div>
                                    <div class="card-subtitle_4"><span class="info_heading">Insurance Status:</span> <?php echo $data['vehicle']->insurance_status?> </div>
                                    <div class="card-subtitle_3"><span class="info_heading">Vehicle Insurance Expiry date:</span> <?php echo $data['vehicle']->ins_expiry?> </div>
                                    
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="more_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/edit/<?php echo $data['vehicle']->vehicle_id; ?>"><button class="more_details_btn edit_btn"><i class="fa-solid fa-pencil"></i> Edit General Details</button></a></div>
                        <div class="more_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/editCom/<?php echo $data['vehicle']->vehicle_id; ?>"><button class="more_details_btn edit_btn"><i class="fa-solid fa-truck"></i> Compliance Update</button></a></div>
                    </div>
                        <form action="<?php echo URLROOT; ?>/deliveryVehicles/delete/<?php echo $data['vehicle']->vehicle_id;?>;" class="pull-right" method="post">
                         <div class="more_details"><input type="submit" value="Delete This Vehicle" class="more_details_btn dlt_btn"></div>
                    </form>
                           

                    
                   
                </div>
           
        </div>
        

        <!-- Content -->


        

        
        </div>
        </div>
    </div>
    
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>