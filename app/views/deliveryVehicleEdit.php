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

        <div class="main-container">
           
        <div class="card card-body">
            <div class="left">   
                <form action="<?php echo URLROOT; ?>/deliveryVehicles/edit/<?php echo $data['id'];?>" method="post">

                 <div class="form-group">
                    <label for="brand">Vehicle Type: <sup>*</sup></label>
                         <select name="type" class="form_details_dropdown <?php echo (!empty($data['type_error'])) ? 'is-invalid' : ''; ?>">
                                <option value="">Select Vehicle Type</option>
                                <option value="Container Truck" <?php echo ($data['type'] === 'container') ? 'selected' : ''; ?>>Container Truck</option>
                                <option value="Delivery Truck" <?php echo ($data['type'] === 'deliveryTruck') ? 'selected' : ''; ?>>Delivery Truck</option>
                                <option value="Van" <?php echo ($data['type'] === 'van') ? 'selected' : ''; ?>>Delivery Van</option>
                                <option value="PickupTruck" <?php echo ($data['type'] === 'pickupTruck') ? 'selected' : ''; ?>>Pick-up Truck</option>
                                <option value="Car" <?php echo ($data['type'] === 'car') ? 'selected' : ''; ?>>Car</option>
                                <option value="Three-Wheeler" <?php echo ($data['type'] === 'threeWheeler') ? 'selected' : ''; ?>>Three-Wheeler</option>  
                                <option value="Bike" <?php echo ($data['type'] === 'bike') ? 'selected' : ''; ?>>Delivery Bike</option>      
                         </select>

                      <span class="invalid-feedback"><?php echo $data['type_error']; ?></span>
                  </div>      

                    <div class="form-group">
                        <label for="brand">Brand: <sup>*</sup></label>
                        <input type="text" name="brand" class="form_details <?php echo (!empty($data['brand_error'])) ? 'is-invalid' : ''; ?>" 
                        value = "<?php echo $data['brand']; ?>">
                        <span class="invalid-feedback"><?php echo $data['brand_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="brand">Model: <sup>*</sup></label>
                        <input type="text" name="model" class="form_details <?php echo (!empty($data['brand_error'])) ? 'is-invalid' : ''; ?>" 
                        value = "<?php echo $data['model']; ?>">
                        <span class="invalid-feedback"><?php echo $data['model_error']; ?></span>
                    </div>

            </div>  
            <div class="right">
                    
                    <div class="form-group">
                        <label for="number">Vehicle Number: <sup>*</sup></label>
                        <input type="text" name="number" class="form_details <?php echo (!empty($data['number_error'])) ? 'is-invalid' : ''; ?>" 
                        value = "<?php echo $data['number']; ?>">
                        <span class="invalid-feedback"><?php echo $data['brand_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="capacity">Max Capacity (in Kgs): <sup>*</sup></label>
                        <input type="number" name="capacity" class="form_details <?php echo (!empty($data['capacity_error'])) ? 'is-invalid' : ''; ?>" 
                            value="<?php echo $data['capacity']; ?>" min="2" max="2000">
                        <span class="invalid-feedback"><?php echo $data['capacity_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="year">Manufactured Year: <sup>*</sup></label>
                        <input type="text" name="year" class="form_details <?php echo (!empty($data['year_error'])) ? 'is-invalid' : ''; ?>" 
                        value = "<?php echo $data['year']; ?>">
                        <span class="invalid-feedback"><?php echo $data['year_error']; ?></span>
                    </div>

                    </div>


 
                    <input type="submit" class="submit_btn" value="Submit">


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