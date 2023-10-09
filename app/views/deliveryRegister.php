<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery agent Register</title>
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
 <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/deliveryRegister.css">

</head>
<body>
    
    <section class="hero_section"> 

             <!-- navbar================== -->
 <?php
 include APPROOT.'/views/layouts/mainNavbar.php'; 
 ?>

<!-- navbar end ================== -->

        <div id="container">

                <div class="class1">
                    <h3>Register as a Delivery Agent</h3>
                    <img src="<?php echo URLROOT ?>/assets/images/delveh.png" alt="">
                </div>

                <div class="class1">

                    <form>
                        <label for="fname">Name</label><br>
                   <input type="text" id="fname" name="fname" placeholder="Enter Your Name"><br><br>
       
                        <label for="email">Email Address</label><br>
                   <input type="email" id="email" name="email" placeholder="Enter Your Email"><br><br>
       
                        <label for="password">Password</label><br>
                   <input type="password" id="password" name="password" placeholder="Enter Your Password"><br><br>
       
                        <label for="cpassword">Confirm Password</label><br>
                   <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password"><br><br>


                </div>

        
                <div class="class1">
                    <label for="fname">Mobile Number</label><br>
                    <input type="number" id="mobileNo" name="mobileNo" placeholder="Enter Your Mobile No."><br><br>
       
                    <label for="fname">Select Your Delivery Vehicle Type</label><br>
                                                    
                                <select name="cars" id="delivery_type">
                                    <option value="trailer_truck">Large Truck with Trailer</option>
                                    <option value="del_truck">Delivery Truck</option>
                                    <option value="mini_truck">Mini Truck</option>
                                    <option value="del_van">Delivery Van</option>
                                    <option value="mini_van">Mini Van</option>
                                    <option value="del_cab">Delivery Cab</option>
                                    <option value="car">Car</option>
                                    <option value="three_wheel">Three-wheeler</option>
                                    <option value="bike">Bike</option>
                                    

                                </select><br><br>
       
                        <label for="lname">District You Live</label><br>
                   <input type="password" id="email" name="email" placeholder="Enter Your District"><br><br>
       
                        <label for="lname">Licence Plate No.</label><br>
                   <input type="email" id="email" name="email" placeholder="Enter the Licence Plate No."><br><br>
       
                        
        

                         
                </div>

        </div>

        <div class="register_btn">
        <input type="submit" value="Register" class="submit_btn">
        </div>
            </form> 
            


































       <!-- <div class="columns">
 
      <img class="main_logo" src="./images/delveh.png" alt="">
     
      </div>
   
     
     <div class="columns">
        
        <div class="logo_img_cont">
            <form action="/action_page.php">
                     <label for="fname">Name</label>
                <input type="text" id="fname" name="fname"><br><br>
    
                     <label for="lname">Email Address</label>
                <input type="email" id="email" name="email"><br><br>
    
                     <label for="lname">Password</label>
                <input type="password" id="email" name="email"><br><br>
    
                     <label for="lname">Confirm Password</label>
                <input type="email" id="email" name="email"><br><br>
    
                     <label for="lname">Mobile Number</label>
                <input type="email" id="email" name="email"><br><br>
    
    
    
    
    
    
    
    
                <input type="submit" value="Submit">
              </form>
        </div>


     </div>
    




   
    
    
</div> -->
    
    

  </section>

  <!-- footer end ======================= -->
  <?php
 include APPROOT.'/views/layouts/footer.php';  
 ?>



  <script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>



<!-- js === -->
<script src="<?php echo URLROOT ?>/assets/js/main.js"></script>


</body>
</html>