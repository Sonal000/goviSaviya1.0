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

       
  <div class="H4center">
    <h4>My products</h4>
</div>
<div class="myproducts">


    <?php 
            if($data['items']){

            foreach ($data['items'] as $item) {
            ?>
    <div class="mycard">
        <div class="product_des_cont">
        <div class="productimg">
            <img src="<?php echo URLROOT.'/store/items/'.$item->item_img ;?>"` class="mango" alt="">
        </div>

        
        <div class="productdes">
           <div class="productname">
                <?php echo $item->name ?>
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
           <?php echo $item->price ?> /<?php echo $item->unit ?>
           </div>
           <div class="productavailability">
                <div class="sold">
                    Sold 50Kg
                </div>
                <div class="available">
                <?php echo $item->stock ?>
                </div>
           </div>
           <div class="prodes">
           <?php echo $item->description; ?>.
           </div>

        </div>
        </div>

        <div class="delete_btn_cont">
            <!-- <form action="<?php echo URLROOT ?>/myproducts/delete/<?php echo $item->item_id ?>" method="post"> -->
            <a class="delete_btn" href="<?php echo URLROOT ?>/myproducts/delete/<?php echo $item->item_id ?>">     <i class="fas fa-trash-alt delete_icon"></i></a>
        <!-- </form> -->

   </a>
        </div>
    </div>
    <?php 
        }
    }else{
        echo '<p style="text-align:center;"> No items to show </p>';
    }

    
    ?>
<!-- 
    <div class="mycard">
        <div class="productimg">
            <img src="<?php echo URLROOT; ?>/assets/images/banana.webp" class="mango" alt="">
        </div>
        <div class="productdes">
           <div class="productname">
                Fresh Banana
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
                Rs 1500 /Kg
           </div>
           <div class="productavailability">
                <div class="sold">
                    Sold 15Kg
                </div>
                <div class="available">
                    Available 10Kg
                </div>
           </div>
           <div class="prodes">
                Delight in the flavor of our ripe, hand-picked bananas - naturally grown, pesticide-free, and bursting with irresistible sweetness.
           </div>

        </div>
    </div>

    <div class="mycard">
        <div class="productimg">
            <img src="<?php echo URLROOT; ?>/assets/images/guava.png" class="mango" alt="">
        </div>
        <div class="productdes">
           <div class="productname">
                Fresh Mango
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
                Rs 1500 /Kg
           </div>
           <div class="productavailability">
                <div class="sold">
                    Sold 20Kg
                </div>
                <div class="available">
                    Available 15Kg
                </div>
           </div>
           <div class="prodes">
           Discover the tropical goodness of our sun-kissed guavas - pure, organic, and tantalizingly sweet, straight from our orchards to your plate.
           </div>

        </div>
    </div> -->

</div>




  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>

</body>
</html>