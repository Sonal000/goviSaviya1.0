<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Orders</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/buyerOrders.css">
</head>
<body >
    <button id="backdrop" class="backdrop hidden_backdrop"></button>


 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>
 <!-- navbar end ================== -->
 

 <!-- view Auction =================-->
<section class="view_auction_section section-center">

   <div class="viewAuction_cont">
      
      <div class="current_biddings_cont">
         
         <div class="auc_title">
            <h3>Ongoing Orders

            
            </h3>
         </div>
         
         <div class="bid_items_cont">

         <?php if($data['orders']){
            foreach($data['orders'] as $orders){
               if($orders){
               foreach($orders as $order){
           ?>

      
         <!-- bid item ===========-->
         <div class="bid_item_cont  ">
            <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT."/store/items/".$order->item_img; ?>">
            </div>
            <div class="item_description">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $order->item_name; ?></p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: <?php echo $order->seller_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_location"> location: <?php echo $order->seller_city; ?> </a>
                     <!-- <p class="item_address">Thalgahawawa</p> -->
                     <div class="item_bid_cont">
                     <p class="item_bids"><?php echo $order->quantity; ?> <span><?php echo $order->item_unit; ?></span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid">Order Status: <span> <?php echo $order->order_status; ?></span></p>
                     </div>
                  </div>
                  </div>

               </div>
               <div class="order_progress_cont">
                        <div class="order_progress" data-progress=<?php echo $order->order_status; ?>>
                                <div class="step ">
                                    <div class="node complete" id="placed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Placed</p>
                                </div>
                                <div class="step ">
                                    <div class="node " id="picked"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Picked up</p>
                                </div>
                                <div class="step ">
                                    <div class="node  " id="arrived"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Arrived</p>
                                </div>
                                <div class="step">
                                    <div class="node " id="completed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Completed</p>
                                </div>
                                <div class="order_progress_bar"></div>
                            </div>
               </div>
               <div class="bid_action_cont">
                  <div class="item_btns_cont">
                  <p class="item_time">Latest time :  24/<span>h left</span>  </p>
                     <buttton id="track_order_btn" class="buy_btn btn track_order">Track Order</buttton>
                  </div>
               </div>
        </div>
</div>
<!-- bid item end===== -->


<!-- bid item track================================= -->
<div class="overlay hidden_overlay">
    <div class="item_info_container">

    <div class="closed">
        <button class="closed_btn" id="close_btn">  <i class="fas fa-times"></i></button>
    </div>
    <div class="order_progress_container">
                        <div class="order_progress" data-progress=<?php echo $order->order_status; ?>>
                                <div class="step ">
                                    <div class="node complete" id="placed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Placed</p>
                                </div>
                                <div class="step ">
                                    <div class="node " id="picked"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Picked up</p>
                                </div>
                                <div class="step ">
                                    <div class="node  " id="arrived"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Arrived</p>
                                </div>
                                <div class="step">
                                    <div class="node" id="completed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Completed</p>
                                </div>
                                <div class="order_progress_bar"></div>
                            </div>
               </div>
               <div class="container_info">
                   <div class="sec_title">ORDER ID : <?php echo $order->order_item_id."/".$order->order_id; ?></div>
                   <div class="info_cont">
                       
                       <div class="text_container">
                <div class="info">
                    <!-- <p class="infor_title">Item :</p> -->
                    <a href="<?php echo URLROOT."/marketplace/iteminfo/".$order->item_id; ?>" class="infor_title item_title"><?php echo $order->item_name; ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Order type</p>
                    <p class="infor_title"><?php echo $order->order_type ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Price</p>
                    <p class="infor_title"><?php echo $order->total_price ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Quantity</p>
                    <p class="infor_title"><?php echo $order->quantity ?>  <?php echo $order->item_unit ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Order Date</p>
                    <p class="infor_title"><?php echo $order->order_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Seller :</p>
                    <a href="<?php echo URLROOT."/profile/".$order->seller_user_id; ?>" class="infor_title seller"><?php echo $order->seller_name ?> <i class="fas fa-check-circle"></i></a>
                </div>
                <div class="info">
                    <p class="infor_title">Location :</p>
                    <p class="infor_title"><?php echo $order->seller_city ?></p>
                </div>
                
            </div>
            <div class="image_container">
                <img  src="<?php echo URLROOT."/store/items/".$order->item_img; ?>" alt="img"/>
            </div>

                </div>
            </div>
            <div class="container_info">
                <?php if($order->deliver_id) {?>
                <div class="sec_title">Delivery Info</div>
                <div class="info_cont">

                     <div class="text_container">

                    <div class="info">
                        <p class="infor_title">Deliver Name :</p>
                        <a href="<?php echo URLROOT."/profile/".$order->deliver_user_id; ?>" class="infor_title seller"><?php echo $order->deliver_name ?> <i class="fas fa-check-circle"></i></a>
                    </div>
                    <div class="info">
                        <p class="infor_title">Mobile:</p>
                        <p class="infor_title"><?php echo $order->deliver_mobile; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle type :</p>
                        <p class="infor_title"><?php echo $order->vehicle_type; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle Model :</p>
                        <p class="infor_title"><?php echo $order->vehicle_brand."-". $order->vehicle_model; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle number :</p>
                        <p class="infor_title"><?php echo $order->vehicle_number; ?></p>
                    </div>
                </div>
                    <div class="image_container">
                <img  src="<?php echo URLROOT."/store/vehicles/".$order->vehicle_img; ?>" alt="img"/>
                  <div class="deliver_image_container">
                      <img class="deliver_img" src="<?php echo URLROOT."/store/profiles/".$order->deliver_img; ?>" alt="img"/>
                  </div>
            </div>


                </div>
                <?php }else{ ?> 
                    <div class="info_cont">

<div class="info">
    <p class="infor_title">No Delivery Agent assigned</p>
</div>
</div>
                    
                    <?php } ?>

        </div>

    </div>
</div>

<!-- bid item track end ================================= -->
        

<?php     
                 }}  }
         }else{
?>
            <div class="bid_item_cont  ">
                <p>There are no ongoing orders.</p>
            </div>

      <?php   } ?>

         <!-- bid item ===========-->
         <!-- <div class="bid_item_cont  inactive_bid">
            <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT ?>/assets/images/item-6.png"/>
            </div>
            <div class="item_description">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name">Tomato</p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
                  <p class="item_time">  24/<span>h left</span>  </p>
               </div>
               <div class="bid_action_cont">

                  <div class="item_bid_cont">
                     <p class="item_bids">10 <span>bids</span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid inactive">Current highest Bid : <span> Rs : 40000</span></p>
                        <p class="your_bid">Your Bid : <span> Rs : 31000</span></p>
                     </div>
                  </div>
                  <div class="item_btns_cont">
                     <buttton class="bid_btn btn">Place Higher Bid</buttton>
                     <buttton class="buy_btn btn">Buy this item</buttton>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <a target="blank" href="<?php echo URLROOT ?>/auction/itemInfo/10"><i class="fas fa-angle-right"></i></a>
