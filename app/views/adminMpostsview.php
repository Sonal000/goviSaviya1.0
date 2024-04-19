<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> 
  <?php echo  $data['mposts']->product_name;?>
</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/itemInfo.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">
 <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
  <div class="main_container">
  <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
  <div class="container_content">
<div class="adminprofile"> 

 <!-- navbar end ======================= -->


 <!-- /* item info ==================================== */ -->
 
 <!-- <div class="back_btn_cont section-center">
  <button class="back_btn btn">
  <i class="fas fa-arrow-left"></i>
    </button>
    <p>Go Back</p>
 </div> -->


 <?php 
    
             if($data){
            ?>

 <section class="item_information section-center">


<div class="image_container">
    <div class="main_img_cont">
      <img class="main_img" src="<?php echo URLROOT.'/store/items/'.$data['mposts']->item_img ;?>"> 
    </div>
    <!-- <div class="img_slider_cont">
      <button class="slider_btn">
        <img class="slider_img" src="<?php echo URLROOT ?>/assets/images/item-1.png"/> 
      </button>
      <button class="slider_btn">
        <img class="slider_img" src="<?php echo URLROOT ?>/assets/images/item-2.png"/> 
      </button>
      <button class="slider_btn">
        <img class="slider_img" src="<?php echo URLROOT ?>/assets/images/item-3.png"/> 
      </button>
      <button class="slider_btn">
        <img class="slider_img" src="<?php echo URLROOT ?>/assets/images/item-3.png"/> 
      </button>

    </div> -->
</div>


            
<div class="item_description">
  <div class="item_title_cont">
    <p class="item_name"><?php echo $data['mposts']->product_name ?></p>
    <a href="" class="item_seller" target="_blank"> seller: <?php echo $data['mposts']->seller_name ?> <span><i class="fas fa-check-circle"></i></span></a>
    <p class="item_address"><?php echo $data['mposts']->district ?></p>
    <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
  </div>
  <div class="item_price_cont">
    <p class="item_price">RS <?php echo $data['mposts']->price ?> / <span><?php echo $data['mposts']->unit ?></span></p>
    <p class="item_available"><?php echo $data['mposts']->stock ?>/ <span><?php echo $data['mposts']->unit ?> available</span>  </p>
  </div>
  <div class="item_desc_cont">
    <p class="item_desc"><?php echo $data['mposts']->description ?></p>
  </div>


  
  <div class="item_btns_cont">
    <!-- <div class="qty_btn_cont">
      <button class="btn_remove">-</button>
      
        <input class="qty" type="number" value="1" name="qty" id="quantity">
      
      <button class="btn_add">+</button>
    </div>
    <button type="submit" name="  " class="addtocart_btn btn">Add to Cart</button> -->
  </div>
  

</div>


   
 </section>
 <?php 
           }
            ?>

 
 <!-- /* item info end ==================================== */ -->


 <!-- review section ========================================== -->

  <section class="reviews_section section-center">
    <!-- <div class="reviews_btn_cont">
        <button  class="reviews">Ratings & Reviews</button>
        <button class="faq">FAQs</button>
    </div> -->
    <div class="reviews_container">
      <div class="reviews_title_cont">
        <p class="reviews_title">All Reviews <span>(19)</span> </p>
      </div>

      <div class="reviews_cont">

        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name"> Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere at saepe eius doloremque, voluptatem itaque repellendus aspernatur magnam adipisci excepturi? 
          </p>
          <p class="review_date" >Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->
        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name">Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit Lorem ipsum dolor sit, amet consectetur adipisicing elit. At, error?</p>
          <p class="review_date">Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->
        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name">Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere at saepe eius doloremque, voluptatem itaque repellendus aspernatur magnam adipisci excepturi?</p>
          <p class="review_date">Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->
        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
                <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name">Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere at saepe eius doloremque, voluptatem itaque repellendus aspernatur magnam adipisci excepturi?</p>
          <p class="review_date">Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->
        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name">Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere at saepe eius doloremque, voluptatem itaque repellendus aspernatur magnam adipisci excepturi?</p>
          <p class="review_date">Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->
        <!-- review==== -->
        <div>

          <div class="review_cont">
            <div class="review_options_cont">
              <div class="item_rating">
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
              <i class="fas fa-star star_img"></i>
            </div>
            <!-- <button class="review_option_btn"></button> -->
          </div>
          <a href="#" class="reviewer_name">Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
          <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere at saepe eius doloremque, voluptatem itaque repellendus aspernatur magnam adipisci excepturi?</p>
          <p class="review_date">Posted on August 18,2023</p>
          
        </div>
        
      </div>
        <!-- review end==== -->




      </div>
      
      
    </div>




  </section>



        </div>
        </div>
        </div>
 

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/itemInfo.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
</body>
</html>