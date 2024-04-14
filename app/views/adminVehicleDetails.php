<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css"> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminVehicleDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">

<?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>

<div class="container_content">

<div class="profile">
    
<h2>View Vehicle Details</h2>

                

                <div class="vehicle_header">
                        <div class="image"><img src="<?php echo URLROOT; ?>/store/vehicles/car.jpg" alt="" class="img"></div>  
                        <div class="vehicle_name">Mitsubishi L300</div>        
                </div>

    

    <!--------------------------------------------This is Card 1------------------------------------------>
<div class="card">
    <h4>Section 1: General Infomation</h4>  
    <div class="container">
            <div class="column">

                <div class="form-group">
                        <div>Vehicle Type:<div class="displayField">Truck</div></div>     
                </div>  

                <div class="form-group">
                        <div>Vehicle Brand:<div class="displayField">Mitsubishi</div></div>      
                    
                </div>
                
                <div class="form-group">
                        <div>Vehicle Model:<div class="displayField">L300</div></div>      
                    
                </div>

               

            
                
            </div>
            <div class="column">

            <div class="form-group">
                        <div>Vehicle Fuel Type:<div class="displayField">Petrol</div></div>      
                    
                </div>


                <div class="form-group">
                        <div>Year of Manufacture :<div class="displayField">1998</div></div>      
                    
                </div>

                <div class="form-group">
                        <div>Current Mileage:<div class="displayField">65900</div></div>      
                    
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
                    <input class="form_details <?php echo (!empty($data['licenseNo_error'])) ? 'is-invalid' : ''; ?>" type="text" name="licenceNo" id="licenceNo" required>
                    <span class="invalid-feedback"><?php echo $data['licenseNo_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="doi">Driving License Date of Issue: <br></label>
                    <input class="form_details <?php echo (!empty($data['doi_error'])) ? 'is-invalid' : ''; ?>" type="date" name="doi" id="doi" required>
                    <span class="invalid-feedback"><?php echo $data['doi_error']; ?></span>
                </div>
             
            </div>
            <div class="column">

                <div class="form-group">
                    <label for="doe">Driving License Date of Expiry: <br></label>
                    <input class="form_details <?php echo (!empty($data['doe_error'])) ? 'is-invalid' : ''; ?>" type="date" name="doe" id="doe" required>
                    <span class="invalid-feedback"><?php echo $data['doe_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="license_imgs">Driving License Images: <br></label>
                    <input class="form_details <?php echo (!empty($data['license_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="license_imgs" id="license_imgs" accept="image/*" required>
                    <br><small class="form-text text-muted">Upload images of your driving license. Accepted formats: JPG, JPEG, PNG, GIF.</small>
                    <span class="invalid-feedback"><?php echo $data['license_imgs_error']; ?></span>
                </div>

                
            </div>
        </div>
</div> -->
        
        <!--------------------------------------------This is Card 3------------------------------------------>

        <div class="card">
    <h4>Section 2: Registration and Insurance</h4>  
    <div class="container">
            <div class="column">


                <div class="form-group">
                        <div>Vehicle Licenese Plate No:<div class="displayField">WP NC-1390</div></div>               
                </div>

                <div class="front_image_section">
                        <div class="details">Front Image</div>
                        <div class="front_image">
                            <img src="<?php echo URLROOT; ?>/store/vehicles/car.jpg" alt="" class="f_img">
                        </div>                   
                </div>


                <div class="back_image_section">
                        <div class="details">Back Image</div>
                        <div class="front_image"><img src="<?php echo URLROOT; ?>/store/vehicles/car.jpg" alt="" class="f_img"></div>                   
                </div>

                <div class="form-group">
                        <div>Vehicle Insurance Status:<div class="displayField">Full Insurance</div></div>               
                </div>

                
             
            </div>
            <div class="column">

           
               
               

            <div class="form-group">
                        <div>Current Vehicle Insurance Expires on:<div class="displayField">2025-05-11</div></div>      
                    
                </div>

            

                <div class="insurance_image_section">
                        <div class="details">Vehicle Insurance Images</div>
                        <div class="ins_image">
                            <img src="<?php echo URLROOT; ?>/store/vehicles/ins.jpg" alt="" class="i_img">
                            <img src="<?php echo URLROOT; ?>/store/vehicles/ins.jpg" alt="" class="i_img">
                        </div>                   
                </div>



                <div class="rev_image_section">
                        <div class="details">Revenue Images</div>
                        <div class="ins_image">
                            <img src="<?php echo URLROOT; ?>/store/vehicles/rev.jpg" alt="" class="i_img">
                            <img src="<?php echo URLROOT; ?>/store/vehicles/rev.jpg" alt="" class="i_img">
                        </div>                   
                </div>


                
            <div class="form-group">            
                <div>Current Revenue Licence Expires on:<div class="displayField">2025-07-13</div></div>               
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
                <div>Max Volume:<div class="displayField">650L</div></div>               
            </div>

            <div class="form-group">            
                <div>Max Weight:<div class="displayField">480Kg</div></div>               
            </div>
             
            </div>

            <div class="column">

             <div class="form-group">            
                <div>Refregiration Capability:<div class="displayField">Yes</div></div>               
            </div>

               
                
            </div>
        </div>
</div>
        

        <!--------------------------------------------This is Card 5------------------------------------------>

        <div class="buttons">
            <button class="btn btn_ok">Approve</button>
            <button class="btn btn_no">Refuse</button>
        </div>

</div>
</div>
</div>

    
</body>
</html>
