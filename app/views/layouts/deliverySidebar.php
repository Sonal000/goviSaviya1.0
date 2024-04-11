<div class="main_sidebar_container">
        <div class="sidebar_conatainer">
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
                <a href="<?php echo URLROOT ?>/deliveryHome">
                  <button class="sidebar_item link"  id="reviews_link">
                  <i class="fa-solid fa-house sidebar_icon"></i>
                    <p>Home</p>
                  </button>
                </a>
              </li>

              <li>

                <button class="expand_btn exp_bt_op" id="auction_expand">
                <i class="fas fa-gavel sidebar_icon"></i>
                  <p>Orders</p>
                  <i class="fas fa-sort-down expand_icon"></i>
                </button>
                <div class="expand hide_expand">
                <a href=" <?php echo URLROOT ?>/orders">
                    <button class="sidebar_item expand_item link" id="add_item_auction">
                    <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Available Orders</p>
                    </button>
                </a>

                <a href="<?php echo URLROOT ?>/orders/complete">
                    <button class="sidebar_item expand_item link" id="view_item_auction">
                    <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Completed Orders</p>
                    </button>
                    </a>

                    <a href="<?php echo URLROOT ?>/orders/ongoing">
                    <button class="sidebar_item expand_item link" id="view_item_auction">
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
                  <button class="sidebar_item link"  id="reviews_link">
                  <i class="fa-solid fa-chart-line" style="margin-right:15.2px;"></i>
                    <p>Insight</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryVehicles">
                  <button class="sidebar_item link"  id="reviews_link">
                  <i class="fa-solid fa-truck" style="margin-right:12px;"></i>
                    <p>Vehicles</p>
                  </button>
                </a>
              </li>


            </ul>
          </div>


          <!-- sidebar mini -->

          <div class="sidebar_icons_container">
          <ul>
             
              <li>
                <button class="expand_btn expand_btn_m" id="auction_expand">
                <!-- <i class="fas fa-gavel sidebar_icon"></i> -->
                  <p>Orders</p>
                  <i class="fas fa-sort-down "></i>
                </button>
                <div class="expand_m hide_expand">
                  <a href="<?php echo URLROOT ?>/auction/add">
                    <button class="sidebar_icon_btn link" id="add_item_auction_m">
                      <i class="fas fa-plus sidebar_icon" ></i>
                      <p>Available Orders</p>
                    </button>
                  </a>
                  <a href="<?php echo URLROOT ?>/orders/complete">
                    <button class="sidebar_icon_btn link" id="view_item_auction_m">
                      <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Completed Orders</p>
                    </button>
                  </a>
                  <a href="<?php echo URLROOT ?>/orders/ongoing">
                    <button class="sidebar_icon_btn link" id="view_item_auction_m">
                      <i class="fas fa-poll-h sidebar_icon"></i>
                      <p>Ongoing Orders</p>
                    </button>
                  </a>
                  </div>
              </li>
             
             
              
              <li>
                <a href="<?php echo URLROOT ?>/deliveryRatings" id="reviews_link_m">
                  <button class="sidebar_icon_btn link" >
                    <i class="far fa-star  sidebar_icon" ></i>
                    <p>Reviews</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryInsight" id="reviews_link_m">
                  <button class="sidebar_icon_btn link" >
                    <i class="far fa-star  sidebar_icon" ></i>
                    <p>Insight</p>
                  </button>
                </a>
              </li>

              <li>
                <a href="<?php echo URLROOT ?>/deliveryVehicles" id="reviews_link_m">
                  <button class="sidebar_icon_btn link" >
                    <i class="fa-solid fa-truck  sidebar_icon" ></i>
                    <p>Vehicles</p>
                  </button>
                </a>
              </li>

          </ul>

          </div>
        </div>

      </div>


        