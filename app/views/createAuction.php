<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/createAuction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
    
    <h4 class="H4center">Create Auction</h4>
    

    <form>
    <div class="listing">
       
        <div class="fillform">
            <div class="formline1">
            <div class="email">
                      <label for="dropdown"><p class="labelletters">Product Name</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Carrot">Carrot</option>
                      <option value="Mango">Mango</option>
                      <option value="black pepper">black pepper</option>
                      </select>
                </div>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Product Category</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Vegetables">Vegetables</option>
                      <option value="Fruits">Fruits</option>
                      <option value="spices">Spices</option>
                      </select>
                </div>
            </div>
            <div class="formline2">
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Unit type</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Killogram">Killogram</option>
                      <option value="gram">gram</option>
                      <option value="packets">packets</option>
                      </select>
                </div>
                <div class="email">
                      <p>Unit Price</p>
                      <input type="text" class="email_box" placeholder="unit price">
                </div>
            </div>
            <div class="formline3">
            <div class="email">
                      <p>Stock</p>
                      <input type="text" class="email_box" placeholder="Available stock">
                </div>
                <!--<div class="email">
                      <label for="dropdown"><p class="labelletters"></p></label>
                      <select id="dropdown" name="selected_option" class="districtbox2">
                      <option value="Killogram">Kg</option>
                      <option value="gram">g</option>
                      <option value="packets">packets</option>
                      </select>
                </div> -->
                <div class="email">
                      <p>Exp Date</p>
                      <input type="date" class="email_box" placeholder="Available stock">
                </div>
            </div>



            <div class="formline3">
            <div class="email">
                      <p>Start Date</p>
                      <input type="date" class="email_box" placeholder="Available stock">
                </div>
                
                <div class="email">
                      <p>End Date</p>
                      <input type="date" class="email_box" placeholder="Available stock">
                </div>
            </div>





            <div class="formline4">
            <div class="email">
                      <p>Pick up Address</p>
                      <input type="text" class="email_box" placeholder="Address">
                </div>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">District</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Colombo">Colombo</option>
                      <option value="Kaluthara">Kaluthara</option>
                      <option value="Gampaha">Gampaha</option>
                      </select>
                </div>
            </div>
            <div class="formline5">
            <div class="email">
                      <p>Account Number</p>
                      <input type="text" class="email_box" placeholder="Enter your account number">
                </div>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Bank</p></label>
                      <select id="dropdown" name="selected_option" class="districtbox">
                      <option value="Sampath">Sampath</option>
                      <option value="BOC">BOC</option>
                      <option value="HNB">HNB</option>
                      </select>
                </div>
            </div>
        </div>
        
        <div class="addimg">
        <div class="add_photo_list">
        <label class="custom-file-upload" for="photo"><i class="fa-regular fa-image"></i>     Add Photos of the Product</label>
        <input type="file" id="photo" name="photo">
        <img id="photo_preview" src="#" alt="Photo Preview" style="display: none; max-width: 200px; max-height: 200px;">
                </div>

                <div class="email">
                      <p>Description</p>
                      <input type="text" class="email_box3" placeholder="Add your description">
                </div>
                <button type="submit" class="btn">Create Auction</button>
      </div>
        
    </div>
    </form>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script>
        // Function to preview image after selecting it
        function previewPhoto(input) {
            // Check if any file is selected
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Update the src attribute of the img tag with the selected image URL
                    document.getElementById('photo_preview').src = e.target.result;
                    // Display the img tag
                    document.getElementById('photo_preview').style.display = 'block';
                }

                // Read the image file as a URL
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Add an event listener to the file input
        document.getElementById('photo').addEventListener('change', function() {
            // Call the previewPhoto function when a file is selected
            previewPhoto(this);
        });
    </script>
</body>
</html>
