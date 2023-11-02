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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/vehicleAdd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

 
<h2>Vehicle Information Form</h2>
    <form action="process_form.php" method="post">
        <div class="container">
            <div class="column">
                <div class="form-group">
                    <label for="vehicle_type">Vehicle Type:</label>
                    <input class="input_field" type="text" name="vehicle_type" id="vehicle_type" required>
                </div>
                <div class="form-group">
                    <label for="vehicle_number">Vehicle Number:</label>
                    <input class="input_field" type="text" name="vehicle_number" id="vehicle_number" required>
                </div>

                <div class="form-group">
                    <label for="max_capacity">Maximum Capacity (In kgs): <br></label>
                    <input class="max_cap" type="number" name="max_capacity" id="max_capacity" required>
                </div>


               
            </div>
            <div class="column">

            <div class="form-group">
                    <label for="vehicle_brand">Vehicle Brand:</label>
                    <input class="input_field" type="text" name="vehicle_brand" id="vehicle_brand" required>
                </div>

                <div class="form-group">
                    <label for="vehicle_model">Vehicle Model:</label>
                    <input class="input_field" type="text" name="vehicle_model" id="vehicle_model" required>
                </div>

                <div class="form-group">
                    <label for="vehicle_model">Vehicle Manufacturing Year:</label>
                    <input class="input_field" type="text" name="vehicle_year" id="vehicle_year" required>
                </div>
                
            </div>
        </div>
        <div class="submit_button">
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>
