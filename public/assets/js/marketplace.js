// URL ROOT
// const URLROOT = 'http://localhost/web-project';

// marketplace===================

const listingBtn = document.getElementById("listing_btn");
const auctionBtn = document.getElementById("auction_btn");
const filterBtnAll = document.getElementById("filter_btn_all");
const sidebarClose = document.getElementById("sidebar_close_btn");
const sidebarFilter = document.getElementById("sidebar_filter");

if (listingBtn) {
  listingBtn.addEventListener("click", () => {
    listingBtn.classList.add("active");
    auctionBtn.classList.remove("active");
    window.location.href = `${URLROOT}/marketplace`;
  });
}

if (auctionBtn) {
  auctionBtn.addEventListener("click", () => {
    auctionBtn.classList.add("active");
    listingBtn.classList.remove("active");
    window.location.href = `${URLROOT}/auctionC `;
  });
}
if (filterBtnAll) {
  filterBtnAll.addEventListener("click", () => {
    sidebarFilter.classList.add("show");
  });
}
if (sidebarClose) {
  sidebarClose.addEventListener("click", () => {
    sidebarFilter.classList.remove("show");
  });
}
// window.addEventListener("scroll", () => {
//   if (window.pageYOffset > 62) {
//     serachBarSection.classList.add("searchbar_translate");
//   }
//   if (window.pageYOffset > 64) {
//     serachBarSection.classList.add("searchbar_fixed");
//   }
//   if (window.pageYOffset < 54) {
//     serachBarSection.classList.remove("searchbar_translate");
//   }
//   if (window.pageYOffset < 64) {
//     serachBarSection.classList.remove("searchbar_fixed");
//   }
// });
