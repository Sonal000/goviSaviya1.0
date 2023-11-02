
<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/marketplace.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar_withoutimg.php'; 
 ?>
    
<div class="profile">
      
    <div class="markettop">
       <h4>Marketplace</h4>
       <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Anything">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
       <div class="marketbt">
                <a href="<?php echo URLROOT;?>/Listproduct"><button class="btn">List new Product</button></a>
                <a href="<?php echo URLROOT;?>/Myproducts"><button class="btn">My Products</button></a>
       </div>
       
    </div>

    <div class="marketsortbar">


    </div>

    <div class="marketcards_1">
            <!-- item container======================== -->

 
 <section class="items_section">
   <div class="items_cont">


   <?php 
   if($data['items']){

            foreach ($data['items'] as $item) {
            ?>
            


    <!-- item -->
    <a href="<?php echo URLROOT ?>/marketplace/itemInfo/<?php echo $item->item_id; ?>" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT.'/store/items/'.$item->item_img ;?>">
       </div>
       <div class="item_desc">
         <p class="item_title"><?php echo $item->name; ?></p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price"><?php echo $item->price; ?> / <span><?php echo $item->unit; ?><span></span></p>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <?php
            }
   }else{
    echo '<p style="text-align:center;">No items to show</p>';
   }

            ?>
            
    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/11" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-2.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Onions</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div> -->
      
</a>
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/12" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-3.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Carrots</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-4.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Potato</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-5.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Banana</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-6.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Tomato</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-7.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Onion</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-8.png">
       </div>
       <div class="item_desc">
         <p class="item_title">Potato</p>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->

    <!-- item -->
    <!-- <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-9.png">
       </div>
       <div class="item_desc">
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <p class="item_title">Coconut</p>
         <p class="item_price">2000 / <span>kg<span>
       </div>
       
      </div>
      
     </a> -->
    <!-- item end -->
  

   </div>
   
  </section>
  
  <!-- item container end======================== -->
  
    </div>

    <div class="marketcards_2">

    </div>

</div>


</body>
</html>