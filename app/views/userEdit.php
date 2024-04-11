<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/myproducts.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerauction.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminDash.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/adminEdit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
 <div class="main_container">
 <?php
 require APPROOT. '/views/layouts/AdminSidebar.php'; 
 ?>
 <div class="container_content">

<div class="adminprofile">
    <div class="auction_page">
        <div class="heading">
            Edit Details of the User
        </div>

        <div class="admin_form">
            
  <form action="<?php echo URLROOT; ?>/AdminC/editUser/<?php echo $data['id']?>" method="post">
    <label for="name">Name</label>
    <input type="text"  name="name"  value="<?php echo $data['name']?>">

    <label for="email">E-mail</label>
    <input type="text" name="email" value="<?php echo $data['email']?>">

    <label for="mobile">Mobile number</label>
    <input type="text"  name="mobile" value="<?php echo $data['mobile']?>">

    <label for="address">Address</label>
    <input type="text" name="address" value="<?php echo $data['address']?>">

    <label for="city">City</label>
    <input type="text"  name="city" value="<?php echo $data['city']?>">

    <input type="submit" value="Submit">
  </form>
</div>
            
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
