<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/*" size="32*32" href="images/rocket.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="JavaScript/main.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/adminDashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliveryInsight.css">
    
</head>
<body>
<?php
require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/deliverySidebar.php';  ?>
    <div class="container_content">


    <!-- =================================================================================-->
    <!-- =================================================================================-->

         <!------------------main-------------->
    <main>
        <!-- <div class="top-header">
            <div class="logo">
                <a href="index.html"> <img src="images/rocket.png"></a>
            </div>
            <div>
                <label for="active" class="menu-btn">
                    <i class="fas fa-bars" id="menu"></i>
                </label>
            </div>
        </div> -->
        <!------------------header-------------->
        <header>
            <div class="content">
                <div class="btn-left">
                    <button class="btn btn-green">
                        
                        Dashboard
                    </button>
                </div>
                <!-- <div class="btn-right">
                    <button class="btn btn-sec left-radius">Share</button>
                    <button class="btn btn-sec right-radius">Export</button>
                </div> -->
            </div>
            <div class="card">
                <div class="prof_img_cont">
                    <img  class="prof_img "src="<?php echo URLROOT.'/store/profiles/'.$data['profile']->prof_img ;?>" alt="hello">
                </div>
                <!-- <div class="govi_img">
                <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
                </div> -->
                <div class="text_cont">
                    <div class="name_cont">
                        Hello <?php echo $data['profile']->name ?>
                        <div class="happy_selling" style="font-size:18px">
                        Happy Delivering
                    </div>
                    </div>
                    
                    
                </div>
                
            </div>
        </header>
        <!------------------content-------------->
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="card-left">
                        <div class="card-icon icon-one">
                        <img style="width:60px" class="normal_img"src="<?php echo URLROOT.'/assets/images/delivery_reg.png' ;?>" alt="">
                        </div>
                    </div>
                    <div class="card-right">
       
                        <div class="card-top-info">
                            <h2>Total orders</h2>
                            <h3><?php echo $data['totalOrders']?></h3>
                        </div>
                        <!-- --------------------------------------------------------- -->
                        <?php
                            $currentMonth = date('F');


                            $previousMonth = date('F', strtotime('-1 month'));


                            $previousPreviousMonth = date('F', strtotime('-2 months'));

                            ?>
                        <!-- --------------------------------------------------------                        -->
                        <!-- ---------------------------------------------------------------- -->
                        <div class="last-card-text">
                            <span class="icon-desktop">
                                <i class="fas fa-store sidebar_icon"></i>
                            </span>
                            <span class="text-desktop">In <?php echo $currentMonth ?> - <?php echo $data['thisMonth'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-gavel sidebar_icon"></i>
                            </span>
                            <span class="text-desktop">In <?php echo $previousMonth ?> - <?php echo $data['prevMonth'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-poll-h sidebar_icon"></i>
                            </span>
                            <span class="text-desktop">In <?php echo $previousPreviousMonth ?> - <?php echo $data['prevPrevMonth'] ?></span>
                        </div>
                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-left">
                        <div class="card-icon icon-two">
                        <img class="normal_img"src="<?php echo URLROOT.'/assets/images/money.png' ;?>" alt="">
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Total Revenue</h2>
                            <h4>Rs.<?php echo number_format($data['totalRevenue'], 2) ?>/=</h4>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-store sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> In <?php echo $currentMonth ?> - Rs.<?php echo $data['thisRevenue'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-gavel sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> In <?php echo $previousMonth ?> -Rs.<?php echo $data['prevRevenue'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-poll-h sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> In <?php echo $previousPreviousMonth ?>- Rs.<?php echo $data['prevPrevRevenue'] ?></span>
                        </div>
                    </div>
                </div>


                <div class="col-boxes-2">
                <div class="card-first">
                    <div class="card-body">
                    <div class="align-items-center first">
                            <div>
                                <h6 class="getmiddle">
                                    
                                    Total Reviews
                                </h6>
                            </div>
                            <!-- <div>
                                <a href="#" class="font-weight-bold">#755
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div> -->
                        </div>
                       
                        <div class="align-items-center first">
                            <div class="abc">
                                <h6>
                                <i class="fas fa-gavel sidebar_icon"></i>
                                        Reviews Received
                                </h6>
                            </div>
                            <div class="abc">
                            <span class="text-desktop"> <?php echo $data['reviews'] ?></span>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
               
            </div>

            <div class="card">
                
                    <div class="card-left">
                        <div class="card-icon icon-one">
                        <i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="card-right">
       
                        <div class="card-top-info">
                            <h2>Orders Growth</h2>

                            <h2><?php if($data['orderGrowth']<=0){ ?>
                            <span class="text-desktop" style="font-size:18px; font: weight 600px;"><?php echo $data['orderGrowth'] ?> </span><span style="font-size:16px">than last month</span>
                            <?php }else{?>

                           
                            <span class="text-desktop" style="font-size:18px; font: weight 600px;">+<?php echo $data['orderGrowth'] ?> </span><span style="font-size:16px">than last month</span>
                            <?php }?></h2>
                        </div>
                        <!-- --------------------------------------------------------- -->
                        <?php
                            $currentMonth = date('F');


                            $previousMonth = date('F', strtotime('-1 month'));


                            $previousPreviousMonth = date('F', strtotime('-2 months'));

                            ?>
                        <!-- --------------------------------------------------------                        -->
                        <!-- ---------------------------------------------------------------- -->
                        <div class="last-card-text">
                            

                            


                        </div>
                       
                        
                    </div>
                </div>


                <div class="card">
                
                <div class="card-left">
                    <div class="card-icon icon-one">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    </div>
                </div>
                <div class="card-right">
   
                    <div class="card-top-info">
                        <h2>Revenue Growth</h2>

                        <h2><?php if($data['revenueGrowth']<=0){ ?>
                        <span class="text-desktop" style="font-size:18px; font: weight 600px;">Rs.<?php echo number_format($data['revenueGrowth'], 2) ?>/= </span><span style="font-size:16px">than last month</span>
                        <?php }else{?>

                       
                        <span class="text-desktop" style="font-size:18px; font: weight 600px;">+Rs.<?php echo number_format($data['revenueGrowth'], 2) ?>/= </span><span style="font-size:16px">than last month</span>
                        <?php }?></h2>
                    </div>
                    <!-- --------------------------------------------------------- -->
                    <?php
                        $currentMonth = date('F');


                        $previousMonth = date('F', strtotime('-1 month'));


                        $previousPreviousMonth = date('F', strtotime('-2 months'));

                        ?>
                    <!-- --------------------------------------------------------                        -->
                    <!-- ---------------------------------------------------------------- -->
                    <div class="last-card-text">
                        

                        


                    </div>
                   
                    
                </div>
            </div>


            <!-- ----------------------------------------------------------- Average -->

            <div class="card">
                
                <div class="card-left">
                    <div class="card-icon icon-one">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                </div>
                <div class="card-right">
   
                    <div class="card-top-info">
                        <h2>Average Revenue per Order</h2>

                        <h2>Rs.<?php echo number_format($data['averageRevenue'], 2) ?>/=</h2>
                    </div>
                    <!-- --------------------------------------------------------- -->
                    <?php
                        $currentMonth = date('F');


                        $previousMonth = date('F', strtotime('-1 month'));


                        $previousPreviousMonth = date('F', strtotime('-2 months'));

                        ?>
                    <!-- --------------------------------------------------------                        -->
                    <!-- ---------------------------------------------------------------- -->
                    <div class="last-card-text">
                        

                        


                    </div>
                   
                    
                </div>
            </div>
                
                <!------------------first row graph-------------->
               
            </div>
        </div>
        
    </main>
    <footer>
        <!-- <div class="content">
            <div class="footer-copyright">
                <p>
                    Copyright © Govisaviya <span></span>
                </p>
            </div>
            <div class="footer-menu">
                <ul>
                    <li><a href="#">About</a></li>

                    <li><a href="#">Themes</a></li>

                    <li><a href="#">Blog</a></li>

                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div> -->

    </footer>



    <!-- ======================================================================== -->
    <!-- ======================================================================== -->


    </div>
</div>


</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
<!-- <script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script> -->
<script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="<?php echo URLROOT ?>/assets/js/graph.js"></script>
</html>