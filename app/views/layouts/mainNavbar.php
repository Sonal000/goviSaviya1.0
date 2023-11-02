<?php if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='buyer')){
  ?>


<!-- logged in buyer =======================-->

<div class="navbar_cont">
  <div class="navbar">
   <div class="nav_img_cont_lg">
    <a href="<?php echo URLROOT ?>/Home">
      <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
    </a>
      
    <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button>
</div>
<div class="navlinks_cont">
  <ul class="navlinks" id="navlinks" >

    <li class="navlink">
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
        <!-- <i class="fas fa-store nav_icon"></i> -->
      </a>
    </li>
    <li class="navlink">
      <a href="<?php echo URLROOT ?>/viewAuction">
      Bidding
        <!-- <i class="fas fa-coins nav_icon"></i> -->
      </a>
    </li>
    <li class="navlink">
      <a href="<?php echo URLROOT ?>/posts">
      Posts
        <!-- <i class="fas fa-plus-square nav_icon"></i> -->
      </a>
    </li>
    <li class="navlink">
        <a href="<?php echo URLROOT ?>/orders">
        Orders
            <!-- <i class="fas fa-truck"></i> -->
        </a>
    </li>
  </ul>
  </div>

 
 
  <div class="cart_btns_cont_lg">

      <div class="profile_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">

        <div class="profile_settings_cont">
            <ul class="profile_links">
                <li>
                  <a  href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" target="_blank" class="profile_link">View Profile</a>
                </li>
                <li>
                  <a href="" class="profile_link">Wish list</a>
                </li>
                <li>
                  <a href="<?php echo URLROOT ?>/login/logout" class="profile_link">Log out</a>
                </li>
            </ul>
        </div>
      </div>
  <div class="cart">
      <a href="<?php echo URLROOT ?>/cart">
        <i class="fas fa-cart-plus nav_icon"></i>
        <div class="cart_text">
            <!-- <p>Your Cart is empty !</p> -->
            <p>view items in your cart !</p>
            <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View Cart</a>
        </div>
      </a>
    </div>
  </div>

 </div>
</div>


<div class="navSidebar_cont" id="navSidebar_cont">
  <div class="navSidebar">

  <div class="navSidebar_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
        <p class="navSidebar_name"><?php echo $_SESSION['user_name'] ?></p>

</div>

  <div class="sidelinks_cont">
  <ul class="sidelinks" id="sidelinks" >

    <li class="sidelink">
      <i class="fas fa-store nav_icon"></i>
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-coins nav_icon"></i>
      <a href="<?php echo URLROOT ?>/viewAuction">
      Bidding
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-plus-square nav_icon"></i>
      <a href="<?php echo URLROOT ?>/posts">
      Posts
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-truck"></i>
        <a href="<?php echo URLROOT ?>/orders">
        Orders
        </a>
    </li>
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>

<!-- logged in buyer end=======================-->




  <?php
        }else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='seller')){
  ?>  
  
  
          <!-- logged in seller =======================-->

<div class="navbar_cont">
  <div class="navbar">
   <div class="nav_img_cont_lg nav_img_cont_seller">
    <a href="<?php echo URLROOT ?>/Home">
      <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
    </a>
      
    <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button>
</div>
<div class="navlinks_cont navlinks_cont_seller">
  <ul class="navlinks" id="navlinks" >

    <li class="navlink">
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
        <!-- <i class="fas fa-store nav_icon"></i> -->
      </a>
    </li>
    <li class="navlink">
      <a href="<?php echo URLROOT ?>/viewAuction">
      Explore 
        <!-- <i class="fas fa-coins nav_icon"></i> -->
      </a>
    </li>
  </ul>
  </div>
 
  <div class="seller_btns_cont">
    <div class="seller_btns">
      <a href="<?php echo URLROOT ?>/#">
      <i class="fas fa-bell seller_icon"></i>
        <!-- <div class="cart_text">
            <p>No items in your cart !</p>
            <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View Cart</a>
        </div> -->
      </a>
      </div>  

      <div class="profile_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>" class="profile_image">

        <div class="profile_settings_cont">
            <ul class="profile_links">
                <li>
                  <a  href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" target="_blank" class="profile_link">View Profile</a>
                </li>
                <li>
                  <a href="" class="profile_link">Wish list</a>
                </li>
                <li>
                  <a href="<?php echo URLROOT ?>/login/logout" class="profile_link">Log out</a>
                </li>
            </ul>
        </div>
      </div>
  <div class="seller_btns">
      <a href="<?php echo URLROOT ?>/#">
      <i class="fas fa-comment-dots seller_icon"></i>
        <!-- <div class="cart_text">
            <p>No items in your cart !</p>
            <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View Cart</a>
        </div> -->
      </a>
    </div>
  </div>

 </div>
</div>


<div class="navSidebar_cont" id="navSidebar_cont">
  <div class="navSidebar">

  <div class="navSidebar_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
        <p class="navSidebar_name"><?php echo $_SESSION['user_name'] ?></p>

</div>

  <div class="sidelinks_cont">
  <ul class="sidelinks" id="sidelinks" >

    <li class="sidelink">
      <i class="fas fa-store nav_icon"></i>
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-coins nav_icon"></i>
      <a href="<?php echo URLROOT ?>/viewAuction">
      Bidding
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-plus-square nav_icon"></i>
      <a href="<?php echo URLROOT ?>/posts">
      Posts
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-truck"></i>
        <a href="<?php echo URLROOT ?>/orders">
        Orders
        </a>
    </li>
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>

<!-- logged in seller end=======================-->







  <?php         
        }else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='deliver')){
          ?>  
          
          
                  <!-- logged in seller =======================-->
        
        <div class="navbar_cont">
          <div class="navbar">
           <div class="nav_img_cont_lg nav_img_cont_seller">
            <a href="<?php echo URLROOT ?>/Home">
              <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
            </a>
              
            <button class="bars_btn" id="bars_btn">
          <i class="fas fa-bars bars"></i>
          </button>
        </div>
        <div class="navlinks_cont navlinks_cont_seller">
          <ul class="navlinks" id="navlinks" >
        
            <li class="navlink">
              <a href="<?php echo URLROOT ?>/marketplace">
                Marketplace
                <!-- <i class="fas fa-store nav_icon"></i> -->
              </a>
            </li>
            <li class="navlink">
              <a href="<?php echo URLROOT ?>/viewAuction">
              Explore 
                <!-- <i class="fas fa-coins nav_icon"></i> -->
              </a>
            </li>
          </ul>
          </div>
         
          <div class="seller_btns_cont">
            <div class="seller_btns">
              <a href="<?php echo URLROOT ?>/#">
              <i class="fas fa-bell seller_icon"></i>
                <!-- <div class="cart_text">
                    <p>No items in your cart !</p>
                    <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View Cart</a>
                </div> -->
              </a>
              </div>  
        
              <div class="profile_image_container">
                <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
        
                <div class="profile_settings_cont">
                    <ul class="profile_links">
                        <li>
                          <a  href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>" target="_blank" class="profile_link">View Profile</a>
                        </li>
                        <li>
                          <a href="" class="profile_link">Wish list</a>
                        </li>
                        <li>
                          <a href="<?php echo URLROOT ?>/login/logout" class="profile_link">Log out</a>
                        </li>
                    </ul>
                </div>
              </div>
          <div class="seller_btns">
              <a href="<?php echo URLROOT ?>/#">
              <i class="fas fa-comment-dots seller_icon"></i>
                <!-- <div class="cart_text">
                    <p>No items in your cart !</p>
                    <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View Cart</a>
                </div> -->
              </a>
            </div>
          </div>
        
         </div>
        </div>
        
        
        <div class="navSidebar_cont" id="navSidebar_cont">
          <div class="navSidebar">
        
          <div class="navSidebar_image_container">
                <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
                <p class="navSidebar_name"><?php echo $_SESSION['user_name'] ?></p>
        
        </div>
        
          <div class="sidelinks_cont">
          <ul class="sidelinks" id="sidelinks" >
        
            <li class="sidelink">
              <i class="fas fa-store nav_icon"></i>
              <a href="<?php echo URLROOT ?>/marketplace">
                Marketplace
              </a>
            </li>
            <li class="sidelink">
              <i class="fas fa-coins nav_icon"></i>
              <a href="<?php echo URLROOT ?>/viewAuction">
              Bidding
              </a>
            </li>
            <li class="sidelink">
              <i class="fas fa-plus-square nav_icon"></i>
              <a href="<?php echo URLROOT ?>/posts">
              Posts
              </a>
            </li>
            <li class="sidelink">
              <i class="fas fa-truck"></i>
                <a href="<?php echo URLROOT ?>/orders">
                Orders
                </a>
            </li>
          </ul>
          </div>
          </div>
        </div>
        <div class="navSidebar_overlay" id="navSidebar_overlay"></div>
        
        <!-- logged in seller end=======================-->
        
        
        
        
        
        
        
          <?php         
                }else{
          ?>

 <!-- navbar========================== -->
 <div class="navbar_cont">
  <div class="navbar">
   <div class="nav_img_cont">
   <a href="<?php echo URLROOT ?>/Home">
    <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
        </a>
    <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button>
   </div>
   <div class="navlinks_cont">
    <ul class="navlinks" id="navlinks" >
     <!-- <li class="navlink">
      <a href="<?php echo URLROOT ?>/Home">Home</a>
     </li> -->
     <li class="navlink">
     <a href="<?php echo URLROOT ?>/categories">Categories</a>
     </li>
     <li class="navlink">
     <a href="<?php echo URLROOT ?>/marketplace">Marketplace</a>
     </li>
     <li class="navlink">
      <a href="<?php echo URLROOT ?>/auction">Auction</a>
     </li>
     <li class="navlink">
     <a href="<?php echo URLROOT ?>/help">Help</a>
     </li>
     <!-- <button class="btn nav_btn">
      Log in
     </button> -->
    </ul>
  </div>

 </div>
</div>



<!-- nav sidebar -->

<div class="navSidebar_cont" id="navSidebar_cont">
  <div class="navSidebar">

  <!-- <div class="navSidebar_image_container">
        <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">
        <p class="navSidebar_name">sonalinduwara</p>

</div> -->

  <div class="sidelinks_cont">
  <ul class="sidelinks" id="sidelinks" >

    <li class="sidelink">
    <i class="fas fa-carrot"></i>
      <a href="<?php echo URLROOT ?>/Categories">
        Categories
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-store nav_icon"></i>
      <a href="<?php echo URLROOT ?>/marketplace">
        Marketplace
      </a>
    </li>
    <li class="sidelink">
      <i class="fas fa-coins nav_icon"></i>
      <a href="<?php echo URLROOT ?>/auction">
      Auction
      </a>
    </li>
    <li class="sidelink">
    <i class="fas fa-hands-helping"></i>
        <a href="<?php echo URLROOT ?>/help">
        Help
        </a>
    </li>
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>

<!-- navbar end========================= -->


<?php
     }
  ?>