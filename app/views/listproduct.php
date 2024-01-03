<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/listproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>








    <!-- ========================================================= -->

    <?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

<div class="container_content">
        <!-- =============== Container ====================== -->
        
   
  <!-- <h4 class="H4center">List Product</h4> -->
  <div class="listing_container">
  <div class="title_container">
      <h4>Product Listing</h1>
  </div>

  <div class="form_container">


  <form method="post" action="<?php echo URLROOT ?>/listProduct" enctype="multipart/form-data">
 
  <div class="input_items">


       

            <div class="input_cont">
                  <label for="dropdown" class="input_label">Product Name</label>
                  <input type="text" id="dropdown" class="input_item" name="name" />
            </div>
            
            <div class="input_cont">
                  <label for="dropdown" class="input_label">Product category</label>
                      <select id="dropdown" name="category" class="dropdown_item " >
                      <option value="Vegetables">Vegetables</option>
                      <option value="Fruits">Fruits</option>
                      <option value="spices">Spices</option>
                      </select>
            </div>

                
            
            <div class="input_cont">
            <label for="dropdown" class="input_label">Unit type</label>
                      <select id="dropdown" name="unit" class="dropdown_item" >
                      <option value="kg">kg</option>
                      <option value="g">g</option>
                      <option value="pacs">pacs</option>
                      </select>
            </div>

            <div class="input_cont">
            <label for="price" class="input_label">Unit Price</label>
                      <input type="text" class="input_item"  name="price">
            </div>
      
            <div class="input_cont">
            <label for="stock" class="input_label">Stock</label>
                      <input type="text" class="input_item"  name="stock">
            </div>

                
                <!--<div class="email">
                      <label for="dropdown"><p class="labelletters"></p></label>
                      <select id="dropdown" name="selected_option" class="districtbox2">
                      <option value="Killogram">Kg</option>
                      <option value="gram">g</option>
                      <option value="packets">packets</option>
                      </select>
                </div> -->
       
                <div class="input_cont">
                <label for="exp_date" class="input_label">Expiary Date</label>
                      <input type="date" class="input_item"  name="exp_date">
                </div>

            
                  <div class="input_cont">
                  <label for="exp_date" class="input_label">Pick up Address</label>
                      <input type="text" class="input_item"  name="address">
                  </div>
 
          
                  <div class="input_cont">

                        <label for="dropdown"><p class="input_label">District</p></label>
                        <select id="dropdown" name="district" class="dropdown_item">
                              <option value="Colombo">Colombo</option>
                              <option value="Kaluthara">Kaluthara</option>
                              <option value="Gampaha">Gampaha</option>
                        </select>
                  </div>
        
            <!-- <div class="formline5">
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
            </div> -->

      <div class="input_cont">
      <label for="item_img" class="input_label">Upload Image</label>
            <input type="file" class="upload_item"  name="item_img">
      </div>
            

      <div class="input_cont">
      <label for="description" class="input_label">Description</label>
      
                      <input type="text" class="input_item" placeholder="Add your description" name="description">
      </div>

                <div class="submit_container">

                      <button name="add_item" type="submit" class="btn">Create Post</button>
                  </div>
                      
      </div>
   
    </form>


  </div>
  </div>

   



    <!-- =============== Container end ====================== -->
  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>



    <!-- ========================================================= -->
</body>
</html>