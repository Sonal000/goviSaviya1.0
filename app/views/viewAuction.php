<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Home</title>

 <!-- <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya2.ico" type="image/x-icon"> -->

 <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/viewAuction.css">
</head>
<body>


 <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>
 <!-- navbar end ================== -->



 <!-- view Auction =================-->

  <div class="viewAuction_cont">
   
  </div>

 <!-- view Auction end=================-->




 
<!-- footer================================= -->
<?php include APPROOT.'/views/layouts/footer.php' ?>
<!-- footer end================================= -->





   <!-- js === -->
   <script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>
</html>