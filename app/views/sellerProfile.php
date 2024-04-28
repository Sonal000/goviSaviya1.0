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
        <title><?php echo $data['name'] ?></title>
        <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/login.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/listproduct.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/assets/css/sellerProfile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        
</head>


<body>



    <!-- ========================================================= -->

    <?php
 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>
<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

<div class="container_content">
        <!-- =============== Container ====================== -->
        
 
    
 
<section class="profile_section">
  <div class="profile_conts">
   <div class="cover_img_cont">

   <form method="post" action="<?php echo URLROOT; ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" enctype="multipart/form-data"  id="cover_form" name="cover_form" class="cover_form"> 

    <?php if($data['cover_img']){ ?>
                <img src="<?php echo URLROOT.'/store/covers/'.$data['cover_img'] ?>" name="cover_img" id="cover_img"  class="cover_img">
                <?php
    }else{ ?>
      <img src="<?php echo URLROOT.'/assets/images/default_cover.png' ?>" name="cover_img" id="cover_img"  class="cover_img">
      <?php
    }   ?>
          <input class="cover_icon_upload" type="file" id="cover_img_input" name="cover_img" >
                  <button type="button" class="cover_icon" id="edit_cover_img_btn">
                  edit Cover
                  <i class="fas fa-pen" ></i>
                  </button>
  <input type="submit" name="cover_image" id="cover_image">

                </form>





    <a href="<?php echo URLROOT ?>/profile/<?php echo $_SESSION['user_id'] ?>" class="view_icon">
     Profile View 
     <i class="far fa-eye"></i>
    </a>
   </div>


    <div class="profile_details">
      <div class="prof_img_cont">
          <div class="profile_img_cont">

            <form method="post" action="<?php echo URLROOT; ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" enctype="multipart/form-data"  id="profile_form" name="profile_form" class="profile_form"> 
                  
            <?php if($data['prof_img']){ ?>
              <img src="<?php echo URLROOT.'/store/profiles/'.$data['prof_img'] ?>"  class="profile_img">
                <?php }else{ ?> 
                  <div class="user_icon_container">
                    <i class="fas fa-user user_icon"></i>
                  </div> 
                  <?php } ?>




                  <input class="profile_icon_upload" type="file" id="prof_img_input" name="prof_img" >
                  <button type="button" class="profile_icon" id="edit_prof_img_btn">
                    Edit profile picture
                    <i class="fas fa-pen"></i>
                  </button>
  <input type="submit" name="profile_image" id="profile_image">

                </form>
            <div class="name_cont">
              <p class="user_name"><?php echo $data['name'] ?> 
                  <span>
                    <i class="fas fa-check-circle check_icon"></i>
                  </span>
              </p>
            </div>
          </div>
          <!-- <a class="become_seller" href="<?php echo URLROOT ?>/buyerRegister"> 
            Become a Buyer
            <span><i class="fas fa-user"></i></span>
          </a> -->
      </div>

        <!-- <div class="text_cont">

          <div class="status_cont">

            <div class="stat_cont">
        <div class="stat">
          <p>Rating</p>
          <span>4.5</span>
          <i class="fas fa-star rating-icon"></i>
        </div>

        <div class="stat">
          <p>Buy</p>
          <span>300</span>
          <i class="far fa-check-square"></i>
        </div>

        <div class="stat">
          <p>Positive reviews </p>
          <span>90%</span>
        </div>
      </div>
          </div>
        </div> -->
      </div>

    </div>



</section> 

<section class="details_section">

     <div class="details">

      <div class="about_title">
       <h3>About</h3>
       <button class="edit_about_btn" id="edit_about_btn"><i class="fas fa-pen"></i></button>

       
      </div>
      <p class="descp" id="about_desc"> <?php echo $data['about'] ?></p>

      <div class="edit_about_cont" id="edit_about_cont">
      <form method="post" action="<?php echo URLROOT; ?>/myprofile/<?php echo $_SESSION['user_id'] ?>">
      <textarea class="edit_about" name="about"  >
      <?php echo $data['about'] ?>
