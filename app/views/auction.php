<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Marketplace | Auction items</title>
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


 <!-- sidebar section===================== -->

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

 <section class="section-center">
  <section class="section-mid">

   
   <!-- sidebar section end===================== -->
   
   <!-- search bar ========================= -->
   <div class="searchbar_cont ">
    <h3 class="searchbar_title">Auction</h3>
    <div class="searchbar">
     <input class="search" placeholder="Search for Products">
     <button class="search_btn">
      <i class="fas fa-search search_icon"></i>
     </button>
    </div>
    <div class="searchbar_btn_cont">
  <button class="listing_btn" id="listing_btn">Listings</button>
  <button class="auction_btn active" id="auction_btn">Auction</button>
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
 <!-- search bar ========================== -->
 
 <!-- item container======================== -->
 
 <section class="items_section">
   <div class="items_cont">

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-1.png">
       </div>
       <div class="item_desc">
        <div class="item_title_cont">
         <p class="item_title">Fresh Mango</p>
         <p class="item_bids"> 10 bids</p>
        </div>
        <div class="item_rating">
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        <i class="fas fa-star star_img"></i>
        </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-2.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Onions</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-3.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Carrots</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-4.png">
       </div>
       <div class="item_desc">
         <div class="item_title_cont">
         <p class="item_title">Potato</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-5.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Banana</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-6.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Tomato</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-7.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Onion</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-8.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Potato</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <!-- item -->
    <a href="<?php echo URLROOT ?>/auction/itemInfo/10" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-9.png">
       </div>
       <div class="item_desc">
       <div class="item_title_cont">
         <p class="item_title">Coconut</p>
         <p class="item_bids"> 10 bids</p>
        </div>
         <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
         <div class="item_price_cont">
           <p class="item_price">1300 / <span>kg<span></span></p>
           <p class="item_time">24h / <span>left<span></span></p>
         </div>
       </div>
       
      </div>
      
</a>
    <!-- item end -->
  

   </div>
   
  </section>
  
  <!-- item container end======================== -->
  
 </section>
</section>

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