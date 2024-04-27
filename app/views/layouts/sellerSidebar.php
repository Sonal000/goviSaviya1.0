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
              <li>
                <a href="<?php echo URLROOT ?>/marketplace">
                  <button class="sidebar_item link" id="marketplace_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Marketplace</p>
                  </button>
                </a>
              </li>
              <li>

                <button class="expand_btn exp_bt_op" id="auction_expand">
                <i class="fas fa-gavel sidebar_icon"></i>
                  <p>Auction</p>
                 <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                <div class="expand hide_expand">
                <a href=" <?php echo URLROOT ?>/auctionC/add">
                    <button class="sidebar_item expand_item link" id="add_item_auction">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>List new</p>
                    </button>
                </a>
                <a href="<?php echo URLROOT ?>/auctionC/items">
                    <button class="sidebar_item expand_item link" id="view_item_auction">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>My Auctions</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/auctionC/history">
                    <button class="sidebar_item expand_item link" id="view_history_auction">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Auction History</p>
                    </button>
                    </a>
                  </div>
              </li>
              <li>
                <button class="expand_btn exp_bt_op" id="products_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Products</p>
                 <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/listproduct">
                    <button class="sidebar_item expand_item link" id="add_item">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>List new</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/myproducts">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Current items</p>
                    </button>
                    </a>
                  </div>
              </li>
              <li>
                <button class="expand_btn exp_bt_op" id="requests_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Requests</p>
                 <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/OrderRequests">
                    <button class="sidebar_item expand_item link" id="available_requests">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Available Requests</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/OrderRequests/accepted">
                    <button class="sidebar_item expand_item link" id="accepted_requests">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Requests History</p>
                    </button>
                    </a>
                    <!-- <a href="<?php echo URLROOT ?>/OrderRequests/quoted">
                    <button class="sidebar_item expand_item link" id="accepted_requests">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Accepted Requests</p>
                    </button>
                    </a> -->
                  </div>
              </li>
              <li>
                <button class="expand_btn exp_bt_op" id="orders_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Orders</p>
                 <i class="fas fa-chevron-right  expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/orders">
                    <button class="sidebar_item expand_item link" id="orders_current">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Current Orders</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/orders/completedd">
                    <button class="sidebar_item expand_item link" id="orders_complete">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Complete Orders</p>
                    </button>
                    </a>
                  </div>
              </li>
              <li>
                <a href="<?php echo URLROOT ?>/Reviews">
                  <button class="sidebar_item link"  id="reviews_link">
                    <i class="far fa-star  sidebar_icon" ></i>
                    <p>Reviews</p>
                  </button>
                </a>
              </li>

            </ul>
          </div>
        </div>

      </div>


        