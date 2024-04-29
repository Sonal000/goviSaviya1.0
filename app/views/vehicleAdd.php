<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css"> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/vehicleAdd.css">
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
<h2>Add New Vehicle</h2>

    <form action="<?php echo URLROOT; ?>/deliveryVehicles/add" method="post" enctype="multipart/form-data" id="vehicle_add_form">

    <!--------------------------------------------This is Card 1------------------------------------------>

    <div class="card">
    <h4>Section 1: Vehicle Infomation</h4>  
    <div class="container">
            <div class="column">
                <div class="form-group">
                    <label for="brand">Vehicle Type: <sup>*</sup></label>
                    <select name="type" class="form_details_dropdown <?php echo (!empty($data['type_error'])) ? 'is-invalid' : ''; ?>">
                        
                        <option value="Delivery Truck" <?php echo ($data['type'] === 'Delivery Truck') ? 'selected' : ''; ?>>Delivery Truck</option>
                        <option value="Van" <?php echo ($data['type'] === 'Van') ? 'selected' : ''; ?>>Delivery Van</option>
                        <option value="Pickup Truck" <?php echo ($data['type'] === 'PickupTruck') ? 'selected' : ''; ?>>Pick-up Truck</option>
                        <option value="Three Wheeler" <?php echo ($data['type'] === 'Three-Wheeler') ? 'selected' : ''; ?>>Three-Wheeler</option>
                    </select>

                      <!-- <span class="invalid-feedback"><?php echo $data['type_error']; ?></span> -->
                </div>  
                <div class="form-group">
                    <label for="brand">Vehicle Brand:</label>
                    <input class="form_details <?php echo (!empty($data['brand_error'])) ? 'is-invalid' : ''; ?>" type="text" name="brand" id="brand">
                    <!-- <span class="invalid-feedback"><?php echo $data['brand_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>
                
            <div class="form-group">
                    <label for="model">Vehicle Model: <br></label>
                    <input class="form_details <?php echo (!empty($data['model_error'])) ? 'is-invalid' : ''; ?>" type="text" name="model" id="model">
                    <!-- <span class="invalid-feedback"><?php echo $data['model_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

               

            
            <div class="form-group">
                    <label for="vehicle_img">Image of the Vehicle: <br></label>
                    <input class="form_details <?php echo (!empty($data['vehicle_img_error'])) ? 'is-invalid' : ''; ?>" type="file" name="vehicle_img" id="vehicle_img" accept="image/*" >
                    <br><small class="form-text text-muted">Upload a picture of the vehicle. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['vehicle_img_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>
             
            </div>
            <div class="column">

            <div class="form-group">
                <label for="fuel_type">Vehicle Fuel Type: <br></label>
                <select class="form_details <?php echo (!empty($data['fuel_type_error'])) ? 'is-invalid' : ''; ?>" name="fuel_type" id="fuel_type" >
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Fully - Electric</option>
                </select>
                <!-- <span class="invalid-feedback"><?php echo $data['fuel_type_error']; ?></span> -->
            </div>


                <div class="form-group">
                    <label for="year">Year of Manufacture:</label>
                    <input class="form_details <?php echo (!empty($data['year_error'])) ? 'is-invalid' : ''; ?>" type="text" name="year" id="year" >
                    <!-- <span class="invalid-feedback"><?php echo $data['year_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                <div class="form-group">
                    <label for="milage">Current mileage: (In Kms)</label>
                    <input class="form_details <?php echo (!empty($data['milage_error'])) ? 'is-invalid' : ''; ?>" type="text" name="milage" id="milage" >
                    <!-- <span class="invalid-feedback"><?php echo $data['milage_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                
            </div>
        </div>
</div>

        <!--------------------------------------------This is Card 2------------------------------------------>

        <!-- <div class="card">
    <h4>Section 2: Driving Licence Details</h4>  
    <div class="container">
            <div class="column">
                <div class="form-group">
                    <label for="licenseNo">Driving Licence Number:</label>
                    <input class="form_details <?php echo (!empty($data['licenseNo_error'])) ? 'is-invalid' : ''; ?>" type="text" name="licenceNo" id="licenceNo" >
                    <span class="invalid-feedback"><?php echo $data['licenseNo_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="doi">Driving License Date of Issue: <br></label>
                    <input class="form_details <?php echo (!empty($data['doi_error'])) ? 'is-invalid' : ''; ?>" type="date" name="doi" id="doi" >
                    <span class="invalid-feedback"><?php echo $data['doi_error']; ?></span>
                </div>
             
            </div>
            <div class="column">

                <div class="form-group">
                    <label for="doe">Driving License Date of Expiry: <br></label>
                    <input class="form_details <?php echo (!empty($data['doe_error'])) ? 'is-invalid' : ''; ?>" type="date" name="doe" id="doe" >
                    <span class="invalid-feedback"><?php echo $data['doe_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="license_imgs">Driving License Images: <br></label>
                    <input class="form_details <?php echo (!empty($data['license_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="license_imgs" id="license_imgs" accept="image/*" >
                    <br><small class="form-text text-muted">Upload images of your driving license. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <span class="invalid-feedback"><?php echo $data['license_imgs_error']; ?></span>
                </div>

                
            </div>
        </div>
</div> -->
        
        <!--------------------------------------------This is Card 3------------------------------------------>

        <div class="card">
    <h4>Section 2: License, Registration and Insurance</h4>  
    <div class="container">
            <div class="column">

            <div class="form-group">
                    <label for="license_imgs">Driving License images: <br></label>
                    <input class="form_details <?php echo (!empty($data['license_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="license_imgs" id="license_imgs" accept="image/*" >
                    <br><small class="form-text text-muted">Upload images of your Driving license.<br>Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['license_imgs_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                <div class="form-group">
                    <label for="vehicleNo">Vehicle License plate number: (ex- WP AAA-0000)</label>
                    <input class="form_details <?php echo (!empty($data['vehicleNo_error'])) ? 'is-invalid' : ''; ?>" type="text" name="vehicleNo" id="vehicleNo" >
                    <!-- <span class="invalid-feedback"><?php echo $data['vehicleNo_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                <div class="form-group">
                    <label for="front_img">Front Image: <br></label>
                    <input class="form_details <?php echo (!empty($data['front_img_error'])) ? 'is-invalid' : ''; ?>" type="file" name="front_img" id="front_img" accept="image/*" >
                    <br><small class="form-text text-muted">Picture showing the frontal perspective of the vehicle, with the license plate clearly visible. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['front_img_error']; ?></span> -->
                </div>

                <div class="form-group">
                    <label for="back_img">Back Image: <br></label>
                    <input class="form_details <?php echo (!empty($data['back_img_error'])) ? 'is-invalid' : ''; ?>" type="file" name="back_img" id="back_img" accept="image/*" >
                    <br><small class="form-text text-muted">"Picture showing the rear perspective of the vehicle, with the license plate clearly visible. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['back_img_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                <div class="form-group">
                <label for="insurance_status">Vehicle Insurance status: <br></label>
                <select class="form_details <?php echo (!empty($data['doe_error'])) ? 'is-invalid' : ''; ?>" name="insurance_status" id="insurance_status" >
                    <option value="Full Insurance">Full Insurance</option>
                    <option value="Third Party">Third-party</option>
                    <option value="No Insurance">No Insurance</option>
                    
                </select>
                <p class="invalid_msg"></p>
                <!-- <span class="invalid-feedback"><?php echo $data['doe_error']; ?></span> -->
            </div>

                
             
            </div>
            <div class="column">

           
               
               

                <div class="form-group">
                    <label for="ins_expiry">Current vehicle insurance expires on: <br></label>
                    <input class="form_details <?php echo (!empty($data['ins_expiry_error'])) ? 'is-invalid' : ''; ?>" type="month" name="ins_expiry" id="ins_expiry" >
                    <!-- <span class="invalid-feedback"><?php echo $data['ins_expiry_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>


            

                <div class="form-group">
                    <label for="insurance_imgs">Vehicle Insurance images: <br></label>
                    <input class="form_details <?php echo (!empty($data['insurance_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="insurance_imgs" id="insurance_imgs" accept="image/*" >
                    <br><small class="form-text text-muted">Upload images of your vehicle insurance. <br>Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['insurance_imgs_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                <div class="form-group">
                    <label for="rev_expiry">Current revenue license expires on: <br></label>
                    <input class="form_details <?php echo (!empty($data['rev_expiry_error'])) ? 'is-invalid' : ''; ?>" type="month" name="rev_expiry" id="rev_expiry" >
                    <!-- <span class="invalid-feedback"><?php echo $data['rev_expiry_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>


                <div class="form-group">
                    <label for="rev_license_imgs">Revenue License images: <br></label>
                    <input class="form_details <?php echo (!empty($data['rev_license_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="rev_license_imgs" id="rev_license_imgs" accept="image/*" >
                    <br><small class="form-text text-muted">Upload images of your revenue license.<br>Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <!-- <span class="invalid-feedback"><?php echo $data['rev_license_imgs_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>

                
            </div>
        </div>
</div>

        <!--------------------------------------------This is Card 4------------------------------------------>

        <div class="card">
    <h4>Section 3: Capacity and Refrigeration:</h4>  
    <div class="container">
            <div class="column">
            <div class="form-group">
                    <label for="max_vol">Vehicle Max-volume in liters: (Cubic meters) <br></label>
                    <input class="form_details <?php echo (!empty($data['max_vol_error'])) ? 'is-invalid' : ''; ?>" type="number" name="max_vol" id="max_vol" >
                    
                    <!-- <span class="invalid-feedback"><?php echo $data['max_vol_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>
                <div class="form-group">
                    <label for="capacity">Vehicle Max-weight capacity in kilograms: <br></label>
                    <input class="form_details <?php echo (!empty($data['capacity_error'])) ? 'is-invalid' : ''; ?>" type="number" name="capacity" id="capacity">
                    
                    <!-- <span class="invalid-feedback"><?php echo $data['capacity_error']; ?></span> -->
                    <p class="invalid_msg"></p>
                </div>
             
            </div>
            <div class="column">

           

               
                
            </div>
        </div>
</div>

<div class="loader_cont">
        <div class="loader"></div>
      </div>

        

        <!--------------------------------------------This is Card 5------------------------------------------>

        <div class="submit_button">
            <input type="submit" value="Submit" id="list_item_btn">
        </div>

</div>
</div>
</div>

    </form>


    <script src="<?php echo URLROOT ?>/assets/js/vehicleadd.js"></script>
</body>
</html>
