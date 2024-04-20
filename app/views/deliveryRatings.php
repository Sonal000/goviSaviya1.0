<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryRatings.css">
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
            Delivery Reviews & Ratings
        </div>
        
        
<!-- 1st Card------------------------------------------------------------------------------------- -->
<?php foreach($data['result'] as $result):?>
        <div class="mycardd">

            <div class="productimg">
               
                <div class="post_left">
                <div class="pro_detail">
                <div class="stars">
                <i class ="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                    </div>    

                    <div class="reviewer_name">
                        Santhush Fernando
                    </div>
                    <div class="review_content">
                        
                    I am delighted to share my positive experience with Sudesh Perera. The delivery was not only punctual but also carried out with the utmost professionalism and care. My package arrived in perfect condition, which was crucial for me as it contained fragile items. The straightforward online booking process, clear pricing, and excellent communication throughout the delivery were highly commendable. Furthermore, their competitive pricing and flexible delivery options make them stand out in the market. I am truly satisfied with their service and will certainly be a returning customer, as well as recommending them to others. 
                    </div>
                    <div class="addDate">
                        Posted on: 19 Sep 2023
                    </div>
                    <div class="details_view">
                    
                    </div>
                </div>
                
            </div>
            </div>
         
                  
                <div class="update_edit_bt">
                    <botton class="accept_order_btn"><a href="">View Details</a></botton>
                    
                
            </div>
            
        
        </div>
        <?php endforeach; ?>
   <!-- 2nd Card------------------------------------------------------------------------------------- -->


  
 
        <!-- 3rd Card------------------------------------------------------------------------------------- -->

        

        <!-- last Card-------------------------------------------->

    

         <!-- 5th Card------------------------------------------------------------------ -->

         
            
        </div>
        </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>