<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryVehiclesComEdit.css">
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
            Compliance Update
        </div>

        <div class="main-container main_cont">
            
        <form action="<?php echo URLROOT; ?>/deliveryVehicles/editCom/<?php echo $data['id'];?>" method="post"  enctype="multipart/form-data" class="submit-container">       
        <div class="card card-body">

            <div class="left">
                <div class="card_details">
                    <div class="card-heading">Section 1:<br>Vehicle Insurance Details</div>
                        <p class="add_info">If you have acquired new Insurance, please ensure to promptly update that information in this section.</p>
                        <small>Note: Fill this section only if you have gotten new Insurance</small>
                </div>
            </div>

            <div class="right">   
                

                    <div class="form-group">
                        <label for="insurance_status">New Vehicle Insurance status: <br></label>
                        <select class="form_details <?php echo (!empty($data['doe_error'])) ? 'is-invalid' : ''; ?>" name="insurance_status" id="insurance_status" required>
                            <option value="Full Insurance">Full Insurance</option>
                            <option value="Third Party">Third-party</option>
                            <option value="No Insurance">No Insurance</option>
                        </select>

                    </div> 
                


                        <div class="form-group">
                            <label for="ins_expiry">New Vehicle Insurance expires on: <br></label>
                            <input class="form_details <?php echo (!empty($data['ins_expiry_error'])) ? 'is-invalid' : ''; ?>" type="month" name="ins_expiry" id="ins_expiry" value="<?php echo $data['ins_expiry']; ?>" required>
                            <!-- <span class="invalid-feedback"><?php echo $data['ins_expiry_error']; ?></span> -->
                        </div>

                        <div class="form-group">
                            <label for="insurance_imgs">New Vehicle Insurance images: <br></label>
                            <input class="form_details <?php echo (!empty($data['insurance_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="insurance_imgs" id="insurance_imgs" accept="image/*" >
                            <br><small class="form-text text-muted">Upload images of your new vehicle insurance. <br>Accepted formats: JPG, JPEG, PNG, GIF.</small>
                            <!-- <span class="invalid-feedback"><?php echo $data['insurance_imgs_error']; ?></span> -->
                        </div>

             
            </div>

           
    
        </div>

                <!-- THis is card 2--------------------------------------------------------------->

        <div class="card card-body card_2">
                
                <div class="left">
                        <div class="card_details">
                            <div class="card-heading">Section 2:<br>Revenue License Details</div>
                            <p class="add_info">If you have acquired new Revenue License, please ensure to promptly update that information in this section.</p>
                            <small>Note: Fill this section only if you have gotten new Revenue License</small>
                        </div>
                </div>

                <div class="right">   
                
                        <div class="form-group">
                                <label for="rev_expiry">New Revenue License expires on: <br></label>
                                <input class="form_details <?php echo (!empty($data['rev_expiry_error'])) ? 'is-invalid' : ''; ?>" type="month" name="rev_expiry" id="rev_expiry" value="<?php echo $data['rev_expiry']; ?>" >
                                <!-- <span class="invalid-feedback"><?php echo $data['rev_expiry_error']; ?></span> -->
                        </div>

                        
                        <div class="form-group rev_license_imgs">
                                <label for="rev_license_imgs">New Revenue License images: <br></label>
                                <input class="form_details <?php echo (!empty($data['rev_license_imgs_error'])) ? 'is-invalid' : ''; ?>" type="file" name="rev_license_imgs" id="rev_license_imgs" accept="image/*">
                                <br><small class="form-text text-muted">Upload images of your new revenue license.<br>Accepted formats: JPG, JPEG, PNG, GIF.</small>
                                <!-- <span class="invalid-feedback"><?php echo $data['rev_license_imgs_error']; ?></span> -->
                        </div>
                

                </div>
    



        </div>
            <div class="submit_btn_class">   
                <input type="submit" class="submit_btn" value="Done">
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