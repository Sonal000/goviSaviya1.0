<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Requests</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/listproduct.css">
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
    
   <?php if(isset($data['paymentsCount']) && $data['paymentsCount']>0 ){ ?>
      <div class="current_biddings_cont" >
         
         <div class="hed_btn_cont">
         <div class="auc_title">
            <h3>Payment Pending Requests</h3>
            <div class="win_count"><p><?php echo $data['paymentsCount']; ?></p></div>
         </div>
         <!-- <div class="add_req">
            <button class="btn" id="request_btn">Add Order Requests</button>
         </div> -->
         </div>
         
         
         <div class="bid_items_cont">

          <?php 
          
          if($data['requests']){
             foreach($data['requests'] as $requests){
              
           ?> 

      
         <!-- bid item ===========-->
         <div class="bid_item_cont  ">
             <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT."/store/items/".$requests->req_img; ?>">
            </div> 
            <div class="item_description">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $requests->name; ?></p>
                     <a href="<?php echo URLROOT ?>/profile/<?php echo $requests->user_id?>" target="_blank" class="item_seller"> Accepted seller: <?php echo $requests->seller_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_location"> location: <?php echo $requests->district; ?> </a>
                     <!-- <p class="item_address">Thalgahawawa</p> -->
                     <div class="item_bid_cont">
                     <p class="item_bids"><?php echo $requests->req_stock; ?> <span><?php echo $requests->unit; ?></span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid">Order Status: <span> <?php echo $requests->status; ?></span></p>
                     </div>
                  </div>
                  </div>

               </div>
               
               <div class="bid_action_cont">
                  <div class="item_btns_cont">
                     <a href="<?php echo URLROOT; ?>/orderRequests/checkout/<?php echo $requests->request_ID; ?>  />"  class="buy_btn btn track_order">Go to Payments</a>
                  </div>
               </div>
        </div>
</div>
<!-- bid item end===== -->




<?php     
            }
         }else{
?>
            <div class="bid_item_cont  ">
                <p>There are no ongoing orders.</p>
            </div>

      <?php   } ?>




</div>
</div>


<?php }?>
<div class="request_item" id="accept_order_add_cont">
   
   <div class="form_hed">
      <h3>Request Items</h3>
   </div>
   <div class="req_add_form_cont">
            
   <div class="form_container">


   <form method="post" id="request_form" action="<?php echo URLROOT ?>/OrderRequests/add" enctype="multipart/form-data">

   <div class="input_items">


     

          <div class="input_cont">
                <label for="dropdown" class="input_label">Product Name</label>
                <input type="text"  class="input_item" name="name" id="product_name" />
                <p class="invalid_msg"></p>
          </div>
          
          <div class="input_cont">
                <label for="dropdown" class="input_label">Product category</label>
                    <select id="dropdown" name="category" class="dropdown_item " >
                    <option value="vegetables">Vegetables</option>
                    <option value="fruits">Fruits</option>
                    <option value="spices">Spices</option>
                    </select>
          </div>

              
         <div class="input_cont">
          <label for="stock" class="input_label">Required Stock</label>
                    <input type="text" class="input_item"  name="req_stock" id="stock">
                    <p class="invalid_msg"></p>
          </div>

          <div class="input_cont">
            <label for="dropdown"><p class="input_label">Unit</p></label>
               <select id="dropdown" name="unit" class="dropdown_item">
                            <option value="Kg">Kg</option>
                            <option value="g">g</option>
                            
               </select>
         </div>
          

         <div class="input_cont">
              <label for="req_date" class="input_label">Required Date</label>
               <input type="date" class="input_item"  name="req_date" id="expiration_date">
               <p class="invalid_msg"></p>
         </div>

          
         <div class="input_cont">
            <label for="req_address" class="input_label">Requested Address</label>
            <input type="text" class="input_item"  name="req_address" id="req_address">
            <p class="invalid_msg"></p>
            </div>

        
         <div class="input_cont">
            <label for="dropdown"><p class="input_label">District</p></label>
               <select id="dropdown" name="district" class="dropdown_item">
                            <option value="Colombo">Colombo</option>
                            <option value="Kaluthara">Kaluthara</option>
                            <option value="Gampaha">Gampaha</option>
               </select>
                </div>
      
         <div class="submit_container">
            <button type="submit" class="btn">Request Item</button>
            <div class="can_btn">
            <a href="<?php echo URLROOT ?>/OrderRequests"><button type ="button" class="btn cancel_bt">Cancel</button></a>
            </div>
         </div>
                    
    </div>
 
  </form>
  <div class="loader_cont">
        <div class="loader"></div>
      </div>


</div>

      </div>

</div>

<div class="current_biddings_cont" id="accept_order_cont">
      <div class="hed_btn_cont">
         <div class="auc_title">
            <h3>Quotations for Order Requests</h3>
         </div>
         <div class="add_req">
            <button class="btn" id="request_btn">Add Order Requests</button>
         </div>
      </div>


<div class="bid_items_cont">

