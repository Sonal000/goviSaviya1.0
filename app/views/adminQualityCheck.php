
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
        <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Orders">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
    </div>
    <div class="admincard_cont">
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/Complete.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Complete Orders
                </div>
                <div class="signupcount">
                    27
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/return2.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    Returns
                </div>
                <div class="signupcount">
                    10
                </div>
            </div>
        </div>
        <div class="admincard">
            <div class="cardicon_cont">
                <img src="<?php echo URLROOT; ?>/assets/images/ongoing.png" alt="" class="cardicon">
            </div>
            <div class="admincard_det_cont">
                <div class="newsignups">
                    On-going Orders
                </div>
                <div class="signupcount">
                    13
                </div>
            </div>
        </div>
       

    </div>

    
    <div class="table_cont">
    <table id="" class="tables">
  <thead>
    <th>qc_id</th>
    <th>buyer_id</th>
    <th>Order Type</th>
    <th>Order Date</th>
    <th></th>
    <th></th>
  </thead>
  <?php if(!empty($data['orders'])){ ?>
        <?php foreach($data['orders'] as $Orders){?>
    <tr>
    <td><p><?php echo $Orders->qc_id ?></p></td>
    <td><p><?php echo $Orders->buyer_id ?></p></td>
    <td><p><?php echo $Orders->order_type?></p></td>
    <td><p class="orderstatus_complete  <?php echo "qcstatus_".$Orders->qc_status.""; ?>"><?php echo $Orders->qc_status; ?></p></td>
    <td> <a href="<?php echo URLROOT; ?>/qualityCheck/details/<?php echo $Orders->qc_id?>"><img src="<?php echo URLROOT; ?>/assets/images/view.png" alt="" class="vieweye" alt=""></a></td>
    <td><<a href=""><img src="<?php echo URLROOT; ?>/assets/images/delete.png" alt="" class="auction" alt=""></a></td>
  </tr>
  <?php
    }
}else{
    echo "<tr><td colspan='6'>No Orders Found</td></tr>";
}
  ?>
</table>
         
    </div>

    
</div>
            </div>
            </div>

</body>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/adminSidebar.js"></script>
</html>