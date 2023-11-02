<?php if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='admin')){
  ?>



<div class="navbar2">
            
            <div class="navimg">
            <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
            </div>

            <div class="navbuttons2">
            <ul>
            <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
            <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
            <li><a href="<?php echo URLROOT ?>/AdminProfile"><img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="profile-logo-small"></a></li>
            <li><a href="<?php echo URLROOT ?>/AdminC/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>

            </ul>
            </div>
    </div>

    <?php
        }else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='seller')){
       
        ?>
        <div class="navbar2">
        
                    <div class="navimg">
                    <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
                    </div>
        
                    <div class="navbuttons2">
                    <ul>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
                    <li><a href="<?php echo URLROOT ?>/Myprofile"><img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="profile-logo-small"></a></li>
                    <li><a href="<?php echo URLROOT ?>/login/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>
                    </ul>
                    </div>
            </div>

            <?php
}else if(isset($_SESSION['user_id'])&& ($_SESSION['user_type']=='buyer')){
       
        ?>
        <div class="navbar2">
        
                    <div class="navimg">
                    <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
                    </div>
        
                    <div class="navbuttons2">
                    <ul>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
                    <li><a href="<?php echo URLROOT ?>/Myprofile"><img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="profile-logo-small"></a></li>
                    <li><a href="<?php echo URLROOT ?>/login/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>
                    </ul>
                    </div>
            </div>

            <?php
}else{
       
        ?>
        <div class="navbar2">
        
                    <div class="navimg">
                    <img src="<?php echo URLROOT; ?>/assets/images/govisaviya_green.png" alt="">
                    </div>
        
                    <div class="navbuttons2">
                    <ul>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/notification.png"  alt="" class="auction"></a></li>
                    <li><a href=""><img src="<?php echo URLROOT; ?>/assets/images/chat.png"  alt="" class="auction"></a></li>
                    <li><a href="<?php echo URLROOT ?>/Myprofile"><img src="<?php echo URLROOT; ?>/assets/images/profile.png" alt="" class="profile-logo-small"></a></li>
                    <li><a href="<?php echo URLROOT ?>/login/logout"><img src="<?php echo URLROOT; ?>/assets/images/logout.png" alt="" class="profile-logo-small"></a></li>
                    </ul>
                    </div>
            </div>

            <?php
}