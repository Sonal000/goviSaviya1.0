// URL ROOT
const URLROOT = "http://localhost/goviSaviya1.0";



const navBtn = document.getElementById("bars_btn");
const overlay = document.getElementById("navSidebar_overlay");
const minisidebar = document.getElementById("main_sidebar_container_mini");

if(navBtn){

  navBtn.addEventListener("click", () => {
    minisidebar.classList.add("mini_show");
    overlay.classList.add("show_overlay");
    navBtn.classList.toggle("rotate_btn");
  });
}

if(overlay){
  overlay.addEventListener("click", () => {
    minisidebar.classList.remove("mini_show");
    overlay.classList.remove("show_overlay");
    navBtn.classList.toggle("rotate_btn");
  });
}


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
        url: "http://localhost/goviSaviya1.0/notification/getnotification",
        type: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $("#notify_content").empty();
            // <a href="${el.link ? el.link : ""}" class="notify">
            if (response.data) {
              $.each(response.data, function (index, el) {
                var html = ` 
              <a href="http://localhost/goviSaviya1.0/notification/markNotificationAsRead/${
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
        url: "http://localhost/goviSaviya1.0/notification/getnotificationcount",
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
        url: "http://localhost/goviSaviya1.0/notification/markAllNotificationAsRead",
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

// =======notificatins=====

// document.addEventListener("DOMContentLoaded", function () {
//   // sidebarToggele
//   const sidebarToggle = document.getElementById("sidebar_toggle_btn");
//   const mainSidebarContainer = document.querySelector(
//     ".main_sidebar_container"
//   );
//   const containerContent = document.querySelector(".container_content");
//   const sidebaritems = document.querySelector(".sidebar_items");
//   const sidebarItem = document.querySelectorAll(".sidebar_item");
//   const expandItem = document.querySelectorAll(".expand_item");
//   const expandBtnOp = document.querySelectorAll(".exp_bt_op");
//   const expand = document.querySelectorAll(".expand");
//   const sidebarIconsContainer = document.querySelector(
//     ".sidebar_icons_container"
//   );

//   sidebarToggle.addEventListener("click", () => {
//     sidebarToggle.classList.toggle("rotate180_btn");
//     mainSidebarContainer.classList.toggle("main_sidebar_container_toggle");
//     containerContent.classList.toggle("container_content_toggle");
//     sidebarIconsContainer.classList.toggle("sidebar_icons_container_toggle");
//     sidebaritems.classList.toggle("sidebar_items_toggle");
//     expand.forEach((el) => {
//       el.classList.toggle("expand_toggle");
//     });
//     sidebarItem.forEach((el) => {
//       el.classList.toggle("sidebar_item_toggle");
//     });
//     expandItem.forEach((el) => {
//       el.classList.toggle("expand_item_toggle");
//     });
//     expandBtnOp.forEach((el) => {
//       el.classList.toggle("exp_bt_op_toggle");
//     });
//   });

//   // Get all expand buttons
//   const expandButtons = document.querySelectorAll(".expand_btn");

//   // Add click event listener to each expand button
//   expandButtons.forEach(function (button) {
//     button.addEventListener("click", function () {
//       // Find the nearest parent li element
//       const listItem = button.closest("li");

//       // Find the nearest child div element
//       const expandDiv =
//         listItem.querySelector(".expand") ||
//         listItem.querySelector(".expand_m");

//       // Toggle the hide_expand class
//       expandDiv.classList.toggle("hide_expand");
//     });
//   });

//   //   sidebarItems.forEach(function (item) {
//   //     item.addEventListener("click", function () {
//   //       sidebarItems.forEach(function (otherItem) {
//   //         otherItem.classList.remove("sidebar_active");
//   //       });

//   //       // Add sidebar_active class to the clicked sidebar_item
//   //       item.classList.add("sidebar_active");
//   //     });
//   //   });

//   const marketplaceLink = document.getElementById("marketplace_link");
//   const addAuctionItemLink = document.getElementById("add_item_auction");
//   const viewAuctionItemLink = document.getElementById("view_item_auction");
//   const addItemLink = document.getElementById("add_item");
//   const viewItemLink = document.getElementById("view_item");

//   const marketplaceLink_m = document.getElementById("marketplace_link_m");
//   const addAuctionItemLink_m = document.getElementById("add_item_auction_m");
//   const viewAuctionItemLink_m = document.getElementById("view_item_auction_m");
//   const addItemLink_m = document.getElementById("add_item_m");
//   const viewItemLink_m = document.getElementById("view_item_m");
//   const auctionLink = document.getElementById("auction_link");
//   const auctionLink_m = document.getElementById("auction_link_m");
//   const ordersCurrentLink = document.getElementById("orders_current");
//   const ordersCurrentLink_m = document.getElementById("orders_current_m");
//   const ordersCompleteLink = document.getElementById("orders_complete");
//   const ordersCompleteLink_m = document.getElementById("orders_complete_m");
//   const reviewsLink = document.getElementById("reviews_link");
//   const reviewsLink_m = document.getElementById("reviews_link_m");
//   const availableReqLink = document.getElementById("available_requests");
//   const availableReqLink_m = document.getElementById("available_requests_m");
//   const acceptedReqLink = document.getElementById("accepted_requests");
//   const acceptedReqLink_m = document.getElementById("accepted_requests_m");

//   const links = [
//     marketplaceLink,
//     addAuctionItemLink,
//     viewAuctionItemLink,
//     addItemLink,
//     viewItemLink,
//     auctionLink,
//     ordersCurrentLink,
//     ordersCurrentLink_m,
//     ordersCompleteLink,
//     ordersCompleteLink_m,
//     reviewsLink,
//     reviewsLink_m,
//     auctionLink_m,
//     marketplaceLink_m,
//     addAuctionItemLink_m,
//     viewAuctionItemLink_m,
//     addItemLink_m,
//     viewItemLink_m,
//     availableReqLink,
//     availableReqLink_m,
//     acceptedReqLink,
//     acceptedReqLink_m,
//   ];

//   function setActive() {
//     const currentLocation = window.location.href.toLowerCase();
//     sidebarItem.forEach(function (otherItem) {
//       otherItem.classList.remove("sidebar_active");
//     });

//     if (currentLocation.includes("marketplace")) {
//       marketplaceLink.classList.add("sidebar_active");
//       marketplaceLink_m.classList.add("sidebar_active");
//     }
//     if (
//       currentLocation.includes("auc") &&
//       !currentLocation.includes("auction")
//     ) {
//       marketplaceLink.classList.add("sidebar_active");
//       marketplaceLink_m.classList.add("sidebar_active");
//     }
//     if (
//       currentLocation.includes("auction") &&
//       !currentLocation.includes("/add")
//     ) {
//       viewAuctionItemLink.classList.add("sidebar_active");
//       viewAuctionItemLink_m.classList.add("sidebar_active");
//       let listItem = viewAuctionItemLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = viewAuctionItemLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("auction/add")) {
//       addAuctionItemLink.classList.add("sidebar_active");
//       addAuctionItemLink_m.classList.add("sidebar_active");
//       let listItem = addAuctionItemLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = addAuctionItemLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("requests/available")) {
//       availableReqLink.classList.add("sidebar_active");
//       availableReqLink_m.classList.add("sidebar_active");
//       let listItem = availableReqLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = availableReqLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("requests/accepted")) {
//       acceptedReqLink.classList.add("sidebar_active");
//       acceptedReqLink_m.classList.add("sidebar_active");
//       let listItem = acceptedReqLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = acceptedReqLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }

//     if (
//       currentLocation.includes("orders") &&
//       !currentLocation.includes("/complete")
//     ) {
//       ordersCurrentLink.classList.add("sidebar_active");
//       ordersCurrentLink_m.classList.add("sidebar_active");
//       let listItem = ordersCurrentLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = ordersCurrentLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("orders/complete")) {
//       ordersCompleteLink.classList.add("sidebar_active");
//       ordersCompleteLink_m.classList.add("sidebar_active");
//       let listItem = ordersCompleteLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = ordersCompleteLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("reviews")) {
//       reviewsLink.classList.add("sidebar_active");
//       reviewsLink_m.classList.add("sidebar_active");
//     }
//     if (currentLocation.includes("listproduct")) {
//       addItemLink.classList.add("sidebar_active");
//       addItemLink_m.classList.add("sidebar_active");
//       let listItem = addItemLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = addItemLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//     if (currentLocation.includes("myproducts")) {
//       viewItemLink.classList.add("sidebar_active");
//       viewItemLink_m.classList.add("sidebar_active");
//       let listItem = viewItemLink.closest("li");
//       let expandDiv = listItem.querySelector(".expand");
//       expandDiv.classList.remove("hide_expand");
//       listItem = addItemLink_m.closest("li");
//       expandDiv = listItem.querySelector(".expand_m");
//       expandDiv.classList.remove("hide_expand");
//     }
//   }
//   setActive();
// });



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
  { path: "Home", ids: ["home_link", "home_link_m"] },
  { path: "orders", ids: ["orders_link", "orders_link_m"], exclude: ["complete", "ongoing","pickedup","delivering","delivered","conclude"] },
  { path: "orders/complete", ids: ["orders_complete_link", "orders_complete_link_m"], exclude: [ "ongoing"] },
  { path: "orders/ongoing", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude:"" },
  { path: "orders/pickedup", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
  { path: "orders/delivering", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
  { path: "orders/delivered", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
  { path: "orders/conclude", ids: ["orders_ongoing_link", "orders_ongoing_link_m"], exclude: ["ongoing"] },
  { path: "deliveryRatings", ids: ["reviews_ink", "reviews_link_m"], exclude:"" },
  { path: "deliveryinsight", ids: ["insight_link", "insight_link_m"], exclude:"" },
  { path: "deliveryVehicles", ids: ["vehicles_link", "vehicles_link_m"], exclude:"" },
//   { path: "orderrequests", ids: ["available_requests", "available_requests_m"] ,exclude:"accepted" },
//   { path: "orderrequests/accepted", ids: ["accepted_requests", "accepted_requests_m"] },
//   { path: "orders", ids: ["orders_current", "orders_current_m"], exclude: "/complete" },
//   { path: "orders/complete", ids: ["orders_complete", "orders_complete_m"] },
//   { path: "reviews", ids: ["reviews_link", "reviews_link_m"] },
//   { path: "listproduct", ids: ["add_item", "add_item_m"] },
//   { path: "myproducts", ids: ["view_item", "view_item_m"] }
];

sidebarMapping.forEach(item => {
  const { path, ids, exclude } = item;
  
  if (currentLocation.includes(path.toLowerCase())) {
    // console.log(path.toLowerCase());
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