</div>
</div> -->
<!-- bid item end===== -->



</div>
</div>




<div class="biddings_history__cont">
         
         <div class="auc_title">
            <h3>Complete Orders</h3>
         </div>
         
         <div class="bid_history_container">
      
<?php if($data['completedOrders']){

foreach($data['completedOrders'] as $completedOrder){
   if($completedOrder){
   foreach($completedOrder as $order){
      ?> 
      


         <!-- bid item ===========-->
         <div class="bid_history_cont  ">
            <div class="bid_history_img_cont">
               <img  class="bid_history_img" src="<?php echo URLROOT ?>/store/items/<?php echo $order->item_img; ?>"/>
            </div>
            <div class="history_description">
               <div class="history_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $order->item_name; ?></p>
                     <a href="<?php echo URLROOT ?>/profile/<?php echo $order->seller_user_id; ?>" target="_blank" class="item_seller"> seller:<?php echo $order->seller_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
                  </div>
               </div>
               <div class="history_action_cont">

                  <div class="history_bid_cont">
                     <p class="your_bid">Quantity: <?php echo $order->quantity; ?> <span><?php echo $order->item_unit; ?></span></p>
                     <div class="history_info_cont">
                        <p class="your_bid">Price : <span> Rs : <?php echo $order->item_price; ?></span></p>
                     </div>
                  </div>
                  <div class="history_info_cont">
                     <p class="your_bid">Completed Date : <span><?php echo $order->completed_date; ?></span></p>
                  </div>
               </div>
</div>
<div class="more_btn_cont">
   <button class="view_history" id="view_history"><i class="fas fa-angle-right"></i></a>
</div>
</div>
<!-- bid item end===== -->

<!-- bid item track================================= -->
<div class="overlay hidden_overlay">
    <div class="item_info_container">

    <div class="closed">
        <button class="closed_btn" id="close_btn">  <i class="fas fa-times"></i></button>
    </div>
    <div class="order_progress_container">
                        <div class="order_progress" data-progress=<?php echo $order->order_status; ?>>
                                <div class="step ">
                                    <div class="node complete" id="placed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Placed</p>
                                </div>
                                <div class="step ">
                                    <div class="node " id="picked"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Picked up</p>
                                </div>
                                <div class="step ">
                                    <div class="node  " id="arrived"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Arrived</p>
                                </div>
                                <div class="step">
                                    <div class="node" id="completed"><i class="fas fa-check"></i></div>
                                    <p class="status_text">Completed</p>
                                </div>
                                <div class="order_progress_bar"></div>
                            </div>
               </div>



               <div class="container_info">
                   <div class="sec_title">Complains</div>
                   <div class="info_cont ">
                       <div class="text_container_q">
                       
                       <?php 
                   
                   $currentDateTime = new DateTime(); 
                   $completeDateTime = new DateTime($order->completed_date); 
                   $interval = $currentDateTime->diff($completeDateTime);
                   if ($order->is_able_to_complain && $order->qc_status=='not_raised') { ?>



                <div class="info complain_btn_cont">
                    <p class="infor_title">Do you have any complains about  the order ?</p>
                    <button class="complain_btn" id="complain_btn">Raise a Complain</button>
                </div>  
                
                <div class="complain_form_cont hidden">
                <div class="closed">
        <button class="closed_btn" id="cform_close_btn">  <i class="fas fa-times"></i></button>
    </div>
                  <div class="complain_form ">
                           <form action="<?php echo URLROOT ?>/orders/raiseBuyerComplain/<?php echo $order->qc_id; ?>" method="POST" enctype="multipart/form-data" >

                                    <div class="input_items">
                                    <div class="input_cont">
                                          <label for="dropdown" class="input_label">Product Name</label>
                                          <input type="text" id="dropdown" class="input_item" name="name"  value="<?php echo $order->item_name; ?>" readonly>
                                          <input type="hidden"  name="seller_user_id"  value="<?php echo $order->seller_user_id; ?>">
                                          <input type="hidden"  name="order_item_id"  value="<?php echo $order->order_item_id; ?>">
                                          <input type="hidden"  name="order_id"  value="<?php echo $order->order_id; ?>">
                                          <input type="hidden"  name="order_type"  value="<?php echo $order->order_type; ?>">
                                    </div>    
                                    <div class="input_cont">
                                    <label for="stock" class="input_label">Stock</label>
                                             <input type="text" class="input_item"  name="req_stock" value="<?php echo $order->quantity." ".$order->item_unit; ?>" readonly>
                                    </div>
                                    <div class="input_cont">
                                       <label for="req_date" class="input_label">Completed Date</label>
                                          <input type="date_format" class="input_item"  name="req_date" id="complete_date" value="<?php echo $order->completed_date_time; ?>" readonly>
                                    </div>

                                    <div class="input_cont">
                                    <label for="item_img" class="input_label">Upload Image</label>
                                          <input type="file" class="upload_item"  name="complain_img" require>
                                    </div>
                                          

                                    <div class="input_cont">
                                    <label for="description" class="input_label">Description</label>
                                    
                                                   <input type="text" class="input_item" placeholder="Add your description" name="description">
                                    </div>  
                                 
                                 

                                 
                                    <div class="submit_container">
                                       <button type="submit" class="btn">Raise a Complain</button>
                                       <div class="can_btn">
                                       <button  class="btn cancel_bt" id="cancel_complain">Cancel</button>
                                       </div>
                                    </div>
                 
                              </div>

                     </form>
                </div>
            </div>
            <?php }elseif( $order->qc_status!='not_raised'){ ?>



                <div class="info complain_btn_cont">
                    <p class="infor_title">Your Complain Status : </p>
                    <?php 
                    
                    if($order->qc_status=='pending'){
                        echo "<p style='color:orange;'>".$order->qc_status."</p>";  
                    }elseif($order->qc_status=='approved'){
                        echo "<p style='color:green;'>".$order->qc_status."</p>";
                    }elseif($order->qc_status=='declined'){
                        echo "<p style='color:red;'>".$order->qc_status."</p>";
                    }else{
                        echo "<p>".$order->qc_status."</p>";
                    }
                    ?> 
                <button class="view_complain" id="complain_btn">View Complain</button>
                </div>  
                
                <div class="complain_form_cont hidden">
                                    <div class="closed">
        <button class="closed_btn cform_close" id="cform_close_btn">  <i class="fas fa-times"></i></button>
    </div>
           
                  <div class="complain_form ">
                           <form  >

                                    <div class="input_items">
                                    <div class="input_cont">
                                          <label for="dropdown" class="input_label">Product Name</label>
                                          <input type="text" id="dropdown" class="input_item" name="name"  value="<?php echo $order->item_name; ?>" readonly>
                                          <input type="hidden"  name="seller_user_id"  value="<?php echo $order->seller_user_id; ?>">
                                          <input type="hidden"  name="order_item_id"  value="<?php echo $order->order_item_id; ?>">
                                          <input type="hidden"  name="order_id"  value="<?php echo $order->order_id; ?>">
                                          <input type="hidden"  name="order_type"  value="<?php echo $order->order_type; ?>">
                                    </div>    
                                    <div class="input_cont">
                                    <label for="stock" class="input_label">Stock</label>
                                             <input type="text" class="input_item"  name="req_stock" value="<?php echo $order->quantity." ".$order->item_unit; ?>" readonly>
                                    </div>
                                    <div class="input_cont">
                                       <label for="req_date" class="input_label">Completed Date</label>
                                          <input type="date_format" class="input_item"  name="req_date" id="complete_date" value="<?php echo $order->completed_date_time; ?>" readonly>
                                    </div>

                                    <div class="input_cont">
                                    <label for="description" class="input_label">Description</label>
                                                   <input type="text" class="input_item" placeholder="Add your description" name="description" 
                                                   value="<?php echo $order->qc_message; ?>"
                                                   readonly>
                                    </div>  
                                    <div class="input_cont">
                                    <label for="item_img" class="input_label">Complain Image</label>
                                          <img class="complain_image" src="<?php echo URLROOT."/store/items/".$order->qc_img; ?>"/>
                                    </div>
                                          

                                 
                                 

                                 
                            
                 
                              </div>

                     </form>
                </div>
            </div>




            
           
            <?php  }elseif(!$order->is_able_to_complain && $order->qc_status=='not_raised'){
                echo "<p> No complains  .Complain only can be raised within the first 3 hours after completion</p>";
                
            }?>
            </div>
       
            </div>
        </div>
            <div>
               <div class="container_info">
                   <div class="sec_title">ORDER ID : <?php echo $order->order_item_id."/".$order->order_id; ?></div>
                   <div class="info_cont">
                       
                       <div class="text_container">
                <div class="info">
                    <!-- <p class="infor_title">Item :</p> -->
                    <a href="<?php echo URLROOT."/marketplace/iteminfo/".$order->item_id; ?>" class="infor_title item_title"><?php echo $order->item_name; ?></a>
                </div>
                <div class="info">
                    <p class="infor_title">Order type</p>
                    <p class="infor_title"><?php echo $order->order_type ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Price</p>
                    <p class="infor_title"><?php echo $order->total_price ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Quantity</p>
                    <p class="infor_title"><?php echo $order->quantity ?>  <?php echo $order->item_unit ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Order Date</p>
                    <p class="infor_title"><?php echo $order->order_date ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Completed Date</p>
                    <p class="infor_title"><?php echo $order->completed_date_time; ?></p>
                </div>
                <div class="info">
                    <p class="infor_title">Seller :</p>
                    <a href="<?php echo URLROOT."/profile/".$order->seller_user_id; ?>" class="infor_title seller"><?php echo $order->seller_name ?> <i class="fas fa-check-circle"></i></a>
                </div>
                <div class="info">
                    <p class="infor_title">Location :</p>
                    <p class="infor_title"><?php echo $order->seller_city ?></p>
                </div>
                
            </div>
            <div class="image_container">
                <img  src="<?php echo URLROOT."/store/items/".$order->item_img; ?>" alt="img"/>
            </div>

                </div>
            </div>
            <div class="container_info">
                <?php if($order->deliver_id) {?>
                <div class="sec_title">Delivery Info</div>
                <div class="info_cont">

                     <div class="text_container">

                    <div class="info">
                        <p class="infor_title">Deliver Name :</p>
                        <a href="<?php echo URLROOT."/profile/".$order->deliver_user_id; ?>" class="infor_title seller"><?php echo $order->deliver_name ?> <i class="fas fa-check-circle"></i></a>
                    </div>
                    <div class="info">
                        <p class="infor_title">Mobile:</p>
                        <p class="infor_title"><?php echo $order->deliver_mobile; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle type :</p>
                        <p class="infor_title"><?php echo $order->vehicle_type; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle Model :</p>
                        <p class="infor_title"><?php echo $order->vehicle_brand."-". $order->vehicle_model; ?></p>
                    </div>
                    <div class="info">
                        <p class="infor_title">Vehicle number :</p>
                        <p class="infor_title"><?php echo $order->vehicle_number; ?></p>
                    </div>
                </div>
                    <div class="image_container">
                <img  src="<?php echo URLROOT."/store/vehicles/".$order->vehicle_img; ?>" alt="img"/>
                  <div class="deliver_image_container">
                      <img class="deliver_img" src="<?php echo URLROOT."/store/profiles/".$order->deliver_img; ?>" alt="img"/>
                  </div>
            </div>


                </div>
                <?php }else{ ?> 
                    <div class="info_cont">

<div class="info">
    <p class="infor_title">No Delivery Agent assigned</p>
</div>
</div>
                    
                    <?php } ?>

        </div>

    </div>
</div>

                </div>


        
<?php
   }}else{
      ?>
      <div class="">
         <p>There are no completed orders.</p>
      </div>
      <?php
   
   }

}} ?>




</div>
</div>


      
</div>

</section>
<!-- view Auction end=================-->




 
<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->





   <!-- js === -->
   <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
   <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
   <script src="<?php echo URLROOT ?>/assets/js/buyerOrders.js"></script>

</body>
</html> 