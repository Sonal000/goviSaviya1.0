
<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <?php
 require APPROOT. '/views/layouts/sellerSidebar_withoutimg.php'; 
 ?>
    
<div class="profile">
      
    <div class="markettop">
       <h4>Marketplace</h4>
       <div class="searchbar2_cont">
            <form action="http://www.google/search" class="searchbar2" method="get">
            <input type="text" placeholder="Search Anything">
            <button type="submit"><i class="fas fa-search search_icon"></i></button>
            </form>
       </div>
       <div class="marketbt">
                <button class="btn"><a href="<?php echo URLROOT;?>/Listproduct">List new Product</a></button>
                <button class="btn"><a href="<?php echo URLROOT;?>/Myproducts">My Products</a></button>
       </div>
       
    </div>

    <div class="marketsortbar">


    </div>

    <div class="marketcards_1">

    </div>

    <div class="marketcards_2">

    </div>

</div>


</body>
</html>