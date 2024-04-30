
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
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminOrder.css">
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
    <h4>Manage Orders</h4>
    <div class="searchbarplace">
        <!-- <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Orders">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div> -->
    </div>
    <div class="admincard_cont">
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/red-flag.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Total Penalty Collection
                </div>
                <div class="signupcount">
                <?php echo $data['total']->total_penalty ;?>
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/ban-user.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Seller Penalty Collection
                </div>
                <div class="signupcount">
                    <?php echo $data['count']->seller_penalty ;?>
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/ban-user.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                Deliver Penalty Collection
                </div>
                <div class="signupcount">
                <?php echo $data['count']->deliver_penalty ;?>
                </div>
            </div>
        </div>
       

    </div>
    
    <div class="table_cont">
    <table id="" class="tables">
  <tr>
    <th>QC ID</th>
    <th>Buyer ID</th>
    <th>Deliver ID</th>
    <th>Capacity</th>
    <th>Penalty Amount</th>
    <th>Penalty Date</th>
  </tr>
  <?php if(!empty($data['orders'])){ ?>
        <?php foreach($data['orders'] as $orders){?>
    <tr>
    <td><?php echo $orders->qc_id?></td>
    <td><?php echo $orders->buyer_id?></td>
    <td><?php echo $orders->deliver_id?></td>
    <td><?php echo $orders->penalty_type ?></td>
    <td><?php echo $orders->penalty_amount?></td>
    <td><?php echo $orders->penalty_date?></td>
  </tr>
  <?php
    }
}else{
    echo "<tr><td colspan='6'>No Penalties Yet</td></tr>";
}
  ?>
        </table>
         
        </div>
    <!-- <div class="table_box">
        <div class="table_row table_hed">
            <div class="table_cell column1">
                <p>qc_id</p>
            </div>
            <div class="table_cell column2">
                <p>Buyer ID</p>
            </div>
            <div class="table_cell column2">
                <p>Deliver ID</p>
            </div>
            <div class="table_cell column3">
                <p>Penalty Type</p>
            </div>
            <div class="table_cell column4">
                <p>Penalty Amount</p>
            </div>
            
            <div class="table_cell column6">
                <p>Penalty Date</p>
            </div>
        </div>
       
        <?php if(!empty($data['orders'])): ?>
        <?php foreach($data['orders'] as $Orders): ?>
        <div class="table_row">
            <div class="table_cell column1">
                <p><?php echo $Orders->qc_id ?></p>
            </div>
            <div class="table_cell column2">
                <p><?php echo $Orders->buyer_id ?></p>
            </div>
            <div class="table_cell column2">
                <p><?php echo $Orders->deliver_id ?></p>
            </div>
            <div class="table_cell column3">
            <p><?php echo $Orders->penalty_type?></p>  
            </div>
            <div class="table_cell column4">
            <p><?php echo $Orders->penalty_amount?></p>
            </div>
            <div class="table_cell column4">
            <p><?php echo $Orders->penalty_date?></p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No data available</p>
        <?php endif; ?>
      
        
       
        
        
       
        
    </div> -->
    
</div>
            </div>
            </div>

</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>