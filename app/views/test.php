

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
<style>

.navbar_cont{
  background-color: var(--clr-primary-9);
  min-height: 4rem;
  box-shadow: var(--light-shadow);
  z-index: 100;
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
}
.navbar{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  /* align-items: center; */
}
.nav_img_cont{
  display: flex;
  justify-content: space-between;
flex: 0.4;
width: 95vw;
margin: auto;
/* border: 2px solid red; */
}
.nav_img{
  width: 150px;
}
.navlinks_cont{
  flex: 0.6;
  /* display: none; */
}
.navlinks{
  background: var(--clr-primary-8);
  height: 0;
  overflow: hidden;
  transition: var(--transition);
}
.show_links{
  height: auto;
  transition: var(--transition);
}

.navlink{
  padding-left: 1rem;
  height: 2rem;
  letter-spacing: var(--spacing-low);
  transition: var(--transition);
  border-left: 10px solid transparent;
  position: relative;
}
.navlink:hover{
  padding-left: 1.2rem;
  background: var(--clr-primary-9);
  border-left: 10px solid var(--clr-secondry-5);
}
.navlink>a{
  color:  var(--clr-grey-2);
  transition: var(--transition);
  display: inline-block;
}
.nav_icon{
  font-size: 1.2rem;
}


/* Tooltip text */
.navlink .navlink_text{
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
  position: absolute;
  z-index: 2000;
  top: 300%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

/* Tooltip arrow */
.navlink .navlink_text::after{
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Show the tooltip text when you mouse over the tooltip container */
.navlink:hover .navlink_text {
  visibility: visible;
  opacity: 1;
}



</style>

</head>
<body>
 
<div class="navlinks_cont">
  <ul class="navlinks" id="navlinks" >
    <li class="navlink">
    <a href="<?php echo URLROOT ?>/marketplace"><i class="fas fa-store nav_icon"></i></a>
    <span class="navlink_text">Marketplace</span>
    </li>
    <li class="navlink">
      <a href="<?php echo URLROOT ?>/viewAuction"><i class="fas fa-coins nav_icon"></i></a>
    </li>
    <li class="navlink">
    <a href="<?php echo URLROOT ?>/notifications"><i class="fas fa-bell nav_icon"></i></a>
    </li>
    <li class="navlink">
      <a href="<?php echo URLROOT ?>/orders">Orders</a>
    </li>
    <li class="navlink">
      <div class="profile_image_container">
        <img src="<?php echo URLROOT ?>/assets/images/profile.png" alt="profile" class="profile_image">
      </div>
    </li>
    <li class="navlink">
    <a href="<?php echo URLROOT ?>/Cart"><i class="fas fa-cart-plus nav_icon"></i></a>
    </li>
    <!-- <button class="btn nav_btn">
      Log in
    </button> -->
  </ul>
  </div>


</body>
</html>