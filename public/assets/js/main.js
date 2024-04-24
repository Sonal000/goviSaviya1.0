// URL ROOT
const URLROOT = "http://localhost/goviSaviya1.0";

// navbar========
const navBtn = document.getElementById("bars_btn");
const overlay = document.getElementById("navSidebar_overlay");
const navSidebar = document.getElementById("navSidebar_cont");

navBtn.addEventListener("click", () => {
  navSidebar.classList.add("show_navSidebar");
  overlay.classList.add("show_overlay");
  navBtn.classList.toggle("rotate_btn");
});

overlay.addEventListener("click", () => {
  navSidebar.classList.remove("show_navSidebar");
  overlay.classList.remove("show_overlay");
  navBtn.classList.toggle("rotate_btn");
});

// const joinBtn = document.getElementById("join_btn");
// const signinBtn = document.getElementById("signin_btn");

// joinBtn.addEventListener("click", () => {
//     window.location.href = `${URLROOT}/register`;
//   });
//   signinBtn.addEventListener("click", () => {
//     window.location.href = `${URLROOT}/login`;
//   });

document.addEventListener("click", (event) => {
  const targetId = event.target.id;

  if (targetId === "join_btn") {
    window.location.href = `${URLROOT}/register`;
  } else if (targetId === "signin_btn") {
    window.location.href = `${URLROOT}/login`;
  }
});

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

  // <button id="btn_notify_${
  //   el.notification_id
  // }" class="btn_notify">
  // <i class="fas fa-ellipsis-v"></i>
  // </button>

  //                 <div class="notify_option hide">
  // <button class="btn_option" id="mark">Mark as read</button>
  // <button class="btn_option" id="markall">Mark all as read</button>
  // <button class="btn_option" id="delete">delete</button>
  // </div>

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
                  :el.type == "REQUEST"?  "<i class='fas fa-tasks'></i>" :"<i class='fas fa-bell'></i>"
              }
              </div>
              </div>

            
              
              <div class="notify_message">${el.message}
              <div class="time">${getTimeAgo(el.date_time)}</div>
              </div>
                            <div class="notify_op">


        
           
             
          
              </div>
            </a>
              
             `;
                $("#notify_content").append(html);

                // $(`#btn_notify_${el.notification_id}`).click(function (event) {
                //   event.stopPropagation();
                //   event.preventDefault();
                //   $(this).siblings(".notify_option").toggleClass("hide");
                //   console.log("clicked" + el.notification_id);
                // });
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

    $(document).click(function (event) {
      if (!$(event.target).closest(".btn_notify").length) {
        $(".notify_option").addClass("hide"); // Hide all .notify_option elements
      }
    });
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
    },5000);


    $(document).on("click", "#markAllReadBtn", function() {
      markAllNotificationsAsRead();
    });

  }
});
