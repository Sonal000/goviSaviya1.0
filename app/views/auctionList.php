<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Listing</title>
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
      <h4>Auction Listing</h1>
  </div>

  <div class="form_container">


  <form method="post" action="<?php echo URLROOT ?>/auctionC/add" enctype="multipart/form-data">
 
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
                      <input type="date" class="input_item"  name="exp_date" id="expiration_date">
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


                  <div class="input_cont">
                <label for="start_date" class="input_label">Starting Date</label>
                      <input type="date" class="input_item"  name="start_date" id="auction_start_date">
                </div>

                <div class="input_cont">
                <label for="end_date" class="input_label">Ending Date</label>
                      <input type="date" class="input_item"  name="end_date" id="auction_end_date">
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

                      <button name="add_item" type="submit" class="btn">Create Auction</button>
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


<script>
      // Get references to the input fields
    const expirationDateInput = document.getElementById('expiration_date');
    const auctionEndDateInput = document.getElementById('auction_end_date');
    const auctionStartDateInput = document.getElementById('auction_start_date');


    //when we slipt them into a array there are two elements in that array 1) date 2) time. we only need date so we access [0] index.

    //set the min attribute of expire date input tag to current day.since we cant enter a previous day from today as a expire date.
     const currentDate = new Date();

      // Calculate the minimum date (3 days from today)
      const minExpirationDate = new Date(currentDate);
      minExpirationDate.setDate(currentDate.getDate() + 3);

      // Format the minimum date to 'YYYY-MM-DD'
      const formattedMinExpirationDate = minExpirationDate.toISOString().split('T')[0];

      // Set the minimum value for the expiration date input field
      expirationDateInput.min = formattedMinExpirationDate;

      // Set the minimum value attribute directly to the HTML element as well
      document.getElementById("expiration_date").setAttribute("min", formattedMinExpirationDate);
   
 //set the min attribute of  input tag auction start date to current day.since we cant enter a previous day from today as a auction start date.
    auctionStartDateInput.min= new Date().toISOString().split("T")[0]; 
    document.getElementById("auction_start_date").setAttribute("min", auctionStartDateInput.min);
    //set the min attribute of auction end date input tag to current day.since we cant enter a previous day from today as a auction end date.
    auctionEndDateInput.min= new Date().toISOString().split("T")[0];
    document.getElementById("auction_end_date").setAttribute("min", auctionEndDateInput.min);

    // Add event listener to expiration date input
    expirationDateInput.addEventListener('change', function() {
        // Get the value of expiration date
        const expirationDate = new Date(expirationDateInput.value);

        const maxAuctionEndDate = new Date(expirationDate);
        maxAuctionEndDate.setDate(expirationDate.getDate() - 1);

      // Set the maximum allowed date for the auction end date input
      auctionEndDateInput.max = maxAuctionEndDate.toISOString().split('T')[0];

      const maxAuctionStartDate = new Date(expirationDate);
      maxAuctionStartDate.setDate(expirationDate.getDate() - 1);

      auctionStartDateInput.max = maxAuctionStartDate.toISOString().split('T')[0];
        
        
    });




</script>