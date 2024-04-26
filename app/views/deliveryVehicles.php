<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Vehicles</title>
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
            <h3>Delivery Vehicle</h3>
        </div>

        <div class="main-container">
        <?php if($data['pending'] == 1) { ?>
            



            <!-- Pendingggggggggggggggggggggggggggggggg------------------------------------------------------ -->
            <div class="cardNo">

    <div class="noVehicleCard">
             
             <div class="heading">
             Thank you for choosing <span class="govi">Govisaviya</span> Delivering! 
             </div>
             <div class="details ">
             We are currently reviewing your vehicle details and will notify you once they have been approved. 
             </div><div class="details details_two">
             Your patience is appreciated!
             </div>
 
             <div class="addVehicleCard">
                 <div class="image">
                    <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
                 </div>
                 <div class="status">Status: <span class="govi">Pending</span></div>
                
 
             </div>
 
         </div>
         </div>

         <!-- Pendingggggggggggggggggggggggggggggggg------------------------------------------------------ -->

         <!-- Approveddddddddddddddddddddddddddddddd------------------------------------------------------ -->

            <?php }elseif($data['pending'] == 2){ ?>



            <?php foreach($data['vehicles'] as $vehicle):?>
                <div class="card card-body">


                    <div class="left_side">
                        <div class="card-title"><?php echo $vehicle->vehicle_brand?> </div>
                        <div class="card-title"><?php echo ' '. $vehicle->vehicle_model?></div>
                        <img class="vehicle_img" src="<?php echo URLROOT.'/store/vehicles/'.$vehicle->vehicle_img ;?>">

                    </div>

                    <div class="right_side">
                         <div class="subtitle_ss">Status: <span class="green">Approved <i class="fa-solid fa-circle-check"></i></span> </div>
                        <div class="card-subtitle_1"><span class="info_heading">Vehicle Type:</span> <?php echo $vehicle->vehicle_type?> </div>
                        <div class="card-subtitle_2"><span class="info_heading">Brand: </span><?php echo $vehicle->vehicle_brand?> </div>
                        <div class="card-subtitle_3"><span class="info_heading">Model: </span><?php echo $vehicle->vehicle_model?> </div>
                        <div class="card-subtitle_4"><span class="info_heading">Vehicle Number:</span> <?php echo $vehicle->vehicle_number?> </div>

                        <div class="moree_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/show/<?php echo $vehicle->vehicle_id; ?>"><button class="btn">More</button></a></div>

                    </div>  

                        



                    </div>
            <?php endforeach; ?> 
            
            
             <!-- Approveddddddddddddddddddddddddddddddd------------------------------------------------------ -->

              <!-- Noooooooooooo Vehicleeeeeeeeeeeeeeeeeee------------------------------------------------------ -->
            
            <?php }elseif($data['pending'] == 4) { ?>
            <div class="card card-body subtitle_card">
            <div class="card-subtitle_plus">Add New Vehicle </div>
            <div class="add_logo"><a href="<?php echo URLROOT;?>/deliveryVehicles/add"><i class="fa-solid fa-circle-plus"></a></i></div>
            </div>

            
            <?php }elseif($data['pending'] == 3){ ?>
                <div class="cardNo">

                <!-- Noooooooooooo Vehicleeeeeeeeeeeeeeeeeee------------------------------------------------------ -->

                <!-- Rejectedddddddddddddddddddddddddddddddddddd------------------------------------------------------ -->



            <div class="noVehicleCard">
                    
                    <div class="heading">
                    <span class="goviR">Sorry,</span> Your Vehicle is Rejected! 
                    </div>
                    <div class="details ">
                    We apologize for any inconvenience this may cause. Review the data and
                    </div><div class="details details_two">
                    add again.
                    </div>
                    

                    <div class="addVehicleCard">
                        <div class="image">
                            <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
                        </div>
                        <div class="helo">
                     <button class="button addVehicle"><a href="<?php echo URLROOT.'/deliveryVehicles/add'?>">Add Vehicle</a></button>
                 </div>
                

                    </div>

                </div>
                </div>
                <?php } ?>

        </div>

        <!-- Content -->
    
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>