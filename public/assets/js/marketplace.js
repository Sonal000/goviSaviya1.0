
// URL ROOT
// const URLROOT = 'http://localhost/web-project';


// marketplace===================

const listingBtn = document.getElementById('listing_btn');
const auctionBtn = document.getElementById('auction_btn');
const filterBtnAll = document.getElementById('filter_btn_all');
const sidebarClose = document.getElementById('sidebar_close_btn');
const sidebarFilter = document.getElementById('sidebar_filter');


listingBtn.addEventListener('click',()=>{
 listingBtn.classList.add('active');
 auctionBtn.classList.remove('active');
 window.location.href = `${URLROOT}/marketplace`;
});

auctionBtn.addEventListener('click',()=>{
 auctionBtn.classList.add('active');
 listingBtn.classList.remove('active');
 window.location.href = `${URLROOT}/auction `;
});
filterBtnAll.addEventListener('click',()=>{
 sidebarFilter.classList.add('show');
})
sidebarClose.addEventListener('click',()=>{
 sidebarFilter.classList.remove('show');
})