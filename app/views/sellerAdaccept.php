<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>

    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerAdrequest.css">
</head>
<body>



<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

  <div class="container_content">

  <!-- =========content ============================== -->

  <div class="profile">
    <div class="hed">
        <h4>Accepted Order Requests</h4>
    </div>
    <!-- <div class="req_approve_btn">
        
        <div class="reqbt">
            <a href="" class="btn req">Requests</a>
        </div>
        <div class="approvebt">
            <a href="<?php echo URLROOT; ?>/SellerAdaccept" class="btn approve">Approved</a>
        </div>

    </div>  -->

    <div class="bid_items_cont">
    <?php 
    if($data['requests']){
        foreach($data['requests'] as $requests){

            $post_date = date('Y-m-d', strtotime($requests->posted_date)); // use to get only the date from the column. column contains both time and date
            $req_date = date('Y-m-d', strtotime($requests->req_date));

            ?>

           <div class="adcard">
        <div class="reqbuyerdetails">
            <div class="buyproimg">
                <img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="buypro">
            </div>
            <div class="name_date">
                <div class="bna">
                    <?php echo $requests->buyer_name; ?>
                </div>
                <div class="reqdate">
                    <?php echo $post_date;?>
                </div>
            </div>
        </div>
        <div class="requestdet">
            <div class="stockdet">
                <div class="req_des">
                    <?php echo $requests->buyer_name; ?> requests <?php echo $requests->req_stock;?> <?php echo $requests->unit;?> of <?php echo $requests->name;?>
                </div>
                <div class="req_item">
                    Item : <?php echo $requests->name;?>
                </div>
                <div class="req_quantity">
                    Amount : <?php echo $requests->req_stock ;?> <?php echo $requests->unit;?>
                </div>
                <div class="req_deadline">
                    Request before : <?php echo $req_date;?>
                </div>
                <div class="req_location">
                    Location : <?php echo $requests->req_address;?>
                </div>

            </div>
            
        </div>
    </div>

    `  
        
        
        <?php
        
        }
    }else{
        ?>
        <div class="nothing">
            <p>No accepted Requests</p>
        </div>
        <?php
        }
    ?> 
    </div>
    </br>
    <h4>
        Quoted Order Requests
    </h4>
    <div class="bid_items_cont">
     <?php 
     if($data['Qrequests'] ){
        foreach($data['Qrequests'] as $Qrequests){
            
            $post_date = date('Y-m-d', strtotime($Qrequests->posted_date)); // use to get only the date from the column. column contains both time and date
            $req_date = date('Y-m-d', strtotime($Qrequests->req_date));
            ?>
            
            <div class="adcard_cont">
            <div class="adcard">
            <div class="reqbuyerdetails">
                <div class="buyproimg">
                    <img src="<?php echo URLROOT.'/store/items/'.$requests->buyer_img ;?>" alt="" class="buypro">
                </div>
                <div class="name_date">
                    <div class="bna">
                        <?php echo $Qrequests->buyer_name; ?>
                    </div>
                    <div class="reqdate">
                        <?php echo $post_date; ?>
                    </div>
                </div>
            </div>
            <div class="requestdet">
                <div class="stockdet">
                    <div class="req_des">
                        <?php echo $Qrequests->buyer_name; ?> requests <?php echo $Qrequests->req_stock;?> <?php echo $Qrequests->unit;?> of <?php echo $Qrequests->name;?>
                    </div>
                    <div class="req_item">
                        Item : <?php echo $Qrequests->name; ?>
                    </div>
                    <div class="req_quantity">
                        Amount : <?php echo $Qrequests->req_stock; ?> <?php echo $Qrequests->unit; ?>
                    </div>
                    <div class="req_deadline">
                        Request before : <?php echo $req_date; ?>
                    </div>
                    <div class="req_location">
                        Location : <?php echo $Qrequests->req_address; ?>
                    </div>
                    <div class="req_qutation">
                        Your Quotation : <?php echo $Qrequests->amount; ?>
                    </div>
                    <div class="req_location">
                        Number of Quotations : <?php echo $Qrequests->quotation_count; ?>
                    </div>
    
                </div>
                <div class="accept_discard_bt">
                   <div class="acceptbt">
                        <button class="btn acceptbtn">Change Quotation</button>
                    </div> 
                    <div class="discardbt">
                        <a href="<?php echo URLROOT ;?>/OrderRequests/decline/<?php echo $requests->request_ID ?>"><button class="discardbtn">Dicline</button></a>
                    </div> 
    
                </div>
            </div>
            <div class="price_decide_cont">
            <form action="<?php echo URLROOT;?>/OrderRequests/setQuotation/<?php echo $requests->request_ID ?>" method="post">
            <div class="price_cont">
                <label for="amount">Enter your Price:</label>
                <input type="text" name="amount" class="input_item">
            </div>
            <div class="price_btn_cont">
                <button class="btn sub" type="submit">submit</button>
                <a href="<?php echo URLROOT ;?>/OrderRequests"><button class="btn sub discardbtn">Cancel</button></a>
            </div>
                
            </form>
            </div>
            
        </div>
            

        </div>
           
            <?php
        }
     }else{
        ?>
        <div class="bid_items_cont">
            <h3>No quoted Items</h3>
        </div>
        <?php
     }
     ?> 
      </div>
</div>
  
  
  <!-- =========content end============================== -->
  </div>
 </div>






<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>




</body>
</html>



<script>
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('acceptbtn')) {
            const profEditCont = e.target.closest('.adcard_cont').querySelector('.price_decide_cont');
            /*const profCont = e.target.closest('.adcard_cont').querySelector('.requestdet');*/
            profEditCont.classList.toggle('show');
            /*profCont.classList.toggle('hide');*/

        }

        // Check if the clicked button is within the 'price_decide_cont' container
        if (e.target.closest('.price_decide_cont')) {
            if (e.target.classList.contains('discardbtn')) {
                e.preventDefault(); // Prevent the default action of form submission
                window.location.href = "<?php echo URLROOT ;?>/OrderRequests"; // Redirect to the desired URL
            }
        }
    });
</script>
