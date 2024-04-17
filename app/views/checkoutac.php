<!DOCTYPE html>
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Checkout</title>
 <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/checkout.css">
</head>
<body>
 <!-- navbar ======================= -->
<?php
 include APPROOT.'/views/layouts/mainNavbar.php';  
?>
 <!-- navbar end ======================= -->


<div class="checkout_page section-center">

    <div class="checkout_title">
        <h4>checkout</h4>
    </div>
    <form action="<?php echo URLROOT ?>/auctionC/placeOrder" method="POST" id="placeOrderForm">
    <div class="details_cont">
    <div class="order_details">


<section class="section_cont">
<div class="sec_title order_title">
    <h4>Your Order</h4>
    <a href="<?php echo URLROOT; ?>/auctionC/iteminfo/<?php echo $data['auction_id'] ?>" class="return_to_cart">return to item</a>
</div>
<div class="sec_content">
    <div class="items_cont">
        <ul>
            <!-- items======== -->
            <?php if($data['items']){
                    foreach($data["items"] as $item){
                ?>
            <li class="item" data-price="<?php echo $item->price; ?>" data-qty="<?php echo $item->qty; ?>">
                <div class="item_details">
                    <div class="item_name_cont">

                        <p class="item_name">
                            <?php echo $item->name; ?></p>
                        <div class="item_qty">
                            <p><?php echo $item->qty; ?> <span><?php echo $item->unit; ?></span></p>
                        </div>
                    </div>
                    <div class="item_price">
                        <p><span>Rs</span> <?php echo $item->price * $item->qty; ?></p>
                    </div>
                </div>
                <div class="item_details">
                    <div class="item_name_cont">

                        <p class="delivery_name">
                            delivery</p>
                    </div>
                    <div class="delivery_price">
                        <p><span>Rs</span> <?php echo (getDistancefee($item->address,$data['buyerAddress'])); ?></p>
                    </div>
                </div>
            </li>
                        <?php }
            }
                        ?>
            <!-- ============================ -->
        </ul>
    </div>

    <div class="total_container">
        <div class="tot_cont">
            <p>Sub Total</p>
            <p class="price">Rs<span class="subvalue">0</span></p>
        </div>
        <div class="tot_cont">
            <p>Delivery Fee</p>
            <?php 
            if($data['totalDeliveryfee']){
                ?>
                    <p class="price">Rs<span><?php echo $data['totalDeliveryfee']; ?></span></p>
                <?php
            }else{
                ?>
                <p class="desc_policy">not available</p>
            <?php }
            ?>
            
        </div>
        <div class="tot_container">
        <div class="tot_cont">
            <p>Total</p>

                    <p class="price">Rs<span data-delivery=<?php echo $data['totalDeliveryfee']; ?> class="totvalue">0</span></p>

            
        </div>
        <p class="desc_policy">By continuing, you agree to Govisaviyas's Terms of Service and Privacy Policy. We'll send this Summary to Govisaviya adminstration.</p>

        <p class="order_req"></p>
        <div class="order_btn_cont">
            <!-- <a href="<?php echo URLROOT."/cart/placeorder" ?>" class="btn place_order_btn">Place Order</a> -->
            <input type="submit" class="btn place_order_btn" name="place_order" value="Go to Payments">
        </div>
        </div>
    </div>

</div>
</section>

</div>

        <div class="delivery_details">

        <section class="section_cont">
        <div class="sec_title">
            <h4>Contact information</h4>
        </div>
        <div class="sec_content">
            <div class="input_content">
                            <div class="input_cont">
                                <label for="name" class="input_label">Name</label>
                                <input type="text" name="name" class="input_item" id="name" value="<?php echo $data["buyerName"]?>" disabled>
                                <p class="invalid_msg"></p>
                            </div>
                            
                            <div class="input_cont">
                                <label for="name" class="input_label">Email</label>
                            <input type="text" name="email" id="email" class="input_item " value="<?php echo $data['buyerEmail'];?>" disabled>
                            <p class="invalid_msg"></p>                            
                            </div>

                            <div class="input_cont">
                                <label for="name" class="input_label">Mobile No</label>
                                <input type="text" name="mobile" id="mobile" class="input_item" value="<?php echo $data["buyerMobile"]?>" >
                                <p class="invalid_msg"></p>
                            </div>

                        
    </div>

</div>
</section>

<section class="section_cont">
<div class="sec_title">
            <h4>Delivery address</h4>
        </div>
        <div class="sec_content">
        <div class="input_content">
                <div class="input_cont input_cont_long">
                    <label for="address" class="input_label">address</label>
                    <input type="text" name="address" class="input_item" id="address" value="<?php echo $data["buyerAddress"]?>">
                    <p class="invalid_msg"></p>
                </div>
                            <div class="input_cont">
                                <label for="company" class="input_label">Company</label>
                                <input type="text" name="company" class="input_item" id="address" value="" placeholder="optional">
                                <p class="invalid_msg"></p>
                            </div>
                            
                            <div class="input_cont ">
                                <label for="city" class="input_label">City</label>
                                <input type="text" name="city" class="input_item" id="city" value="<?php echo $data["buyerCity"]?>" >
                                <p class="invalid_msg"></p>
                            </div>
                            <div class="input_cont">
                                <label for="postalCode" class="input_label">Postal Code</label>
                                <input type="text" name="postalCode" class="input_item" id="postalCode">
                                <p class="invalid_msg"></p>
                            </div>

    </div>
 </div>

</section>

    <!-- <section class="section_cont">
        <div class="sec_title">
            <h4>Address on Map</h4>
        </div>
        <div class="sec_content">
 
       <?php  
       
       maps($data["buyerAddress"]);
       
       ?>
        </div>
    </section> -->

        </div>

    </div>
</form>

</div>



  <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/checkout.js"></script>
</body>
</html>





<body>
    <div class="d1">
        <div class="d2"></div>
        <div class="d3"></div>
    </div>
</body>