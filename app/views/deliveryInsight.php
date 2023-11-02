<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Auction</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryInsight.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/deliverySidebarWithoutImg.php'; 
 ?>
<div class="profile">
    <div class="auction_page">
        <div class="hed">
            Delivery Insight
        </div>
        
        
<!-- 1st row of Cards------------------------------------------------------------------------------------- -->

        <div class="mycardd">

            <div class="productimg">
                
                <div class=square_card>

                    <div class="card_h">Total Orders Completed</div>
                    <div class="num_complete">187</div>

                    <div class="growth_details">
                        <i class="fa-solid fa-chart-line"></i>
                        <div class="number_of_growth">+15.50% than last month</div>
                    </div>
                    <div class="button_more_details">
                    <botton class="more_details_button"><a href=""> View More</a></botton>
                    </div>



                </div>



                <div class=square_card>

                    <div class="card_h">Overall Ratings</div>
                    <div class="num_complete">4.5 <i class="fa-solid fa-star"></i></div>

                    <div class="growth_details">
                        <i class="fa-solid fa-chart-line"></i>
                        <div class="number_of_growth">+3 New Ratings</div>
                    </div>
                    <div class="button_more_details">
                    <botton class="more_details_button"><a href=""> View More</a></botton>
                    </div>



                </div>

                

<!-- 2nd row of Cards------------------------------------------------------------------------------------- -->



            </div>

            <div class="right_side">
             
            <div class=square_card>

                    <div class="card_h">Total Revenue</div>
                    <div class="num_complete">$12,309.98</div>

                    <div class="growth_details">
                        <i class="fa-solid fa-chart-line"></i>
                        <div class="number_of_growth">+9.67% than last month</div>
                    </div>
                    <div class="button_more_details">
                    <botton class="more_details_button"><a href=""> View More</a></botton>
                    </div>



                </div>

                <div class=square_card>

<div class="card_h">Delivery Completion Rate</div>
<div class="num_complete">96.5%</div>

<div class="growth_details">
    <i class="fa-solid fa-chart-line"></i>
    <div class="number_of_growth_red">-0.6% than last month</div>
</div>
<div class="button_more_details">
<botton class="more_details_button"><a href=""> View More</a></botton>
</div>



</div>






            
            </div>



        </div>
        


            
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
