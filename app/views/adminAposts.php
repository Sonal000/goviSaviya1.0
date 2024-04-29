<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminAPosts.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/mainNavbar.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/adminsidebar.php'; 
 ?>
 <div class="container_content">
<div class="adminprofile">
    <h4>Manage Posts</h4>
    <div class="searchbarplace">
        <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Posts">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
    </div>
    <div class="admincard_cont">
    <div class="admincard">

    <button id="download_btn">download</button>
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/auction.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Auctions
                </div>
                <div class="signupcount">
                    <?php echo $data['count']->post_count ;?>
                </div>
            </div>
        </div>
        <!-- <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/auction.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Auction Posts
                </div>
                <div class="signupcount">
                    11
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT;?>/assets/images/ads.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Advertistment Posts
                </div>
                <div class="signupcount">
                    15
                </div>
            </div>
        </div> -->
       

    </div>

     <div class="table_cont">
    <table id="" class="tables">
  <tr>
    <th>Post ID</th>
    <th>Posted by</th>
    <th>Started Date</th>
    <th>End Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php if(!empty($data['Aposts'])){ ?>
        <?php foreach($data['Aposts'] as $postA){?>
    <tr>
    <td><?php echo $postA->auction_ID?></td>
    <td><?php echo $postA->seller_name?></td>
    <td><?php echo $postA->start_date?></td>
    <!-- <td><?php echo $postA->end_date; ?></td> -->
    <td> <a href="<?php echo URLROOT; ?>/Posts/marketplaceView/<?php echo $postA->auction_ID?>">view</a></td>
    <td><a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a></td>
  </tr>
  <?php
    }
}else{
    echo "<tr><td colspan='6'>No Auctions Found</td></tr>";
}
  ?>
        </table>
         
        </div>


    <!-- <div class="table_box">
        <div class="table_row table_hed">
            <div class="table_cell column1">
                <p>Post ID</p>
            </div>
            <div class="table_cell column2">
                <p>Posted by</p>
            </div>
            <div class="table_cell column3">
                <p>Started Date</p>
            </div>
            <div class="table_cell column4">
                <p>End Date</p>
            </div>
            <div class="table_cell column4">
                <p></p>
            </div>
            <div class="table_cell column6">
                <p></p>
            </div>
        </div>
        <?php if(!empty($data['Aposts'])):?>
        <?php foreach($data['Aposts'] as $postA): ?>
        <div class="table_row">
            <div class="table_cell column1">
                <p><?php echo $postA->auction_ID?></p>
            </div>
            <div class="table_cell column2">
                <p><?php echo $postA->seller_name?></p>
            </div>
            <div class="table_cell column3">
                <p><?php echo $postA->start_date?></p>
            </div>
            <div class="table_cell column4">
                <p><?php echo $postA->end_date?></p>
            </div>
            <div class="table_cell column5">
                <div class="ordersta">
                    <a href="<?php echo URLROOT; ?>/Posts/AuctionView/<?php echo $postA->auction_ID?>"><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column6">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No data available</p>
        <?php endif; ?>
        <!-- <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Sonal Induwara</p>
            </div> 
            <div class="table_cell column3">
                <p>Sat,Oct 12, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Yunal Mallawarachchi</p>
            </div>
            <div class="table_cell column3">
                <p>Tue,Oct 14, 2023</p>                  
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div>
        <div class="table_row">
            <div class="table_cell column1">
                <p>01</p>
            </div>
            <div class="table_cell column2">
                <p>Nipul Yansith</p>
            </div>
            <div class="table_cell column3">
                <p>Mon,Oct 24, 2023</p>
            </div>
            <div class="table_cell column4">
                <div class="ordersta">
                    <a href=""><button class="orderpost_view">View</button></a>
                </div>
            </div>
            <div class="table_cell column5">
                <a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a>
            </div>
        </div> -->
       
        
        
       
        
    </div> 
    
</div>

            </div>
            </div>


</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>

<!-- ================================================================================ -->

<script src=
 "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src=
 "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
<script type="text/javascript">

$(document).ready(function() {

function convertHTMLtoPDF() {
    const { jsPDF } = window.jspdf;

    let doc = new jsPDF('l', 'mm', [1500, 1400]);
    let pdfjs = document.querySelector('.table_cont');
    doc.html(pdfjs, {
        callback: function(doc) {
            doc.save("auction_orders.pdf");
        },
        x: 12,
        y: 12
    });                
}            

$('#download-btn').on('click', function() {

// generatePdf(tabledata);  

convertHTMLtoPDF();


});
});
</script>


<!-- ============================================================= -->



<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>

<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>


</html>