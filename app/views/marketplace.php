<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Marketplace</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/marketplace.css">
</head>
<body>
 <!-- navbar ======================= -->
<?php
 include APPROOT.'/views/layouts/mainNavbar.php';  
?>
 <!-- navbar end ======================= -->


 
 <div class="marketplace_container_main">
     <!-- search bar ========================= -->
     <section class="searchbar_section">


     <div class="searchbar_cont ">
      <div class="searchbar_title_cont">
        <h3 class="searchbar_title">Marketplace</h3>
      </div>
      <div class="search_cont">
      <div class="searchbar">
     <input class="search" placeholder="Search for Products">
     <button class="search_btn">
      <i class="fas fa-search search_icon"></i>
     </button>
    </div>
    <div class="searchbar_btn_cont">
  <button class="listing_btn active" id="listing_btn">Listings</button>
  <button class="auction_btn" id="auction_btn">Auction</button>
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
  <div class="marketplace_container_sidebar">
    <!--  sidebar section===================== -->

 <section>
   <div class="sidebar" id="sidebar_filter">
    <div class="close_btn_cont">
     <button class="sidebar_close_btn" id="sidebar_close_btn">
     <i class="fas fa-times"></i>
     </button>
    </div>
    <div class="filter_title">
     <p>Filters</p>
     <i class="fas fa-sliders-h img_filters"></i>
    </div>
    <div class="categories_cont">
      <ul class="categories">
        <li>
           <button class="cat_btn">
            <p>Vegitables</p>
            <i class="fas fa-angle-right "></i>
           </button>
        </li>
        <li>
           <button class="cat_btn">
            <p>Fruits</p>
            <i class="fas fa-angle-right "></i>
           </button>
        </li>
        <li>
           <button class="cat_btn">
            <p>Spices</p>
            <i class="fas fa-angle-right "></i>
           </button>
        </li>
        <li>
           <button class="cat_btn">
            <p>Coconut</p>
            <i class="fas fa-angle-right"></i>
           </button>
        </li>
        <li>
           <button class="cat_btn">
            <p>Floriculture</p>
            <i class="fas fa-angle-right "></i>
           </button>
        </li>
      </ul>
    </div>
    <div class="price_cont">
      <div class="price_title">
       <p>Price</p>
       <i class="fas fa-angle-right fa-rotate-90"></i>
      </div>
    </div>
    <div class="quantity_cont">
      <div class="quantity_title">
       <p>Quantity</p>
       <i class="fas fa-angle-right fa-rotate-90"></i>
      </div>
    </div>
    <div class="closeby_cont">
      <div class="closeby_title">
       <p>Closeby</p>
       <i class="fas fa-angle-right fa-rotate-90"></i>
      </div>
    </div>
    <div class="filter_btn_cont">
     <button class="btn apply_btn">Apply Filter</button>
    </div>
   </div>
 </section>



   
   <!-- sidebar section end===================== -->
  </div>
  <div class="marketplace_container_content">


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
            echo "<p class='items_text'>No items to show</p> ";
          }
            ?>
  

   </div>
   <div class="pg_cont">
  <?php 
// for ($i = 1; $i <= $data['totPages']; $i++) {

  $min =$data['page']-4;
  $max =$data['page']+4;
  for($j = $min>0 ?$min:1 ; $j<=($max<$data['totPages']? $max:$data['totPages']);$j++ ){
    if($j==$data['page']){
      echo "<a href='?page=$j' class='current_pg'>$j</a> ";
    }else{
      echo "<a href='?page=$j'>$j</a> ";

    }
  }


// }
?>     
    </div>
   
  </section>
  
  <!-- item container end======================== -->

  </div>
 </div>











  <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>
</body>
</html>