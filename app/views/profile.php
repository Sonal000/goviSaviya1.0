
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $data['name']; ?></title>

 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/profile.css">
 
</head>
<body>



 <!-- navbar================== -->
 <?php
if($_SESSION['user_type']=='buyer'){
  include APPROOT.'/views/layouts/mainNavbar.php';
}
else{
  include APPROOT.'/views/layouts/navbar2.php';
}
   
?>

<!-- navbar end ================== -->

<section class="profile_section">
  <div class="profile_conts">
    <img src="<?php echo URLROOT ?>/store/covers/<?php echo $data['cover_img']; ?>" alt="cover" class="cover_img">

    <div class="profile_details">
      <div class="prof_img_cont">
          <img src="<?php echo URLROOT ?>/store/profiles/<?php echo $data['prof_img']; ?>" alt="profile" class="profile_img">
          <p class="user_type"><?php echo $data['user_type']; ?> <span><i class="fas fa-user"></i></span></p>
      </div>

        <div class="text_cont">

            <div class="name_cont">
                <p class="user_name"><?php echo $data['name']; ?> 
                  <span><i class="fas fa-check-circle check_icon"></i>
                  </span>
                </p>
                <p class="user_address"><?php echo $data['city']; ?>  
                    <span>
                      <i class="fas fa-map-marker-alt loc_icon"></i>
                    </span>
                </p>
            </div>
  
  
          <div class="contact_cont">
            <button class="btn contact_btn">Contact 
                <i class="fas fa-phone fa-rotate-270"></i>
            </button>
    
            <button class="btn save_btn">Save 
                      <?PHP if(false){
                         echo "<i class='fas fa-heart saved_icon'></i>";
                       }else{
                            echo "<i class='far fa-heart saved_icon'></i>";
                        } ?>
            </button>
          </div>
        </div>
        </div>

    </div>



</section>

<section class="about_section">
      <div class="about_title">
        <h3>About</h3>
        <p class="descp"> <?php echo $data['about']; ?></p>
      </div>
      <!-- <div class="stat_cont">
        <div class="stat">
          <p>Rating</p>
          <span>4.5</span>
          <i class="fas fa-star rating-icon"></i>
        </div>

        <div class="stat">
          <p>Sold</p>
          <span>300</span>
          <i class="far fa-check-square"></i>
        </div>

        <div class="stat">
          <p>Positive reviews </p>
          <span>90%</span>
        </div>
      </div> -->

</section>

<section class="featured_section">

    <!-- <div class="featured_title_cont">
      <h3>Featured items</h3>
      <div class="cat_btn_cont">
        <button class="cat_btn btn">Fruits</button>
        <button class="cat_btn btn">Vegitables</button>
        <button class="cat_btn btn">Coconut</button>
      </div>
  
    </div> -->
    

                        
  <section class="interest_section section-center">

<h4 class="interest_title">
  Current Listed items
</h4>
<div class="interest_item_cont">

  
<?php if($data['items']){

    foreach($data['items'] as $item){
      ?>
      




<!-- item -->
<a href="<?php echo URLROOT ?>/marketplace/itemInfo/<?php echo $item->item_id?>" class="item_id">

<div class="item">
<div class="item_img_cont">
<img class="item_img" src="<?php echo URLROOT ?>/store/items/<?php echo $item->item_img ?>">
</div>
<div class="item_desc">
<p class="item_title"><?php echo $item->name ?></p>
<div class="item_rating">
<i class="fas fa-star star_img"></i>
<i class="fas fa-star star_img"></i>
<i class="fas fa-star star_img"></i>
<i class="fas fa-star star_img"></i>
<i class="fas fa-star star_img"></i>
</div>
<p class="item_price"><?php echo $item->price ?> / <span><?php echo $item->unit ?><span></span></p>
</div>

</div>

</a>
<!-- item end -->

<?php 
    };
} else{
  echo '<p>No listed items</p>';
}?>




</div>
<!-- <div class="viewAll">
  <button class="btn btn_viewall">View All</button>
</div> -->

</section>


<!-- interest end ========================== -->

</section>


<section class="section_review">

<div class="reviews_title_cont">
      <h3>Reviews</h3>
      <div class="add_review_cont">
        <button class="add_review_btn" title="write a review" id="add_review_btn">
          <!-- Add Review -->
          <i class="fas fa-edit"></i>
        </button>
      </div>
  </div>
  <div class="review_write_cont">
    <input type="textarea" class="review_input" placeholder="Write a Review">
    <button class="btn_post btn">post</button>
  </div>
  

   <!-- review section ========================================== -->

   <section class="reviews_section section-center">
    <!-- <div class="reviews_btn_cont">
        <button  class="reviews">Ratings & Reviews</button>
        <button class="faq">FAQs</button>
    </div> -->
    <div class="reviews_container">


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
  <div class="viewAll">
    <button class="btn btn_viewall">View All</button>
  </div>
      
      
    </div>




  </section>

 <!-- review section end   ==================================== -->



</section>










<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->











  <!-- js === -->
  <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
  <script src="<?php echo URLROOT ?>/assets/js/profile.js"></script>
</body>
</html>