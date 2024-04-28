<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryHome.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php
     require APPROOT. '/views/layouts/navbar2.php'; 
     ?>
<div class="main_container">

<?php 
   require APPROOT. '/views/layouts/deliverySidebar.php';  ?>

<div class="container_content">

<div class="container_title_cont">
  <p class="container_title">Home</p>
  </div>

<div class="profile">
   
        <!-- <div class="hed">
            <h3>Home</h3>
        </div> -->


        <div class="main-container">

        <?php if($data['hasVehicle']==0){ ?>


<!-- This is the card if the Delivery agent has no vehicles added -->
<div class="cardNo">
        <div class="noVehicleCard">
             
            <div class="heading">
            Welcome to <span class="govi">Govisaviya</span> Delivering! 
            </div>
            <div class="details ">
            We're thrilled to have you here. To get started with deliveries, 
            ensure you've added a vehicle to your account.
            </div><div class="details details_two">
            Let's begin!
            </div>

            <div class="addVehicleCard">
                <div class="image">
                   <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img">
                </div>
                <div class="helo">
                    <button class="button addVehicle"><a href="<?php echo URLROOT.'/deliveryVehicles'?>">Add Vehicle</a></button>
                </div>

            </div>

        </div>

        </div>















        <!-- <div class="main-container"> -->

           
        <?php }else{ ?>



            <div class="greeting_card">

            <?php
                    

                    // Set the time zone to Sri Lanka
                    date_default_timezone_set('Asia/Colombo');

                    // Getting current date
                    $current_date = date("l, F j, Y");

                    // Greeting message based on time of day
                    $current_hour = date('G');
                    if ($current_hour >= 5 && $current_hour < 12) {
                        $greeting_message = "Good morning, Respected Driver!";
                    } elseif ($current_hour >= 12 && $current_hour < 18) {
                        $greeting_message = "Good afternoon, Respected Driver!";
                    } elseif ($current_hour >= 18 && $current_hour < 21) {
                        $greeting_message = "Good evening, Respected Driver!";
                    }else{
                        $greeting_message = "Greetings, Respected Driver!";
                    }
                    ?>

                    <div class="greeting-card">
                        <div class="greeting"><?php echo $greeting_message; ?></div>
                        <div class="date"><?php echo $current_date; ?></div>
                        
                    </div>    
                                
            </div>

            


        
                            <?php
                                if($data['details']){ 
                                    ?>

<div class="subHed">
            <h3>Map</h3>
        </div>

<div class="map">


                                  


                                <div id="map_cont" data-start='gampaha' data-end='matara'> 
                                    <input id="start" type="hidden" value="<?php echo $data['details']->seller_address  ?>" name="start">
                                    <input id="end" type="hidden" value="<?php echo $data['details']->order_address  ?>" name="end">
                                    <?php       
                                    require APPROOT. '/views/layouts/mapCurrentLoc.php'; 
                                ?>
                                    </div>
                                    </div>
                                <?php
                                }
                                ?>

<div class="subHed">
            <h3>Ongoing Order</h3>
        </div>

                    
            <div class="first_col">

                <div class="card card-ongoingOrder">

                <?php if($data['details']){
?>



                    <div class="card_details">
                        <div class="left_details">
                            <div class="card_heading"><?php echo $data['details']->item_name; ?></div>
                            <div class="card_detailss">Seller: <?php echo $data['details']->seller_name; ?></div>
                            <div class="card_detailss"> <?php echo $data['details']->quantity;?>Kg
                                                        
                            </div>
                        </div>
                        
                        <div class="right_details">
                            <div class="rate_details">Rate: <?php echo $data['details']->deliver_fee;?>/=</div>
                        </div>
                    </div>

                    <div class="image_details">
                        <div class="image">
                            <img class="item_img" src="<?php echo URLROOT . '/store/items/'.$data['details']->item_img ?>">
                        </div>

                        <div class="order_details">
                            <div class="details"><i class="fa-solid fa-location-dot"></i>  From:  <?php echo $data['details']->seller_address;?></div>
                            <div class="details"><i class="fa-solid fa-truck-fast"></i>  To: <?php echo $data['details']->buyer_address;?>  </div>
                            <div class="details"><i class="fa-solid fa-user"></i>  Buyer:<?php echo $data['details']->buyer_name;?></div>
                        
                            <div class="view_btn">
                                <a href="<?php echo URLROOT ?>/orders/ongoing/"> <button class="btn">View More</button></a>
                            </div>    
                            

                        </div>
                    </div>

                    <?php
                }else{?>
                  
                    <div class="no_order">
                        No ongoing orders currently
                        <div class="buttons">
                        <a style="margin-top:1rem;"class="btn btnNo"href="<?php echo URLROOT;?>/orders/">View Orders</a>
                        </div>
                    </div>





                    <?php }?>
                </div>


                <div class="card card-orderStatus">

                    <div class="card_details">
                        
                            <div class="card_heading_oos">Ongoing Order Status</div>

                        <?php if(!$data['details']){ ?>

                            <div class="progress_bar">
                            <div class="image">
                   <img src="<?php echo URLROOT ?>/assets/images/delivery_reg.png" alt="img" class="del_img" style="width:3rem">
                </div>                  
                            <div class="card_heading_oos no_accept">Please accept an order to see the Order Status</div>
                        </div>

                        <?php }elseif($data['details']->order_status=="deliver_assigned"){ ?>    
                                                            
                                        <div class="progress_bar">
                                            
                                            <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Order Confirmed</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Picked from Seller</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                                
                                         </div>

                            <?php }elseif($data['details']->order_status=="pickedup"){ ?>

                                <div class="progress_bar">
                                    
                                <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Order Confirmed</div>
                                <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Picked from Seller</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Quality confirmed: Pickup</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                                
                                         </div>


                                <?php }elseif($data['details']->order_status=="delivering"){ ?>

                                    <div class="progress_bar">
                                    <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Order Confirmed</div>
                                    <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Picked from Seller</div>
                                    <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Quality confirmed: Pickup</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i></i> Order Delivered</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                                
                                         </div>

                                    <?php }elseif($data['details']->order_status=="delivered"){ ?>

                                        <div class="progress_bar">
                                        <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Order Confirmed</div>
                                        <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Picked from Seller</div>
                                        <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Quality confirmed: Pickup</div>
                                        <div class="more_info"><span class="g"><i class="fa-solid fa-circle-check"></i></span></i> Order Delivered</div>
                                            <div class="more_info"><i class="fa-regular fa-circle-check"></i> </i> Quality Confirmed: Drop-off</div>
                                
                                         </div>

                                        <?php }?>
                                
                            
                        
                        
                    
                    </div>

                   



                </div>



            </div>



            <!-- This is the Second Col --------------------------------->

            <div class="subHed">
            <h3>Recomended Orders</h3>
        </div>

            <div class="second_col">

            <div class="card card-recomendedOrder">
                    
                    <div class="recomended_orders">
                        <!-- <div class="recomended_order_1">

                            <div class="rec_odr_img">
                                <img class="item_img" src="<?php echo URLROOT.'/store/items/guava.png';?>">
                            </div>

                            <div class="rec_odr_details_withBtn">
                                <div class="rec_odr_details">
                                    <div class="rec_odr_h">Guava</div>
                                    <div class="rec_odr_txt">From: Galle</div>
                                    <div class="rec_odr_txt">To: Ella</div>
                                </div>

                                <div class="view_more_btn"><a href="#"> <button class="btn">View More</button></a></div>    
                               
                            </div>
                        </div> -->


                        <!-- <div class="recomended_order_2">

                        <div class="rec_odr_img">
                                <img class="item_img" src="<?php echo URLROOT.'/store/items/coc.jpg';?>">
                            </div>

                            <div class="rec_odr_details_withBtn">
                                <div class="rec_odr_details">
                                    <div class="rec_odr_h">Coconut</div>
                                    <div class="rec_odr_txt">From: Galle</div>
                                    <div class="rec_odr_txt">To: Colombo</div>
                                </div>

                                <div class="view_more_btn"><a href="#"> <button class="btn">View More</button></a></div>    
                               
                            </div>

                        </div> -->

                        
                        <?php
                        $itemCount = 0; // Initialize counter variable
                        if ($data['reco'] && is_array($data['reco'])) :
                            foreach ($data['reco'] as $item) :
                                
                                        // Check if item count is less than 3
                                        if ($itemCount < 3) :
                                            ?>
                                            <div class="recomended_order">
                                                <div class="rec_odr_img">
                                                    <img class="item_img" src="<?php echo URLROOT . '/store/items/' . $item->item_img; ?>">
                                                </div>
                                                <div class="rec_odr_details_withBtn">
                                                    <div class="rec_odr_details">
                                                        <div class="rec_odr_h"><?php echo $item->item_name; ?></div>
                                                        <div class="rec_odr_txt">From: <?php echo $item->seller_address; ?></div>
                                                        <div class="rec_odr_txt">To: <?php echo $item->buyer_address; ?></div>
                                                    </div>
                                                    <div class="view_more_btn"><a href="<?php echo URLROOT ?>/orders/info/<?php echo $item->order_id ?>/<?php echo $item->order_item_id ?>/<?php echo $item->order_type ?>"><button class="btn">View More</button></a></div>
                                                </div>
                                            </div>
                                            <?php
                                            $itemCount++; // Increment counter variable
                                        else:
                                            break; // Exit the loop once item count reaches 3
                                        endif;
                                  
                            endforeach;
                        else:
                            // If $data['reco'] is empty, display "No recommended orders"
                            echo "No recommended orders";
                        endif;
                        ?>


                            

                    </div>
                        <?php if($data['reco'] && is_array($data['reco'])): ?>

                    <div class="see_all_btn">

                            <div class="view_more_btn"><a href="<?php echo URLROOT.'/orders'?>"> <button class="btn">View All Available Orders</button></a></div>  
                  
                    </div>
<?php
                endif;
                        ?>

            </div>


<?php }?>
<!-- --------------------------------------------- -->


            </div>



            
        </div>

        </div>

        <!-- Content -->
    
        </div>
        <!-- </div> -->
    <!-- </div> -->
    <script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliverySidebar.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/deliveryHomeMap.js"></script>

</body>
</html>