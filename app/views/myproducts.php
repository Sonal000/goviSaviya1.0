<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>







<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <!-- <?php
 require APPROOT. '/views/layouts/sellerSidebar_withoutimg.php'; 
 ?> -->

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

    <!-- items -->
  <div class="container_content">

  <div class="container_title_cont">
  <p class="container_title">My products</p>
  </div>


<!--        
  <div class="H4center">
    <h4>My products</h4>
</div> -->
<div class="myproducts">



    <?php 
            if($data['items']){

            foreach ($data['items'] as $item) {
                $exp_date = date('Y-m-d', strtotime($item->exp_date));
            ?>
    <div class="mycard">
        <div class="product_des_cont">
        <div class="productimg">
            <img src="<?php echo URLROOT.'/store/items/'.$item->item_img ;?>"` class="mango" alt="">
        </div>

        
    <div class="productdes">
        <div class="product_des_view_cont" id="product_des_view_cont">
            <div class="des_cont">
           <div class="productname">
                <p class="product_name">Product Name : </p>
                <p class="p_det"> <?php echo $item->name ?></p>
           </div>
           <!--<div class="productrating">
                <div class="stars">
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                 </div>
                 <div class="rate">
                    3.5/5
                </div>
            </div>-->
           <div class="productprice">
           <p class="product_price">Product price :</p>
           <p class="p_det"><?php echo $item->price ?> /<?php echo $item->unit ?></p>
           
           </div>
           <div class="productavailability">
                <!-- <div class="sold">
                <p class="amount_sold">Amount Sold :</p>
                <p class="p_det">50Kg</p>   
                </div> -->
                <div class="available">
                <p class="available_stock">Available Stock :</p>
                <p class="p_det"><?php echo $item->stock ?> <?php echo $item->unit ?></p>
                </div>
           </div>
           <div class="prodes">
           <p class="product_des">Expiration Date :</p>
           <p class="p_det" id="old_exp_date"><?php echo $exp_date ?></p>
           <input type="hidden" id="expiration_date" name="old_exp_date" value="<?php echo $exp_date; ?>">

           </div>
           <div class="prodes">
           <p class="product_des">Product Description :</p>
           <p class="p_det"><?php echo $item->description; ?></p>
           </div>
                

           </div>
           <div class="btn_cont">
           
            <div class="edit_but">
                <button class="edit_details_btn">Update</button>
            </div>
            <div class="del_btn">
            <button class="delete_btn" ><a href="<?php echo URLROOT ?>/myproducts/delete/<?php echo $item->item_id ?>">Delete</a></button>
            </div>
        
        </div>
        
        </div>
            <!-- edit part -->
        <div class="product_des_edit_cont" id="product_des_edit_cont">
            <form class="form_cl" method="post" action="<?php echo URLROOT; ?>/myproducts/update/<?php echo $item->item_id ?>">
        <div class="des_cont_edit">
           <div class="productname">
                <p class="product_name edit_one">Product Name : </p>
                <input class="field_margin" type="text" name="name" value="<?php echo $item ->name?>">
            </div>
           <!--<div class="productrating">
                <div class="stars">
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                 </div>
                 <div class="rate">
                    3.5/5
                </div>
            </div>-->
           <div class="productprice">
           <p class="product_price edit_one">Product price :</p>
           <input class="field_size_small" type="text" name="price" value="<?php echo $item ->price ?>">
           <input class="field_size_small" type="text" name="unit" value="<?php echo $item ->unit ?>">
           
           </div>
           <div class="productavailability">
                <!-- <div class="sold">
                <p class="amount_sold edit_one">Amount Sold :</p>
                <p class="p_det edit_one">50Kg</p>   
                </div> -->
                <div class="available">
                <p class="available_stock edit_one">Available Stock :</p>
                <input class="field_size_small" type="text" name="stock" value="<?php echo $item ->stock?>">
                <input class="field_size_small" type="text" name="unit" value="<?php echo $item ->unit ?>">
                </div>
           </div>
           <div class="prodes">
           <p class="product_des edit_two">Expiration Date :</p>
           <input class="field_size_large edit_one" type="date" id="exp_date" name="exp_date" value="<?php echo $exp_date; ?>">

           
           </div>
           <div class="prodes">
           <p class="product_des edit_two">Product Description :</p>
           <input class="field_size_large edit_one" type="text" name="description" value="<?php echo $item ->description ?>">
           
           </div>
            </div>
           <div class="btn_cont_edit">
           
           <div class="edit_but">
               <button class="edit_details_btn" id="edit_details_btn" type="submit" onclick="validateAndUpdate()">Save</button>
           </div>
           <div class="del_btn">
           <button class="delete_btn">Cancel</button>
           </div>
       
       </div>
       </form>
        </div>
        
            </div>

       

       
        
        </div>
         <!--
        <div class="product_des_edit_cont" id="product_des_edit_cont">
        <div class="productdes">
           <div class="productname">
                <p class="product_name">Product Name : </p>
                <input type="text" name="name" value="<?php echo $item ->name?>">
            </div>
           <div class="productrating">
                <div class="stars">
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                    <i class="fas fa-star star_img"></i>
                 </div>
                 <div class="rate">
                    3.5/5
                </div>
            </div>
           <div class="productprice">
           <p class="product_price">Product price :</p>
           <input type="text" name="price" value="<?php echo $item ->price ?>">
           <input type="text" name="unit" value="<?php echo $item ->unit ?>">
           
           </div>
           <div class="productavailability">
                <div class="sold">
                <p class="amount_sold">Amount Sold :</p>
                <p class="p_det">50Kg</p>   
                </div>
                <div class="available">
                <p class="available_stock">Available Stock :</p>
                <input type="text" name="stock" value="<?php echo $item ->stock?>">
                <input type="text" name="unit" value="<?php echo $item ->unit ?>">
                </div>
           </div>
           <div class="prodes">
           <p class="product_des">Product Description :</p>
           <input type="text" name="description" value="<?php echo $item ->description ?>">
           
           </div>

        </div>
        </div> -->
            

            

       
    </div>
    <?php 
        }
    }else{
        echo '<p style="text-align:center;"> No items to show </p>';
    }

    
    ?>


</div>




  </div>

</div>


<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/myproduct.js"></script>

</body>
</html>

<script>
    function validateAndUpdate() {
        // Get the current expiration date value
        var currentExpDate = document.getElementById('old_exp_date').value;

        // Get the selected expiration date value
        var selectedExpDate = document.getElementById('exp_date').value; // Assuming you have an input field with id 'new_exp_date' for the user to select a new expiration date

        // Compare the current and selected expiration dates
        if (selectedExpDate === currentExpDate) {
            alert("Please select a new expiration date.");
        } else {
            // If a new expiration date is selected, submit the form
            document.getElementById('updateForm').submit();
        }
    }
</script>

<script>
    // Get the expiration date input field
    const expDateInput = document.getElementById('exp_date');
    
    // Set the minimum date to today's date
    expDateInput.min = new Date().toISOString().split('T')[0];
</script>