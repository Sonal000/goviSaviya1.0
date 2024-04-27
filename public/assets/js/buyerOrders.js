const trackOrder = document.querySelectorAll(".track_order");
const overlayAll = document.querySelectorAll(".overlay");
const backdrop = document.getElementById("backdrop");
const orderProgressBar = document.querySelector("order_progress");

trackOrder.forEach((el) => {
  el.addEventListener("click", () => {
    const bidCont = el.closest(".bid_item_cont");
    if (bidCont) {
      const overlay = bidCont.nextElementSibling;
      if (overlay) {
        overlay.classList.toggle("hidden_overlay");
        backdrop.classList.toggle("hidden_backdrop");
      }
    }
  });
});

backdrop.addEventListener("click", () => {
  backdrop.classList.toggle("hidden_backdrop");
  overlayAll.forEach((el) => {
    el.classList.add("hidden_overlay");
  });
  $(".complain_form_cont").addClass("hidden");
  $(".complain_btn_cont").show();
});
const historyOrder = document.querySelectorAll(".view_history");
// const orderProgressBar = document.querySelector("order_progress");

historyOrder.forEach((el) => {
  el.addEventListener("click", () => {
    const bidCont = el.closest(".bid_history_cont");
    if (bidCont) {
      const overlay = bidCont.nextElementSibling;
      if (overlay) {
        overlay.classList.toggle("hidden_overlay");
        backdrop.classList.toggle("hidden_backdrop");
      }
    }
  });
});

$(document).ready(function () {


  $('.closed_btn').each(function() {
    $(this).on('click', function() {
      $(this).closest('.overlay').addClass('hidden_overlay');
      backdrop.classList.toggle('hidden_backdrop');
    });
  });

  $(".order_progress").each(function () {
    var $container = $(this);

    // Get the order status from the data attribute
    var orderStatus = $container.data("progress");
    // var orderStatus = $('[data-progress]').data('progress');

    // $('.node').removeClass('in_progress complete');

    switch (orderStatus) {
      case "pending":
        $container.find("#placed").addClass("in_progress");
        break;
      case "deliver_assigned":
        // $('#placed .node').addClass('complete');
        $container.find("#placed").addClass("complete");
        $container.find("#picked").addClass("in_progress");
        break;
      case "pickedup":
        $container.find("#placed").addClass("complete");
        $container.find("#picked").addClass("complete");
        break;
      case "delivering":
        $container.find("#placed").addClass("complete");
        $container.find("#picked").addClass("complete");
        $container.find("#arrived").addClass("in_progress");
        break;
      case "delivered":
        $container.find("#placed").addClass("complete");
        $container.find("#picked").addClass("complete");
        $container.find("#arrived").addClass("complete");
        $container.find("#completed").addClass("in_progress");
        break;
      case "completed":
        $container.find("#placed").addClass("complete");
        $container.find("#picked").addClass("complete");
        $container.find("#arrived").addClass("complete");
        $container.find("#completed").addClass("complete");
        break;
      default:
        break;
    }
  });
});

$("#complain_btn").click(function () {
  $(".complain_form_cont").removeClass("hidden");
  $(".complain_btn_cont").fadeOut();
  $(".complain_btn_cont").hide();
});

$("#cancel_complain").click(function (e) {
  e.peventDefault();
  $(".complain_form_cont").addClass("hidden");
  $(".complain_btn_cont").show();
});


$(".cform_close").each(function() {
  $(this).on("click", function() {
    $(this).closest(".complain_form_cont").addClass("hidden");
    $(this).closest(".complain_form_cont").siblings(".complain_btn_cont").show();
  });
});
$(".view_complain").each(function() {
  $(this).on("click", function() {
    $(this).closest(".complain_btn_cont").siblings(".complain_form_cont").removeClass("hidden");
    $(this).closest(".complain_btn_cont").hide();
  });
});
