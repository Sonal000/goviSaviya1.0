<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryVehicleEdit.css">
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
                    Vehicle Edit Details
                </div>
                
                <div class="vehicle_details">
                        <div class="card-subtitle"><span class="info_heading">Brand:</span> <?php echo $data['brand']?> </div>
                        <div class="card-subtitle"><span class="info_heading">Model:</span> <?php echo $data['model']?> </div>
                        <div class="card-subtitle"><span class="info_heading">Vehicle Number:</span> <?php echo $data['vehicleNo']?> </div>
                    </div>
        <div class="main-container">
            
           
        <div class="card card-body">
            <div class="left">   
                <form action="<?php echo URLROOT; ?>/deliveryVehicles/edit/<?php echo $data['id'];?>" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                        <label for="brand">Current Mileage: <sup>*</sup></label>
                        <input type="text" name="milage" class="form_details <?php echo (!empty($data['milage_error'])) ? 'is-invalid' : ''; ?>" 
                        value = "<?php echo $data['milage']; ?>">
                        <span class="invalid-feedback"><?php echo $data['milage_error']; ?></span>
                    </div>

                    <div class="form-group">
                    <label for="max_vol">Vehicle Max-volume in liters: (Cubic meters) <br></label>
                    <input class="form_details <?php echo (!empty($data['max_vol_error'])) ? 'is-invalid' : ''; ?>" type="number" name="max_vol" id="max_vol" required  value = "<?php echo $data['max_vol']; ?>">

                    
                    <!-- <span class="invalid-feedback"><?php echo $data['max_vol_error']; ?></span> -->
                </div>

                <div class="form-group">
                    <label for="capacity">Vehicle Max-weight capacity in kilograms: <br></label>
                    <input class="form_details <?php echo (!empty($data['capacity_error'])) ? 'is-invalid' : ''; ?>" type="number" name="capacity" id="capacity" required value = "<?php echo $data['capacity']; ?>">
                    
                    <!-- <span class="invalid-feedback"><?php echo $data['capacity_error']; ?></span> -->
                </div>

            </div>  
            <div class="right">
                    
                    

            <div class="form-group ref-cap">
                <label for="ref_cap">Refrigeration Capability:<br></label>
                <select class="form_details <?php echo (!empty($data['ref_cap_error'])) ? 'is-invalid' : ''; ?>" name="ref_cap" id="ref_cap" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    
                </select>
                <!-- <span class="invalid-feedback"><?php echo $data['doe_error']; ?></span> -->
            </div>

             
            <div class="form-group">
                    <label for="vehicle_img">Change the Image of the Vehicle: <br></label>
                    <input class="form_details <?php echo (!empty($data['vehicle_img_error'])) ? 'is-invalid' : ''; ?>" type="file" name="vehicle_img" id="vehicle_img" accept="image/*">
                    <br><small class="form-text text-muted">Upload a picture of the vehicle. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['vehicle_img_error']; ?></span> -->
                </div>
             
                <div class="submit_button"><input type="submit" class="btn" value="Submit"></div>
                    
                        
                    </div>

                    


 
                   

                    </div>
                    </form>
                   
                   
                </div>
           
        </div>
        

        <!-- Content -->


        

        
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

</body>
</html>