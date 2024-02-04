
const trackOrder = document.querySelectorAll(".track_order");
const overlayAll = document.querySelectorAll(".overlay");
const backdrop = document.getElementById('backdrop');
const orderProgressBar = document.querySelector('order_progress');

trackOrder.forEach((el) => {
  el.addEventListener("click", () => {
    const bidCont = el.closest(".bid_item_cont");
    if (bidCont) {
      const overlay = bidCont.nextElementSibling;
      if(overlay){
        overlay.classList.toggle("hidden_overlay");
        backdrop.classList.toggle("hidden_backdrop");
      }
    }
  });
});

backdrop.addEventListener('click',()=>{
    backdrop.classList.toggle('hidden_backdrop');
    overlayAll.forEach((el)=>{
        el.classList.add('hidden_overlay')
    });
})