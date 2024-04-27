// URL ROOT
const URLROOT = "http://localhost/goviSaviya1.0";

// =======notificatins=====

$("#notification_btn").click(function (event) {
  event.stopPropagation();
  event.preventDefault();
  $(".notification_panel").toggleClass("hide");

  // if (!$(".notification_panel").hasClass("hide")) {
  //   fetchAndShowNotifications();
  // }
});
$(document).click(function (event) {
  // Check if the click target is NOT the notification panel or its children
  if (!$(event.target).closest(".notification_panel").length) {
    $(".notification_panel").addClass("hide");
  }
});

// In your JavaScript file (e.g., cart.js)

$(document).ready(function () {
  function getTimeAgo(dateTimeStr) {
    const dateTime = new Date(dateTimeStr);
    const now = new Date();
    const timeDiff = now - dateTime;

    // Convert time difference to seconds
    const seconds = timeDiff / 1000;

    if (seconds < 60) {
      return "just now";
    } else if (seconds < 3600) {
      const minutes = Math.floor(seconds / 60);
      return `${minutes} minutes ago`;
    } else if (seconds < 86400) {
      const hours = Math.floor(seconds / 3600);
      return `${hours} hours ago`;
    } else if (seconds < 604800) {
      const days = Math.floor(seconds / 86400);
      return `${days} days ago`;
    } else if (seconds < 2628000) {
      const weeks = Math.floor(seconds / 604800);
      return `${weeks} weeks ago`;
    } else if (seconds < 31536000) {
      const months = Math.floor(seconds / 2628000);
      return `${months} months ago`;
    } else {
      const years = Math.floor(seconds / 31536000);
      return `${years} years ago`;
    }
  }

  // Example usage

  if ($("#notify_content").length) {
    function fetchData() {
      $.ajax({
        url: "http://localhost/goviSaviya1.0/notification/getadminnotification",
        type: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#notify_content").empty();
            // <a href="${el.link ? el.link : ""}" class="notify">
            if (response.data) {
              $.each(response.data, function (index, el) {
                var html = ` 
              <a href="http://localhost/goviSaviya1.0/notification/markadminNotificationAsRead/${
                el.notification_id
              }" class="notify">
              
              <div class="notify_type_cont">
              <div class='notify_type ${el.seen ? "" : "seen_icon"}'>
              ${
                el.type == "ORDER"
                  ? "<i class='fas fa-cube'></i>"
                  : el.type == "DELIVERY"
                  ? "<i class='fas fa-shipping-fast'></i>"
                  : el.type == "AUCTION"?"<i class='fas fa-gavel'></i>"
                  :el.type == "REQUEST"?  "<i class='fas fa-tasks'></i>" :
                  "<i class='fas fa-bell'></i>"
              }
              </div>
              </div>

              
              <div class="notify_message">${el.message}
              <div class="time">${getTimeAgo(el.date_time)}</div>
              </div>
            </a>
              
             `;
                $("#notify_content").append(html);
              });
            } else {
              var html = "<div class='notify'>Nothing to show</div>";
              $("#notify_content").append(html);
            }
          } else {
            // Display error message
            $("#cont").html("<p> Error display  data.</p>");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("AJAX Error:", textStatus, errorThrown);
          $("#cont").html("<p> unable to get the notifications.</p>");
        },
      });
    }

    function getCount() {
      $.ajax({
        url: "http://localhost/goviSaviya1.0/notification/getadminnotificationcount",
        type: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $(".notification_count").empty();
            // <a href="${el.link ? el.link : ""}" class="notify">
            if (response.data) {
              $(".notification_count").text(response.data);
              $(".notification_count").removeClass("hide");
              $(".notification_count").hide();
              $(".notification_count").fadeIn();
            } else {
              $(".notification_count").text(response.data);
              $(".notification_count").fadeOut();
              $(".notification_count").addClass("hide");
              $(".notification_count").hide();
            }
          } else {
            // Display error message
            $("#cont").html("<p> Error display  data.</p>");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("AJAX Error:", textStatus, errorThrown);
          $("#cont").html("<p> unable to get the notifications.</p>");
        },
      });
    }

    function markAllNotificationsAsRead() {
      $.ajax({
        url: "http://localhost/goviSaviya1.0/notification/markAdminAllNotificationAsRead",
        type: "POST", 
        dataType: "json",
        data: {}, 
        success: function(response) {
          if (response.status === "success") {
            
            $(".notification_count").text("0"); 
            $(".notification_count").fadeOut(); 
            fetchData();
          } else {
            // Display error message
            $("#cont").html("<p>" + response.message + "</p>");
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("AJAX Error:", textStatus, errorThrown);
        },
      });
    }

    // Call the fetchData function when the page loads
    getCount();
    fetchData();
    setInterval(function () {
      fetchData();
      getCount();
    }, 5000);
  }
  $(document).on("click", "#markAllReadBtn", function() {
    markAllNotificationsAsRead();
  });
});



