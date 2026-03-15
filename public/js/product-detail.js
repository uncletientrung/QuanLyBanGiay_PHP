function changeImage(elem) {
  const mainImg = document.getElementById("mainImage");
  const thumbs = document.querySelectorAll(".thumb-img");

  thumbs.forEach((img) => img.classList.remove("active"));
  elem.classList.add("active");

  mainImg.style.opacity = "0";

  setTimeout(() => {
    mainImg.src = elem.src;
    mainImg.style.opacity = "1";
  }, 150);
}

document.querySelectorAll(".thumb-img").forEach((img) => {
  img.addEventListener("mouseenter", function () {
    this.style.transform = "scale(1.08)";
  });
  img.addEventListener("mouseleave", function () {
    if (!this.classList.contains("active")) {
      this.style.transform = "scale(1)";
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Biến trạng thái
  let selectedSize = null;
  let tensize = null;
  let selectedStock = 0;

  // Lấy giá gốc (giá 1 sản phẩm)
  const giaBanElement = document.querySelector(".gia-ban");
  const pricePerUnit = parseFloat(giaBanElement?.dataset?.gia) || 0;

  // Các phần tử DOM
  const sizeButtons = document.querySelectorAll(".size-btn");
  const qtyInput = document.getElementById("qty");
  const btnMinus = document.querySelector(".btn-minus");
  const btnPlus = document.querySelector(".btn-plus");
  const addToCartBtn = document.querySelector(".add-to-cart-btn");

  const masp = addToCartBtn.dataset.masp;
  const productName = addToCartBtn.dataset.tensp;
  const buyNowBtn = document.querySelector(".btn.btn-danger.w-100"); // nút Mua ngay

  // Hàm cập nhật giá
  function updateDisplayedPrice() {
    if (!giaBanElement || !qtyInput) return;
    const qty = parseInt(qtyInput.value) || 1;
    const total = pricePerUnit * qty;
    // ding dạng tiền
    const formattedTotal = total.toLocaleString("vi-VN") + " ₫";
    giaBanElement.innerHTML = formattedTotal;
    // chữ x
    giaBanElement.innerHTML = formattedTotal + ` <small>(x${qty})</small>`;
  }

  // chọn size
  sizeButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      if (this.classList.contains("disabled")) return;

      sizeButtons.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      selectedSize = this.dataset.sizeId;
      tensize = this.dataset.size;
      selectedStock = parseInt(this.dataset.stock) || 0;

      if (qtyInput) qtyInput.value = 1;
      updateDisplayedPrice();
    });
  });

  // số lưognj
  function changeQty(delta) {
    if (!selectedSize) {
      alert("Vui lòng chọn size trước!");
      return;
    }
    if (!qtyInput) return;

    let val = parseInt(qtyInput.value) || 1;
    val += delta;

    if (val < 1) val = 1;
    if (val > selectedStock) {
      alert(`Chỉ còn ${selectedStock} sản phẩm size ${tensize}!`);
      val = selectedStock;
    }

    qtyInput.value = val;
    updateDisplayedPrice();
  }

  if (btnPlus) btnPlus.addEventListener("click", () => changeQty(1));
  if (btnMinus) btnMinus.addEventListener("click", () => changeQty(-1));

  // trường hợp nhập input
  if (qtyInput) {
    qtyInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, ""); // chỉ cho phép số
    });

    qtyInput.addEventListener("change", validateQty);
    qtyInput.addEventListener("blur", validateQty);
  }

  function validateQty() {
    if (!selectedSize) {
      alert("Vui lòng chọn size trước!");
      if (qtyInput) qtyInput.value = 1;
      updateDisplayedPrice();
      return;
    }

    let val = parseInt(qtyInput.value) || 1;
    if (val < 1) val = 1;
    if (val > selectedStock) {
      alert(`Chỉ còn ${selectedStock} sản phẩm size ${tensize}!`);
      val = selectedStock;
    }
    qtyInput.value = val;
    updateDisplayedPrice();
  }

  // validate trước khi mua
  function canProceed() {
    if (!selectedSize) {
      alert("Vui lòng chọn size!");
      return false;
    }
    if (!qtyInput) return false;

    const qty = parseInt(qtyInput.value) || 1;
    if (qty < 1 || qty > selectedStock) {
      alert(
        `Số lượng không hợp lệ! Chỉ còn ${selectedStock} cái size ${tensize}.`,
      );
      qtyInput.value = Math.min(qty, selectedStock) || 1;
      updateDisplayedPrice();
      return false;
    }
    return true;
  }

  // nut them gio hang
  // ================== ADD TO CART (Modal đẹp thay alert) ==================
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function (e) {
      e.preventDefault();
      if (!canProceed()) return;

      const qty = parseInt(qtyInput.value);
      const totalPrice = pricePerUnit * qty;

      const data = {
        masp: masp,
        tensp: productName,
        size: selectedSize,
        qty: qty,
        totalPrice: totalPrice,
      };

      // Hiển thị thông báo trong modal
      showCartSuccess(productName, tensize, qty, totalPrice);

      // GỬI AJAX THẬT LÊN SERVER (tùy chọn - sau này implement)
      console.log("Add to cart data:", data);
      console.log("DATA SEND:", data);
      fetch(BASE_URL + "add-cart", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      })
        .then((res) => res.json())
        .then((data) => {
          if (!data.success) return;

          const cartCount = document.getElementById("cart-count");

          if (cartCount) {
            if (data.cartCount == 0) {
              cartCount.remove();
            } else {
              cartCount.innerText = data.cartCount;
              cartCount.style.display = "flex";
            }
          }
        });
    });
  }

  // ================== HÀM HIỂN THỊ MODAL THÀNH CÔNG ==================
  function showCartSuccess(productName, size, qty, totalPrice) {
    const modal = new bootstrap.Modal(document.getElementById("cartModal"));
    const messageEl = document.getElementById("cartMessage");

    const formattedTotal = totalPrice.toLocaleString("vi-VN") + " ₫";

    messageEl.innerHTML = `
        <div class="mb-3">
            <strong>${productName}</strong>
        </div>
        <div class="mb-2">
            Size: <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1">${size}</span>
              × ${qty} đôi
        </div>
        <div class="fs-4 fw-bold text-success mb-4">
            ${formattedTotal}
        </div>
        <small class="text-muted">Sản phẩm đã được thêm vào giỏ hàng của bạn</small>
    `;

    modal.show();

    // Tự động đóng sau 6 giây
    setTimeout(() => modal.hide(), 6000);

    // Nút tiếp tục mua
    document.getElementById("continueShopping").onclick = () => modal.hide();
  }

  // mua ngay
  if (buyNowBtn) {
    buyNowBtn.addEventListener("click", function (e) {
      e.preventDefault();
      if (!canProceed()) return;

      const data = {
        masp: masp,
        size: selectedSize,
        qty: parseInt(qtyInput.value),
      };
      console.log("Buy now:", data);
      alert("Đi đến thanh toán: Size " + tensize + " × " + data.qty);
    });
  }

  // Khởi tạo giá ban đầu
  updateDisplayedPrice();
});
