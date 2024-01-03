<!DOCTYPE html>
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Shopping Cart</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/cart.css">
</head>
<body>
 <!-- navbar ======================= -->
<?php
 include APPROOT.'/views/layouts/mainNavbar.php';  
?>
 <!-- navbar end ======================= -->


 <section class="cart-section section-center">


<?php
      if($data['items']){

       
?>
  <div class="cart_container">
    <div class="cart_items_container">
<?php
   foreach ($data['items'] as $item) {
?>
    <!-- item -->
       <div class="cart_item_cont">

        <div class="item_desc_wrapper">
    <div class="main_img_cont">
      <img class="main_img" src="<?php echo URLROOT ?>/store/items/<?php echo $item->item_img?>"/> 
    </div>


  <div class="item_description">
   <div class="item_title_cont">
    <p class="item_name"><?php echo $item->name ?></p>
    <!-- <a href="#" class="item_seller"> seller: Priyantha Mahaulpathagama <span><i class="fas fa-check-circle"></i></span></a> -->
    <p class="item_address"><?php echo $item->district ?></p>
   </div>
   <div class="item_price_cont">
    <p class="item_price"><?php echo $item->price?> /<span>kg</span></p>
    <p class="item_available"><?php echo $item->stock ?> /<span><?php echo $item->unit ?>
   </div>
  </div>
 </div>
  <div class="item_btns_cont">
   <div class="delete_btn_cont">
    <button class="delete_btn">
     <i class="fas fa-trash-alt delete_icon"></i>
   </button>
  </div>
  <div class="qty_btn_cont">
     <button class="btn_remove">-</button>
       <input class="qty" type="number" value="<?= intval($item->qty); ?>">
     <button class="btn_add">+</button>
   </div>
 </div>
</div>
    <!-- item end  -->


<?php }?>

    
    </div>
    <div class="cart_price_container">
       <div class="cart_price_title">
        <h4>Order Summery</h4>
        <div class="subtotal">
         <p>Subtotal</p>
         <p class="value">50000</p>
        </div>
        <div class="delivery">
         <p>Delivery Fee</p>
         <p class="value">5000</p>
        </div>
       </div>
       <div class="total_cont">
        <div class="total">
         <p>Total</p>
         <p>55000</p>
        </div>
       </div>
       <div class="checkout_btn_cont">
        <button class="checkout_btn btn">
         Check Out 
         <i class="fas fa-arrow-right"></i>
        </button>
       </div>
    </div>
  </div>
  <?php
   }else{
    ?>

    <div class="empty_msg_cont">

     <img src="<?php echo URLROOT ?>/assets/images/cart.jpg" class="cart_img" />
     
     <h3>Your cart is currently empty.</h3>
     
     <p>
      Before you proceed to checkout you must add some products to your shopping cart.
      You will find a lot of interesting products on our "Marketplace"</p>
      
      <a href="<?php echo URLROOT ?>/marketplace" class="btn">Go to Marketplace</a>
      
     </div>
    <?php
   }
 ?>


 </section>





  <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/cart.js"></script>
</body>
</html>