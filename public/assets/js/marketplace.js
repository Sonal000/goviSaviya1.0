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
    window.location.href = `${URLROOT}/auc `;
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

// sorting
const sorting_btn = document.getElementById("sorting_btn");
const sorting_btn_ico = document.querySelector(".sorting_btn i");
const expand_sorting = document.getElementById("expand_sorting");
const sorting_btn_txt = document.getElementById("sorting_btn_txt");
const sortingItems = document.querySelectorAll(".sorting_item");

sorting_btn.addEventListener("click", (e) => {
  // e.preventDefault();
  expand_sorting.classList.toggle("hide_expand_sorting");
  sorting_btn_ico.classList.toggle("fa-chevron-down");
  sorting_btn_ico.classList.toggle("fa-chevron-up");
});

const urlParams = new URLSearchParams(window.location.search);
const params = [];
urlParams.forEach((value, key) => {
  if (key === "sort" || key === "order") {
    params.push(key, value);
  }
});
if (params.length === 0) {
  params.push("sort", "created_at", "order", "desc");
}
// const paramsObject = {};
// urlParams.forEach((value, key) => {
//   if (key === 'sort' || key === 'order') {
//     paramsObject[key] = value;
//   }
// });

sortParams = ["sort", "order", "asc", "desc", "price", "stock", "created_at"];

const sortParam = urlParams.get("sort");
sortingItems.forEach((el) => {
  const href = el.getAttribute("href");
  const words = href
    .split(/[=&?]/)
    .filter(Boolean)
    .filter((word) => sortParams.includes(word));

  if (arraysEqual(words, params)) {
    const text = el.textContent.trim();
    sorting_btn_txt.textContent = text;
    el.querySelector(".sorting_check").classList.add("sorting_check_show");
  }
});

function arraysEqual(arr1, arr2) {
  if (arr1.length !== arr2.length) {
    return false;
  }

  return arr1.every(
    (value, index) => value.toLowerCase() === arr2[index].toLowerCase()
  );
}
// function updateSorting(sortingType) {
//   // Update sorting button text
//   document.getElementById('sorting_btn').textContent = sortingType;

//   // Remove check icons from all sorting items
//   document.querySelectorAll('.sorting_item i').forEach(icon => {
//       icon.classList.remove('fas', 'fa-check');
//   });

//   // Add check icon to the selected sorting item
//   document.getElementById(`sorting_check_${sortingType.toLowerCase().replace(/\s/g, '_')}`).classList.add('fas', 'fa-check');
// }

// filter expand
const filter_expand_btns = document.querySelectorAll(".filter_btn_expand");
const filter_contents = document.querySelectorAll(".filter_content");

filter_expand_btns.forEach((btn) => {
  const filterForm = btn.closest(".filter_form");
  const filterContent = filterForm.querySelector(".filter_content");
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    btn.querySelector('.img_filters').classList.toggle('img_filters_rotate');
    filter_contents.forEach((element) => {
      if (element !== filterContent) {
        element.classList.remove("filter_content_show");
      }
    });
    filterContent.classList.toggle("filter_content_show");
  });
});

function removeFilterShow() {
  filter_contents.forEach((el) => {
    el.classList.remove("filter_content_show");
  });
}

removeFilterShow();

// submit filters
const apply_category_btn = document.getElementById("apply_category");
const apply_city_btn = document.getElementById("apply_city");
const apply_price_btn = document.getElementById("apply_price");
const apply_qty_btn = document.getElementById("apply_quantity");
const apply_search = document.getElementById("search_btn");
// const clear_cat = document.getElementById("clear_cat");

apply_category_btn.addEventListener("click", (e) => {
  e.preventDefault();
  applyCategories();
});
apply_city_btn.addEventListener("click", (e) => {
  e.preventDefault();
  applyCities();
});
apply_price_btn.addEventListener("click", (e) => {
  e.preventDefault();
  applyPriceRange();
});
apply_qty_btn.addEventListener("click", (e) => {
  e.preventDefault();
  applyQuantityRange();
});
apply_search.addEventListener("click", (e) => {
  e.preventDefault();
  applySearch();
});

//

function applyCheckbox() {
  const urlParams = new URLSearchParams(window.location.search);

  // category check
  const categoryString = urlParams.get("category");
  if (categoryString) {
    const selectedCategories = categoryString.split("%a%");
    selectedCategories.forEach((cat) => {
      const checkbox = document.querySelector(
        `[name="category"][value="${cat}"]`
      );
      if (checkbox) {
        checkbox.checked = true;
      }
    });
  } else {
    const checkbox = document.querySelector(`[name="category"][value="all"]`);
    if (checkbox) {
      checkbox.checked = true;
    }
  }

  // cityCheck
  const cityString = urlParams.get("city");
  if (cityString) {
    const selectedcities = cityString.split("%a%");
    selectedcities.forEach((city) => {
      const checkbox = document.querySelector(`[name="city"][value="${city}"]`);
      if (checkbox) {
        checkbox.checked = true;
      }
    });
  } else {
    const checkbox = document.querySelector(`[name="city"][value="all"]`);
    if (checkbox) {
      checkbox.checked = true;
    }
  }

  //price range
  const minPrice = urlParams.get("minPrice");
  const maxPrice = urlParams.get("maxPrice");
  const minInput = document.querySelector(".input-min");
  const maxInput = document.querySelector(".input-max");
  const minRange = document.querySelector(".range-min");
  const maxRange = document.querySelector(".range-max");
  if (minPrice) {
    minInput.value = minPrice;
    minRange.value = minPrice;
  }
  if (maxPrice) {
    maxInput.value = maxPrice;
    maxRange.value = maxPrice;
  }
  updateRangeStyles(minPrice ? minPrice : null, maxPrice ? maxPrice : null);

  // quaantity Range
  const minQty = urlParams.get("minQty");
  const maxQty = urlParams.get("maxQty");
  const minInputQty = document.querySelector(".input-min-quantity");
  const maxInputQty = document.querySelector(".input-max-quantity");
  const minRangeQty = document.querySelector(".range-min-quantity");
  const maxRangeQty = document.querySelector(".range-max-quantity");
  if (minQty) {
    minInputQty.value = minQty;
    minRangeQty.value = minQty;
  }
  if (maxQty) {
    maxInputQty.value = maxQty;
    maxRangeQty.value = maxQty;
  }
  updateRangeStylesQty(minQty ? minQty : null, maxQty ? maxQty : null);
}
applyCheckbox();