</textarea>
           <div class="edit_about_btn_cont">
              <button class="btn cancel_btn">Cancel</button>
              <button type="submit" class="btn update_btn" name="about_submit">Save</button>
           </div>
           </form>
      </div>


      

      <div class="profile_details_cont">
      <div class="about_title">
       <h3>Profile Details</h3>
       <button class="edit_details_btn" id="edit_details_btn"><i class="fas fa-pen"></i></button>
      </div>
      <div class="prof_details_cont" id="prof_details_cont">

        <div class="detail_cont">
            <p class="detail_name">Name</p>
            <p class="detail_desc"><?php echo $data['name'] ?></p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Address</p>
            <p class="detail_desc"><?php echo $data['address'] ?></p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Email</p>
            <p class="detail_desc"><?php echo $data['email'] ?></p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">Contact Number</p>
            <p class="detail_desc"><?php echo $data['mobile'] ?></p>
        </div>
        <div class="detail_cont">
            <p class="detail_name">City</p>
            <p class="detail_desc"><?php echo $data['city'] ?></p>
        </div>

      </div>
      <div class="prof_details_edit_cont" id="prof_details_edit_cont">

      <form method="post" action="<?php echo URLROOT; ?>/myprofile/<?php echo $_SESSION['user_id'] ?>">

        <div class="detail_edit_cont">
          <p class="detail_name">Name</p>
          <input type="text" name="name" class="detail_desc" value="<?php echo $data['name'] ?>" autocomplete="name"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">Address</p>
            <input type="text" name="address" class="detail_desc" value="<?php echo $data['address'] ?>" autocomplete="address-line1"></input>
        </div>
        <!-- <div class="detail_edit_cont">
            <p class="detail_name">Email</p>
            <input type="text" name="email" class="detail_desc" value="<?php echo $data['email'] ?>"></input>
        </div> -->
      <div class="detail_edit_cont">
            <p class="detail_name">Contact Number</p>
            <input type="text" name="mobile" class="detail_desc" value="<?php echo $data['mobile'] ?>"></input>
        </div>
      <div class="detail_edit_cont">
            <p class="detail_name">City</p>
            <input type="text" name="city" class="detail_desc" value="<?php echo $data['city'] ?>"></input>
        </div>

        <div class="edit_details_btn_cont">
          <button class="btn cancel_btn">Cancel</button>
          <button class="btn update_btn" type="submit" name="details_submit">Save</button>
        </div>
        
      </form>
      </div>
      
      
    </div>

    <!-- <div class="add_req">
      <div class="card">
        Add Your bank account
      <button class="edit_details_btn" id="request_btn"><i class="fas fa-pen"></i></button>
      </div>
        </div>
<div class="request_item" id="accept_order_add_cont">
   <div class="form_hed">
      <h4>Enter Bank Account Details</h4>
   </div>
   <div class="req_add_form_cont">
            
   <div class="form_container">


   <form method="post" action="<?php echo URLROOT ?>/OrderRequests/add" enctype="multipart/form-data">

   <div class="input_items">


     
          <div class="input_row">
          <div class="input_cont">
                <label for="dropdown" class="input_label">Account Number</label>
                <input type="text" id="dropdown" class="input_item" name="name" />
          </div>
          
          <div class="input_cont">
         <label for="stock" class="input_label">Account Name</label>
                    <input type="text" class="input_item"  name="req_stock">
          </div>
          </div>
          
          <div class="input_row">
          <div class="input_cont">
                <label for="dropdown" class="input_label">Bank</label>
                    <select id="dropdown" name="category" class="dropdown_item " >
                    <option value="vegetables">Vegetables</option>
                    <option value="fruits">Fruits</option>
                    <option value="spices">Spices</option>
                    </select>
          </div>

          <div class="input_cont">
            <label for="dropdown"class="input_label">Branch</label>
               <select id="dropdown" name="unit" class="dropdown_item">
                            <option value="Kg">Kg</option>
                            <option value="g">g</option>
                            
               </select>
         </div>
          </div>

          <div class="input_row">
         <div class="input_cont">
              <label for="req_date" class="input_label">Required Date</label>
               <input type="date" class="input_item"  name="req_date" id="expiration_date">
         </div>

          
         <div class="input_cont">
            <label for="req_address" class="input_label">Requested Address</label>
            <input type="text" class="input_item"  name="req_address">
            </div>
          
                </div>
        
          <div class="input_row">
         <div class="input_cont">
            <label for="dropdown"class="input_label">District</label>
               <select id="dropdown" name="district" class="dropdown_item">
                            <option value="Colombo">Colombo</option>
                            <option value="Kaluthara">Kaluthara</option>
                            <option value="Gampaha">Gampaha</option>
               </select>
                </div>
                </div>
      
         <div class="submit_container">
            <a href="<?php echo URLROOT ?>/OrderRequests/add"><button type="submit" class="btn">Request Item</button></a>
            <div class="can_btn">
            <a href="<?php echo URLROOT ?>/OrderRequests"><button type ="button" class="btn cancel_bt">Cancel</button></a>
            </div>
         </div>
                    
    </div>
 
  </form>


