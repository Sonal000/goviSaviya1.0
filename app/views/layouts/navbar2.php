<?php if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='admin')){
  ?>



<div class="navbar2">
            
           <!-- <div class="navimg">
            <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
            </div> -->
            <a style="margin-left:40px;" href="<?php echo URLROOT ?>/Home">
      <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
    </a>

            <div class="navbuttons2">
            <ul>
            <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
            <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
            <li><a href="<?php echo URLROOT ?>/Myprofile/<?php echo $_SESSION['user_id']; ?>"><img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image profile-logo-small"></a></li>
            <li><a href="<?php echo URLROOT ?>/AdminC/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>

            </ul>
            </div>
    </div>

    <?php
        }else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='seller')){
       
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
     <div class="notification">
    <div class="notification_count hide">0</div>
      <i class="fas fa-bell nav_icon" id="notification_btn"></i>
        <div class="notification_panel hide">
          <p class="notify_title">Notifications</p>
          <div class="notify_content" id="notify_content">
          </div>
          <div class="allr_cont">
            <button id="markAllReadBtn" class="allr_btn">mark all </button>
          </div>
            <!-- <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View all</a> -->
        </div>
    </div>
     </li>
     <li class="navlink">
        <a href="#">
        <i class="fas fa-comment nav_icon"></i>
        </a>
     </li>
     <li class="navlink">
      

      <div class="profile_image_container">
        <?php if($_SESSION['user_image']){ ?>
          <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">

          <?php
        }else{
          ?>
          <div class="profile_icon_container">
          <a href="<?php echo URLROOT ?>/profile">
           <i class="fas fa-user profile_icon_nav"></i>
           </a>
          </div>

          <?php
      }
        ?>
       

        <div class="profile_settings_cont">
            <ul class="profile_links">
                <li>
                  <a  href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>"  class="profile_link">View Profile</a>
                </li>
                  <a href="<?php echo URLROOT ?>/login/logout" class="profile_link">Log out</a>
                </li>
            </ul>
        </div>
      </div>


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
    <!-- <button class="join_link" id="join_btn">
    Join
    </button>
  <button class="navlink signin_link " id="signin_btn">
     Sign in
    </button>

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
    </li> -->
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>

<!-- navbar end========================= -->



            <?php
}else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='buyer')){
       
        ?>
        <div class="navbar2">
        
        <a style="margin-left:40px;" href="<?php echo URLROOT ?>/Home">
      <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
    </a>
        
                    <div class="navbuttons2">
                    <ul>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
                    <li><a href="<?php echo URLROOT ?>/Myprofile/<?php echo $_SESSION['user_id']; ?>"><img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image profile-logo-small"></a></li>
                    <li><a href="<?php echo URLROOT ?>/login/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>
                    </ul>
                    </div>
            </div>

            <?php
}else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='deliver')){

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
     <div class="notification">
    <div class="notification_count hide">0</div>
      <i class="fas fa-bell nav_icon" id="notification_btn"></i>
        <div class="notification_panel hide">
          <p class="notify_title">Notifications</p>
          <div class="notify_content" id="notify_content">
         
          </div>
          <div class="allr_cont">
            <button id="markAllReadBtn" class="allr_btn">mark all </button>
          </div>
            <!-- <a href="<?php echo URLROOT ?>/cart" class="btn cart_btn">View all</a> -->
        </div>
    </div>
     </li>
     <li class="navlink">
        <a href="#">
        <i class="fas fa-comment nav_icon"></i>
        </a>
     </li>
     <li class="navlink">
      

      <div class="profile_image_container">
        <?php if($_SESSION['user_image']){ ?>
          <img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image">

          <?php
        }else{
          ?>
          <div class="profile_icon_container">
          <a href="<?php echo URLROOT ?>/profile">
           <i class="fas fa-user profile_icon_nav"></i>
           </a>
          </div>

          <?php
      }
        ?>
       

        <div class="profile_settings_cont">
            <ul class="profile_links">
                <li>
                  <a  href="<?php echo URLROOT ?>/myprofile/<?php echo $_SESSION['user_id'] ?>"  class="profile_link">View Profile</a>
                </li>
                  <a href="<?php echo URLROOT ?>/login/logout" class="profile_link">Log out</a>
                </li>
            </ul>
        </div>
      </div>


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
    <!-- <button class="join_link" id="join_btn">
    Join
    </button>
  <button class="navlink signin_link " id="signin_btn">
     Sign in
    </button>

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
    </li> -->
  </ul>
  </div>
  </div>
</div>
<div class="navSidebar_overlay" id="navSidebar_overlay"></div>

<!-- navbar end========================= -->




<?php
}else{
       
        ?>
        <div class="navbar2">
        
                    <!-- <div class="navimg">
                    <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
                    </div> -->
                    <a style="margin-left:40px;" href="<?php echo URLROOT ?>/Home">
      <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
    </a>
        
                    <div class="navbuttons2">
                    <ul>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
                    <li><a href="<?php echo URLROOT ?>/Myprofile/<?php echo $_SESSION['user_id']; ?>"><img src="<?php echo URLROOT.'/store/profiles/'.$_SESSION['user_image'] ?>"  class="profile_image profile-logo-small"></a></li>
                    <li><a href="<?php echo URLROOT ?>/login/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>
                    </ul>
                    </div>
            </div>

            <?php
}?>