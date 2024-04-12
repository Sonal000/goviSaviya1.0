<!-- <div class="Sellersidebar">
    <div class="side_cont">
            <ul>
                <a href="<?php echo URLROOT; ?>/Home"><li><img src="<?php echo URLROOT ;?>/assets/images/users.png"  alt="" class="auction"> Users</li></a>
                <a href="<?php echo URLROOT; ?>/Orders"><li><img src="<?php echo URLROOT ;?>/assets/images/orderM.png"  alt="" class="auction"> Orders</li></a>
                <a href="<?php echo URLROOT; ?>/Posts"><li><img src="<?php echo URLROOT ;?>/assets/images/posts.png"  alt="" class="auction"> Posts</li></a>
                <a href="<?php echo URLROOT; ?>/Vehicles"><li><img src="<?php echo URLROOT ;?>/assets/images/posts.png"  alt="" class="auction"> Delivery Vehicles</li></a>
            </ul>
    </div>
    </div> -->



    <div class="main_sidebar_container">
        <div class="sidebar_conatainer">
          <div class="sidebar_toggle">
            <button class="sidebar_toggle_btn" id="sidebar_toggle_btn" >
            <i class="fas fa-arrow-left"></i>
            </button>
          </div>
          <div class="sidebar_items">
            <ul>
              <li>
                <a href="<?php echo URLROOT ?>/Home">
                  <button class="sidebar_item link" id="marketplace_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Users</p>
                  </button>
                </a>
              </li>
              <li>
                <a href="<?php echo URLROOT ?>/Orders">
                  <button class="sidebar_item link" id="marketplace_link" >
                    <i class="fas fa-store sidebar_icon"></i>
                    <p>Orders</p>
                  </button>
                </a>
              </li>
              
              <li>
                <button class="expand_btn exp_bt_op" id="products_expand">
                <i class="fas fa-book-reader sidebar_icon"></i>
                  <p>Posts</p>
                  <i class="fas fa-sort-down expand_icon"></i>
                </button>
                  <div class="expand hide_expand ">
                    <a href="<?php echo URLROOT ?>/Posts/marketplace">
                    <button class="sidebar_item expand_item link" id="add_item">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Marketplace Posts</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/auction">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Auction Posts</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/Requests">
                    <button class="sidebar_item expand_item link" id="view_item">
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
                    <button class="sidebar_item expand_item link" id="add_item">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Pick up Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/containertrucks">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Container Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/Cars">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Cars</p>
                    </button>
                    </a>
                  </div>
              </li>
              
            

            </ul>
          </div>


          <!-- sidebar mini -->

          <div class="sidebar_icons_container">
          <ul>
              <li>
                <a href="<?php echo URLROOT ?>/Home">
                  <button class="sidebar_icon_btn link" id="marketplace_link_m">
                    <i class="fas fa-store sidebar_icon"></i>
                    <p class="icon_text">Users</p>
                  </button>
                </a>
              </li>
              <li>
                <a href="<?php echo URLROOT ?>/Orders">
                  <button class="sidebar_icon_btn link" id="marketplace_link_m">
                    <i class="fas fa-store sidebar_icon"></i>
                    <p class="icon_text">Orders</p>
                  </button>
                </a>
              </li>
              
              <li>
                <button class="expand_btn expand_btn_m " id="products_expand">
                <!-- <i class="fas fa-book-reader sidebar_icon"></i> -->
                  <p>Posts</p>
                  <i class="fas fa-sort-down "></i>
                </button>
                  <div class="expand_m hide_expand ">
                    <a href="<?php echo URLROOT ?>/Posts/marketplace">
                      <button class="sidebar_icon_btn  link" id="add_item_m">
                        <i class="fas fa-plus sidebar_icon" ></i>
                        <p>Marketplace Posts</p>
                      </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/auction">
                      <button class="sidebar_icon_btn link" id="view_item_m">
                        <i class="fas fa-poll-h sidebar_icon"></i>
                        <p>Auction Posts</p>
                      </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Posts/Requests">
                      <button class="sidebar_icon_btn  link" id="add_item_m">
                        <i class="fas fa-plus sidebar_icon" ></i>
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
                    <button class="sidebar_item expand_item link" id="add_item">
                    <i class="fas fa-poll-h sidebar_icon" ></i>
                      <p>Pick up Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/containertrucks">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Container Trucks</p>
                    </button>
                    </a>
                    <a href="<?php echo URLROOT ?>/Vehicle/Cars">
                    <button class="sidebar_item expand_item link" id="view_item">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Cars</p>
                    </button>
                    </a>
                  </div>
              </li>
          </ul>

          </div>
        </div>

      </div>


        

   