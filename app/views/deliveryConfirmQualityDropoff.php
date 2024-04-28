<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm_Quality-Dropoff</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryConfirmQualityDropoff.css">
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
    <div class="auction_page">
        <div class="hed">
            Confirming the quality of the delivery
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                <div class="order_details_head">
                <?php echo $data['order']->item_name;?> <?php echo $data['order']->quantity;?><?php echo $data['order']->item_unit?>
                </div>
                
              <!-- <div class="instructions">Confirm whether this product does not <br> have 
any issues or defects reguarding to the qualtiy <br> after the delivery</div> -->

<div class="instructions">
    <div class="imgimg">
                <img class="imgss"src="<?php echo URLROOT; ?>/store/items/<?php echo $data['order']->item_img ?>" alt="">
        </div>    
                <div class="order_details">   
                        <div class="details"><i class="fa-solid fa-user"></i> Seller: <?php echo $data['order']->seller_name;?> </div>
                        <div class="details"><i class="fa-solid fa-truck"></i> Buyer: <?php echo $data['order']->buyer_name;?> </div>
                        <div class="details"><i class="fa-solid fa-location-dot"></i> Pickup Location: <?php echo $data['order']->pickup_address;?> </div>
                        <div class="details"><i class="fa-solid fa-thumbtack"></i> Drop off Location: <?php echo $data['order']->order_address;?> </div>
                        
                    </div>
            </div>

            <script>
    // Wait for the DOM to fully load before executing the JavaScript code
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form element
        const form = document.getElementById('uploadForm');

        // Add event listener for form submission
        form.addEventListener('submit', function(event) {
            // Get the file input element
            const fileInput = document.getElementById('photo');

            // Check if a file has been selected
            if (!fileInput.files || fileInput.files.length === 0) {
                // Prevent form submission if no file is selected
                event.preventDefault();
                // Optionally, you can provide feedback to the user to indicate that a file is required
                alert('Please select a file before proceeding.');
            }
        });
    });
</script>

                
                <div class="image_product">
             

                <div class="delivery_details">
                    
                 
            <div class="order_details_head">
                    Confirm The Quality </div>

                    <div class="instructions_two">Provide some of the photos of the product to confirm the quality of the product. </div>

                <form id="uploadForm" action="<?php echo URLROOT; ?>/Orders/conclude" method="post" enctype="multipart/form-data">

                <label class="custom-file-upload btn" for="photo">Add Photos to delivery</label>

                <div class="butten">
                     <input type="file" id="photo" name="dropoff_img" required>

                     <div id="imagePreview"></div> 
                    
</div>

            </div>  
             
                </div>


                
            </div>


           
            <div class="right_side">
            <div class=done_button> <button type = "submit" class="btn btn_done"> Done</button></div> 
            </form>

              <div class="progress_bar">

             <div class="p_title"> Current Order Status</div>   

             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Confirmed</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Picked from Seller</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Quality confirmed: Pickup</div>
             <div class="more_info"><i class="fa-solid fa-circle-check"></i></i> Order Delivered</div>
             <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>

             </div>


            
            </div>

            

        </div>
        


            
        </div>
        </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>

    
<script>
// Function to display image preview
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('imagePreview');
        output.innerHTML = '<img src="' + reader.result + '" width="200"/>'; // Displaying image preview
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Event listener for file input change
document.getElementById('photo').addEventListener('change', previewImage);
</script>
</body>
</html>
