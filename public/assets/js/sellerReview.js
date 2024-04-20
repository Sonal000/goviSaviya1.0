const endAucBtn = document.getElementById("end_auc_btn");
const aucCont = document.getElementById("blur");
const aucCancleCont = document.getElementById("window_up");

if(endAucBtn){

  endAucBtn.addEventListener("click", (e) => {
    aucCont.classList.toggle("hide");
    aucCancleCont.classList.toggle("show");
  });
}

const trackOrder = document.querySelectorAll(".auc_cards");
const overlayAll = document.querySelectorAll(".overlay");
const backdrop = document.getElementById("backdrop");

trackOrder.forEach((el) => {
  el.addEventListener("click", () => {
    const bidCont = el.closest(".mycard");
    if (bidCont) {
      const overlay = bidCont.nextElementSibling;
      if (overlay) {
        console.log(overlay.classList);
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
});

$(".mycard").hide();
$(".mycard").delay(100).fadeIn();
