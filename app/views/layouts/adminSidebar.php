



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
    <p>Hii Welcome <span> <?php echo $_SESSION['admin_name'] ?></span></p>

    <a href="<?php echo URLROOT; ?>/adminC/logout">Logout <i class="fas fa-sign-out-alt"></i></a>
  </div>
   </div>

          <div class="sidebar_toggle">
            <button class="sidebar_toggle_btn" id="sidebar_toggle_btn" >
            <i class="fas fa-arrow-left"></i>
            </button>
          </div>
          <div class="sidebar_items">
            <ul>
              <li>
                <a href="<?php echo URLROOT ?>/Home">
                  <button class="sidebar_item link" id="dashboard_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Dashboard</p>
                  </button>
                </a>
              </li>
              <li>
                <a href="<?php echo URLROOT ?>/Users">
                  <button class="sidebar_item link" id="users_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Users</p>
                  </button>
                </a>
              </li>
              <li>
    
                <a href="<?php echo URLROOT ?>/Orders">
                  <button class="sidebar_item link" id="orders_link" >
                  <i class="fas fa-book-reader sidebar_icon"></i>
                    <p>Orders</p>
                  </button>
                </a>
               
              </li>
              <li>
              <button class="expand_btn exp_bt_op" id="products_expand">
                <i class="fas fa-check-double sidebar_icon"></i>
                  <p>Quality Check</p>
                  <i class="fas fa-sort-down expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                <a href="<?php echo URLROOT ?>/qualityCheck">
                  <button class="sidebar_item link" id="qc_link" >
                  <i class="far fa-building sidebar_icon"></i>
                    <p>Complained QC</p>
                  </button>
                </a>
                <a href="<?php echo URLROOT ?>/qualitycheck/penalty">
                  <button class="sidebar_item link" id="penalty_link" >
                    <i class="fas fa-coins sidebar_icon"></i>
                    <p>Penalty QC</p>
                  </button>
                </a>
                </div>
              </li>
              
              <li>
                <button class="expand_btn exp_bt_op" id="products_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Posts</p>
                  <i class="fas fa-sort-down expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/Posts/marketplace">
                    <button class="sidebar_item expand_item link" id="marketplace_post_link">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Marketplace Posts</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/auction">
                    <button class="sidebar_item expand_item link" id="auction_post_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Auction Posts</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/Requests">
                    <button class="sidebar_item expand_item link" id="request_post_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Requests Posts</p>
                    </button>
                    </a>
                  </div>
              </li>
              <li>
                <button class="expand_btn exp_bt_op" id="products_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Vehicles</p>
                  <i class="fas fa-sort-down expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/Vehicle">
                    <button class="sidebar_item expand_item link" id="pickuptrucks_link">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Pickup Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/deliveryTrucks">
                    <button class="sidebar_item expand_item link" id="deliverytrucks_link">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Delivery Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/Deliveryvan">
                    <button class="sidebar_item expand_item link" id="deliveryvans_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Delivery Vans</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/Three_Wheeler">
                    <button class="sidebar_item expand_item link" id="threeWheeler_link">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Three-Wheelers</p>
                    </button>
                    </a>
                  </div>
              </li>
              
            

            </ul>
          </div>


          <!-- sidebar mini -->

        </div>

      </div>


        

      <div class="main_sidebar_container_mini" id="main_sidebar_container_mini">

      <div class="sidebar_conatainer">

        
<div class="nav_img_cont_d">
<a href="<?php echo URLROOT ?>/Home">
<img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
</a>
<!-- <button class="bars_btn" id="bars_btn">
<i class="fas fa-bars bars"></i>
</button> -->

<div class="welcome_user">
<p>Hii Welcome <span> <?php echo $_SESSION['admin_name'] ?></span></p>

