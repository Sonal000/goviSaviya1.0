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
 require APPROOT. '/views/layouts/adminsidebar.php'; ?>
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
        </header>
        <!------------------content-------------->
        <div class="content">
            <div class="cards ">
                <div class="card" >
                    <div class="card-left">
                        <div class="card-icon icon-one">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Total orders</h2>
                            <h3><?php echo $data['orders_count'] ;?></h3>
                        </div>
                        <!-- <small>
                            Feb 1 - Apr 1,
                            <i class="fas fa-globe-europe"></i>
                            Base on district
                        </small> -->
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['orders_countPurchase'] ;?></span>
                            Purchase
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['orders_countAuction'] ;?></span>
                            Auction
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['orders_countRequest'] ;?></span>
                            Request
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-left">
                        <div class="card-icon icon-two">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Users</h2>
                            <h3><?php echo $data['users_count'];?></h3>
                        </div>
                        <!-- <small>
                            Feb 1 - Apr 1,
                            <i class="fas fa-globe-europe"></i>
                            Revenue
                        </small> -->
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['sellers_count'] ?></span>
                            Sellers
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['buyers_count'] ?></span>
                            Buyers
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success"><?php echo $data['agents_count'] ?></span>
                            Deliver Agents
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-left">
                        <div class="icon-chart">
                            <img src="images/pie-chart.png">
                            <!-- <svg width="100%" height="100%">
                                <g class="ct-series">
                                    <path class="chart-a"
                                        d="M74.602,69.32A33.375,33.375,0,0,0,87.667,16.922L72.346,29.778A13.375,13.375,0,0,1,67.11,50.776Z"
                                        ct:value="30"></path>
                                </g>
                                <g class="ct-series">
                                    <path class="chart-b"
                                        d="M87.667,16.922A33.375,33.375,0,1,0,74.71,69.276L67.154,50.759A13.375,13.375,0,1,1,72.346,29.778Z"
                                        ct:value="70"></path>
                                </g>
                            </svg> -->
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-top-info">
                            <h2>Revenue</h2>
                        </div>
                        <small>
                            Feb 1 - Apr 1,
                            <i class="fas fa-globe-europe"></i>
                            Base on district
                        </small>
                        <div class="last-card-text">
                            <span class="icon-desktop">
                                <i class="fas fa-desktop"></i>
                            </span>
                            <span class="text-desktop"> Auction 70%</span>
                        </div>
                        <div class="last-card-text">
                            <span class="icon-mobile">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                            <span class="text-mobile"> Request 30%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!------------------first row graph-------------->
            <div class="cards-2" 
            >
                <!-- <div class="card card-graph">
                    <div class="text">
                        <div class="gray-text">App Ranking</div>
                        <div class="card-top-info">
                            <h3>452</h3>
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success">18.2%</span>
                        </div>
                    </div>
                    <div class="graph">
                        <div id="chart_div1" style="width:100%; height: 100%;" class="chart" ></div>
                    </div>
                </div> -->
                <div class="card card-graph">
                    <div class="text">
                        <div class="gray-text">Order type</div>
                        <div class="card-top-info">
                            <h3>Orders</h3>
                        </div>
                        <!-- <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success">10.57%</span>
                        </div> -->
                    </div>
                    <div class="graph">
                        <div id="chart_div2" style="width:100%; height: 100%;" class="chart" data-purchase="<?php echo $data['orders_countPurchase'] ?>" data-request="<?php echo $data['orders_countRequest'] ?>" data-auction="<?php echo $data['orders_countAuction'] ?>"></div>
                    </div>
                </div>
                <div class="card card-graph">
                    <div class="text">
                        <div class="gray-text">Organic vs Paid Search</div>
                        <div class="card-top-info">
                            <h3>Trafic Distibution</h3>
                        </div>
                        <div class="card-bottom-info">
                            <i class="fas fa-angle-up text-success"></i>
                            <span class="text-success">10.57%</span>
                        </div>
                    </div>
                    <div class="graph">
                        <div id="piechart" style="width:100%; height: 100%;" class="chart"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="row-box">
            <div class="col-boxes-1">
                <div class="col-graph">
                    <div class="card card-graph-2">
                        <div class="text">
                            <div class="gray-text">Sales Value</div>
                            <div class="card-top-info">
                                <h3>10,567</h3>
                            </div>
                            <div class="card-bottom-info">
                                <i class="fas fa-angle-up text-success"></i>
                                <span class="text-success">$10.57%</span>
                            </div>
                        </div>
                        <div class="graph">
                            <div id="chart" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-table">
                    <div class="table-section">
                        <div class="header-table">
                            <h2>Page visits</h2>
                            <a href="#">see all</a>
                        </div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><span class="las la-sort"></span> Page name</th>
                                    <th><span class="las la-sort"></span> Page Views</th>
                                    <th><span class="las la-sort"></span> Page Value</th>
                                    <th><span class="las la-sort"></span> Bounce rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        /demo/admin/index.html
                                    </th>
                                    <td>
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
                                    </td>
                                </tr>
                                <tr>
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
                                </tr>

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
                                <h6>
                                    <span class="fas fa-globe-europe"></span>
                                    Global Rank
                                </h6>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bold">#755
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div>
                        </div>
                        <div class="align-items-center">
                            <div>
                                <h6>
                                    <span class="fas fa-flag-usa"></span>
                                    Country Rank
                                </h6>
                                <div class="small">
                                    United States
                                    <span class="fas fa-angle-up text-success"></span>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bold">#32
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div>
                        </div>
                        <div class="align-items-center last">
                            <div>
                                <h6>
                                    <span class="fas fa-folder-open"></span>
                                    Country Rank
                                </h6>
                                <div class="small">
                                    <a href="#" class="card-small-stats">Travel &gt; Accomodation</a>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bold">#16
                                    <span class="fas fa-chart-line"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-second">
                    <div class="card-body">
                        <div class="text-top">
                            <h5>Acquisition</h5>
                            <p>
                                Tells you where your visitors originated from, such as search engines, social networks
                                or website referrals.
                            </p>
                        </div>
                        <div class="icon-section">
                            <div class="icon icon-blue">
                                <span class="fas fa-chart-bar"></span>
                            </div>
                            <div class="text">
                                <div>
                                    Bounce Rate
                                </div>
                                <h5>33.50%</h5>
                            </div>
                        </div>
                        <div class="icon-section">
                            <div class="icon icon-red">
                                <span class="fas fa-chart-area"></span>
                            </div>
                            <div class="text">
                                <div>
                                    Sessions
                                </div>
                                <h5>9,567</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-th">
                    <div class="card-body">
                        <div class="text-top">
                            <h5>Visits By Country</h5>
                        </div>
                        <div class="card-th-map">
                            <div id="regions_div" style="width: 100%; height: 100%;"></div>
                        </div>
                        <div class="Countrys-content">
                            <div class="conutry-info">
                                <div class="flag">
                                    <img src="images/us.png">
                                </div>
                                <div class="Country">
                                    <h6>
                                        United States
                                        <span>42%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="bg-1" style="width: 42%"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="conutry-info">
                                <div class="flag">
                                    <img src="images/Canada.png">
                                </div>
                                <div class="Country">
                                    <h6>
                                        Canada
                                        <span>65%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="bg-2" style="width: 65%"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="conutry-info">
                                <div class="flag">
                                    <img src="images/Germany.png">
                                </div>
                                <div class="Country">
                                    <h6>
                                        Germany
                                        <span>40%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="bg-3" style="width: 40%"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="conutry-info">
                                <div class="flag">
                                    <img src="images/France.png">
                                </div>
                                <div class="Country">
                                    <h6>
                                        France
                                        <span>20%</span>
                                    </h6>
                                    <div class="progress">
                                        <span class="bg-4" style="width: 20%"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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