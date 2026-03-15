(function () {
  const cards = document.querySelectorAll(".order-card");
  const noOrders = document.getElementById("no-orders");
  function filterOrders(status) {
    let OrderDetail_HienThi = 0;
    cards.forEach(card => {
      const orderStatus = card.dataset.status;
      if (status === "all" || orderStatus == status) {
        card.parentElement.style.display = "block";
        OrderDetail_HienThi++;
      }
      else {
        card.parentElement.style.display = "none";
      }
    });
    if (OrderDetail_HienThi === 0) {
      noOrders.classList.remove("d-none");
    }
    else {
      noOrders.classList.add("d-none");
    }

  }
  document.getElementById("all-tab").onclick = () => filterOrders("all");
  document.getElementById("processing-tab").onclick = () => filterOrders("0");
  document.getElementById("shipping-tab").onclick = () => filterOrders("1");
  document.getElementById("delivered-tab").onclick = () => filterOrders("2");
  document.getElementById("cancelled-tab").onclick = () => filterOrders("-1");

})();