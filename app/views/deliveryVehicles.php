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
                    <img src="<?php echo URLROOT ?>/assets/images/hehe.png" alt="img" class="del_img">
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

                        <div class="moree_details"><a href="<?php echo URLROOT;?>/deliveryVehicles/show/<?php echo $vehicle->vehicle_id; ?>"><button class="btn btn_more">More</button></a></div>

                    </div>  

                        



                    </div>
            <?php endforeach; ?>
            

                                <?php
                    // Assuming $vehicle->rev_expiry contains the expiration date of the revenue license

                            $expiry_date_r = new DateTime($vehicle->rev_expiry);
                            $current_date = new DateTime(); // Current date

                            // Calculate the difference between the current date and the expiration date
                            $date_diff_r = date_diff($current_date, $expiry_date_r);

                            // Get the remaining months
                            $months_remaining_r = ($date_diff_r->y * 12) + $date_diff_r->m;

                    ?>

                    <?php 
                    
                    // Assuming $vehicle->insurance_expiry contains the expiration date of the insurance

                            $expiry_date_i = new DateTime($vehicle->ins_expiry);
                            $current_date = new DateTime(); // Current date

                            // Calculate the difference between the current date and the expiration date
                            $date_diff_i = date_diff($current_date, $expiry_date_i);

                            // Get the remaining months
                            $months_remaining_i = ($date_diff_i->y * 12) + $date_diff_i->m;
                    
                    
                    ?>

            <div class="new_outer_card">

                    <div class="new_card">


                    

                            <div class="hed hed_new">Revenue License Details</div>

                            <div class="details">
                            <div class="more_v_details"><span class="info_heading">Expires on:</span> <?php echo $vehicle->rev_expiry?> </div>

                            <div class="more_v_details">
                       <?php     if ($current_date > $expiry_date_r) {
                                        echo "<div class='card-subtitle_1' style='color: red;'><span class='info_heading'>Insurance Status:</span> Expired </div>";
                                    } else {
                                        echo "<div class='card-subtitle_8'><span class='info_heading'>Months Remaining for Insurance:</span> $months_remaining_r months</div>";
                                    }
                                    ?>
                                    </div>
                            </div>


                    </div>

                    <div class="new_card">

                            <div class="hed hed_new">Vehicle Insurance Details</div>

                            <div class="details">
                           
                            <div class="more_v_details"><span class="info_heading">Expires on:</span> <?php echo $vehicle->ins_expiry?> </div>
                            
                            <div class="more_v_details">
                       <?php     if ($current_date > $expiry_date_i) {
                                        echo "<div class='card-subtitle_1' style='color: red;'><span class='info_heading'>Insurance Status:</span> Expired </div>";
                                    } else {
                                        echo "<div class='card-subtitle_8'><span class='info_heading'>Months Remaining for Insurance:</span> $months_remaining_i months</div>";
                                    }
                                    ?>
                                    </div>
                            </div>


                    </div>


            </div>
            
            
             <!-- Approveddddddddddddddddddddddddddddddd------------------------------------------------------ -->

              <!-- Noooooooooooo Vehicleeeeeeeeeeeeeeeeeee------------------------------------------------------ -->
            
            <?php }elseif($data['pending'] == 4)
             { ?>
            
            
            <div class="cardNo">
        <div class="noVehicleCard">
             
            <div class="heading">
            Let's start Delivering with<span class="govi"> Govisaviya!</span>  
            </div>
            <div class="details ">
            We're thrilled to have you here. To get started with deliveries, 
            ensure you've added a vehicle to your account.
            </div><div class="details details_two">
            Let's begin!
            </div>

            <div class="addVehicleCard">
                <div class="image">
                   <img src="<?php echo URLROOT ?>/assets/images/hehe.png" alt="img" class="del_img">
                </div>
                <div class="helo">
                    <button class="btn"><a href="<?php echo URLROOT.'/deliveryVehicles/add'?>">Add Vehicle</a></button>
                </div>

            </div>

        </div>

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
                            <img src="<?php echo URLROOT ?>/assets/images/hehe.png" alt="img" class="del_img">
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