<!-- ================================================================================================ -->
<div class="loader_main  " id="loader_main">
  

<div class="main_container">


<div class="container_content">

<div class="profile">


    <div class="auction_page">
        <div class="hed hed_title">
          <p>  Available Orders</p>
        </div>

<div class="loader_cont_del">
        <div class="loader_del"></div>
      </div>

</div>
</div>


</div>
        </div>
    </div>

<!-- ================================================================================================ -->





<div class="main_sidebar_container">



        <div class="sidebar_conatainer">

        <div class="nav_img_cont_d">
   <a href="<?php echo URLROOT ?>/Home">
    <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
        </a>
    <!-- <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button> -->

  <div class="welcome_user">
    <p>Hii Welcome <span> <?php echo $_SESSION['user_name'] ?></span></p>
  </div>
   </div>

          <div class="sidebar_toggle">
            <button class="sidebar_toggle_btn" id="sidebar_toggle_btn" >
            <i class="fas fa-arrow-left"></i>
            </button>
          </div>
          <div class="sidebar_items">
            <ul>
              <!-- <li>
                <a href="<?php echo URLROOT ?>/marketplace">
                  <button class="sidebar_item link" id="marketplace_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Marketplace</p>
                  </button>
                </a>
              </li> -->

              <li>
                <a href="<?php echo URLROOT ?>/home">
                  <button class="sidebar_item link"  id="home_link">
                  <i class="fa-solid fa-house sidebar_icon"></i>
                    <p>Home</p>
                  </button>
                </a>
              </li>

              <li>

                <button class="expand_btn exp_bt_op" id="auction_expand">
                <i class="fas fa-gavel sidebar_icon"></i>
                  <p>Orders</p>
                  <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                <div class="expand hide_expand">
                <a href=" <?php echo URLROOT ?>/orders">
                    <button class="sidebar_item expand_item link" id="orders_link">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Available Orders</p>
                    </button>
                </a>

                <a href="<?php echo URLROOT ?>/orders/complete">
                    <button class="sidebar_item expand_item link" id="orders_complete_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Completed Orders</p>
                    </button>
                    </a>

                    <a href="<?php echo URLROOT ?>/orders/ongoing">
                    <button class="sidebar_item expand_item link" id="orders_ongoing_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Ongoing Orders</p>
                    </button>
                    </a>

                  </div>
              </li>
                            
              <li>
                <a href="<?php echo URLROOT ?>/deliveryRatings">
                  <button class="sidebar_item link"  id="reviews_link">
                  <i class="far fa-star  sidebar_icon" ></i>
                    <p>Reviews</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryInsight">
                  <button class="sidebar_item link"  id="insight_link">
                  <i class="fa-solid fa-chart-line" style="margin-right:15.2px;"></i>
                    <p>Insight</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryVehicles">
                  <button class="sidebar_item link"  id="vehicles_link">
                  <i class="fa-solid fa-truck" style="margin-right:12px;"></i>
                    <p>Vehicle</p>
                  </button>
                </a>
              </li>


            </ul>
          </div>


          <!-- sidebar mini -->

        
        </div>

      </div>


        






      <div class="main_sidebar_container_mini" id="main_sidebar_container_mini" >


        <div class="sidebar_conatainer">

        <div class="nav_img_cont_d">
   <a href="<?php echo URLROOT ?>/Home">
    <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
        </a>
    <!-- <button class="bars_btn" id="bars_btn">
  <i class="fas fa-bars bars"></i>
  </button> -->

  <div class="welcome_user">
    <p>Hii Welcome <span> <?php echo $_SESSION['user_name'] ?></span></p>
  </div>
   </div>

          <div class="sidebar_toggle">
            <button class="sidebar_toggle_btn" id="sidebar_toggle_btn" >
            <i class="fas fa-arrow-left"></i>
            </button>
          </div>
          <div class="sidebar_items">
            <ul>
              <!-- <li>
                <a href="<?php echo URLROOT ?>/marketplace">
                  <button class="sidebar_item link" id="marketplace_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Marketplace</p>
                  </button>
                </a>
              </li> -->

              <li>
                <a href="<?php echo URLROOT ?>/home">
                  <button class="sidebar_item link"  id="home_link">
                  <i class="fa-solid fa-house sidebar_icon"></i>
                    <p>Home</p>
                  </button>
                </a>
              </li>

              <li>

                <button class="expand_btn exp_bt_op" id="auction_expand">
                <i class="fas fa-gavel sidebar_icon"></i>
                  <p>Orders</p>
                  <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                <div class="expand hide_expand">
                <a href=" <?php echo URLROOT ?>/orders">
                    <button class="sidebar_item expand_item link" id="orders_link">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Available Orders</p>
                    </button>
                </a>

                <a href="<?php echo URLROOT ?>/orders/complete">
                    <button class="sidebar_item expand_item link" id="orders_complete_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Completed Orders</p>
                    </button>
                    </a>

                    <a href="<?php echo URLROOT ?>/orders/ongoing">
                    <button class="sidebar_item expand_item link" id="orders_ongoing_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Ongoing Orders</p>
                    </button>
                    </a>

                  </div>
              </li>
                            
              <li>
                <a href="<?php echo URLROOT ?>/deliveryRatings">
                  <button class="sidebar_item link"  id="reviews_link">
                  <i class="far fa-star  sidebar_icon" ></i>
                    <p>Reviews</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryInsight">
                  <button class="sidebar_item link"  id="insight_link">
                  <i class="fa-solid fa-chart-line" style="margin-right:15.2px;"></i>
                    <p>Insight</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryVehicles">
                  <button class="sidebar_item link"  id="vehicles_link">
                  <i class="fa-solid fa-truck" style="margin-right:12px;"></i>
                    <p>Vehicle</p>
                  </button>
                </a>
              </li>


            </ul>
          </div>


          <!-- sidebar mini -->

        </div>

      

      </div>