<?php if($data['quotations']){
  foreach($data['quotations'] as $quotations){
 ?> 


<!-- bid item ===========-->
<div class="bid_item_cont  ">
   <div class="bid_item_img_cont">
     <img  class="bid_item_img" src="<?php echo URLROOT."/store/items/".$quotations->req_img; ?>">
  </div> 
  <div class="item_description">
     <div class="item_title_cont">
        <div class="item_info">
           <p class="item_name"><?php echo $quotations->name; ?></p>
           <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> Requested By: <?php echo $quotations->buyer_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
           <p  class="item_location" id="requested_date"> Requested Before: <?php echo date('Y-m-d', strtotime($quotations->req_date)); ?> </p>
           <!-- <p class="item_address">Thalgahawawa</p> -->
           <div class="item_bid_cont">
           <p class="item_bids">Requested Stock: <span><?php echo $quotations->req_stock; ?></span> <span><?php echo $quotations->unit; ?></span></p>
           <div class="bid_info_cont">
              <p class="current_bid">Number of Qotations: <span> <?php echo $quotations->quotation_count; ?></span></p>
           </div>
        </div>
        </div>

     </div>
     
     <div class="bid_action_cont">
        <div class="item_btns_cont">
           <a href="<?php echo URLROOT?>/OrderRequests/viewQuotations/<?php echo $quotations->request_ID ?>"><buttton id="track_order_btn" class="buy_btn btn track_order">View Quotations</buttton></a>
        </div>
     </div>
</div>
</div>
<!-- bid item end===== -->




<?php     
  }
}else{
?>
  <div class="bid_item_cont  ">
      <p>There are no quotations for order Requests.</p>
  </div>

<?php   } ?>




</div>

</div>


<div class="biddings_history__cont">
         
         <div class="auc_title">
            <h3>Pending Order Requests</h3>
         </div>
         
         <div class="bid_history_container">
      

            <?php if($data['pendreq']){
               foreach($data['pendreq'] as $pendreq){
                  ?>
            <div class="bid_item_cont">
             <div class="bid_item_img_cont">
               <img  class="bid_item_img" src="<?php echo URLROOT."/store/items/".$pendreq->req_img; ?>">
            </div> 
            <div class="pending_req_cont">
            <div class="item_description" id="requests_cont_view">
               <div class="item_title_cont">
                  <div class="item_info">
                     <p class="item_name"><?php echo $pendreq->name; ?></p>
                     <a href="<?php echo URLROOT ?>/profile/<?php echo $pendreq->user_id;?>" target="_blank" class="item_seller"> Requested By: <?php echo $pendreq->buyer_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <p  class="item_location" id>Requested Before: <?php echo date('Y-m-d', strtotime($pendreq->req_date)); ?> </p>
                     <!-- <p class="item_address">Thalgahawawa</p> -->
                     <div class="item_bid_cont">
                     <p class="item_bids">Requested Stock: <?php echo $pendreq->req_stock; ?> <span><?php echo $pendreq->unit; ?></span></p>
                     <div class="bid_info_cont">
                        <p class="current_bid">Order Status: <span> <?php echo $pendreq->status; ?></span></p>
                     </div>
                  </div>
                  </div>

               </div>
               
               <div class="bid_action_cont">
                  <div class="item_btns_cont">
                     
                    
                  </div>
               </div>
        </div>
        
        <div class="item_description_update"  id="requests_cont_edit">
         <form action="" class="form_con">
               <div class="item_title_cont more_space">
                  <div class="item_info">
                     <p class="item_name"><?php echo $pendreq->name; ?></p>
                     <a href="<?php echo URLROOT ?>/profile/priyantha" target="_blank" class="item_seller"> Requested By: <?php echo $pendreq->buyer_name; ?> <span><i class="fas fa-check-circle"></i></span></a>
                     <div class="stock_and_date">
                     <label for="" class="item_loc">Requested Date: </label><input type="date" name="req_date" class="input_space"> </p>
                     <label for="" class="item_loc">Requested Stock: </label><input type="text" name="req_stock" class="input_space"> <span class="item_loc"> <?php echo $pendreq->unit; ?></span>
                     </div>
                     <div class="item_bid_cont">
                     <div class="bid_info_cont">
                        <p class="current_bid">Order Status: <span> <?php echo $pendreq->status; ?></span></p>
                     </div>
                  </div>
                  </div>

               </div>
               
               <div class="bid_action_cont">
                  <div class="item_btns_cont">
                     <a href="<?php echo URLROOT?>/OrderRequests/update/<?php echo $pendreq->request_ID ?>"><buttton id="track_order_btn" class="buy_btn btn"> Save </buttton></a>
                     <a href="<?php echo URLROOT?>/OrderRequests"><buttton id="track_order_btn" class="buy_btn btn remove">cancel</buttton></a>
                  </div>
               </div>
               </form>
        </div>
        
        </div>
</div>


                  <?php

               }
            }
            else{
               ?>
                  <p>No Pending Requests</p>
               <?php
            }
            ?>
        


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
   /<script src="<?php echo URLROOT ?>/assets/js/buyerOrders.js"></script>
   <script src="<?php echo URLROOT ?>/assets/js/orderRequest.js"></script>

</body>
</html> 


<script>
      const expireDateinput = document.getElementById('expiration_date');

      const minExpireDateinput = new Date();
      const formatDate = minExpireDateinput.toISOString().split('T')[0];

      document.getElementById('expiration_date').setAttribute("min",formatDate);




</script>