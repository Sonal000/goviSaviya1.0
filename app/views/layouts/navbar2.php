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
        <div class="navbar2">
        
                    <!--<div class="navimg">
                    <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
                    </div>-->
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
}