<a href="<?php echo URLROOT; ?>/adminC/logout">Logout <i class="fas fa-sign-out-alt"></i></a>
</div>
</div>

  <div class="sidebar_toggle">
    <button class="sidebar_toggle_btn" id="sidebar_toggle_btn" >
    <i class="fas fa-arrow-left"></i>
    </button>
  </div>
  <div class="sidebar_items">
    <ul>
      <li>
        <a href="<?php echo URLROOT ?>/Home">
          <button class="sidebar_item link" id="dashboard_link" >
            <i class="fas fa-store sidebar_icon"></i>
            <p>Dashboard</p>
          </button>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT ?>/Users">
          <button class="sidebar_item link" id="users_link" >
            <i class="fas fa-store sidebar_icon"></i>
            <p>Users</p>
          </button>
        </a>
      </li>
      <li>

        <a href="<?php echo URLROOT ?>/Orders">
          <button class="sidebar_item link" id="orders_link" >
          <i class="fas fa-book-reader sidebar_icon"></i>
            <p>Orders</p>
          </button>
        </a>
       
      </li>
      <li>
      <button class="expand_btn exp_bt_op" id="products_expand">
        <i class="fas fa-check-double sidebar_icon"></i>
          <p>Quality Check</p>
          <i class="fas fa-sort-down expand_icon"></i>
        </button>
          <div class="expand hide_expand ">
        <a href="<?php echo URLROOT ?>/qualityCheck">
          <button class="sidebar_item link" id="qc_link" >
          <i class="far fa-building sidebar_icon"></i>
            <p>Complained QC</p>
          </button>
        </a>
        <a href="<?php echo URLROOT ?>/qualitycheck/penalty">
          <button class="sidebar_item link" id="penalty_link" >
            <i class="fas fa-coins sidebar_icon"></i>
            <p>Penalty QC</p>
          </button>
        </a>
        </div>
      </li>
      
      <li>
        <button class="expand_btn exp_bt_op" id="products_expand">
        <i class="fas fa-book-reader sidebar_icon"></i>
          <p>Posts</p>
          <i class="fas fa-sort-down expand_icon"></i>
        </button>
          <div class="expand hide_expand ">
            <a href="<?php echo URLROOT ?>/Posts/marketplace">
            <button class="sidebar_item expand_item link" id="marketplace_post_link">
            <i class="fas fa-poll-h sidebar_icon" ></i>
              <p>Marketplace Posts</p>
            </button>
            </a>
            <a href="<?php echo URLROOT ?>/Posts/auction">
            <button class="sidebar_item expand_item link" id="auction_post_link">
            <i class="fas fa-poll-h sidebar_icon"></i>
              <p>Auction Posts</p>
            </button>
            </a>
            <a href="<?php echo URLROOT ?>/Posts/Requests">
            <button class="sidebar_item expand_item link" id="request_post_link">
            <i class="fas fa-poll-h sidebar_icon"></i>
              <p>Requests Posts</p>
            </button>
            </a>
          </div>
      </li>
      <li>
        <button class="expand_btn exp_bt_op" id="products_expand">
        <i class="fas fa-book-reader sidebar_icon"></i>
          <p>Vehicles</p>
          <i class="fas fa-sort-down expand_icon"></i>
        </button>
          <div class="expand hide_expand ">
            <a href="<?php echo URLROOT ?>/Vehicle">
            <button class="sidebar_item expand_item link" id="pickuptrucks_link">
            <i class="fas fa-poll-h sidebar_icon" ></i>
              <p>Pickup Trucks</p>
            </button>
            </a>
            <a href="<?php echo URLROOT ?>/Vehicle/deliveryTrucks">
            <button class="sidebar_item expand_item link" id="deliverytrucks_link">
            <i class="fas fa-poll-h sidebar_icon" ></i>
              <p>Delivery Trucks</p>
            </button>
            </a>
            <a href="<?php echo URLROOT ?>/Vehicle/Deliveryvan">
            <button class="sidebar_item expand_item link" id="deliveryvans_link">
            <i class="fas fa-poll-h sidebar_icon"></i>
              <p>Delivery Vans</p>
            </button>
            </a>
            <a href="<?php echo URLROOT ?>/Vehicle/Three_Wheeler">
            <button class="sidebar_item expand_item link" id="threeWheeler_link">
            <i class="fas fa-poll-h sidebar_icon"></i>
              <p>Three-Wheelers</p>
            </button>
            </a>
          </div>
      </li>
      
    

    </ul>
  </div>


  <!-- sidebar mini -->

</div>
      </div>

   