function applyCategories() {
  const form = document.getElementById("categoryForm");
  const formData = new FormData(form);

  // Extract selected categories from FormData
  const selectedCategories = [];

  formData.getAll("category").forEach((category) => {
    if (category) {
      selectedCategories.push(category);
    }
  });

  const categoryString = selectedCategories.join("%a%");

  // Update the URL with selected categories
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.delete("category");

  if (categoryString.length !== 0 && !categoryString.includes("all")) {
    urlParams.append("category", categoryString);
  }

  // Redirect to the updated URL
  window.location.href = "?" + urlParams.toString();
}

function applySearch() {
  const form = document.getElementById("searchForm");
  const formData = new FormData(form);
  const search = formData.get("search");
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.delete("search");
  urlParams.delete("page");

  if (search) {
    const selectedTerms = search.split(/\s+/).filter(Boolean);
    const searchString = selectedTerms.join("%a%");
    if (searchString.length !== 0) {
      urlParams.append("search", searchString);
    }
  }
  window.location.href = "?" + urlParams.toString();
}
function applyCities() {
  const form = document.getElementById("cityForm");
  const formData = new FormData(form);
  const selectedCities = [];
  formData.getAll("city").forEach((city) => {
    if (city) {
      selectedCities.push(city);
    }
  });
  const cityString = selectedCities.join("%a%");
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.delete("city"); // Remove existing city params
  if (cityString.length !== 0 && !cityString.includes("all")) {
    urlParams.append("city", cityString);
    urlParams.delete("page");
  }

  // Redirect to the updated URL
  window.location.href = "?" + urlParams.toString();
}

function applyPriceRange() {
  const form = document.getElementById("priceForm");
  const formData = new FormData(form);
  const urlParams = new URLSearchParams(window.location.search);

  urlParams.set("minPrice", formData.get("minPrice"));
  urlParams.set("maxPrice", formData.get("maxPrice"));
  urlParams.delete("page");

  // Redirect to the updated URL
  window.location.href = "?" + urlParams.toString();
}
function applyQuantityRange() {
  const form = document.getElementById("quantityForm");
  const formData = new FormData(form);
  const urlParams = new URLSearchParams(window.location.search);

  // Add other form data to the URL if needed
  urlParams.set("minQty", formData.get("minQty"));
  urlParams.set("maxQty", formData.get("maxQty"));
  urlParams.delete("page");

  // Redirect to the updated URL
  window.location.href = "?" + urlParams.toString();
}

// filtering controls
const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 100;
priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});
rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);
    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      updateRangeStyles(minVal, maxVal);
    }
  });
});

// update slider styles
function updateRangeStyles(minVal, maxVal) {
  const rangeInput = document.querySelectorAll(".range-input input");
  const range = document.querySelector(".slider .progress");
  range.style.left =
    ((minVal ? minVal : rangeInput[0].min) / rangeInput[0].max) * 100 + "%";
  range.style.right =
    100 -
    ((maxVal ? maxVal : rangeInput[1].max) / rangeInput[1].max) * 100 +
    "%";
}

// filtering controls for quantity
const rangeInputQty = document.querySelectorAll(".range-input-quantity input"),
  qtyInput = document.querySelectorAll(".quantity-input input"),
  rangeQty = document.querySelector(".slider .progress-quantity");
let qtyGap = 50;
qtyInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minQty = parseInt(qtyInput[0].value),
      maxQty = parseInt(qtyInput[1].value);

    if (maxQty - minQty >= qtyGap && maxQty <= rangeInputQty[1].max) {
      if (e.target.className === "input-min-quantity") {
        rangeInputQty[0].value = minQty;
        rangeQty.style.left = (minQty / rangeInputQty[0].max) * 100 + "%";
      } else {
        rangeInputQty[1].value = maxQty;
        rangeQty.style.right =
          100 - (maxQty / rangeInputQty[1].max) * 100 + "%";
      }
    }
  });
});
rangeInputQty.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInputQty[0].value),
      maxVal = parseInt(rangeInputQty[1].value);
    if (maxVal - minVal < qtyGap) {
      if (e.target.className === "range-min-quantity") {
        rangeInputQty[0].value = maxVal - qtyGap;
      } else {
        rangeInputQty[1].value = minVal + qtyGap;
      }
    } else {
      qtyInput[0].value = minVal;
      qtyInput[1].value = maxVal;
      updateRangeStylesQty(minVal, maxVal);
    }
  });
});

// update slider styles quatity
function updateRangeStylesQty(minVal, maxVal) {
  const rangeInputQty = document.querySelectorAll(
    ".range-input-quantity input"
  );
  const rangeQty = document.querySelector(".slider .progress-quantity");
  rangeQty.style.left =
    ((minVal ? minVal : rangeInputQty[0].min) / rangeInputQty[0].max) * 100 +
    "%";
  rangeQty.style.right =
    100 -
    ((maxVal ? maxVal : rangeInputQty[1].max) / rangeInputQty[1].max) * 100 +
    "%";
}
