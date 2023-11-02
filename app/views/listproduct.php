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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/listproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
    
    <h4 class="H4center">List Product</h4>
    <div class="back_btn_cont section-center">
  <button class="back_btn btn">
  <i class="fas fa-arrow-left"></i>
    </button>
    <p>Go Back</p>
 </div>

    

    <form method="post" action="<?php echo URLROOT ?>/listProduct" enctype="multipart/form-data">
    <div class="listing">
       
        <div class="fillform">
            <div class="formline1">
            <div class="email">
                      <label for="dropdown"><p class="labelletters">Product Name</p></label>
                      <input type="text" id="dropdown" name="name"  class="districtbox"/>
                </div>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Product category</p></label>
                      <select id="dropdown" name="category" class="districtbox" >
                      <option value="Vegetables">Vegetables</option>
                      <option value="Fruits">Fruits</option>
                      <option value="spices">Spices</option>
                      </select>
                </div>
            </div>
            <div class="formline2">
                <div class="email">
                      <label for="dropdown"><p class="labelletters">Unit type</p></label>
                      <select id="dropdown" name="unit" class="districtbox">
                      <option value="kg">kg</option>
                      <option value="g">g</option>
                      <option value="pacs">pacs</option>
                      </select>
                </div>
                <div class="email">
                      <p>Unit Price</p>
                      <input type="text" class="email_box" placeholder="unit price" name="price">
                </div>
            </div>
            <div class="formline3">
            <div class="email">
                      <p>Stock</p>
                      <input type="text" class="email_box" placeholder="Available stock" name="stock">
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
                      <input type="date" class="email_box" placeholder="Available stock" name="exp_date">
                </div>
            </div>
            <div class="formline4">
            <div class="email">
                      <p>Pick up Address</p>
                      <input type="text" class="email_box" placeholder="Address" name="address">
                </div>
                <div class="email">
                      <label for="dropdown"><p class="labelletters">District</p></label>
                      <select id="dropdown" name="district" class="districtbox">
                      <option value="Colombo">Colombo</option>
                      <option value="Kaluthara">Kaluthara</option>
                      <option value="Gampaha">Gampaha</option>
                      </select>
                </div>
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
        </div>
        
        <div class="addimg">
        <div class="email">
                      <p>Upload image</p>
                      <input type="file" class="email_box2" placeholder="Enter your account number" name="item_img">
                </div>
                <div class="email">
                      <p>Description</p>
                      <input type="text" class="email_box3" placeholder="Add your description" name=description>
                </div>
                <button name="add_item" type="submit" class="btn">Create Post</button>
      </div>
        
    </div>
    </form>

    <script src="<?php echo URLROOT ?>/assets/js/itemInfo.js"></script>
</body>
</html>