<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>


<div class="main_container_loader">


<div class="container_content">



<h2 id="loading">hey</h2>

</div>
        </div>
    </div>

    <script type="text/javascript"> 
let redirectOccured = false;

// Function to redirect to orders page
function redirectToOrders() {
    if (!redirectOccured) {
        redirectOccured = true;
        document.getElementById('loading').style.display = 'none';
        window.location.href = ''; // Redirect to orders page
    }
}

setTimeout(redirectToOrders, 2000);
        </script>

</body>
</html>