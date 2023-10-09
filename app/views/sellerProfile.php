<?php


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GoviSaviya_Seller_Profile</title>
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        
</head>


<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar.php'; 
 ?>

    <div class="profile">
    <div class="maincontent">
        <h4>Profile</h4>
    </div>
    <div class="profilecont">
        <img src="<?php echo URLROOT ?>/assets/images/profile.png" alt="" class="profile-logo-medium">
        <button class="newbt">change profile photo</button>
        <button class="newbt">Remove profile photo</button>
    </div></br>

   <div class="personaldetails">
        <div class="infor">
        <p>Name</p>
        <input type="text" class="det" placeholder="Santhush Fernando">
        </div></br>
        <div class="infor">
        <p>Email Adress</p>
        <input type="text" class="det" placeholder="santhushfernando2000@gmail.com">
        </div></br>
        <div class="infor">
        <p>Pick up address</p>
        <input type="text" class="det" placeholder="187,Koskanaththa Road,Mampe,Piliyandala">
        </div></br>
        <div class="infor">
        <p>Contact Number</p>
        <input type="text" class="det" placeholder="+94 776678909">
        </div>
</br>
        <div><button class="btn editprofile">Edit Details</button></div>
    </div>

    </div>

  <!-- footer  ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>

<!-- footer end ======================= -->

<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>
</body>