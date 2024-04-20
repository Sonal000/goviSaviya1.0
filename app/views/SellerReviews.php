<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<button id="backdrop" class="backdrop hidden_backdrop"></button>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

    <!-- items -->
  <div class="container_content">
<!-- content============================ -->

<div class="profile_1">
    <div class="auction_page">
        <div class="hed">
            <h4>Reviews</h4>
        </div>
        <!-- <div class="createbt">
            <a href="<?php echo URLROOT; ?>/CreateAuction"><button class="btn">Create Auction</button></a>
        </div> -->
        <div class="auction_item_cont"> 

        <?php 


        if($data['row']){
            foreach($data['row'] as $items){
                
           ?>
        <div class="mycard" id="blur">

            <div class="productimg">
                <img src="<?php echo URLROOT."/store/items/".$items->item_img; ?>" class="mango" alt="">
            </div>
         <div class="left_right_container_review">
            <div class="post_left_review">
                <div class="pro_detail_review">

                <div class="productname">
                <p class="product_name">Product ID : </p>
                <p class="p_det"> <?php echo $items->item_id; ?></p>
                </div>
                <div class="productname">
                <p class="product_name">Product Name : </p>
                <p class="p_det"> <?php echo $items->name ?></p>
                </div>
                <div class="productname">
                <p class="product_name">Description : </p>
                <p class="p_det"> <?php echo $items->description; ?></p>
                </div>
                <div class="productname">
                <p class="product_name">Reviews : </p>
                <p class="p_det"> <?php echo $items->reviewcount; ?>
                </div>

                </div>
                
            </div>

            <div class="post_right_review">
                
                <div class="update_edit_bt">
                    <button class="btn auc_cards">
                     view reviews
                    </button>
                  
                </div>
            </div>
         </div>


        </div>
        
        <div class="bid_list overlay hidden_overlay">       
        <div class="container_info">
                   <div class="sec_title">Item : <?php echo $items->item_id; ?></div>
                   <div class="info_cont">
                       
                       <div class="text_container">
                
                <div class="info">
                    <p class="infor_title">Item Name :</p>
                    <p class="infor_title"><?php echo $items->name; ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Item Description :</p>
                    <p class="infor_title"><?php echo $items->description; ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Expire Date :</p>
                    <p class="infor_title"><?php echo $items->exp_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">End Date</p>
                    <p class="infor_title"><?php echo $items->name; ?></p>
                </div>
              

                
           
                
            </div>
            <div class="image_container">
                <img  src="<?php echo URLROOT."/store/items/".$items->item_img; ?>" alt="img"/>
            </div>

                </div>

                <div class="sec_title">Reviews List</div>

                <?php if($items->reviewlist){

foreach($items->reviewlist as $review){
    ?>

                <div class="info_cont">  
                <div class="info_bidders ">       
                <div class="info">
                    <p class="infor_title">Review ID :</p>
                    <p class="infor_title"><?php echo $review->review_id; ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Reviewer :</p>
                
                    <a href="<?php echo URLROOT."/profile/".$review->user_id; ?>" class="infor_title buyer_name"><?php echo $review->buyer_name; ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Review :</p>
                    <p class="infor_title"><?php echo $review->review;?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Review Date :</p>
                    <p class="infor_title"><?php echo $review->posted_date ;?></p>
                </div>
         
            </div>
            </div>
            <?php
                }}else{
                    echo "<p>No reviews for this Item .</p>";
                } ?>


            </div>

</div>
        <!---
        <div class="pop_up" id="window_up">
                <div class="window">
                    <div class="sure">
                        <p>Are you Sure ?</p>
                    </div>
                    <div class="button_hold">
                        <button type="submit" class="yes_btn btn">Yes</button>
                        <button type="submit" class="no_btn btn">No</button>
                    </div>
                </div>
        </div>
            -->

        <?php
    }
    }else{
        ?>  
            <div class="no_items" style="margin:1.5rem;" >
                <p>No items to show</p>
            </div>

        <?php
    }

    ?>

        <!-- Confirmation pop-up -->
       

        
</div>





  </div>

</div>


<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<!-- <script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script> -->
<script src="<?php echo URLROOT ?>/assets/js/sellerReview.js"></script>


</body>


</html>