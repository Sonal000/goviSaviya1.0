// go back btn

const backBtn = document.querySelector(".back_btn");

backBtn.addEventListener("click", () => {
  window.location.href = `${URLROOT}/marketplace`;
});

// item-info image slider
const sliderButtons = document.querySelectorAll(".slider_btn");
const mainImage = document.querySelector(".main_img");

sliderButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    const clickedImageSrc = button
      .querySelector(".slider_img")
      .getAttribute("src");
    mainImage.setAttribute("src", clickedImageSrc);
  });
});

// qunatity adjust
const btnAdd = document.querySelector(".btn_add");
const btnRemove = document.querySelector(".btn_remove");
const qty = document.getElementById("quantity");

btnAdd.addEventListener("click", (e) => {
  e.preventDefault();
  qty.value = parseInt(qty.value) + 1;
});
btnRemove.addEventListener("click", (e) => {
  e.preventDefault();
  if (qty.value > 0) {
    qty.value = parseInt(qty.value) - 1;
  }
});

const max = $("#quantity").data("available");
$("#item_add").submit(function (e) {
  e.preventDefault();
  if ($("#quantity").val() > max || $("#quantity").val() <1){
    e.preventDefault();
    if($("#quantity").val() < 1){
      $(".qty_message").text(
        "Quantity must be greater than 0"
      );}else{
        $(".qty_message").text(
          "Quantity must be less than or equal to available stock"
        );
      }

  } else {
    $(this).off("submit").submit();
  }
});
