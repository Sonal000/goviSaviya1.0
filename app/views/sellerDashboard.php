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
    
</head>
<body>
<?php
 require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/sellersidebar.php'; ?>
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
                    <img  class="prof_img "src="<?php echo URLROOT.'/store/profiles/'.$data['seller_img'] ;?>" alt="">
                </div>
                <!-- <div class="govi_img">
                <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
                </div> -->
                <div class="text_cont">
                    <div class="name_cont">
                        Hello <?php echo $data['seller_name'] ?>
                    </div>
                    <div class="welcome_saviya">
                     <div class="welcome">Welcome to Govi Saviya</div>
                    </div>
                    <div class="happy_selling">
                        Happy Selling
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
                        <img class="normal_img"src="<?php echo URLROOT.'/assets/images/orderplaced.png' ;?>" alt="">
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Total orders</h2>
                            <h3><?php echo $data['total'] ?></h3>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                                <i class="fas fa-store sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Purchase - <?php echo $data['Porders'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-gavel sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Auction - <?php echo $data['Aorders'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-poll-h sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Requests - <?php echo $data['Rorders'] ?></span>
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
                            <h3><?php echo $data['Trevenue'] ?></h3>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-store sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Purchase - <?php echo $data['Prevenue'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-gavel sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Auction - <?php echo $data['Arevenue'] ?></span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                            <i class="fas fa-poll-h sidebar_icon"></i>
                            </span>
                            <span class="text-desktop"> Requests - <?php echo $data['Rrevenue'] ?></span>
                        </div>
                    </div>
                </div>


                <div class="col-boxes-2">
                <div class="card-first">
                    <div class="card-body">
                    <div class="align-items-center first">
                            <div>
                                <h6 class="getmiddle">
                                    <span class="fas fa-globe-europe"></span>
                                    My Listings
                                </h6>
                            </div>
                            <!-- <div>
                                <a href="#" class="font-weight-bold">#755
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div> -->
                        </div>
                        <div class="align-items-center first">
                            <div>
                                <h6>
                                <i class="fas fa-store sidebar_icon"></i>
                                    Marketplace Posts
                                </h6>
                            </div>
                            <div>
                            <span class="text-desktop"> <?php echo $data['mposts'] ?></span>
                            </div>
                        </div>
                        <div class="align-items-center first">
                            <div>
                                <h6>
                                <i class="fas fa-gavel sidebar_icon"></i>
                                        completed Auctions
                                </h6>
                            </div>
                            <div>
                            <span class="text-desktop"> <?php echo $data['auction'] ?></span>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
               
            </div>

                
                <!------------------first row graph-------------->
               
            </div>
        </div>
        <div class="row-box" style = border:2px solid red>
            <div class="col-boxes-1">
                


                <div class="col-table">
                    <div class="table-section">
                        <div class="header-table">
                            <h2> My Order Details</h2>
                            <!-- <a href="#">see all</a> -->
                        </div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="las la-sort"></span> Buyer name</th>
                                    <th><span class="las la-sort"></span> Order Type</th>
                                    <th><span class="las la-sort"></span> Product/stock</th>
                                    <th><span class="las la-sort"></span> Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                        if($data['orders']){
        
                        foreach($data['orders'] as $orders){
                            if($orders){
                            foreach($orders as $order){
                            ?>
                                <tr>
                                    <th>
                                        <?php echo $order->buyer_name ;?>
                                    </th>
                                    <td>
                                    <?php echo $order->order_type ;?>
                                    </td>
                                    <td>
                                    <?php echo $order->item_name ;?> <?php echo $order->quantity ;?> KG
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <!-- <span class="fas fa-arrow-up text-danger"></span> -->
                                            <?php echo $order->order_status ;?>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>

                                        /demo/admin/forms.html

                                    </th>
                                    <td>
                                        2,987
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="fas fa-arrow-down text-arrow-down"></span>
                                            43,52%
                                        </div>
                                    </td>
                                </tr>
                                <tr>

                                    <th>/demo/admin/util.html</th>

                                    </td>
                                    <td>
                                        2,844
                                    </td>
                                    <td>
                                        294
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="fas fa-arrow-down text-arrow-down"></span>
                                            32,35%
                                        </div>
                                    </td>
                                </tr>
                                <tr>

                                    <th>/demo/admin/validation.html</th>

                                    </td>
                                    <td>
                                        2,050
                                    </td>
                                    <td>
                                        $147
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="fas fa-arrow-up text-danger"></span>
                                            50,87%
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>/demo/admin/modals.html</th>
                                    </td>
                                    <td>
                                        1,483
                                    </td>
                                    <td>
                                        $19
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="fas fa-arrow-down text-arrow-down"></span>
                                            32,24%
                                        </div>
                                    </td>
                                </tr> -->
                                <?php
                }}}
        }else{
            ?>
            <tr>
                                    <th>
                                        No ongoing orders
                                    </th>
                                    <!-- <td>
                                        3171
                                    </td>
                                    <td>
                                        $205
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="fas fa-arrow-up text-danger"></span>
                                            42,55%
                                        </div>
                                    </td> -->
                                </tr> <?php
        }
    ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                

             </div>

             <div class="col-boxes-2">
                <div class="card-first">
                    <div class="card-body">
                        <div class="align-items-center first">
                            <div>
                                <h6 class="getmiddle">
                                <i class="fa-solid fa-circle-info sidebar_icon"></i>
                                    More Details
                                </h6>
                            </div>
                            <!-- <div>
                                <a href="#" class="font-weight-bold">#755
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div> -->
                        </div>
                        <div class="align-items-center">
                            <div>
                                <h6>
                                <i class="fa-solid fa-person-circle-question sidebar_icon"></i>
                                    Available Requests
                                </h6>
                                <!-- <div class="small">
                                    United States
                                    <span class="fas fa-angle-up text-success"></span>
                                </div> -->
                            </div>
                            <div>
                            <div>
                            <span class="text-desktop"> <?php echo $data['requests_count'] ?></span>
                            </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div>
                                <h6>
                                    <i class="far fa-star  sidebar_icon" ></i>
                                    Reviews
                                </h6>
                                <!-- <div class="small">
                                    United States
                                    <span class="fas fa-angle-up text-success"></span>
                                </div> -->
                            </div>
                            <div>
                            <div>
                            <span class="text-desktop"> <?php echo $data['review_count'] ?></span>
                            </div>
                            </div>
                        </div>
                        <div class="align-items-center">
                            <div>
                                <h6>
                                <i class="fa-solid fa-user-slash sidebar_icon"></i>
                                     penalties
                                </h6>
                                <!-- <div class="small">
                                    United States
                                    <span class="fas fa-angle-up text-success"></span>
                                </div> -->
                            </div>
                            <div>
                            <div>
                            <span class="text-desktop"> <?php echo $data['penalty_count'] ?></span>
                            </div>
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
               
            </div>

            


                    <!-- <div class="card">
                    <div class="card-left">
                        <img  class ="review_icon" src="<?php echo URLROOT.'/store/items/review_icon.png'?>" alt="">
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Reviews</h2>
                        </div>
                       
                        <div class="last-card-text">
                            <span class="icon-desktop">
                                <i class="fas fa-desktop"></i>
                            </span>
                            <span class="text-desktop"> Auction 70%</span>
                        </div>
                        
                    </div>
                </div> -->
                
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