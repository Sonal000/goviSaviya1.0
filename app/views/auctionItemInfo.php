<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> <?php echo  $data['name'];?></title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/auctionItemInfo.css">
</head>
<body>
 <!-- navbar ======================= -->
<?php
 include APPROOT.'/views/layouts/mainNavbar.php';  
?>
 <!-- navbar end ======================= -->



 
 <!-- /* item info ==================================== */ -->
 
 <div class="back_btn_cont section-center">
  <button class="back_btn btn">
  <i class="fas fa-arrow-left"></i>
    </button>
    <p>Go Back</p>
 </div>




 <section class="item_information section-center">


<div class="image_container">
    <div class="main_img_cont">
      <img class="main_img" src="<?php echo URLROOT ?>/store/items/<?php echo $data['item_img'] ?>"/> 
    </div>
    <!-- <div class="img_slider_cont">
      <button class="slider_btn">
        <img class="slider_img" src="<?php echo URLROOT ?>/assets/images/item-7.png"/> 
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
    <p class="item_name"><?php echo $data['name'];?></p>
    <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller:<?php echo $data['seller_name'];?> <span><i class="fas fa-check-circle"></i></span></a>
    <p class="item_address"><?php echo $data['seller_city'];?></p>
    <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div>
        </div>
        <div class="item_price_cont">
          <p class="item_price"><span>Starting bid :</span></p> <p>   Rs <?php echo $data['price'];?>/<span><?php echo $data['unit'];?></span></p>
        </div>
        <div class="item_price_cont">          
          <p class="item_price"><span>available :</span></p> <p> <?php echo $data['stock'];?> <span><?php echo $data['unit'];?>   </p>
        </div>
        <div class="item_price_cont">
          <p class="item_price"><span>Current bid :</span></p> <p>   Rs <?php echo $data['current_bid'];?>/<span><?php echo $data['unit'];?></span></p>
        </div>

  <div class="item_bid_cont">
    <p class="item_bids"><?php echo $data['bid_Count'];?> <span>bids</span></p>
    <p class="item_time"> <?php echo $data['exp_date'];?><span> left</span>  </p>
  </div>
  <div class="item_desc_cont">
    <p class="item_desc"><?php echo $data['description'];?></p>
  </div>
  <div>
    <?php 
      if($data['leading_bidder']){
        echo '<p class="leading_bid">You are the leading bidder in this auction</p>';
      }else if($data['active_bidder']){
        echo '<p class="active_bid">You have been outbid in this auction ( your bid : Rs '.$data['yourBid'].' )</p>';
      }
    ?>
  </div>

  <form action="<?php echo URLROOT.'/auctionC/bid/'.$data['item_id']; ?>" method="post">
  <div class="item_btns_cont">
    <div class="qty_btn_cont">
      <!-- <button class="btn_remove">-  Rs</button> -->
        <p>Rs</p>
        <input class="qty" type="number" value="<?php echo $data['current_bid'] + 10;?>" class="qty"  name="bid_price" id="quantity" data-currentprice="<?php echo $data['current_bid'] + 10;?>">
      <!-- <button class="btn_add">+</button> -->
    </div>
    <button type="submit" class="addtocart_btn btn">Place Bid</button>
  </div>
</form>
</div>

   
 </section>
 
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

 <!-- review section end   ==================================== -->


 <!-- interest ========================== -->

  <section class="interest_section section-center">

      <h4 class="interest_title">
        You might also Interests
      </h4>
      <div class="interest_item_cont">

        
    <!-- item -->
    <a href="<?php echo URLROOT ?>/marketplace/itemInfo/10" class="item_btn">

<div class="item">
 <div class="item_img_cont">
  <img class="item_img" src="<?php echo URLROOT ?>/assets/images/item-1.png">
  </div>
  <div class="item_desc">
    <p class="item_title">Fresh Mango</p>
    <div class="item_rating">
    <i class="fas fa-star star_img"></i>
    <i class="fas fa-star star_img"></i>
    <i class="fas fa-star star_img"></i>
    <i class="fas fa-star star_img"></i>
    <i class="fas fa-star star_img"></i>
    </div>
    <p class="item_price">2000 / <span>kg<span></span></p>
  </div>
  
 </div>
 
</a>
<!-- item end -->

<!-- item -->
<a class="item_btn">

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
  
 </div>
 
</a>
<!-- item end -->

<!-- item -->
<a class="item_btn">

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
 
</a>
<!-- item end -->

<!-- item -->
<a class="item_btn">

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
 
</a>
<!-- item end -->


<!-- item -->
<a class="item_btn">

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
 
</a>
<!-- item end -->






      </div>

  </section>


 <!-- interest end ========================== -->
 






 
  <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/auctionitemInfo.js"></script>
</body>
</html>