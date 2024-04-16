<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
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

<div class="profile">
   
        <div class="hed">
            <h3>Home</h3>
        </div>

        <div class="main-container">
           
        


            <div class="greeting_card">

            <?php
                    // Fetching weather forecast (You need to implement this part)
                    $weather_forecast = "Sunny"; // Example weather forecast

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
                        <div class="weather">Weather: <?php echo $weather_forecast; ?></div>
                    </div>    
                                
            </div>

            <div class="subHed">
            <h3>Ongoing Order</h3>
        </div>


                    
            <div class="first_col">

                <div class="card card-ongoingOrder">

                <?php if($data['details']){
?>



                    <div class="card_details">
                        <div class="left_details">
                            <div class="card_heading"><?php echo $data['details']->name; ?></div>
                            <div class="card_detailss">Seller: <?php echo $data['rowS']->name; ?></div>
                            <div class="card_detailss"> <?php echo $data['details']->quantity;?>
                                                        <?php echo $data['details']->unit;?>
                            </div>
                        </div>
                        
                        <div class="right_details">
                            <div class="rate_details">Rate: <?php echo $data['details']->deliver_fee;?>/=</div>
                        </div>
                    </div>

                    <div class="image_details">
                        <div class="image">
                            <img class="item_img" src="<?php echo URLROOT.'/store/items/carrot.jpg';?>">
                        </div>

                        <div class="order_details">
                            <div class="details"><i class="fa-solid fa-location-dot"></i>  From:  <?php echo $data['rowS']->address;?></div>
                            <div class="details"><i class="fa-solid fa-truck-fast"></i>  To: <?php echo $data['rowB']->address;?>  </div>
                            <div class="details"><i class="fa-solid fa-user"></i>  Buyer:<?php echo $data['rowB']->name;?></div>
                        
                            <div class="view_btn">
                                <a href="#"> <button class="btn">View More</button></a>
                            </div>    
                            

                        </div>
                    </div>

                    <?php
                }else{?>
                  
                    <div class="no_order">
                        No ongoing orders currently
                    </div>




                    <?php }?>
                </div>


                <div class="card card-orderStatus">

                    <div class="card_details">
                        <div class="left_details">
                            <div class="card_heading_oos">Ongoing Order Status</div>
                
                        </div>
                        
                    
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

                    
                    <?php for ($i = 1; $i <= 3; $i++):?> 
                        <div class="recomended_order">

                        <div class="rec_odr_img">
                                <img class="item_img" src="<?php echo URLROOT.'/store/items/pine.jpg';?>">
                            </div>

                            <div class="rec_odr_details_withBtn">
                                <div class="rec_odr_details">
                                    <div class="rec_odr_h">Pineapple</div>
                                    <div class="rec_odr_txt">From: Galle</div>
                                    <div class="rec_odr_txt">To: Ratnapura</div>
                                </div>

                                <div class="view_more_btn"><a href="#"> <button class="btn">View More</button></a></div>    
                               
                            </div>


                        </div>
                            <?php endfor ?>

                    </div>

                    <div class="see_all_btn">

                            <div class="view_more_btn"><a href="<?php echo URLROOT.'/orders'?>"> <button class="btn">View All Available Orders</button></a></div>  
                  
                    </div>



            </div>






            </div>



            
        </div>

        </div>

        <!-- Content -->
    
        </div>
        </div>
    </div>
    
    <script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>

</body>
</html>