</div>

      </div>

</div> -->






</section>

<!-- <div class="add_req">
            <button class="btn" id="request_btn">Add Bank Account</button>
         </div>
<div class="request_item" id="accept_order_add_cont">
   <div class="form_hed">
      <h3>Request Items</h3>
   </div>
   <div class="req_add_form_cont">
            
   <div class="form_container">


   <form method="post" action="<?php echo URLROOT ?>/OrderRequests/add" enctype="multipart/form-data">

   <div class="input_items">


     

          <div class="input_cont">
                <label for="dropdown" class="input_label">Product Name</label>
                <input type="text" id="dropdown" class="input_item" name="name" />
          </div>
          
          <div class="input_cont">
                <label for="dropdown" class="input_label">Product category</label>
                    <select id="dropdown" name="category" class="dropdown_item " >
                    <option value="vegetables">Vegetables</option>
                    <option value="fruits">Fruits</option>
                    <option value="spices">Spices</option>
                    </select>
          </div>

              
         <div class="input_cont">
          <label for="stock" class="input_label">Required Stock</label>
                    <input type="text" class="input_item"  name="req_stock">
          </div>

          <div class="input_cont">
            <label for="dropdown"><p class="input_label">Unit</p></label>
               <select id="dropdown" name="unit" class="dropdown_item">
                            <option value="Kg">Kg</option>
                            <option value="g">g</option>
                            
               </select>
         </div>
          

         <div class="input_cont">
              <label for="req_date" class="input_label">Required Date</label>
               <input type="date" class="input_item"  name="req_date" id="expiration_date">
         </div>

          
         <div class="input_cont">
            <label for="req_address" class="input_label">Requested Address</label>
            <input type="text" class="input_item"  name="req_address">
            </div>

        
         <div class="input_cont">
            <label for="dropdown"><p class="input_label">District</p></label>
               <select id="dropdown" name="district" class="dropdown_item">
                            <option value="Colombo">Colombo</option>
                            <option value="Kaluthara">Kaluthara</option>
                            <option value="Gampaha">Gampaha</option>
               </select>
                </div>
      
         <div class="submit_container">
            <a href="<?php echo URLROOT ?>/OrderRequests/add"><button type="submit" class="btn">Request Item</button></a>
            <div class="can_btn">
            <a href="<?php echo URLROOT ?>/OrderRequests"><button type ="button" class="btn cancel_bt">Cancel</button></a>
            </div>
         </div>
                    
    </div>
 
  </form>


</div>

      </div>

</div> -->


   



    <!-- =============== Container end ====================== -->
  </div>

</div>


<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerProfile.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/orderRequests.js"></script>





    <!-- ========================================================= -->
</body>

</html>

<script>
  
  
  document.addEventListener("DOMContentLoaded", function() {
    // Get the button and the div to toggle
    var addButton = document.getElementById("request_btn");
    var requestItem = document.getElementById("accept_order_add_cont");

    // Hide the request item div initially
    requestItem.style.display = "none";

    // Add click event listener to the button
    addButton.addEventListener("click", function() {
        // Toggle the visibility of the request item div
        if (requestItem.style.display === "none" || requestItem.style.display === "") {
            requestItem.style.display = "block";
        } else {
            requestItem.style.display = "none";
        }
    });
});


</script>