
<?php
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

    <!-- items -->
  <diiv class="container_content">


 
  <div class="marketplace_container_main">
     <!-- search bar ========================= -->
     <section class="searchbar_section">


     <div class="searchbar_cont ">
      <div class="searchbar_title_cont">
        <h3 class="searchbar_title">Auction</h3>
      </div>
      <div class="search_cont">
      <div class="searchbar">
     <input class="search" placeholder="Search for Products">
     <button class="search_btn">
      <i class="fas fa-search search_icon"></i>
     </button>
    </div>
    <div class="searchbar_btn_cont">
  <button class="listing_btn " id="listing_btn">Listings</button>
  <button class="auction_btn active" id="auction_btn">Auction</button>
 </div>
      </div>

  </div>

  <div class="filter_cont ">
   <button class="filter_btn" id="filter_btn_all">
   <i class="fas fa-sliders-h img_filters"></i>
   <p>filter</p>
  </button>
   <button class="filter_btn">
    <p>Price</p>
    <i class="fas fa-angle-right fa-rotate-90"></i>
  </button>
   <button class="filter_btn">
    <p>Quantity</p>
    <i class="fas fa-angle-right fa-rotate-90"></i>
  </button>
 </div>

 </section>
 <!-- search bar ========================== -->

  <div class="marketplace_container_content">


     <!-- item container======================== -->
 

     <section class="items_section">
   <div class="items_cont">

    <!-- item -->
    <?php 
    if($data['items']){

      foreach ($data['items'] as $item) {
        ?>

      <a href="<?php echo URLROOT; ?>/AuctionC/auctionInfo/<?php echo $item->auction_ID ?>" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT.'/store/items/'.$item->item_img ;?>">
       </div>
       <div class="item_desc">
        <div class="item_title_cont">
         <p class="item_title"><?php echo $item->name; ?></p>
         <p class="item_bids"><?php echo $item->bid_Count; ?> Bids</p>
        </div>
        <!-- <div class="item_rating">
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        </div> -->
         <div class="item_price_cont">
           <p class="item_price"><?php echo $item->price; ?> / <span><?php echo $item->unit; ?><span></span></p>
           <p class="item_time"><?php echo $item->remain_time; ?> <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    
<?php

}
  }else{
            echo "<p class='items_text'>No items to show</p> ";
          }

  
            ?>

    
   
    
  

   </div>
   
  </section>
  
  <!-- item container end======================== -->

  </div>
 </div>



  </div>

</div>


<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>

</body>
</html>