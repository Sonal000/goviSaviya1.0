// URL ROOT
const URLROOT = "http://localhost/goviSaviya1.0";

document.addEventListener("DOMContentLoaded", function () {
  // sidebarToggele
  const sidebarToggle = document.getElementById("sidebar_toggle_btn");
  const mainSidebarContainer = document.querySelector(
    ".main_sidebar_container"
  );
  const containerContent = document.querySelector(".container_content");
  const sidebaritems = document.querySelector(".sidebar_items");
  const sidebarItem = document.querySelectorAll(".sidebar_item");
  const expandItem = document.querySelectorAll(".expand_item");
  const expandBtnOp = document.querySelectorAll(".exp_bt_op");
  const expand = document.querySelectorAll(".expand");
  const sidebarIconsContainer = document.querySelector(
    ".sidebar_icons_container"
  );

  sidebarToggle.addEventListener("click", () => {
    sidebarToggle.classList.toggle("rotate180_btn");
    mainSidebarContainer.classList.toggle("main_sidebar_container_toggle");
    containerContent.classList.toggle("container_content_toggle");
    sidebarIconsContainer.classList.toggle("sidebar_icons_container_toggle");
    sidebaritems.classList.toggle("sidebar_items_toggle");
    expand.forEach((el) => {
      el.classList.toggle("expand_toggle");
    });
    sidebarItem.forEach((el) => {
      el.classList.toggle("sidebar_item_toggle");
    });
    expandItem.forEach((el) => {
      el.classList.toggle("expand_item_toggle");
    });
    expandBtnOp.forEach((el) => {
      el.classList.toggle("exp_bt_op_toggle");
    });
  });

  // Get all expand buttons
  const expandButtons = document.querySelectorAll(".expand_btn");

  // Add click event listener to each expand button
  expandButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Find the nearest parent li element
      const listItem = button.closest("li");

      // Find the nearest child div element
      const expandDiv =
        listItem.querySelector(".expand") ||
        listItem.querySelector(".expand_m");

      // Toggle the hide_expand class
      expandDiv.classList.toggle("hide_expand");
    });
  });

  //   sidebarItems.forEach(function (item) {
  //     item.addEventListener("click", function () {
  //       sidebarItems.forEach(function (otherItem) {
  //         otherItem.classList.remove("sidebar_active");
  //       });

  //       // Add sidebar_active class to the clicked sidebar_item
  //       item.classList.add("sidebar_active");
  //     });
  //   });

  const marketplaceLink = document.getElementById("marketplace_link");
  const addAuctionItemLink = document.getElementById("add_item_auction");
  const viewAuctionItemLink = document.getElementById("view_item_auction");
  const addItemLink = document.getElementById("add_item");
  const viewItemLink = document.getElementById("view_item");

  const marketplaceLink_m = document.getElementById("marketplace_link_m");
  const addAuctionItemLink_m = document.getElementById("add_item_auction_m");
  const viewAuctionItemLink_m = document.getElementById("view_item_auction_m");
  const addItemLink_m = document.getElementById("add_item_m");
  const viewItemLink_m = document.getElementById("view_item_m");
  const auctionLink = document.getElementById("auction_link");
  const auctionLink_m = document.getElementById("auction_link_m");
  const ordersCurrentLink = document.getElementById("orders_current");
  const ordersCurrentLink_m = document.getElementById("orders_current_m");
  const ordersCompleteLink = document.getElementById("orders_complete");
  const ordersCompleteLink_m = document.getElementById("orders_complete_m");
  const reviewsLink = document.getElementById("reviews_link");
  const reviewsLink_m = document.getElementById("reviews_link_m");
  const availableReqLink = document.getElementById("available_requests");
  const availableReqLink_m = document.getElementById("available_requests_m");
  const acceptedReqLink = document.getElementById("accepted_requests");
  const acceptedReqLink_m = document.getElementById("accepted_requests_m");

  const links = [
    marketplaceLink,
    addAuctionItemLink,
    viewAuctionItemLink,
    addItemLink,
    viewItemLink,
    auctionLink,
    ordersCurrentLink,
    ordersCurrentLink_m,
    ordersCompleteLink,
    ordersCompleteLink_m,
    reviewsLink,
    reviewsLink_m,
    auctionLink_m,
    marketplaceLink_m,
    addAuctionItemLink_m,
    viewAuctionItemLink_m,
    addItemLink_m,
    viewItemLink_m,
    availableReqLink,
    availableReqLink_m,
    acceptedReqLink,
    acceptedReqLink_m,
  ];

  function setActive() {
    const currentLocation = window.location.href.toLowerCase();
    sidebarItem.forEach(function (otherItem) {
      otherItem.classList.remove("sidebar_active");
    });


    
    if (currentLocation.includes("marketplace")) {
      marketplaceLink.classList.add("sidebar_active");
      marketplaceLink_m.classList.add("sidebar_active");
    }
    if (
      currentLocation.includes("auc") &&
      !currentLocation.includes("auction")
    ) {
      marketplaceLink.classList.add("sidebar_active");
      marketplaceLink_m.classList.add("sidebar_active");
    }
    if (
      currentLocation.includes("auction") &&
      !currentLocation.includes("/add")
    ) {
      viewAuctionItemLink.classList.add("sidebar_active");
      viewAuctionItemLink_m.classList.add("sidebar_active");
      let listItem = viewAuctionItemLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = viewAuctionItemLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("auction/add")) {
      addAuctionItemLink.classList.add("sidebar_active");
      addAuctionItemLink_m.classList.add("sidebar_active");
      let listItem = addAuctionItemLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = addAuctionItemLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("requests/available")) {
      availableReqLink.classList.add("sidebar_active");
      availableReqLink_m.classList.add("sidebar_active");
      let listItem = availableReqLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = availableReqLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("requests/accepted")) {
      acceptedReqLink.classList.add("sidebar_active");
      acceptedReqLink_m.classList.add("sidebar_active");
      let listItem = acceptedReqLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = acceptedReqLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }

    if (
      currentLocation.includes("orders") &&
      !currentLocation.includes("/complete")
    ) {
      ordersCurrentLink.classList.add("sidebar_active");
      ordersCurrentLink_m.classList.add("sidebar_active");
      let listItem = ordersCurrentLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = ordersCurrentLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("orders/complete")) {
      ordersCompleteLink.classList.add("sidebar_active");
      ordersCompleteLink_m.classList.add("sidebar_active");
      let listItem = ordersCompleteLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = ordersCompleteLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("reviews")) {
      reviewsLink.classList.add("sidebar_active");
      reviewsLink_m.classList.add("sidebar_active");
    }
    if (currentLocation.includes("listproduct")) {
      addItemLink.classList.add("sidebar_active");
      addItemLink_m.classList.add("sidebar_active");
      let listItem = addItemLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = addItemLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
    if (currentLocation.includes("myproducts")) {
      viewItemLink.classList.add("sidebar_active");
      viewItemLink_m.classList.add("sidebar_active");
      let listItem = viewItemLink.closest("li");
      let expandDiv = listItem.querySelector(".expand");
      expandDiv.classList.remove("hide_expand");
      listItem = addItemLink_m.closest("li");
      expandDiv = listItem.querySelector(".expand_m");
      expandDiv.classList.remove("hide_expand");
    }
  }
  setActive();
});