$(document).ready(function () {
  // Sidebar Toggle
  // $("#sidebar_toggle_btn").click(function () {
  //   $(this).toggleClass("rotate180_btn");
  //   $(".main_sidebar_container, .container_content, .sidebar_icons_container, .sidebar_items").toggleClass("main_sidebar_container_toggle container_content_toggle sidebar_icons_container_toggle sidebar_items_toggle");
  //   $(".expand").toggleClass("expand_toggle");
  //   $(".sidebar_item").toggleClass("sidebar_item_toggle");
  //   $(".expand_item").toggleClass("expand_item_toggle");
  //   $(".exp_bt_op").toggleClass("exp_bt_op_toggle");
  // });

  // Expand Button Click Event
  $(".expand_btn").click(function () {
    $(this).closest("li").find(".expand, .expand_m").toggleClass("hide_expand");
    $(this).closest("li").find(".expand_icon").toggleClass("expand_icon_rotate");
    $(this).toggleClass("expand_btn_hover");
  });




  const currentLocation = window.location.href.toLowerCase();
$(".sidebar_item").removeClass("sidebar_active");

const sidebarMapping = [
  { path: "Home", ids: ["dashboard_link", "dashboard_link_m"] },
  { path: "orders", ids: ["orders_link", "orders_link_m"], exclude: ["qualitycheck"] },
  { path: "qualityCheck", ids: ["qc_link", "qc_link_m"], exclude: ["penalty"] },
  { path: "qualityCheck/penalty", ids: ["penalty_link", "penalty_link_m"], exclude: [] },
  { path: "posts/marketplace", ids: ["marketplace_post_link", "marketplace_post_link_m"], exclude: [ "ongoing"] },
  { path: "posts/auction", ids: ["auction_post_link", "auction_post_link_m"], exclude: [ "ongoing"] },
  { path: "posts/request", ids: ["request_post_link", "request_post_link_m"], exclude: [ "ongoing"] },
  { path: "vehicle", ids: ["pickuptrucks_link", "pickuptrucks_link_m"], exclude: [ "containertrucks","deliverytrucks","deliveryVan","Three_Wheeler"] },
  { path: "vehicle/deliverytrucks", ids: ["deliverytrucks_link", "deliverytrucks_link_link_m"], exclude: [ "ongoing"] },
  { path: "vehicle/deliveryVan", ids: ["deliveryvans_link", "deliveryvans_link_link_m"], exclude: [ "ongoing"] },
  { path: "vehicle/Three_Wheeler", ids: ["threeWheeler_link", "threeWheeler_link_m"], exclude: [ "ongoing"] },
//   { path: "orders/ongoing", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude:"" },
//   { path: "orders/pickedup", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
//   { path: "orders/delivering", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
//   { path: "orders/delivered", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
//   { path: "orders/conclude", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
//   { path: "deliveryRatings", ids: ["reviews_ink", "reviews_link_m"], exclude:"" },
  { path: "Users", ids: ["users_link", "users_link_m"], exclude:"" },
  { path: "deliveryVehicles", ids: ["vehicles_link", "vehicles_link_m"], exclude:"" },
];

sidebarMapping.forEach(item => {
  const { path, ids, exclude } = item;
  
  if (currentLocation.includes(path.toLowerCase())) {
    if (exclude) {
      if (Array.isArray(exclude)) {
        if (exclude.some(excludedPath => currentLocation.includes(excludedPath.toLowerCase()))) {
          // console.log(`Excluded: ${path}`);
          return;
        }
      } else if (currentLocation.includes(exclude.toLowerCase())) {
        // console.log(`Excluded: ${path}`);
        return;
      }
    }

    $(`#${ids[0]}, #${ids[1]}`).addClass("sidebar_active");
    $(`#${ids[0]}`).closest("li").find(".expand").removeClass("hide_expand");
    $(`#${ids[1]}`).closest("li").find(".expand_m").removeClass("hide_expand");
    $(`#${ids[0]}`).closest("li").find(".expand_btn").addClass("expand_btn_hover");
    $(`#${ids[1]}`).closest("li").find(".expand_btn__m").addClass("hide_expand");
    $(`#${ids[0]}`).closest("li").find(".expand_icon").addClass("expand_icon_rotate");
    // $(`#${ids[1]}`).closest("li").find(".expand_icon").addClass("expand_icon_rotate");
  }
});



});
